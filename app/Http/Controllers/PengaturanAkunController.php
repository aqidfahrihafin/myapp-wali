<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PengaturanAkunController extends Controller
{
    public function index()
{
     $wali = session('wali');
        if (!$wali) {
            return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
        }

        $currentChildId = session('current_child');
        $children = collect(session('children', []));
        $currentChild = $children->firstWhere('id', $currentChildId);
        $response = Http::get('http://127.0.0.1:8001/api/santri');
        $santri = $response->json();

        $user = (object) [
            'name'     => $wali['nama'] ?? '-',
            'email'    => $wali['email'] ?? '-',
            'phone'    => $wali['phone'] ?? '-',
            'password' => $wali['password'] ?? '-',
        ];

        return view('pengaturanakun', compact('user', 'santri', 'currentChild'));
    }
    public function edit()
        {
            $wali = session('wali');
            if (!$wali) {
                return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
            }

            $user = (object) [
                'name'     => $wali['nama'] ?? '-',
                'email'    => $wali['email'] ?? '-',
                'phone'    => $wali['phone'] ?? '-',
                'password' => $wali['password'] ?? '-',
            ];

            return view('editakun', compact('user'));
        }
    public function update(Request $request)
    {
        $wali = session('wali');
        if (!$wali) {
            return redirect()->route('login')->withErrors(['msg' => 'Silakan login dulu']);
        }
  $currentChildId = session('current_child');
        if (!$currentChildId) {
            return back()->withErrors(['msg' => 'Gagal menemukan ID anak yang sedang aktif.']);
        }
        $waliId = $currentChildId;
        
        // Memeriksa apakah user ingin mengubah password atau hanya email
        if ($request->filled('password') || $request->filled('current_password')) {
            $validated = $request->validate([
                'current_password' => 'required|string', 
                'password' => 'required|string|min:6|confirmed', 
            ]);

            $response = Http::post('http://127.0.0.1:8001/api/check-password', [
                'id' => $waliId,
                'old_password'=>$validated['current_password'],
                'password' => $validated['password']
            ]);

            if ($response->successful()) {
                $dataToUpdate = [
                    'password' => $validated['password'],
                ];
            } else {
           
                return back()->withErrors(['current_password' => 'Password lama salah.'])->withInput();
            }
        } else {
            $validated = $request->validate([
                'email' => 'required|email|string|max:255',
            ]);
            $dataToUpdate = [
                'email_wali' => $validated['email'],
            ];
        }

        $response = Http::put("http://127.0.0.1:8001/api/santri/{$waliId}", $dataToUpdate);

        if ($response->successful()) {
            $updatedWaliData = $response->json()['data'];
            session(['wali' => array_merge($wali, $updatedWaliData)]);
            return redirect()->route('pengaturanakun.index')->with('success', 'Data akun berhasil diperbarui');
        }

        return back()->withErrors(['msg' => 'Gagal update data akun']);
    }
}
