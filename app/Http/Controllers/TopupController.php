<?php

namespace App\Http\Controllers;

use App\Models\Saldo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TopupController extends Controller
{
    // Step 1: Form input jumlah topup
    public function form()
    {
        return view('topup.form');
    }

    // Step 2: Validasi jumlah & arahkan ke pilih metode
    public function process(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:10000',
        ]);

        $orderId = 'TOPUP-' . uniqid();

        return view('topup.choose-method', [
            'orderId' => $orderId,
            'amount'  => (int) $request->amount,
        ]);
    }

    // (Opsional) Kalau mau via GET
    public function chooseMethod($orderId, $amount)
    {
        return view('topup.choose-method', [
            'orderId' => $orderId,
            'amount'  => (int) $amount,
        ]);
    }

    // Step 3: Submit metode & kirim ke Midtrans
    public function submitMethod(Request $request)
    {
       
        $orderId = $request->input('order_id') . '-' . uniqid();

        $amount  = (int) $request->input('amount');
        $raw     = strtolower((string) $request->input('method')); // "bank_bni" | "bni" | "ewallet_gopay" | "gopay" | "qris"

        // Ambil santri aktif dari session
        $childId = session('current_child');
        if (!$childId) { 
            return redirect()->route('topup.form')->withErrors(['msg' => 'Santri aktif tidak ditemukan.']);
        }

        // --- Normalisasi method ---
        $method = $raw;
        if (str_starts_with($raw, 'bank_'))    $method = substr($raw, 5);   // bank_bni -> bni
        if (str_starts_with($raw, 'ewallet_')) $method = substr($raw, 8);   // ewallet_gopay -> gopay

        $bankListTransfer = ['bca','bni','bri','permata']; // mandiri BUKAN bank_transfer
        $supportedWallets = ['gopay']; // tambahkan 'ovo','dana' kalau channel-nya sudah aktif & payload dilengkapi

        $paymentType = null;

        if (in_array($method, $bankListTransfer, true)) {
            $paymentType = 'bank_transfer';
        } elseif ($method === 'mandiri') {
            $paymentType = 'echannel'; // <- WAJIB untuk Mandiri
        } elseif ($method === 'qris') {
            $paymentType = 'qris';
        } elseif (in_array($method, $supportedWallets, true)) {
            $paymentType = $method; // 'gopay'
        } else {
            return redirect()->route('topup.chooseMethod', [$orderId, $amount])
                ->withErrors(['msg' => 'Metode pembayaran tidak dikenali atau belum didukung.']);
        }

        // --- INSERT order dulu (biar callback tidak “nyusul” tapi tidak nemu order)
        DB::table('topup_orders')->updateOrInsert(
            ['order_id' => $orderId],
            [
                'child_id'     => $childId,
                'amount'       => $amount,
                'status'       => 'pending',
                'raw_response' => null,
                'updated_at'   => now(),
                'created_at'   => now(),
            ]
        );

        // --- Build payload Midtrans ---
        $payload = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name ?? 'User',
                'email'      => auth()->user()->email ?? 'user@example.com',
                'phone'      => '08123456789',
            ],
        ];

        if ($paymentType === 'bank_transfer') {
            // bca, bni, bri, permata
            $payload['payment_type']   = 'bank_transfer';
            $payload['bank_transfer']  = ['bank' => $method];

        } elseif ($paymentType === 'echannel') {
            // Mandiri bill payment
            $payload['payment_type'] = 'echannel';
            $payload['echannel'] = [
                'bill_info1' => 'Topup Saldo',
                'bill_info2' => $orderId,
            ];

        } elseif ($paymentType === 'qris') {
            $payload['payment_type'] = 'qris';

        } elseif ($paymentType === 'gopay') {
            $payload['payment_type'] = 'gopay';
            // Opsional:
            // $payload['gopay'] = ['enable_callback' => true, 'callback_url' => url('/')];
        }

        // --- Call Midtrans ---
        $serverKey = config('services.midtrans.server_key');
        $isProd    = (bool) config('services.midtrans.is_production', false);
        $baseUrl   = $isProd ? 'https://api.midtrans.com' : 'https://api.sandbox.midtrans.com';

        if (!$serverKey) {
            return redirect()->route('topup.chooseMethod', [$orderId, $amount])
                ->withErrors(['msg' => 'Server key Midtrans belum di-set.']);
        }

        try {
            $httpResp = Http::withBasicAuth($serverKey, '')
                ->acceptJson()
                ->post($baseUrl . '/v2/charge', $payload);

            if ($httpResp->failed()) {
                $err = $httpResp->json();
                Log::error('Midtrans charge failed', ['err' => $err, 'payload' => $payload]);
                $msg = $err['status_message'] ?? 'Gagal membuat transaksi Midtrans.';
                return redirect()->route('topup.chooseMethod', [$orderId, $amount])
                    ->withErrors(['msg' => $msg]);
            }

            $resArr   = $httpResp->json();
            $response = (object) $resArr;

            // Simpan raw_response utk debug
            DB::table('topup_orders')->where('order_id', $orderId)->update([
                'raw_response' => json_encode($resArr),
                'updated_at'   => now(),
            ]);

        } catch (\Throwable $e) {
            Log::error('Midtrans connect error', ['error' => $e->getMessage()]);
            return redirect()->route('topup.chooseMethod', [$orderId, $amount])
                ->withErrors(['msg' => 'Koneksi ke Midtrans gagal: ' . $e->getMessage() ]);
        }
        return redirect()->route('topup.detail',['id' => $orderId, 'method' => $method]);
        // // Tampilkan instruksi pembayaran
        // return view('topup.payment-info', [
        //     'response' => $response,
        //     'method'   => $method,   // bni|bca|bri|permata|mandiri|qris|gopay
        //     'orderId'  => $orderId,
        //     'amount'   => $amount,
        // ]);
    }

    // Dipanggil oleh JS di payment-info.blade untuk auto-redirect jika sudah settlement
    public function checkStatus($orderId)
    {
        $order = DB::table('topup_orders')->where('order_id', $orderId)->first();
        return response()->json([
            'status' => $order->status ?? 'pending',
        ]);
    }

    // Webhook/Notification dari Midtrans
    public function callback(Request $request)
    {
        $notif = $request->all();
        Log::info('Midtrans Callback', $notif);

        // --- Verifikasi signature ---
        $serverKey = config('services.midtrans.server_key');
        $orderId   = $notif['order_id']              ?? '';
        $status    = $notif['transaction_status']    ?? '';
        $statusCode= $notif['status_code']           ?? '';
        $gross     = (string)($notif['gross_amount'] ?? '0'); // Midtrans kirim string
        $signature = $notif['signature_key']         ?? '';

        $expected  = hash('sha512', $orderId.$statusCode.$gross.$serverKey);
        if ($signature !== $expected) {
            Log::warning('Invalid Midtrans signature', ['order_id' => $orderId]);
            return response()->json(['message' => 'Invalid signature'], 403);
        }

        // --- Ambil order ---
        $order = DB::table('topup_orders')->where('order_id', $orderId)->first();
        if (!$order) {
            Log::warning('Order not found for callback', ['order_id' => $orderId]);
            return response()->json(['message' => 'Order not found'], 404);
        }

        // --- Update status sesuai notif ---
        DB::table('topup_orders')->where('order_id', $orderId)->update([
            'status'     => $status,
            'updated_at' => now(),
        ]);

        // --- Jika settlement → tambahkan saldo anak ---
        if ($status === 'settlement') {
            try {
                DB::table('transaksi')->insert([
            'wali_id'    => null,
            'santri_id'  => $order->child_id ?? null, // isi kalau ada id santri
            'jenis'      => 'topup',             // contoh: spp / topup / tabungan
            'tipe'       => 'Masuk',           // atau 'Keluar'
            'jumlah'     => $order->amount,            // nominal transaksi
            'judul'      => 'Top Up Saldo',    // judul transaksi
            'keterangan' => 'Top up saldo dari wali santri', // deskripsi
            'created_at' => now(),
            'updated_at' => now(),
        ]);

              DB::table('anak')->where('id', $order->child_id)->increment('saldo', (int) $order->amount);
            } catch (\Throwable $e) {
                Log::error('Gagal update saldo anak', ['order_id' => $orderId, 'err' => $e->getMessage()]);
            }
        }

        return response()->json(['message' => 'OK']);
    }
    public function detailtopup($id,$method){
         $topup = DB::table('topup_orders')->where('order_id', $id)->first();
         return view('topup.payment-info', [
            'response' => $topup ->raw_response,
            'method'   => $method,   // bni|bca|bri|permata|mandiri|qris|gopay
            'orderId'  => $id,
            'amount'   => $topup ->amount,
        ]);
    }
}
