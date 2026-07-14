@extends('layouts.admin')
@section('title', 'Data Galeri')
@section('page-title', 'Kelola Galeri Foto')

@section('content')
<div class="admin-card">
    <div class="admin-card-header">
        <h2>Daftar Foto</h2>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary btn-sm"><i class="bi bi-cloud-arrow-up-fill"></i> Upload Foto</a>
    </div>
    <div class="admin-card-body">
        @if($galleries->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1rem;">
            @foreach($galleries as $photo)
            <div style="position:relative;border-radius:10px;overflow:hidden;border:1px solid rgba(255,255,255,0.1);background:rgba(0,0,0,0.2);">
                <img src="{{ Storage::url($photo->image) }}" alt="Gallery" style="width:100%;aspect-ratio:1;object-fit:cover;display:block;">
                <div style="position:absolute;top:0;left:0;right:0;padding:0.5rem;background:linear-gradient(rgba(0,0,0,0.8),transparent);display:flex;justify-content:flex-end;">
                    <form action="{{ route('admin.gallery.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus foto ini?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn btn-danger" style="padding:0.2rem 0.5rem;font-size:0.75rem;"><i class="bi bi-trash-fill"></i></button>
                    </form>
                </div>
                <div style="padding:0.75rem;font-size:0.75rem;color:rgba(255,255,255,0.7);">

                    @if($photo->caption)
                    <div style="white-space:nowrap;overflow:hidden;text-overflow:ellipsis;color:rgba(255,255,255,0.5);">
                        {{ $photo->caption }}
                    </div>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
        <div style="margin-top:2rem;">
            {{ $galleries->links('pagination::bootstrap-5') }}
        </div>
        @else
        <div style="text-align:center;padding:4rem 0;color:rgba(255,255,255,0.4);">
            <i class="bi bi-images" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Belum ada foto galeri yang diunggah.</p>
        </div>
        @endif
    </div>
</div>
@endsection
