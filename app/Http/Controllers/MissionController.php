<?php

namespace App\Http\Controllers;

use App\Models\Mission;
use Illuminate\Http\Request;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $missions = Mission::orderBy('index')->get();
        return view('admin.mission', compact('missions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bgOptions = [
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
        return view('admin.add_mission', compact('bgOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'index' => 'required|numeric',
            'bg_index' => 'required',
            'misi' => 'required',
        ]);

        Mission::create($request->all());

        return redirect()->route('missions.index')
            ->with('success', 'Misi berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mission $mission)
    {
        return view('admin.detail_mission', compact('mission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mission $mission)
    {
        $bgOptions = [
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
        return view('admin.edit_mission', compact('mission', 'bgOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mission $mission)
    {
        $request->validate([
            'index' => 'required|numeric',
            'bg_index' => 'required',
            'misi' => 'required',
        ]);

        $mission->update($request->all());

        return redirect()->route('missions.index')
            ->with('success', 'Misi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mission $mission)
    {
        $mission->delete();

        return redirect()->route('missions.index')
            ->with('success', 'Misi berhasil dihapus');
    }
}