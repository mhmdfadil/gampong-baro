<?php

namespace App\Http\Controllers;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $slides = Slide::latest()->get();
        return view('admin.slide', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $routeOptions =  [
    'beranda' => 'Beranda',
    'infografis.penduduk' => 'Infografis',
    'profil' => 'Profil Desa',
    'berita' => 'Berita',
    'belanja' => 'Belanja',
    'pengaduan' => 'Pengaduan',
    'ppid' => 'PPID'
];
        
        return view('admin.add_slide', compact('routeOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description_singkat' => 'required|string|max:500',
            'text_button' => 'required|string|max:50',
            'routes' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('slides', 'public');
            $validated['image'] = basename($imagePath);
        }

        Slide::create($validated);

        return redirect()->route('slides.index')->with('success', 'Slide created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slide $slide)
    {
        return view('admin.detail_slide', compact('slide'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Slide $slide)
    {
        $routeOptions =  [
    'beranda' => 'Beranda',
    'infografis.penduduk' => 'Infografis',
    'profil' => 'Profil Desa',
    'berita' => 'Berita',
    'belanja' => 'Belanja',
    'pengaduan' => 'Pengaduan',
    'ppid' => 'PPID'
];
        
        return view('admin.edit_slide', compact('slide', 'routeOptions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Slide $slide)
    {
        $validated = $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'description_singkat' => 'required|string|max:500',
            'text_button' => 'required|string|max:50',
            'routes' => 'required|string'
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($slide->image) {
                Storage::disk('public')->delete('slides/' . $slide->image);
            }
            
            $imagePath = $request->file('image')->store('slides', 'public');
            $validated['image'] = basename($imagePath);
        } else {
            unset($validated['image']);
        }

        $slide->update($validated);

        return redirect()->route('slides.index')->with('success', 'Slide updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Slide $slide)
    {
        if ($slide->image) {
            Storage::disk('public')->delete('slides/' . $slide->image);
        }
        
        $slide->delete();
        
        return redirect()->route('slides.index')->with('success', 'Slide deleted successfully.');
    }
}