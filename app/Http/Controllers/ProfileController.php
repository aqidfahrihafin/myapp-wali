<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Menampilkan halaman data profil (pengaturanprofil)
    public function show()
    {
        if (session()->has('user_data')) {
            $user = session('user_data');
        } else {
            $user = (object) [
                'name' => 'Ahmad Maulana',
                'email' => 'Ahmadsumau12@gmail.com',
                'phone' => '081234567890',
                'address' => 'Gadu Timur, Sumenep',
                'dob' => '1984-01-17',
                'kk' => '317201050209020003',
                'photo' => 'assets/img/bg-img/user1.png', // default
            ];
        }

        return view('pengaturanprofil', compact('user'));
    }

    // Menampilkan halaman edit profil
    public function edit()
    {
        if (session()->has('user_data')) {
            $user = session('user_data');
        } else {
            $user = (object) [
                'name' => 'Ahmad Maulana',
                'email' => 'Ahmadsumau12@gmail.com',
                'phone' => '081234567890',
                'address' => 'Gadu Timur, Sumenep',
                'dob' => '1984-01-17',
                'kk' => '317201050209020003',
                'photo' => 'assets/img/bg-img/user1.png',
            ];
        }

        return view('edit-profile', compact('user'));
    }

    // Update profil (simulasi)
    public function update(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:15',
            'address' => 'nullable|string',
            'dob'     => 'nullable|date',
            'kk'      => 'nullable|string|max:20',
            'photo'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Data lama (simulasi)
        $originalData = [
            'name'    => 'Ahmad Maulana',
            'email'   => 'Ahmadsumau12@gmail.com',
            'phone'   => '081234567890',
            'address' => 'Gadu Timur, Sumenep',
            'dob'     => '1984-01-17',
            'kk'      => '317201050209020003',
            'photo'   => 'assets/img/bg-img/user1.png',
        ];

        // Cek apakah ada perubahan (kecuali foto)
        $compareData = $data;
        unset($compareData['photo']);

        $originalCompare = $originalData;
        unset($originalCompare['photo']);

        $hasChanges = $compareData !== $originalCompare || $request->hasFile('photo');

        if (!$hasChanges) {
            return redirect()->route('profile.edit')->with('no_changes', 'Tidak ada perubahan yang dilakukan.');
        }

        // Handle upload foto
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $filename = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $filename);
            $data['photo'] = 'uploads/' . $filename;
        } else {
            // Tetap gunakan foto lama
            $data['photo'] = session('user_data')->photo ?? 'assets/img/bg-img/user1.png';
        }

        // Simpan ke session
        session(['user_data' => (object) $data]);

        return redirect()
            ->route('profile.show')
            ->with('success', 'Profil berhasil diperbarui (simulasi)!');
    }
}
