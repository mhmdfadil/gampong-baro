<?php

namespace App\Http\Controllers;

use App\Models\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penduduks = Penduduk::orderBy('created_at', 'desc')->get();

        return view('admin.penduduk', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_penduduk');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nik' => 'required|unique:penduduks|digits:16',
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'alamat' => 'required',
            'dusun' => 'required',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan_terakhir' => 'required|in:Tidak Sekolah,SD,SMP,SMA,Diploma,Sarjana,Pascasarjana',
            'pekerjaan' => 'required|in:Petani,PNS,Wiraswasta,Buruh,Pelajar/Mahasiswa,Ibu Rumah Tangga,Lainnya',
            'no_kk' => 'nullable'
        ]);

        Penduduk::create($validated);

        return redirect()->route('penduduks.index')
                         ->with('success', 'Data penduduk berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Penduduk $penduduk)
    {
        return view('admin.detail_penduduk', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penduduk $penduduk)
    {
        return view('admin.edit_penduduk', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $validated = $request->validate([
            'nik' => 'required|digits:16|unique:penduduks,nik,'.$penduduk->id,
            'nama_lengkap' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'status_keluarga' => 'required|in:Kepala Keluarga,Istri,Anak,Lainnya',
            'alamat' => 'required',
            'dusun' => 'required',
            'agama' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Konghucu',
            'status_perkawinan' => 'required|in:Belum Kawin,Kawin,Cerai Hidup,Cerai Mati',
            'pendidikan_terakhir' => 'required|in:Tidak Sekolah,SD,SMP,SMA,Diploma,Sarjana,Pascasarjana',
            'pekerjaan' => 'required|in:Petani,PNS,Wiraswasta,Buruh,Pelajar/Mahasiswa,Ibu Rumah Tangga,Lainnya',
            'no_kk' => 'nullable'
        ]);

        $penduduk->update($validated);

        return redirect()->route('penduduks.index')
                         ->with('success', 'Data penduduk berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penduduk $penduduk)
    {
        $penduduk->delete();

        return redirect()->route('penduduks.index')
                         ->with('success', 'Data penduduk berhasil dihapus');
    }
}