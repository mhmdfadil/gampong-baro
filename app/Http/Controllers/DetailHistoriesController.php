<?php

namespace App\Http\Controllers;

use App\Models\DetailHistory;
use Illuminate\Http\Request;

class DetailHistoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $histories = DetailHistory::orderBy('year', 'asc')->get();
        return view('admin.detailhistories', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bgColors = [
            'bg-primary' => 'Primary (Blue)',
            'bg-secondary' => 'Secondary (Gray)',
            'bg-success' => 'Success (Green)',
            'bg-danger' => 'Danger (Red)',
            'bg-warning' => 'Warning (Yellow)',
            'bg-info' => 'Info (Cyan)',
            'bg-dark' => 'Dark (Black)',
            'bg-gold' => 'Gold',
            'bg-purple' => 'Purple',
        ];
        
        return view('admin.add_detailhistories', compact('bgColors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'year' => 'required|numeric|digits:4|unique:detail_histories,year',
            'bg_year' => 'required|string',
            'title' => 'required|string|max:255',
            'description_singkat' => 'required|string',
        ]);

        DetailHistory::create($request->all());

        return redirect()->route('detailhistories.index')
            ->with('success', 'Entri histori berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailHistory $detailhistory)
    {
        return view('admin.detail_detailhistories', compact('detailhistory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailHistory $detailhistory)
    {
        $bgColors = [
            'bg-primary' => 'Primary (Blue)',
            'bg-secondary' => 'Secondary (Gray)',
            'bg-success' => 'Success (Green)',
            'bg-danger' => 'Danger (Red)',
            'bg-warning' => 'Warning (Yellow)',
            'bg-info' => 'Info (Cyan)',
            'bg-dark' => 'Dark (Black)',
            'bg-gold' => 'Gold',
            'bg-purple' => 'Purple',
        ];
        
        return view('admin.edit_detailhistories', compact('detailhistory', 'bgColors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DetailHistory $detailhistory)
    {
        $request->validate([
            'year' => 'required|numeric|digits:4|unique:detail_histories,year,'.$detailhistory->id,
            'bg_year' => 'required|string',
            'title' => 'required|string|max:255',
            'description_singkat' => 'required|string',
        ]);

        $detailhistory->update($request->all());

        return redirect()->route('detailhistories.index')
            ->with('success', 'Entri histori berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DetailHistory $detailhistory)
    {
        $detailhistory->delete();

        return redirect()->route('detailhistories.index')
            ->with('success', 'Entri histori berhasil dihapus');
    }
}