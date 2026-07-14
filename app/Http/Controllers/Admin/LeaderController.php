<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Leader;
use Illuminate\Http\Request;

class LeaderController extends Controller
{
    public function index()
    {
        $leaders = Leader::orderBy('order_number')->get();
        return view('admin.leaders.index', compact('leaders'));
    }

    public function create()
    {
        return view('admin.leaders.form', ['leader' => new Leader()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'motto' => 'nullable|string',
            'order_number' => 'nullable|integer',
            'status' => 'nullable|boolean',
        ]);

        $data = $request->except(['_token', 'photo']);
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        Leader::create($data);
        return redirect()->route('admin.leaders.index')->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function edit(Leader $leader)
    {
        return view('admin.leaders.form', compact('leader'));
    }

    public function update(Request $request, Leader $leader)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'motto' => 'nullable|string',
            'order_number' => 'nullable|integer',
        ]);

        $data = $request->except(['_token', '_method', 'photo']);
        $data['status'] = $request->boolean('status', true);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('leaders', 'public');
        }

        $leader->update($data);
        return redirect()->route('admin.leaders.index')->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(Leader $leader)
    {
        $leader->delete();
        return redirect()->route('admin.leaders.index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
