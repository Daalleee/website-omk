@extends('layouts.admin')
@section('title', 'Data Pengurus')
@section('page-title', 'Kelola Pengurus')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Daftar Pengurus</h2>
        <a href="{{ route('admin.leaders.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Pengurus</a>
    </div>
    <div class="admin-card-body" style="padding:0;overflow-x:auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th width="60">Foto</th>
                    <th>Nama</th>
                    <th>Jabatan</th>
                    <th>Periode</th>
                    <th>Status</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($leaders as $leader)
                <tr>
                    <td>
                        @if($leader->photo)
                        <img src="{{ Storage::url($leader->photo) }}" class="avatar" alt="Foto">
                        @else
                        <div class="avatar"><i class="bi bi-person-fill"></i></div>
                        @endif
                    </td>
                    <td><strong>{{ $leader->name }}</strong></td>
                    <td>{{ $leader->position }}</td>
                    <td>{{ $leader->period ?? '-' }}</td>
                    <td>
                        @if($leader->status)
                        <span class="badge badge-green">Aktif</span>
                        @else
                        <span class="badge badge-gray">Nonaktif</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:0.5rem;">
                            <a href="{{ route('admin.leaders.edit', $leader->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.leaders.destroy', $leader->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus pengurus ini?')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:2rem;">Belum ada data pengurus.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
