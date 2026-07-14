@extends('layouts.admin')
@section('title', $member->exists ? 'Edit Anggota' : 'Tambah Anggota')
@section('page-title', $member->exists ? 'Edit Anggota' : 'Tambah Anggota')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.members.index') }}">Anggota</a> <i class="bi bi-chevron-right"></i> {{ $member->exists ? 'Edit' : 'Tambah' }}
</div>

<div class="admin-card" style="max-width:800px;">
    <div class="admin-card-header">
        <h2>Form Data Anggota</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ $member->exists ? route('admin.members.update', $member->id) : route('admin.members.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($member->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color:#f87171;">*</span></label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $member->name) }}" required>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="gender" class="form-input">
                        <option value="">Pilih...</option>
                        <option value="L" {{ old('gender', $member->gender) == 'L' ? 'selected' : '' }}>Laki-laki (L)</option>
                        <option value="P" {{ old('gender', $member->gender) == 'P' ? 'selected' : '' }}>Perempuan (P)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label">Nomor WhatsApp</label>
                    <input type="text" name="phone" class="form-input" value="{{ old('phone', $member->phone) }}">
                </div>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Tempat Lahir</label>
                    <input type="text" name="birth_place" class="form-input" value="{{ old('birth_place', $member->birth_place) }}">
                </div>
                <div class="form-group">
                    <label class="form-label">Tanggal Lahir</label>
                    <input type="date" name="birth_date" class="form-input" value="{{ old('birth_date', optional($member->birth_date)->format('Y-m-d')) }}">
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat / Lingkungan</label>
                <textarea name="address" class="form-input" rows="3">{{ old('address', $member->address) }}</textarea>
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Bidang Keahlian / Minat</label>
                    <input type="text" name="division" class="form-input" value="{{ old('division', $member->division) }}" placeholder="Koor, Olahraga, Liturgi, dll">
                </div>
                <div class="form-group">
                    <label class="form-label">Status Anggota</label>
                    <select name="status" class="form-input">
                        <option value="aktif" {{ old('status', $member->status) == 'aktif' ? 'selected' : '' }}>Aktif</option>
                        <option value="tidak aktif" {{ old('status', $member->status) == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Foto</label>
                @if($member->photo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($member->photo) }}" alt="Foto" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="photo" class="form-input" accept="image/*">
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Anggota</button>
                <a href="{{ route('admin.members.index') }}" class="btn btn-secondary" style="margin-left:0.5rem;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
