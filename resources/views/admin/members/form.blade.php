@extends('layouts.admin')
@section('title', $member->exists ? 'Edit Anggota' : 'Tambah Anggota')
@section('page-title', $member->exists ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.members.index') }}">Anggota</a> <i class="bi bi-chevron-right"></i> {{ $member->exists ? 'Edit' : 'Tambah' }}
</div>

<div class="admin-card" style="max-width:500px;">
    <div class="admin-card-header">
        <h2>Form Data Anggota</h2>
    </div>
    <div class="admin-card-body">
        @if($member->photo)
        <div style="margin-bottom:1.5rem; position:relative; display:inline-block;">
            <img src="{{ Storage::url($member->photo) }}" alt="Foto" style="width:120px;aspect-ratio:3/4;object-fit:cover;border-radius:10px;border:3px solid var(--green-300);">
            <form action="{{ route('admin.members.photo.destroy', $member->id) }}" method="POST" style="position:absolute; top:-8px; right:-8px; margin:0;" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                @csrf @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" title="Hapus Foto" style="border-radius:50%; width:28px; height:28px; padding:0; display:flex; align-items:center; justify-content:center;">
                    <i class="bi bi-x-lg" style="font-size:0.8rem;"></i>
                </button>
            </form>
        </div>
        @endif
        <form action="{{ $member->exists ? route('admin.members.update', $member->id) : route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($member->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">Foto Anggota</label>
                <input type="file" name="photo" class="form-input" accept="image/*" data-crop="0.75">
                <div class="form-hint">Setelah memilih foto, Anda dapat memotongnya (rasio 3:4).</div>
                <div class="form-hint">Format: JPG, PNG. Disarankan foto potret (vertikal).</div>
            </div>

            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color:#f87171;">*</span></label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $member->name) }}" required placeholder="Nama lengkap anggota">
            </div>

            <div class="form-group">
                <label class="form-label">Periode</label>
                <input type="text" name="period" class="form-input" value="{{ old('period', $member->period) }}" placeholder="Contoh: 2026-2028">
            </div>

            <div class="form-group">
                <label class="form-label">Status</label>
                <div style="display:flex;align-items:center;gap:0.75rem;padding:0.75rem 1rem;background:var(--green-50);border:1px solid var(--green-200);border-radius:10px;">
                    <i class="bi bi-person-check-fill" style="color:var(--green-600);font-size:1.25rem;"></i>
                    <span style="color:var(--green-800);font-weight:600;">Anggota OMK</span>
                </div>
                <input type="hidden" name="status" value="aktif">
            </div>

            <div style="margin-top:2rem;display:flex;gap:0.75rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Anggota</button>
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
