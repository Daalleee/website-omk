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
                <select name="group" id="group-select" class="form-input" required onchange="updatePositions()">
                    <option value="">-- Pilih Jabatan --</option>
                    @php
                        $currentGroup = old('group', $leader->group ?? '');
                        $currentPosition = old('position', $leader->position);
                    @endphp
                    <option value="inti" {{ $currentGroup === 'inti' ? 'selected' : '' }}>Ketua / Wakil / Sekretaris / Bendahara</option>
                    <option value="pendamping" {{ $currentGroup === 'pendamping' ? 'selected' : '' }}>Pendamping</option>
                    <option value="kerohanian" {{ $currentGroup === 'kerohanian' ? 'selected' : '' }}>Bidang Kerohanian</option>
                    <option value="sosial" {{ $currentGroup === 'sosial' ? 'selected' : '' }}>Bidang Sosial</option>
                    <option value="seni_budaya" {{ $currentGroup === 'seni_budaya' ? 'selected' : '' }}>Bidang Seni & Budaya</option>
                    <option value="olahraga" {{ $currentGroup === 'olahraga' ? 'selected' : '' }}>Bidang Olahraga</option>
                    <option value="usaha" {{ $currentGroup === 'usaha' ? 'selected' : '' }}>Koordinator Usaha</option>
                    <option value="liturgi" {{ $currentGroup === 'liturgi' ? 'selected' : '' }}>Koordinator Liturgi</option>
                    <option value="perlengkapan" {{ $currentGroup === 'perlengkapan' ? 'selected' : '' }}>Koordinator Perlengkapan</option>
                </select>
                <div id="position-sub-wrap" style="margin-top:0.75rem;display:none;">
                    <label class="form-label" style="font-size:0.85rem;color:var(--gray-400);">Sub Jabatan</label>
                    <select name="position" id="position-select" class="form-input" onchange="toggleCustomPosition(this)">
                        <option value="">-- Pilih Sub Jabatan --</option>
                    </select>
                    <div id="custom-position-wrap" style="margin-top:0.75rem;display:none;">
                        <input type="text" id="custom-position-input" class="form-input" placeholder="Tulis jabatan kustom..." oninput="document.querySelector('[name=position_custom]').value=this.value">
                        <input type="hidden" name="position_custom" value="">
                        <div class="form-hint">Jabatan kustom yang Anda tulis akan digunakan sebagai jabatan.</div>
                    </div>
                </div>
            </div>
            <script>
            const positionMap = {
                inti: ['Ketua','Wakil Ketua','Sekretaris I','Sekretaris II','Bendahara I','Bendahara II','Lainnya'],
                pendamping: ['Pendamping','Lainnya'],
                kerohanian: ['Koordinator','Anggota','Lainnya'],
                sosial: ['Koordinator','Anggota','Lainnya'],
                seni_budaya: ['Koordinator','Anggota','Lainnya'],
                olahraga: ['Koordinator','Anggota','Lainnya'],
                usaha: ['Koordinator','Anggota','Lainnya'],
                liturgi: ['Koordinator','Anggota','Lainnya'],
                perlengkapan: ['Koordinator','Anggota','Lainnya'],
            };

            function updatePositions() {
                const group = document.getElementById('group-select').value;
                const subWrap = document.getElementById('position-sub-wrap');
                const posSelect = document.getElementById('position-select');
                const customWrap = document.getElementById('custom-position-wrap');

                posSelect.innerHTML = '<option value="">-- Pilih Sub Jabatan --</option>';
                customWrap.style.display = 'none';
                document.querySelector('[name=position_custom]').value = '';

                if (group && positionMap[group]) {
                    positionMap[group].forEach(function(pos) {
                        const opt = document.createElement('option');
                        opt.value = pos;
                        opt.textContent = pos;
                        posSelect.appendChild(opt);
                    });
                    subWrap.style.display = 'block';
                } else {
                    subWrap.style.display = 'none';
                }
            }

            @if($currentGroup && $currentPosition)
            window.addEventListener('DOMContentLoaded', function() {
                document.getElementById('group-select').value = '{{ $currentGroup }}';
                updatePositions();
                var posSelect = document.getElementById('position-select');
                if (posSelect.querySelector('option[value="{{ $currentPosition }}"]')) {
                    posSelect.value = '{{ $currentPosition }}';
                } else {
                    var opt = document.createElement('option');
                    opt.value = '{{ $currentPosition }}';
                    opt.textContent = '{{ $currentPosition }}';
                    posSelect.appendChild(opt);
                    posSelect.value = '{{ $currentPosition }}';
                }
                if (posSelect.value === 'Lainnya') {
                    document.getElementById('custom-position-wrap').style.display = 'block';
                    document.getElementById('custom-position-input').value = '{{ $currentPosition }}';
                    document.querySelector('[name=position_custom]').value = '{{ $currentPosition }}';
                }
            });
            @endif

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
