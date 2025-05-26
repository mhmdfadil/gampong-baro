<?php

namespace App\Http\Controllers;

use App\Models\PPID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PPIDController extends Controller
{


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        Carbon::setLocale('id');
        $ppids = PPID::orderBy('publish_date', 'desc')->get();
        return view('admin.ppid', compact('ppids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_ppid');
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'file' => 'required|file|mimes:pdf|max:2048',
                'publish_date' => 'required|date',
            ]);

            $file = $request->file('file');

            // Sanitize title untuk nama file
            $titleSlug = Str::slug($request->title); // "Judul Dokumen PPID" -> "judul-dokumen-ppid"
            $extension = $file->getClientOriginalExtension(); // Dapatkan ekstensi file
            $filename = time() . '_' . $titleSlug . '.' . $extension; // Contoh: 1716633932_judul-dokumen-ppid.pdf

            // Simpan file
            $path = $file->storeAs('ppid', $filename, 'public');

            // Simpan ke database
            PPID::create([
                'title' => $request->title,
                'description' => $request->description,
                'filename' => $filename,
                'publish_date' => $request->publish_date,
                'download_count' => 0,
            ]);

            return redirect()->route('ppids.index')->with('success', 'Dokumen PPID berhasil ditambahkan.');
        }


    /**
     * Display the specified resource.
     */
    public function show(PPID $ppid)
    {
        Carbon::setLocale('id');
        return view('admin.detail_ppid', compact('ppid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PPID $ppid)
    {
        return view('admin.edit_ppid', compact('ppid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PPID $ppid)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'file' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx|max:2048',
        'publish_date' => 'required|date',
    ]);

    $data = [
        'title' => $request->title,
        'description' => $request->description,
        'publish_date' => $request->publish_date,
    ];

    if ($request->hasFile('file')) {
        // Hapus file lama
        Storage::disk('public')->delete('ppid/' . $ppid->filename);
        
        // Upload file baru
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $filename = time() . '_' . Str::slug($request->title) . '.' . $extension;
        $path = $file->storeAs('ppid', $filename, 'public');
        
        $data['filename'] = $filename;
    }

    $ppid->update($data);

    return redirect()->route('ppids.index')->with('success', 'Dokumen PPID berhasil diperbarui.');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PPID $ppid)
    {
        // Hapus file dari storage
        Storage::disk('public')->delete('ppid/' . $ppid->filename);
        
        // Hapus record dari database
        $ppid->delete();

        return redirect()->route('ppids.index')->with('success', 'Dokumen PPID berhasil dihapus.');
    }

// In your controller
public function download($id) // Changed to directly accept the id parameter
{
    $ppid = PPID::findOrFail($id);
    
    $ppid->increment('download_count');

    // Assuming files are stored in storage/app/public/ppid
    $filePath = storage_path('app/public/ppid/' . $ppid->filename);
    
    if (!file_exists($filePath)) {
        abort(404, 'File not found');
    }

    return response()->download($filePath);
}

}