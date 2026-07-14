@extends('layouts.admin')
@section('title', 'Upload Foto Galeri')
@section('page-title', 'Upload Foto Galeri')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.gallery.index') }}">Galeri</a> <i class="bi bi-chevron-right"></i> Upload
</div>

<div class="admin-card" style="max-width:800px;">
    <div class="admin-card-header">
        <h2>Form Upload Foto</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label class="form-label">Pilih Foto <span style="color:#f87171;">*</span></label>
                <input type="file" name="images[]" class="form-input" accept="image/*" multiple required>
                <div class="form-hint">Anda bisa memilih lebih dari satu foto sekaligus (Multiple Upload). Maksimal ukuran per foto 5MB.</div>
            </div>

            <div class="form-group">
                <label class="form-label">Caption / Keterangan (Opsional)</label>
                <input type="text" name="caption" class="form-input" placeholder="Contoh: Dokumentasi acara baksos 2026">
                <div class="form-hint">Caption ini akan diaplikasikan ke semua foto yang diupload bersamaan di form ini.</div>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Foto</button>
                <a href="{{ route('admin.gallery.index') }}" class="btn btn-secondary" style="margin-left:0.5rem;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
