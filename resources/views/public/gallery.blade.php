@extends('layouts.public')
@section('title', 'Galeri OMK')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Galeri</nav>
        <h1 class="page-title">Galeri Foto</h1>
        <p class="page-subtitle">Momen berharga dalam setiap perjalanan OMK</p>
    </div>
</section>
<section class="section" style="background:#080f09;">
    <div class="container">
        @if($galleries->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(250px,1fr));gap:1rem;margin-bottom:2rem;">
            @foreach($galleries as $photo)
            <div style="border-radius:14px;overflow:hidden;aspect-ratio:1;cursor:pointer;position:relative;background:rgba(22,101,52,0.2);" onclick="openLightbox('{{ Storage::url($photo->image) }}','{{ $photo->caption }}')">
                <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->caption ?? 'Galeri OMK' }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;" onmouseover="this.style.transform='scale(1.06)'" onmouseout="this.style.transform='scale(1)'">
                <div style="position:absolute;inset:0;background:rgba(5,46,22,0.65);display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity 0.3s;font-size:1.75rem;color:white;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0'">
                    <i class="bi bi-zoom-in"></i>
                </div>
                @if($photo->caption)
                <div style="position:absolute;bottom:0;left:0;right:0;background:linear-gradient(transparent,rgba(0,0,0,0.7));padding:1rem 0.75rem 0.75rem;font-size:0.75rem;color:rgba(255,255,255,0.85);">{{ $photo->caption }}</div>
                @endif
            </div>
            @endforeach
        </div>
        <div class="pagination">{{ $galleries->links('pagination::simple-bootstrap-5') }}</div>
        @else
        <div style="text-align:center;padding:4rem 0;color:rgba(255,255,255,0.4);">
            <i class="bi bi-images" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Galeri foto belum tersedia.</p>
        </div>
        @endif
    </div>
</section>
<div id="lightbox" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.93);z-index:9999;align-items:center;justify-content:center;flex-direction:column;gap:1rem;" onclick="closeLightbox()">
    <img id="lightbox-img" src="" alt="" style="max-width:90vw;max-height:80vh;border-radius:12px;object-fit:contain;">
    <p id="lightbox-caption" style="color:rgba(255,255,255,0.6);font-size:0.9rem;"></p>
    <button onclick="closeLightbox()" style="position:absolute;top:1.5rem;right:1.5rem;background:rgba(255,255,255,0.1);border:none;color:white;width:44px;height:44px;border-radius:50%;font-size:1.25rem;cursor:pointer;"><i class="bi bi-x-lg"></i></button>
</div>
@endsection
@push('scripts')
<script>
function openLightbox(src,caption){document.getElementById('lightbox-img').src=src;document.getElementById('lightbox-caption').textContent=caption||'';document.getElementById('lightbox').style.display='flex';document.body.style.overflow='hidden';}
function closeLightbox(){document.getElementById('lightbox').style.display='none';document.body.style.overflow='';}
document.addEventListener('keydown',e=>{if(e.key==='Escape')closeLightbox();});
</script>
@endpush
