<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        $query = Activity::with('category');
        if ($request->search) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }
        $activities = $query->latest()->paginate(15);
        return view('admin.activities.index', compact('activities'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.activities.form', ['activity' => new Activity(), 'categories' => $categories]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'description' => 'nullable|string',
            'activity_date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
        ]);

        $data = $request->except(['_token', 'thumbnail', 'banner']);
        $data['slug'] = Str::slug($request->title).'-'.time();
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('activities', 'public');
        }
        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('activities', 'public');
        }

        Activity::create($data);
        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit(Activity $activity)
    {
        $categories = Category::all();
        return view('admin.activities.form', compact('activity', 'categories'));
    }

    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required|string|max:255',
        ]);

        $data = $request->except(['_token', '_method', 'thumbnail', 'banner']);
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail'] = $request->file('thumbnail')->store('activities', 'public');
        }
        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('activities', 'public');
        }

        $activity->update($data);
        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity)
    {
        $activity->delete();
        return redirect()->route('admin.activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
