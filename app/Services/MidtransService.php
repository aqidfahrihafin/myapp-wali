<?php

namespace App\Services;

use Midtrans\Config;
use Midtrans\CoreApi;

class MidtransService
{
    public function __construct()
    {
        Config::$serverKey    = config('services.midtrans.server_key');
        Config::$isProduction = (bool) config('services.midtrans.is_production', false);
        Config::$isSanitized  = true;
        Config::$is3ds        = true;
    }

    /**
     * @param string $orderId
     * @param int    $amount
     * @param string $method contoh: 'bni','bri','bca','permata','mandiri','qris','gopay'
     * @param array  $customer = ['first_name'=>'','email'=>'','phone'=>'']
     * @return object response sebagai object (bukan array)
     */
    public function charge(string $orderId, int $amount, string $method, array $customer = []): object
    {
        $raw = strtolower($method);
        if (str_starts_with($raw, 'bank_'))    $raw = substr($raw, 5);  // bank_bni -> bni
        if (str_starts_with($raw, 'ewallet_')) $raw = substr($raw, 8);  // ewallet_gopay -> gopay

        $bankList = ['bca','bni','bri','permata'];

        $payload = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => $amount,
            ],
            'customer_details' => [
                'first_name' => $customer['first_name'] ?? 'User',
                'email'      => $customer['email']      ?? 'user@example.com',
                'phone'      => $customer['phone']      ?? '08xxxx',
            ],
        ];

        if (in_array($raw, $bankList, true)) {
            $payload['payment_type']   = 'bank_transfer';
            $payload['bank_transfer']  = ['bank' => $raw];

        } elseif ($raw === 'mandiri') {
            $payload['payment_type'] = 'echannel';
            $payload['echannel']     = [
                'bill_info1' => 'Topup Saldo',
                'bill_info2' => $orderId,
            ];

        } elseif ($raw === 'qris') {
            $payload['payment_type'] = 'qris';

        } elseif ($raw === 'gopay') {
            $payload['payment_type'] = 'gopay';

        } else {
            throw new \InvalidArgumentException('Metode tidak didukung: ' . $raw);
        }

        // CoreApi::charge() return array; ubah ke object (deep)
        $resp = CoreApi::charge($payload);
        return json_decode(json_encode($resp));
    }
}
