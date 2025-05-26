<?php

namespace App\Http\Controllers;

use App\Models\Acceptance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AcceptanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $acceptances = Acceptance::latest()
            ->withTrashed()
            ->get();

        return view('admin.acceptances', compact('acceptances'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.add_acceptances');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'official_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'greeting_opening' => 'required|string|max:255',
            'greeting_closing' => 'required|string|max:255',
            'quote' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('acceptance_photos', 'public');
        }

        if ($request->hasFile('signature_image')) {
            $validated['signature_image'] = $request->file('signature_image')->store('acceptance_signatures', 'public');
        }

        Acceptance::create($validated);

        return redirect()->route('acceptances.index')
            ->with('success', 'Sambutan berhasil ditambahkan');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Acceptance $acceptance)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'official_name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'greeting_opening' => 'required|string|max:255',
            'greeting_closing' => 'required|string|max:255',
            'quote' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'signature_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'boolean',
        ]);

        // Handle file uploads
        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($acceptance->photo) {
                Storage::disk('public')->delete($acceptance->photo);
            }
            $validated['photo'] = $request->file('photo')->store('acceptance_photos', 'public');
        }

        if ($request->hasFile('signature_image')) {
            // Delete old signature if exists
            if ($acceptance->signature_image) {
                Storage::disk('public')->delete($acceptance->signature_image);
            }
            $validated['signature_image'] = $request->file('signature_image')->store('acceptance_signatures', 'public');
        }

        $acceptance->update($validated);

        return redirect()->route('acceptances.index')
            ->with('success', 'Sambutan berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Acceptance $acceptance)
    {
        $acceptance->delete();

        return redirect()->route('acceptances.index')
            ->with('success', 'Sambutan berhasil diarsipkan');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        Acceptance::withTrashed()
            ->where('id', $id)
            ->restore();

        return redirect()->route('acceptances.index')
            ->with('success', 'Sambutan berhasil dipulihkan');
    }
}