<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $struktur = StrukturOrganisasi::aktif()
            ->urutan()
            ->get();

        return view('admin.struktur-organisasi', compact('struktur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_struktur-organisasi');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'urutan' => 'required|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('struktur-organisasi', 'public');
        }

        StrukturOrganisasi::create($validated);

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Data struktur organisasi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('admin.detail_struktur-organisasi', compact('strukturOrganisasi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $strukturOrganisasi)
    {
        return view('admin.edit_struktur-organisasi', compact('strukturOrganisasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $strukturOrganisasi)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'whatsapp' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'urutan' => 'required|integer',
            'status' => 'required|in:aktif,nonaktif',
        ]);

        if ($request->hasFile('foto')) {
            // Delete old photo if exists
            if ($strukturOrganisasi->foto) {
                Storage::disk('public')->delete($strukturOrganisasi->foto);
            }
            $validated['foto'] = $request->file('foto')->store('struktur-organisasi', 'public');
        }

        $strukturOrganisasi->update($validated);

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Data struktur organisasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganisasi $strukturOrganisasi)
    {
        // Delete photo if exists
        if ($strukturOrganisasi->foto) {
            Storage::disk('public')->delete($strukturOrganisasi->foto);
        }

        $strukturOrganisasi->delete();

        return redirect()->route('struktur-organisasi.index')
            ->with('success', 'Data struktur organisasi berhasil dihapus');
    }
}