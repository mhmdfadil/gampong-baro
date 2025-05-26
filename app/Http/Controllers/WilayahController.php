<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;

class WilayahController extends Controller
{
    public function index()
    {
        $wilayah = Wilayah::first();
        
        // Jika belum ada data, buat record kosong
        if (!$wilayah) {
            $wilayah = Wilayah::create([
                'peta_wilayah' => null,
                'batas_barat' => null,
                'jarak_barat' => null,
                'batas_selatan' => null,
                'jarak_selatan' => null,
                'batas_timur' => null,
                'jarak_timur' => null,
                'batas_utara' => null,
                'jarak_utara' => null,
                'luas_wilayah_ha' => null,
                'ketinggian_mdl' => null,
                'jumlah_penduduk' => null,
                'kepadatan_penduduk' => null
            ]);
        }
        
        return view('admin.wilayah', compact('wilayah'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'peta_wilayah' => 'nullable|url',
            'batas_barat' => 'nullable|string|max:255',
            'jarak_barat' => 'nullable|numeric',
            'batas_selatan' => 'nullable|string|max:255',
            'jarak_selatan' => 'nullable|numeric',
            'batas_timur' => 'nullable|string|max:255',
            'jarak_timur' => 'nullable|numeric',
            'batas_utara' => 'nullable|string|max:255',
            'jarak_utara' => 'nullable|numeric',
            'luas_wilayah_ha' => 'nullable|numeric',
            'ketinggian_mdl' => 'nullable|numeric',
            'jumlah_penduduk' => 'nullable|integer',
            'kepadatan_penduduk' => 'nullable|numeric',
        ]);

        $wilayah = Wilayah::findOrFail($id);
        $wilayah->update($request->all());

        return redirect()->route('wilayah.index')
            ->with('success', 'Data wilayah berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $wilayah = Wilayah::findOrFail($id);
        $wilayah->delete();

        return redirect()->route('wilayah.index')
            ->with('success', 'Data wilayah berhasil dihapus!');
    }
}