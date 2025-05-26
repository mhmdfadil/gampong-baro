<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HistoryController extends Controller
{
    public function index()
    {
        // Mengambil semua data history
        $histories = History::latest()->get();
        
        // Jika tidak ada data, buat default
        if ($histories->isEmpty()) {
            $history = History::create([
                'title' => 'Default Title',
                'description' => 'Default Description',
                'image' => null,
                'title_image' => null,
            ]);
            return redirect()->route('histories.index');
        }
        
        // Ambil record pertama untuk edit
        $firstHistory = $histories->first();
        
        return view('admin.histories', compact('histories', 'firstHistory'));
    }

    public function update(Request $request, $id)
    {
        $history = History::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'title_image' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada dan bukan gambar default
            if ($history->image && $history->image !== 'default-history.png') {
                Storage::disk('public')->delete('sejarah/' . $history->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('sejarah', 'public');
            $validated['image'] = basename($imagePath);
        } else {
            // Pertahankan gambar lama jika tidak ada upload baru
            $validated['image'] = $history->image;
        }

        $history->update($validated);

        return redirect()->route('histories.index')
            ->with('success', 'Sejarah berhasil diperbarui');
    }

    public function destroy($id)
    {
        $history = History::findOrFail($id);
        
        // Hapus gambar jika ada dan bukan gambar default
        if ($history->image && $history->image !== 'default-history.png') {
            Storage::disk('public')->delete('sejarah/' . $history->image);
        }

        $history->delete();

        return redirect()->route('histories.index')
            ->with('success', 'Sejarah berhasil dihapus');
    }
}