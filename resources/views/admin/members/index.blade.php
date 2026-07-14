@extends('layouts.admin')
@section('title', 'Data Anggota')
@section('page-title', 'Kelola Anggota')

@section('content')
<div class="admin-card">
    <div class="admin-card-header" style="flex-wrap:wrap;gap:1rem;">
        <h2>Daftar Anggota</h2>
        <div style="display:flex;gap:1rem;align-items:center;">
            <form method="GET" style="display:flex;gap:0.5rem;">
                <input type="text" name="search" class="form-input" style="padding:0.4rem 0.75rem;width:200px;" placeholder="Cari nama..." value="{{ request('search') }}">
                <select name="status" class="form-input" style="padding:0.4rem 0.75rem;width:130px;">
                    <option value="">Semua</option>
                    <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak aktif" {{ request('status') == 'tidak aktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi bi-search"></i></button>
            </form>
            <a href="{{ route('admin.members.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah</a>
        </div>
    </div>
    <div class="admin-card-body" style="padding:0;overflow-x:auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th width="50">Foto</th>
                    <th>Nama Lengkap</th>
                    <th>L/P</th>
                    <th>Kontak</th>
                    <th>Bidang</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($members as $member)
                <tr>
                    <td>
                        @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" class="avatar" alt="Foto">
                        @else
                        <div class="avatar"><i class="bi bi-person-fill"></i></div>
                        @endif
                    </td>
                    <td>
                        <strong>{{ $member->name }}</strong><br>
                        <span style="font-size:0.75rem;color:rgba(255,255,255,0.4);">
                            @if($member->birth_place && $member->birth_date)
                                {{ $member->birth_place }}, {{ $member->birth_date->format('d M Y') }}
                            @endif
                        </span>
                    </td>
                    <td>{{ $member->gender }}</td>
                    <td>
                        <div style="font-size:0.75rem;">
                            @if($member->phone)<div style="color:var(--green-400);"><i class="bi bi-whatsapp"></i> {{ $member->phone }}</div>@endif
                            @if($member->address)<div style="color:rgba(255,255,255,0.5);"><i class="bi bi-geo-alt"></i> {{ Str::limit($member->address, 20) }}</div>@endif
                        </div>
                    </td>
                    <td>{{ $member->division ?? '-' }}</td>
                    <td>
                        @if($member->status == 'aktif')
                        <span class="badge badge-green">Aktif</span>
                        @else
                        <span class="badge badge-red">Tidak Aktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:0.5rem;">
                            <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data anggota ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="text-align:center;padding:2rem;">Data anggota tidak ditemukan.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($members->hasPages())
    <div style="padding:1rem;border-top:1px solid rgba(255,255,255,0.06);">
        {{ $members->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection
