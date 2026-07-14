@extends('layouts.admin')
@section('title', $leader->exists ? 'Edit Pengurus' : 'Tambah Pengurus')
@section('page-title', $leader->exists ? 'Edit Pengurus' : 'Tambah Pengurus')

@section('content')
<div class="admin-breadcrumb">
    <a href="{{ route('admin.leaders.index') }}">Pengurus</a> <i class="bi bi-chevron-right"></i> {{ $leader->exists ? 'Edit' : 'Tambah' }}
</div>

<div class="admin-card" style="max-width:800px;">
    <div class="admin-card-header">
        <h2>Form Pengurus</h2>
    </div>
    <div class="admin-card-body">
        <form action="{{ $leader->exists ? route('admin.leaders.update', $leader->id) : route('admin.leaders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if($leader->exists) @method('PUT') @endif

            <div class="form-group">
                <label class="form-label">Nama Lengkap <span style="color:#f87171;">*</span></label>
                <input type="text" name="name" class="form-input" value="{{ old('name', $leader->name) }}" required>
            </div>

            <div class="form-group">
                <label class="form-label">Jabatan <span style="color:#f87171;">*</span></label>
                <input type="text" name="position" class="form-input" value="{{ old('position', $leader->position) }}" required placeholder="Contoh: Ketua, Sekretaris, Koordinator Bidang Kerohanian">
            </div>

            <div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;">
                <div class="form-group">
                    <label class="form-label">Periode</label>
                    <input type="text" name="period" class="form-input" value="{{ old('period', $leader->period) }}" placeholder="Contoh: 2026-2028">
                </div>
                <div class="form-group">
                    <label class="form-label">Urutan Tampil (Order)</label>
                    <input type="number" name="order_number" class="form-input" value="{{ old('order_number', $leader->order_number ?? 0) }}">
                    <div class="form-hint">Angka lebih kecil tampil lebih awal. Ketua biasanya 1.</div>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Motto (Opsional)</label>
                <input type="text" name="motto" class="form-input" value="{{ old('motto', $leader->motto) }}" placeholder="Kutipan ayat atau motto hidup">
            </div>

            <div class="form-group">
                <label class="form-label">Foto</label>
                @if($leader->photo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($leader->photo) }}" alt="Foto" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="photo" class="form-input" accept="image/*">
            </div>

            <div class="form-group">
                <label class="form-label">
                    <input type="checkbox" name="status" value="1" {{ old('status', $leader->status ?? true) ? 'checked' : '' }} style="margin-right:0.5rem;accent-color:var(--green-500);">
                    Pengurus Aktif
                </label>
            </div>

            <div style="margin-top:2rem;">
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Pengurus</button>
                <a href="{{ route('admin.leaders.index') }}" class="btn btn-secondary" style="margin-left:0.5rem;">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
