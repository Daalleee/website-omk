@extends('layouts.admin')
@section('title', 'Data Kegiatan')
@section('page-title', 'Kelola Kegiatan')

@section('content')
<div class="admin-card">
    <div class="admin-card-header" style="flex-wrap:wrap;gap:1rem;">
        <h2>Daftar Kegiatan</h2>
        <div style="display:flex;gap:1rem;align-items:center;">
            <form method="GET" style="display:flex;gap:0.5rem;">
                <input type="text" name="search" class="form-input" style="padding:0.4rem 0.75rem;width:250px;" placeholder="Cari kegiatan..." value="{{ request('search') }}">
                <button type="submit" class="btn btn-secondary btn-sm"><i class="bi bi-search"></i></button>
            </form>
            <a href="{{ route('admin.activities.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-plus-lg"></i> Tambah Kegiatan</a>
        </div>
    </div>
    <div class="admin-card-body" style="padding:0;overflow-x:auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th width="80">Thumbnail</th>
                    <th>Judul Kegiatan</th>
                    <th>Kategori</th>
                    <th>Tanggal & Lokasi</th>
                    <th>Status</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($activities as $act)
                <tr>
                    <td>
                        @if($act->thumbnail)
                        <img src="{{ Storage::url($act->thumbnail) }}" alt="Thumb" style="width:60px;height:45px;object-fit:cover;border-radius:6px;">
                        @else
                        <div style="width:60px;height:45px;background:rgba(255,255,255,0.05);border-radius:6px;display:flex;align-items:center;justify-content:center;color:rgba(255,255,255,0.3);"><i class="bi bi-image"></i></div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('activity.detail', $act->slug) }}" target="_blank" style="color:white;text-decoration:none;font-weight:600;" onmouseover="this.style.color='var(--green-400)'" onmouseout="this.style.color='white'">{{ $act->title }}</a>
                        <br>
                        <span style="font-size:0.75rem;color:rgba(255,255,255,0.4);">{{ $act->galleries->count() }} Foto Galeri</span>
                    </td>
                    <td>
                        @if($act->category)
                        <span class="badge badge-gray">{{ $act->category->name }}</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-size:0.8rem;">
                            @if($act->activity_date)<div style="color:var(--green-300);"><i class="bi bi-calendar3"></i> {{ $act->activity_date->format('d M Y') }}</div>@endif
                            @if($act->location)<div style="color:rgba(255,255,255,0.6);"><i class="bi bi-geo-alt"></i> {{ $act->location }}</div>@endif
                        </div>
                    </td>
                    <td>
                        @if($act->status)
                        <span class="badge badge-green">Publish</span>
                        @else
                        <span class="badge badge-red">Draft</span>
                        @endif
                    </td>
                    <td>
                        <div style="display:flex;gap:0.5rem;">
                            <a href="{{ route('admin.activities.edit', $act->id) }}" class="btn btn-secondary btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('admin.activities.destroy', $act->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus kegiatan ini? Semua foto galeri terkait juga akan terhapus.')">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Hapus"><i class="bi bi-trash-fill"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" style="text-align:center;padding:2rem;">Data kegiatan belum ada.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($activities->hasPages())
    <div style="padding:1rem;border-top:1px solid rgba(255,255,255,0.06);">
        {{ $activities->links('pagination::bootstrap-5') }}
    </div>
    @endif
</div>
@endsection
