<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first() ?? new About();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'history' => 'nullable|string',
            'vision' => 'nullable|string',
            'mission' => 'nullable|string',
            'goals' => 'nullable|string',
            'logo_meaning' => 'nullable|string',
            'pastor_name' => 'nullable|string|max:255',
            'pastor_bio' => 'nullable|string',
        ]);

        $about = About::first() ?? new About();
        $data = $request->except(['_token', '_method', 'logo', 'pastor_photo']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('about', 'public');
        }
        if ($request->hasFile('pastor_photo')) {
            $data['pastor_photo'] = $request->file('pastor_photo')->store('about', 'public');
        }

        $about->fill($data)->save();

        return redirect()->route('admin.about.index')->with('success', 'Tentang berhasil diperbarui.');
    }
}
