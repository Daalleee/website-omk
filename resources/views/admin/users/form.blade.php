@extends('layouts.admin')
@section('title', $user->exists ? 'Edit Pengguna' : 'Tambah Pengguna')
@section('page-title', $user->exists ? 'Edit Pengguna' : 'Tambah Pengguna')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.users.index') }}">Pengguna</a> <i class="bi bi-chevron-right"></i> {{ $user->exists ? 'Edit' : 'Tambah' }}
</div>

<div class="admin-card" style="max-width:600px;">
    <div class="admin-card-header">
        <h2>Form Pengguna</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ $user->exists ? route('admin.users.update', $user->id) : route('admin.users.store') }}" method="POST">
            @csrf
            @if($user->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color:#f87171;">*</span></label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $user->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Alamat Email <span style="color:#f87171;">*</span></label>
                <input type="email" name="email" class="form-input" value="{{ old('email', $user->email) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Role / Hak Akses <span style="color:#f87171;">*</span></label>
                <select name="role" class="form-input" required>
                    <option value="editor" {{ old('role', $user->role) == 'editor' ? 'selected' : '' }}>Editor (Hanya Kelola Konten)</option>
                    <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Administrator (Kelola Konten & Pengguna)</option>
                </select>
            </div>

            <hr style="border:0;border-top:1px solid rgba(255,255,255,0.1);margin:2rem 0;">

            <div class="form-group">
                <label class="form-label">Password {{ $user->exists ? '(Isi jika ingin diubah)' : '*' }}</label>
                <input type="password" name="password" class="form-input" {{ !$user->exists ? 'required' : '' }}>
            </div>

            <div class="form-group">
                <label class="form-label">Konfirmasi Password {{ $user->exists ? '(Isi jika mengubah password)' : '*' }}</label>
                <input type="password" name="password_confirmation" class="form-input" {{ !$user->exists ? 'required' : '' }}>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Pengguna</button>
                <a href="{{ route('admin.users.index') }}" class="btn btn-secondary" style="margin-left:0.5rem;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
