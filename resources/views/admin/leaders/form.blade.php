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
                <select name="position" id="position-select" class="form-input" required onchange="toggleCustomPosition(this)">
                    <option value="">-- Pilih Jabatan --</option>
                    @php
                        $jabatanList = ['Ketua','Wakil Ketua','Sekretaris I','Sekretaris II','Bendahara I','Bendahara II','Koordinator Bidang Kerohanian','Koordinator Bidang Sosial','Koordinator Bidang Seni & Budaya','Koordinator Bidang Olahraga','Anggota Bidang Kerohanian','Anggota Bidang Sosial','Anggota Bidang Seni & Budaya','Anggota Bidang Olahraga','Lainnya'];
                        $currentPosition = old('position', $leader->position);
                        $isCustom = $currentPosition && !in_array($currentPosition, $jabatanList);
                    @endphp
                    @foreach($jabatanList as $jabatan)
                    <option value="{{ $jabatan }}" {{ $currentPosition === $jabatan ? 'selected' : '' }}>{{ $jabatan }}</option>
                    @endforeach
                    @if($isCustom)
                    <option value="{{ $currentPosition }}" selected>{{ $currentPosition }}</option>
                    @endif
                </select>
                <div id="custom-position-wrap" style="margin-top:0.75rem;display:{{ $isCustom ? 'block' : 'none' }};">
                    <input type="text" id="custom-position-input" class="form-input" placeholder="Tulis jabatan kustom..." value="{{ $isCustom ? $currentPosition : '' }}" oninput="document.querySelector('[name=position_custom]').value=this.value">
                    <input type="hidden" name="position_custom" value="{{ $isCustom ? $currentPosition : '' }}">
                    <div class="form-hint">Jabatan kustom yang Anda tulis akan digunakan sebagai jabatan.</div>
                </div>
            </div>
            <script>
            function toggleCustomPosition(sel) {
                const wrap = document.getElementById('custom-position-wrap');
                const customInput = document.getElementById('custom-position-input');
                if (sel.value === 'Lainnya') {
                    wrap.style.display = 'block';
                    customInput.focus();
                } else {
                    wrap.style.display = 'none';
                    customInput.value = '';
                    document.querySelector('[name=position_custom]').value = '';
                }
            }
            // On submit, if Lainnya is selected, override position value with custom input
            document.querySelector('form').addEventListener('submit', function(e) {
                const sel = document.getElementById('position-select');
                if (sel.value === 'Lainnya') {
                    const custom = document.querySelector('[name=position_custom]').value.trim();
                    if (!custom) {
                        e.preventDefault();
                        alert('Harap isi jabatan kustom.');
                        return;
                    }
                    sel.value = custom;
                }
            });
            </script>


            <div class="form-group">
                <label class="form-label">Periode</label>
                <input type="text" name="period" class="form-input" value="{{ old('period', $leader->period) }}" placeholder="Contoh: 2026-2028">
            </div>

            <div class="form-group">
                <label class="form-label">Foto</label>
                @if($leader->photo)
                <div style="margin-bottom:10px;">
                    <img src="{{ Storage::url($leader->photo) }}" alt="Foto" style="height:100px;border-radius:8px;object-fit:cover;">
                </div>
                @endif
                <input type="file" name="photo" class="form-input" accept="image/*" data-crop="0.75">
                <div class="form-hint">Setelah memilih foto, Anda dapat memotongnya (rasio 3:4).</div>
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
