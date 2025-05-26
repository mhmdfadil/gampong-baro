<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    public function index()
    {
        $socialMedia = SocialMedia::first();
        
        // Jika belum ada data, buat record kosong
        if (!$socialMedia) {
            $socialMedia = SocialMedia::create([
                'link_fb' => null,
                'active_fb' => false,
                'link_ig' => null,
                'active_ig' => false,
                'link_yt' => null,
                'active_yt' => false,
                'link_wa' => null,
                'active_wa' => false,
            ]);
        }

        return view('admin.sosial-media', compact('socialMedia'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'link_fb' => 'nullable|url',
            'link_ig' => 'nullable|url',
            'link_yt' => 'nullable|url',
            'link_wa' => 'nullable|string',
        ]);

        $socialMedia = SocialMedia::findOrFail($id);
        
        $data = $request->only([
            'link_fb', 'active_fb',
            'link_ig', 'active_ig',
            'link_yt', 'active_yt',
            'link_wa', 'active_wa'
        ]);

        // Konversi checkbox boolean
        $data['active_fb'] = $request->has('active_fb');
        $data['active_ig'] = $request->has('active_ig');
        $data['active_yt'] = $request->has('active_yt');
        $data['active_wa'] = $request->has('active_wa');

        $socialMedia->update($data);

        return redirect()->back()->with('success', 'Data sosial media berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $socialMedia = SocialMedia::findOrFail($id);
        $socialMedia->delete();

        // Buat record baru kosong setelah menghapus
        SocialMedia::create([
            'link_fb' => null,
            'active_fb' => false,
            'link_ig' => null,
            'active_ig' => false,
            'link_yt' => null,
            'active_yt' => false,
            'link_wa' => null,
            'active_wa' => false,
        ]);

        return redirect()->route('social-media.index')
            ->with('success', 'Data sosial media berhasil direset!');
    }
}