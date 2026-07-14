<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('activity')->latest()->paginate(20);
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        $activities = Activity::all();
        return view('admin.gallery.form', compact('activities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|max:5120',
            'album_name' => 'nullable|string|max:255',
            'activity_id' => 'nullable|exists:activities,id',
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                Gallery::create([
                    'activity_id' => $request->activity_id,
                    'album_name' => $request->album_name,
                    'image' => $image->store('gallery', 'public'),
                    'caption' => $request->caption,
                ]);
            }
        }

        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil ditambahkan.');
    }

    public function destroy(Gallery $gallery)
    {
        $gallery->delete();
        return redirect()->route('admin.gallery.index')->with('success', 'Foto berhasil dihapus.');
    }
}
