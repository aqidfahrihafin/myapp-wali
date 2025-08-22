<?php

namespace App\Http\Controllers;

class SettingController extends Controller
{
    public function index()
{
    $wali = session('wali');

    if (!$wali) {
        return redirect()->route('wali.login.form')->withErrors(['msg' => 'Silakan login dulu']);
    }

    // ambil anak aktif dari session
    $currentChildId = session('current_child');
    $children = collect(session('children', []));
    $currentChild = $children->firstWhere('id', $currentChildId);

    // data user untuk dikirim ke blade
    $user = (object) [
        'name'  => data_get($wali, 'nama', 'Nama Wali'),
        'kk'    => data_get($wali, 'kk', '-'),
        'photo' => $currentChild['image'] ?? 'assets/img/bg-img/user1.png',
    ];

    return view('setting', compact('user'));
}

}
