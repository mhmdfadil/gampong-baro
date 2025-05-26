<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index()
{
    Carbon::setLocale('id');
    $news = News::latest()->get();
    return view('admin.news', compact('news'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categoryColors = [
            'primary' => 'Primary (Blue)',
            'secondary' => 'Secondary (Gray)',
            'success' => 'Success (Green)',
            'danger' => 'Danger (Red)',
            'warning' => 'Warning (Yellow)',
            'info' => 'Info (Cyan)',
            'dark' => 'Dark (Black)',
        ];
        
        return view('admin.add_news', compact('categoryColors'));
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'excerpt' => 'required|string|max:500',
        'content' => 'required|string',
        'category' => 'required|string|max:100',
        'category_color' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $extension = $request->file('image')->getClientOriginalExtension();
        $fileName = 'BRT_' . Str::random(10) . '_' . date('Ymd_His') . '.' . $extension;
        $path = $request->file('image')->storeAs('berita', $fileName, 'public');
        $validated['image'] = $fileName;
    }

    $validated['slug'] = Str::slug($request->title);
    $validated['author'] = Auth::user()->nama;
    $validated['views'] = 0;

    News::create($validated);

    return redirect()->route('news.index')->with('success', 'Berita berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
         Carbon::setLocale('id');
        // Increment views counter
        $news->increment('views');
        
        return view('admin.detail_news', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $categoryColors = [
            'primary' => 'Primary (Blue)',
            'secondary' => 'Secondary (Gray)',
            'success' => 'Success (Green)',
            'danger' => 'Danger (Red)',
            'warning' => 'Warning (Yellow)',
            'info' => 'Info (Cyan)',
            'dark' => 'Dark (Black)',
        ];
        
        return view('admin.edit_news', compact('news', 'categoryColors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'required|string|max:500',
            'content' => 'required|string',
            'category' => 'required|string|max:100',
            'category_color' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload if new image is provided
        if ($request->hasFile('image')) {
            // Only delete old image if it's not the default image
            if ($news->image && $news->image !== 'default-news.jpg') {
                Storage::delete('public/berita/' . $news->image);
            }
            
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileName = 'BRT_' . Str::random(10) . '_' . date('Ymd_His') . '.' . $extension;
            $path = $request->file('image')->storeAs('berita', $fileName, 'public');
            $validated['image'] = $fileName;
        }

        $validated['slug'] = Str::slug($request->title);
        $validated['author'] = Auth::user()->nama;

        $news->update($validated);

        return redirect()->route('news.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
   public function destroy(News $news)
    {
        // Delete associated image only if it's not the default image
        if ($news->image && $news->image !== 'default-news.jpg') {
            Storage::delete('public/berita/' . $news->image);
        }
        
        $news->delete();
        
        return redirect()->route('news.index')->with('success', 'Berita berhasil dihapus!');
    }
}