<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = [
            'store_name' => Setting::get('store_name', 'Garam Berkah Mandiri'),
            'store_address' => Setting::get('store_address', 'Jl. Samudera Raya No. 45, Sentra Garam, Madura'),
            'store_phone' => Setting::get('store_phone', '0812-3456-7890'),
            'receipt_footer' => Setting::get('receipt_footer', 'Terima kasih atas kunjungan Anda. Garam Sehat Keluarga.'),
        ];

        return view('settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'store_name' => ['required', 'string', 'max:255'],
            'store_address' => ['nullable', 'string'],
            'store_phone' => ['nullable', 'string', 'max:50'],
            'receipt_footer' => ['nullable', 'string'],
        ]);

        foreach ($validated as $key => $value) {
            Setting::set($key, $value);
        }

        return redirect()->route('settings.index')->with('success', 'Pengaturan toko berhasil diperbarui.');
    }
}
