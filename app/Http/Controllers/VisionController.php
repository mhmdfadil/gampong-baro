<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use Illuminate\Http\Request;

class VisionController extends Controller
{
    public function index()
    {
        // Get the first vision record or create a new one if none exists
        $vision = Vision::firstOrCreate(
            ['id' => 1],
            [
                'title' => 'Visi Desa',
                'visi' => 'Masukkan deskripsi visi desa Anda disini'
            ]
        );

        return view('admin.vision', compact('vision'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'visi' => 'required|string',
        ]);

        $vision = Vision::findOrFail($id);
        $vision->update([
            'title' => $request->title,
            'visi' => $request->visi
        ]);

        return redirect()->route('vision.index')
            ->with('success', 'Visi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $vision = Vision::findOrFail($id);
        // Reset to default values instead of deleting
        $vision->update([
            'title' => 'Visi Desa',
            'visi' => 'Masukkan deskripsi visi desa Anda disini'
        ]);

        return redirect()->route('vision.index')
            ->with('success', 'Visi berhasil direset ke nilai default');
    }
}