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
<section class="section" style="background:#080f09;" id="sejarah">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center;" class="fade-in">
            <div>
                <div class="section-badge">Sejarah</div>
                <h2 style="font-size:2rem;font-weight:700;color:white;margin-bottom:1.5rem;">Perjalanan Kami</h2>
                <div style="color:rgba(255,255,255,0.7);line-height:1.9;font-size:0.95rem;">
                    {!! nl2br(e($about->history)) !!}
                </div>
            </div>
            <div style="position:relative;">
                @if($about->logo)
                <img src="{{ Storage::url($about->logo) }}" alt="Logo OMK" style="width:100%;max-width:350px;margin:0 auto;display:block;border-radius:16px;">
                @else
                <div style="width:300px;height:300px;background:linear-gradient(135deg,#166534,#15803d);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:8rem;font-weight:900;color:rgba(255,255,255,0.9);margin:0 auto;box-shadow:0 0 60px rgba(108,123,28,0.3);">OMK</div>
                @endif
                @if($about->logo_meaning)
                <div style="background:rgba(134,151,34,0.08);border:1px solid rgba(134,151,34,0.2);border-radius:12px;padding:1.25rem;margin-top:1.5rem;">
                    <h4 style="color:var(--green-400);font-size:0.85rem;font-weight:600;margin-bottom:0.5rem;"><i class="bi bi-info-circle"></i> Makna Logo</h4>
                    <p style="color:rgba(255,255,255,0.65);font-size:0.875rem;line-height:1.7;">{{ $about->logo_meaning }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section class="section" style="background:linear-gradient(135deg,#0a1a0e,#0f2a15);" id="visi">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Identitas</div>
            <h2>Visi & Misi</h2>
            <div class="divider"></div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;" class="fade-in">
            <div style="background:rgba(134,151,34,0.06);border:1px solid rgba(134,151,34,0.2);border-radius:20px;padding:2.5rem;">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,#166534,#15803d);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🎯</div>
                <h3 style="color:var(--green-400);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Visi</h3>
                <p style="color:rgba(255,255,255,0.75);line-height:1.8;">{{ $about->vision }}</p>
            </div>
            <div style="background:rgba(134,151,34,0.06);border:1px solid rgba(134,151,34,0.2);border-radius:20px;padding:2.5rem;">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,#166534,#15803d);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🚀</div>
                <h3 style="color:var(--green-400);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Misi</h3>
                <div style="color:rgba(255,255,255,0.75);line-height:1.8;">{!! nl2br(e($about->mission)) !!}</div>
            </div>
        </div>
        @if($about->goals)
        <div style="background:rgba(134,151,34,0.06);border:1px solid rgba(134,151,34,0.2);border-radius:20px;padding:2.5rem;margin-top:2rem;" class="fade-in">
            <div style="width:50px;height:50px;background:linear-gradient(135deg,#166534,#15803d);border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🌟</div>
            <h3 style="color:var(--green-400);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Tujuan</h3>
            <p style="color:rgba(255,255,255,0.75);line-height:1.8;">{{ $about->goals }}</p>
        </div>
        @endif
    </div>
</section>

<!-- PASTOR PENDAMPING -->
@if($about->pastor_name)
<section class="section" style="background:#080f09;">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Pembimbing</div>
            <h2>Pastor Pendamping</h2>
            <div class="divider"></div>
        </div>
        <div style="max-width:500px;margin:0 auto;text-align:center;" class="fade-in">
            <div style="width:140px;height:140px;border-radius:50%;overflow:hidden;margin:0 auto 1.5rem;border:3px solid rgba(134,151,34,0.3);background:rgba(22,101,52,0.3);">
                @if($about->pastor_photo)
                    <img src="{{ Storage::url($about->pastor_photo) }}" alt="{{ $about->pastor_name }}" style="width:100%;height:100%;object-fit:cover;">
                @else
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3.5rem;color:rgba(134,151,34,0.5);">
                        <i class="bi bi-person-circle"></i>
                    </div>
                @endif
            </div>
            <h3 style="color:white;font-size:1.35rem;font-weight:700;margin-bottom:0.25rem;">{{ $about->pastor_name }}</h3>
            <p style="color:var(--green-400);font-size:0.9rem;margin-bottom:1rem;font-weight:500;">Pastor Pendamping OMK</p>
            @if($about->pastor_bio)
            <p style="color:rgba(255,255,255,0.6);font-size:0.9rem;line-height:1.7;">{{ $about->pastor_bio }}</p>
            @endif
        </div>
    </div>
</section>
@endif
@else
<section class="section" style="background:#080f09;">
    <div class="container" style="text-align:center;color:rgba(255,255,255,0.4);padding:4rem 0;">
        <i class="bi bi-info-circle" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
        <p>Informasi tentang OMK belum tersedia.</p>
    </div>
</section>
@endif
@endsection
