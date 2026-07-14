@extends('layouts.public')

@section('title', 'Tentang OMK - Orang Muda Katolik')
@section('description', 'Pelajari sejarah, visi, misi, dan tujuan Orang Muda Katolik.')

@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Tentang</nav>
        <h1 class="page-title">Tentang OMK</h1>
        <p class="page-subtitle">Mengenal lebih dekat Orang Muda Katolik</p>
    </div>
</section>

@if($about)
<!-- SEJARAH -->
<section class="section" style="background:var(--white);" id="sejarah">
    <div class="container">
        <div style="max-width:800px;margin:0 auto;text-align:center;" class="fade-in">
            <div class="section-badge" style="margin:0 auto 1rem;">Sejarah</div>
            <h2 style="font-size:2.5rem;font-weight:800;color:var(--green-950);margin-bottom:1.5rem;">Perjalanan Kami</h2>
            <div style="color:var(--gray-600);line-height:1.9;font-size:1rem;text-align:justify;">
                {!! nl2br(e($about->history)) !!}
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="section" style="background:var(--gray-50);border-top:1px solid var(--gray-200);border-bottom:1px solid var(--gray-200);" id="visi">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Identitas</div>
            <h2>Visi &amp; Misi</h2>
            <div class="divider"></div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;" class="fade-in">
            <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2.5rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                <h3 style="color:var(--green-800);font-size:1.75rem;font-weight:800;margin-bottom:1rem;text-align:center;">Visi</h3>
                <div style="color:var(--gray-600);line-height:1.8;text-align:left;font-size:1rem;" class="editor-content">
                    {!! $about->vision !!}
                </div>
            </div>
            <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2.5rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                <h3 style="color:var(--green-800);font-size:1.75rem;font-weight:800;margin-bottom:1rem;text-align:center;">Misi</h3>
                <div style="color:var(--gray-600);line-height:1.8;text-align:left;font-size:1rem;" class="editor-content">
                    {!! $about->mission !!}
                </div>
            </div>
        </div>
        <style>
            .editor-content ul { padding-left: 1.5rem; list-style-type: disc; margin-bottom: 1rem; }
            .editor-content ol { padding-left: 1.5rem; list-style-type: decimal; margin-bottom: 1rem; }
            .editor-content p { margin-bottom: 0.75rem; }
            .editor-content strong, .editor-content b { font-weight: bold; color: var(--gray-900); }
        </style>

</section>

<!-- BAPAK PENDAMPING -->
@if($about->pastor_name)
<section class="section" style="background:var(--white);">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Pembimbing</div>
            <h2>Bapak Pendamping</h2>
            <div class="divider"></div>
        </div>
        <div style="max-width:280px;margin:0 auto;text-align:center;" class="fade-in">
            <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.5rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                @if($about->pastor_photo)
                    <img src="{{ Storage::url($about->pastor_photo) }}" alt="{{ $about->pastor_name }}" style="width:100%;height:100%;object-fit:cover;">
                @else
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:5rem;color:var(--gray-300);">
                        <i class="bi bi-person-bounding-box"></i>
                    </div>
                @endif
            </div>
            <h3 style="color:var(--green-950);font-size:1.35rem;font-weight:700;margin-bottom:0.25rem;">{{ $about->pastor_name }}</h3>
            <p style="color:var(--green-600);font-size:0.9rem;margin-bottom:1rem;font-weight:600;">Bapak Pendamping OMK</p>
            @if($about->pastor_bio)
            <p style="color:var(--gray-600);font-size:0.9rem;line-height:1.7;">{{ str_replace('Pastor', 'Bapak', $about->pastor_bio) }}</p>
            @endif
        </div>
    </div>
</section>
@endif
@else
<section class="section" style="background:var(--white);">
    <div class="container" style="text-align:center;color:var(--gray-400);padding:4rem 0;">
        <i class="bi bi-info-circle" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
        <p>Informasi tentang OMK belum tersedia.</p>
    </div>
</section>
@endif
@endsection
