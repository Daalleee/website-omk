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
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center;" class="fade-in">
            <div>
                <div class="section-badge">Sejarah</div>
                <h2 style="font-size:2rem;font-weight:800;color:var(--green-950);margin-bottom:1.5rem;">Perjalanan Kami</h2>
                <div style="color:var(--gray-600);line-height:1.9;font-size:0.95rem;">
                    {!! nl2br(e($about->history)) !!}
                </div>
            </div>
            <div style="position:relative;">
                @if($about->logo)
                <img src="{{ Storage::url($about->logo) }}" alt="Logo OMK" style="width:100%;max-width:350px;margin:0 auto;display:block;border-radius:16px;box-shadow:0 20px 40px rgba(0,0,0,0.07);">
                @else
                <div style="width:280px;height:280px;background:linear-gradient(135deg,var(--green-800),var(--green-700));border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:7rem;font-weight:900;color:white;margin:0 auto;box-shadow:0 15px 40px rgba(108,123,28,0.2);">OMK</div>
                @endif
                @if($about->logo_meaning)
                <div style="background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;padding:1.25rem;margin-top:1.5rem;">
                    <h4 style="color:var(--green-700);font-size:0.85rem;font-weight:700;margin-bottom:0.5rem;"><i class="bi bi-info-circle"></i> Makna Logo</h4>
                    <p style="color:var(--gray-600);font-size:0.875rem;line-height:1.7;">{{ $about->logo_meaning }}</p>
                </div>
                @endif
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
                <div style="width:50px;height:50px;background:linear-gradient(135deg,var(--green-700),var(--green-600));border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🎯</div>
                <h3 style="color:var(--green-800);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Visi</h3>
                <p style="color:var(--gray-600);line-height:1.8;">{{ $about->vision }}</p>
            </div>
            <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2.5rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                <div style="width:50px;height:50px;background:linear-gradient(135deg,var(--green-700),var(--green-600));border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🚀</div>
                <h3 style="color:var(--green-800);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Misi</h3>
                <div style="color:var(--gray-600);line-height:1.8;">{!! nl2br(e($about->mission)) !!}</div>
            </div>
        </div>
        @if($about->goals)
        <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2.5rem;margin-top:2rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);" class="fade-in">
            <div style="width:50px;height:50px;background:linear-gradient(135deg,var(--green-700),var(--green-600));border-radius:12px;display:flex;align-items:center;justify-content:center;font-size:1.5rem;margin-bottom:1.5rem;">🌟</div>
            <h3 style="color:var(--green-800);font-size:1.25rem;font-weight:700;margin-bottom:1rem;">Tujuan</h3>
            <p style="color:var(--gray-600);line-height:1.8;">{{ $about->goals }}</p>
        </div>
        @endif
    </div>
</section>

<!-- PASTOR PENDAMPING -->
@if($about->pastor_name)
<section class="section" style="background:var(--white);">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Pembimbing</div>
            <h2>Pastor Pendamping</h2>
            <div class="divider"></div>
        </div>
        <div style="max-width:480px;margin:0 auto;text-align:center;" class="fade-in">
            <div style="width:140px;height:140px;border-radius:50%;overflow:hidden;margin:0 auto 1.5rem;border:4px solid var(--green-300);background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                @if($about->pastor_photo)
                    <img src="{{ Storage::url($about->pastor_photo) }}" alt="{{ $about->pastor_name }}" style="width:100%;height:100%;object-fit:cover;">
                @else
                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3.5rem;color:var(--gray-300);">
                        <i class="bi bi-person-circle"></i>
                    </div>
                @endif
            </div>
            <h3 style="color:var(--green-950);font-size:1.35rem;font-weight:700;margin-bottom:0.25rem;">{{ $about->pastor_name }}</h3>
            <p style="color:var(--green-600);font-size:0.9rem;margin-bottom:1rem;font-weight:600;">Pastor Pendamping OMK</p>
            @if($about->pastor_bio)
            <p style="color:var(--gray-600);font-size:0.9rem;line-height:1.7;">{{ $about->pastor_bio }}</p>
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
