@extends('layouts.admin')
@section('title', $activity->exists ? 'Edit Kegiatan' : 'Tambah Kegiatan')
@section('page-title', $activity->exists ? 'Edit Kegiatan' : 'Tambah Kegiatan')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.activities.index') }}">Kegiatan</a> <i class="bi bi-chevron-right"></i> {{ $activity->exists ? 'Edit' : 'Tambah' }}
</div>

<div class="admin-card">
    <div class="admin-card-header">
        <h2>Form Kegiatan</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ $activity->exists ? route('admin.activities.update', $activity->id) : route('admin.activities.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($activity->exists) @method('PUT') @endif

            <div style="display:grid;grid-template-columns:2fr 1fr;gap:2rem;" class="mobile-stack">
                <!-- KOLOM KIRI -->
                <div>
                    <div class="form-group">
                        <label class="form-label">Judul Kegiatan <span style="color:#f87171;">*</span></label>
                        <input type="text" name="title" class="form-input" value="{{ old('title', $activity->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Deskripsi / Detail Kegiatan</label>
                        <textarea name="description" class="form-input" rows="10">{{ old('description', $activity->description) }}</textarea>
                        <div class="form-hint">Mendukung format paragraf biasa.</div>
                    </div>

                    <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;" class="mobile-stack">
                        <div class="form-group">
                            <label class="form-label">Tanggal Kegiatan</label>
                            <input type="date" name="activity_date" class="form-input" value="{{ old('activity_date', optional($activity->activity_date)->format('Y-m-d')) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-label">Lokasi</label>
                            <input type="text" name="location" class="form-input" value="{{ old('location', $activity->location) }}">
                        </div>
                    </div>
                </div>

                <!-- KOLOM KANAN -->
                <div>
                    <div class="admin-card" style="background:rgba(0,0,0,0.2);margin-bottom:1.5rem;">
                        <div class="admin-card-body">
                            <div class="form-group">
                                <label class="form-label">Kategori</label>
                                <select name="category_id" class="form-input">
                                    <option value="">Pilih Kategori...</option>
                                    @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}" {{ old('category_id', $activity->category_id) == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group" style="margin-bottom:0;">
                                <label class="form-label">Status Publish</label>
                                <div style="display:flex;align-items:center;gap:1rem;margin-top:0.5rem;">
                                    <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.85rem;color:white;cursor:pointer;">
                                        <input type="radio" name="status" value="1" {{ old('status', $activity->status ?? true) == 1 ? 'checked' : '' }} style="accent-color:var(--green-500);"> Publish
                                    </label>
                                    <label style="display:flex;align-items:center;gap:0.5rem;font-size:0.85rem;color:white;cursor:pointer;">
                                        <input type="radio" name="status" value="0" {{ old('status', $activity->status ?? true) == 0 ? 'checked' : '' }} style="accent-color:var(--green-500);"> Draft
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Thumbnail (Kotak/Persegi)</label>
                        @if($activity->thumbnail)
                        <div style="margin-bottom:10px;">
                            <img src="{{ Storage::url($activity->thumbnail) }}" alt="Thumb" style="width:100%;height:150px;border-radius:8px;object-fit:cover;">
                        </div>
                        @endif
                        <input type="file" name="thumbnail" class="form-input" accept="image/*">
                        <div class="form-hint">Digunakan di daftar kegiatan (Card).</div>
                    </div>

                    <div class="form-group">
                        <label class="form-label">Banner Header (Opsional, Horizontal)</label>
                        @if($activity->banner)
                        <div style="margin-bottom:10px;">
                            <img src="{{ Storage::url($activity->banner) }}" alt="Banner" style="width:100%;height:100px;border-radius:8px;object-fit:cover;">
                        </div>
                        @endif
                        <input type="file" name="banner" class="form-input" accept="image/*">
                        <div class="form-hint">Digunakan di halaman detail bagian atas. Jika kosong akan menggunakan thumbnail.</div>
                    </div>
                </div>
            </div>

            <div style="margin-top:2rem;border-top:1px solid rgba(255,255,255,0.1);padding-top:1.5rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Kegiatan</button>
                <a href="{{ route('admin.activities.index') }}" class="btn btn-secondary" style="margin-left:0.5rem;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
