<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $pengaduans = Pengaduan::orderBy('tanggal_pengaduan', 'desc')->get();
        return view('admin.complaint', compact('pengaduans'));
    }

    public function show($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.detail_complaint', compact('pengaduan'));
    }

    public function edit($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        return view('admin.edit_complaint', compact('pengaduan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak'
        ]);

        $pengaduan = Pengaduan::findOrFail($id);
        $pengaduan->update(['status' => $request->status]);

        return redirect()->route('complaint.index')
            ->with('success', 'Status pengaduan berhasil diperbarui');
    }

public function destroy($id)
{
    $pengaduan = Pengaduan::findOrFail($id);

    // Get the original raw value from database
    $rawLampiran = $pengaduan->getRawOriginal('lampiran');
    
    // Parse the raw value exactly like the model does
    if (!empty($rawLampiran)) {
        $filePaths = [];
        
        if (is_string($rawLampiran)) {
            $cleanedValue = stripslashes(trim($rawLampiran, '"\''));
            $decoded = json_decode($cleanedValue, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                $filePaths = $decoded;
            } elseif (str_contains($cleanedValue, ',')) {
                $filePaths = explode(',', $cleanedValue);
            } else {
                $filePaths = [$cleanedValue];
            }
        } elseif (is_array($rawLampiran)) {
            $filePaths = $rawLampiran;
        }

        // Delete each file
        foreach ($filePaths as $originalPath) {
            if (!empty($originalPath)) {
                // Clean the path exactly like the model does
                $cleanPath = str_replace(['\\', '\/', '//'], '/', trim($originalPath));
                $cleanPath = preg_replace('/^\/?storage\//', '', $cleanPath);
                $cleanPath = trim($cleanPath, '"\'');

                // Delete from storage
                if (!empty($cleanPath)) {
                    Storage::disk('public')->delete($cleanPath);
                    // Also try deleting with public/ prefix for legacy files
                    Storage::delete('public/' . $cleanPath);
                }
            }
        }
    }

    $pengaduan->delete();

    return redirect()->route('complaint.index')
        ->with('success', 'Pengaduan berhasil dihapus');
}
}