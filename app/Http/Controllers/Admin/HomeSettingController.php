<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSetting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $home = HomeSetting::first() ?? new HomeSetting();
        return view('admin.home.index', compact('home'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'hero_title' => 'required|string|max:255',
            'hero_subtitle' => 'nullable|string',
            'welcome_title' => 'nullable|string|max:255',
            'welcome_name' => 'nullable|string|max:255',
            'welcome_message' => 'nullable|string',
            'statistic_member' => 'nullable|integer',
            'statistic_activity' => 'nullable|integer',
        ]);

        $home = HomeSetting::first() ?? new HomeSetting();
        $data = $request->except(['_token', '_method', 'hero_image', 'welcome_photo']);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')->store('home', 'public');
        }
        if ($request->hasFile('welcome_photo')) {
            $data['welcome_photo'] = $request->file('welcome_photo')->store('home', 'public');
        }

        $home->fill($data)->save();

        return redirect()->route('admin.home.index')->with('success', 'Beranda berhasil diperbarui.');
    }
}
