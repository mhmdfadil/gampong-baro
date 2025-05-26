<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        
        if (!$setting) {
            $setting = Setting::create([
                'nama_desa' => null,
                'deskripsi_singkat' => null,
                'peta' => null,
                'alamat' => null,
                'nomor_hp' => null,
                'email' => null,
                'bagan' => null,
            ]);
        }

        return view('admin.setting', compact('setting'));
    }

 public function update(Request $request, $id)
{
    $request->validate([
        'nama_desa' => 'required|string|max:255',
        'deskripsi_singkat' => 'nullable|string',
        'peta' => 'nullable|url',
        'alamat' => 'required|string',
        'nomor_hp' => 'nullable|string|max:20',
        'email' => 'nullable|email|max:255',
        'bagan' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // 2MB max
    ]);

    $setting = Setting::findOrFail($id);
    $data = $request->except('bagan');

    // Handle file upload
    if ($request->hasFile('bagan')) {
        // Delete old file if exists
        if ($setting->bagan) {
            Storage::disk('public')->delete('bagan/' . $setting->bagan);
        }

        // Store new file
        $file = $request->file('bagan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('bagan', $filename, 'public');
        
        // Save only filename to database
        $data['bagan'] = $filename;
    }

    $setting->update($data);

    return redirect()->back()->with('success', 'Pengaturan desa berhasil diperbarui!');
}

  public function destroy($id)
{
    $setting = Setting::findOrFail($id);
    
    // Hapus gambar dari storage kecuali jika itu default-history.png
    if ($setting->image && $setting->image !== 'default-bagan.png') {
        Storage::disk('public')->delete('bagan/' . $setting->image);
    }
    
    $setting->delete();

    // Create new empty record
    Setting::create([
        'nama_desa' => null,
        'deskripsi_singkat' => null,
        'peta' => null,
        'alamat' => null,
        'nomor_hp' => null,
        'email' => null,
        'bagan' => null,
        'image' => null,  // Don't forget to reset the image field
    ]);

    return redirect()->route('setting.index')
        ->with('success', 'Pengaturan desa berhasil direset!');
}
}