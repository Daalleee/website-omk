@extends('layouts.public')
@section('title', $activity->title . ' - OMK')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> <a href="{{ route('activities') }}">Kegiatan</a> <i class="bi bi-chevron-right"></i> {{ Str::limit($activity->title, 40) }}</nav>
        <h1 class="page-title" style="font-size:2rem;">{{ $activity->title }}</h1>
    </div>
</section>
<section class="section" style="background:#080f09;">
    <div class="container" style="max-width:900px;">
        @if($activity->banner)
        <img src="{{ Storage::url($activity->banner) }}" alt="{{ $activity->title }}" style="width:100%;border-radius:16px;margin-bottom:2rem;max-height:450px;object-fit:cover;">
        @elseif($activity->thumbnail)
        <img src="{{ Storage::url($activity->thumbnail) }}" alt="{{ $activity->title }}" style="width:100%;border-radius:16px;margin-bottom:2rem;max-height:450px;object-fit:cover;">
        @endif

        <div style="display:flex;gap:1.5rem;flex-wrap:wrap;margin-bottom:2rem;">
            @if($activity->category)<span style="background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.25);color:var(--green-400);padding:0.35rem 0.875rem;border-radius:50px;font-size:0.8rem;font-weight:600;">{{ $activity->category->name }}</span>@endif
            @if($activity->activity_date)<span style="color:rgba(255,255,255,0.55);font-size:0.875rem;"><i class="bi bi-calendar3" style="color:var(--green-500);"></i> {{ $activity->activity_date->format('d F Y') }}</span>@endif
            @if($activity->location)<span style="color:rgba(255,255,255,0.55);font-size:0.875rem;"><i class="bi bi-geo-alt-fill" style="color:var(--green-500);"></i> {{ $activity->location }}</span>@endif
        </div>

        @if($activity->description)
        <div style="color:rgba(255,255,255,0.8);line-height:1.9;font-size:0.95rem;margin-bottom:3rem;">
            {!! nl2br(e($activity->description)) !!}
        </div>
        @endif

        @if($activity->galleries->count() > 0)
        <h3 style="color:white;font-size:1.25rem;font-weight:700;margin-bottom:1.5rem;border-bottom:1px solid rgba(34,197,94,0.2);padding-bottom:0.75rem;">
            <i class="bi bi-images" style="color:var(--green-400);"></i> Galeri Kegiatan
        </h3>
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:0.75rem;">
            @foreach($activity->galleries as $photo)
            <div style="border-radius:10px;overflow:hidden;aspect-ratio:1;cursor:pointer;" onclick="openLightbox('{{ Storage::url($photo->image) }}','{{ $photo->caption }}')">
                <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->caption }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.3s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
            </div>
            @endforeach
        </div>
        @endif

        <div style="margin-top:3rem;padding-top:2rem;border-top:1px solid rgba(255,255,255,0.08);">
            <a href="{{ route('activities') }}" class="btn btn-outline"><i class="bi bi-arrow-left"></i> Kembali ke Kegiatan</a>
        </div>
    </div>
</section>

<div id="lightbox" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.92);z-index:9999;align-items:center;justify-content:center;flex-direction:column;gap:1rem;" onclick="closeLightbox()">
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
