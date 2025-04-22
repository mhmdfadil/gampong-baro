<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class PengaduanController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'contact' => 'required|string|max:20',
            'category' => 'required|in:umum,sosial_kebersihan,keamanan,kesehatan,permintaan',
            'complaint' => 'required|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf,doc,docx|max:5120',
        ], [
            'name.required' => 'Nama lengkap wajib diisi',
            'contact.required' => 'Nomor telepon/WhatsApp wajib diisi',
            'category.required' => 'Kategori pengaduan wajib dipilih',
            'complaint.required' => 'Detail pengaduan wajib diisi',
            'attachments.*.max' => 'Ukuran file maksimal 5MB',
            'attachments.*.mimes' => 'Hanya file JPG, JPEG, PNG, atau PDF yang diperbolehkan',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
    
        // Siapkan nomor pengaduan dan timestamp duluan
        $nomorPengaduan = 'PGB-' . date('Ymd') . '-' . strtoupper(Str::random(4));
        $timestamp = now()->format('Ymd_His');
        $nameSlug = Str::slug($request->name); // ubah jadi aman untuk nama file
    
        $filePaths = [];
        $fileIndex = 1;
    
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                if ($file && $file->isValid()) {
                    $extension = $file->getClientOriginalExtension();
    
                    // Format nama file sesuai permintaan
                    $filename = "pgb-{$nameSlug}_{$nomorPengaduan}_{$timestamp}_File-{$fileIndex}.{$extension}";
    
                    // Simpan ke storage/app/public/pengaduan
                    $stored = $file->storeAs('pengaduan', $filename, 'public');
    
                    $filePaths[] = 'storage/' . $stored;
                    $fileIndex++;
                }
            }
        }
    
        $pengaduan = \App\Models\Pengaduan::create([
            'nama' => $request->name,
            'kontak' => $request->contact,
            'kategori' => $request->category,
            'isi_pengaduan' => $request->complaint,
            'lampiran' => $filePaths ? json_encode($filePaths) : null,
            'status' => 'baru',
            'nomor_pengaduan' => $nomorPengaduan,
            'tanggal_pengaduan' => now(),
        ]);
    
        return redirect()->route('pengaduan.success')->with([
            'success' => 'Pengaduan Anda telah berhasil dikirim!',
            'nomor_pengaduan' => $pengaduan->nomor_pengaduan,
        ]);
    }
    

    /**
     * Menampilkan halaman sukses
     */
    public function success()
    {
       // if (!session()->has('success')) {
       //     return redirect()->route('pengaduan');
       // }

        return view('pengaduan_success', [
            'noLoading' => true,
            'navbarScroll' => false,
            'nomor_pengaduan' => session('nomor_pengaduan'),
        ]);
    }
}