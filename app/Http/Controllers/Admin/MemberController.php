<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    public function index(Request $request)
    {
        $query = Member::query();
        if ($request->search) {
            $query->where('name', 'like', '%'.$request->search.'%');
        }
        if ($request->status) {
            $query->where('status', $request->status);
        }
        $members = $query->latest()->paginate(15);
        return view('admin.members.index', compact('members'));
    }

    public function create()
    {
        return view('admin.members.form', ['member' => new Member()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = ['name' => $request->name, 'period' => $request->period, 'status' => 'aktif'];
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        Member::create($data);
        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil ditambahkan.');
    }

    public function edit(Member $member)
    {
        return view('admin.members.form', compact('member'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'period' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = ['name' => $request->name, 'period' => $request->period, 'status' => 'aktif'];
        if ($request->hasFile('photo')) {
            if ($member->photo) {
                Storage::disk('public')->delete($member->photo);
            }
            $data['photo'] = $request->file('photo')->store('members', 'public');
        }

        $member->update($data);
        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil diperbarui.');
    }

    public function destroy(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
        }
        $member->delete();
        return redirect()->route('admin.members.index')->with('success', 'Anggota berhasil dihapus.');
    }

    public function destroyPhoto(Member $member)
    {
        if ($member->photo) {
            Storage::disk('public')->delete($member->photo);
            $member->photo = null;
            $member->save();
        }
        return redirect()->route('admin.members.edit', $member->id)->with('success', 'Foto anggota berhasil dihapus.');
    }
}
