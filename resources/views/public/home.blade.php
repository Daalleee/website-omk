@extends('layouts.public')

@section('title', 'OMK - Orang Muda Katolik | Beranda')
@section('description', 'Website resmi Orang Muda Katolik. Bersama dalam iman, tumbuh dalam kasih, bergerak untuk sesama.')

@push('styles')
<style>
    /* HERO */
    .hero {
        min-height: 100vh;
        position: relative;
        display: flex;
        align-items: center;
        overflow: hidden;
        background: linear-gradient(135deg, #ffffff 0%, var(--green-50) 100%);
    }

    .hero-bg-pattern {
        position: absolute;
        inset: 0;
        background-image: 
            radial-gradient(ellipse at 20% 50%, rgba(134, 151, 34, 0.05) 0%, transparent 60%),
            radial-gradient(ellipse at 80% 20%, rgba(108, 123, 28, 0.05) 0%, transparent 50%),
            radial-gradient(ellipse at 60% 80%, rgba(63, 71, 16, 0.03) 0%, transparent 50%);
    }

    .hero-grid-overlay {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(134, 151, 34, 0.05) 1px, transparent 1px),
            linear-gradient(90deg, rgba(134, 151, 34, 0.05) 1px, transparent 1px);
        background-size: 50px 50px;
    }

    .hero-orb {
        position: absolute;
        border-radius: 50%;
        filter: blur(80px);
        animation: float 8s ease-in-out infinite;
    }

    .hero-orb-1 {
        width: 500px; height: 500px;
        background: rgba(134, 151, 34, 0.08);
        top: -100px; right: -100px;
        animation-delay: 0s;
    }

    .hero-orb-2 {
        width: 350px; height: 350px;
        background: rgba(108, 123, 28, 0.06);
        bottom: 0; left: -50px;
        animation-delay: 4s;
    }

    @keyframes float {
        0%, 100% { transform: translateY(0) scale(1); }
        50% { transform: translateY(-30px) scale(1.05); }
    }

    .hero-content {
        position: relative;
        z-index: 2;
        display: grid;
        grid-template-columns: 1.2fr 0.8fr;
        gap: 4rem;
        align-items: center;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 2rem;
        padding-top: 5rem;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(134, 151, 34, 0.1);
        border: 1px solid rgba(134, 151, 34, 0.2);
        color: var(--green-700);
        padding: 0.4rem 1rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 1.5rem;
    }

    .hero-badge .dot {
        width: 8px; height: 8px;
        background: var(--green-500);
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    .hero-title {
        font-size: 4rem;
        font-weight: 800;
        line-height: 1.15;
        color: var(--green-950);
        margin-bottom: 1.25rem;
    }

    .hero-title .highlight {
        background: linear-gradient(135deg, var(--green-700), var(--green-500));
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .hero-subtitle {
        font-size: 1.15rem;
        color: var(--gray-600);
        margin-bottom: 2.5rem;
        line-height: 1.7;
        max-width: 500px;
    }

    .hero-cta {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .hero-visual {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-card-center {
        width: 320px;
        height: 320px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--white), var(--green-50));
        border: 2px dashed rgba(134, 151, 34, 0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        animation: spin-slow 30s linear infinite;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05);
    }

    @keyframes spin-slow {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .hero-logo-inner {
        width: 240px;
        height: 240px;
        border-radius: 50%;
        background: linear-gradient(135deg, var(--green-800), var(--green-700));
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        font-weight: 900;
        color: var(--white);
        animation: spin-slow 30s linear infinite reverse;
        box-shadow: 0 10px 40px rgba(108, 123, 28, 0.3), inset 0 0 40px rgba(0,0,0,0.2);
    }

    .hero-floating-stat {
        position: absolute;
        background: var(--white);
        border: 1px solid var(--green-100);
        border-radius: 12px;
        padding: 0.75rem 1.25rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    }

    .hero-floating-stat .stat-num {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--green-700);
        line-height: 1;
    }

    .hero-floating-stat .stat-label {
        font-size: 0.75rem;
        color: var(--gray-600);
        margin-top: 2px;
        font-weight: 500;
    }

    .stat-1 { top: 5%; left: -30px; }
    .stat-2 { bottom: 10%; right: -30px; }

    /* STATS SECTION */
    .stats-section {
        background: linear-gradient(135deg, var(--green-950), var(--green-900));
        padding: 4rem 0;
        border-top: 4px solid var(--green-600);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 2rem;
    }

    .stat-item {
        text-align: center;
        padding: 1.5rem;
    }

    .stat-item .num {
        font-size: 3rem;
        font-weight: 800;
        color: var(--green-400);
        line-height: 1;
        margin-bottom: 0.5rem;
    }

    .stat-item .label {
        color: rgba(255,255,255,0.8);
        font-size: 1rem;
        font-weight: 500;
    }

    .stat-divider {
        border-left: 1px solid rgba(255,255,255,0.15);
    }

    /* WELCOME */
    .welcome-section {
        background: var(--white);
    }

    .welcome-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 5rem;
        align-items: center;
    }

    .welcome-photo {
        position: relative;
    }

    .photo-frame {
        width: 100%;
        aspect-ratio: 4/5;
        border-radius: 20px;
        overflow: hidden;
        border: 1px solid var(--gray-200);
        background: var(--gray-50);
        position: relative;
        box-shadow: 0 20px 50px rgba(0,0,0,0.05);
    }

    .photo-frame img {
        width: 100%; height: 100%;
        object-fit: cover;
    }

    .photo-frame-placeholder {
        width: 100%; height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 5rem;
        color: var(--gray-300);
    }

    .photo-accent {
        position: absolute;
        width: 120px; height: 120px;
        border: 3px solid var(--green-500);
        border-radius: 12px;
        bottom: -20px;
        right: -20px;
        z-index: -1;
    }

    .welcome-content h2 {
        font-size: 2.25rem;
        font-weight: 800;
        color: var(--green-950);
        margin-bottom: 0.5rem;
    }

    .ketua-name {
        color: var(--green-700);
        font-weight: 600;
        font-size: 1rem;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .welcome-text {
        color: var(--gray-600);
        line-height: 1.8;
        font-size: 1rem;
        margin-bottom: 2rem;
    }

    /* TENTANG */
    .tentang-section {
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
        border-bottom: 1px solid var(--gray-200);
    }

    /* ACTIVITIES */
    .activities-section {
        background: var(--white);
    }

    .activities-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1.5rem;
    }

    .activity-card {
        background: var(--white);
        border: 1px solid var(--gray-200);
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.3s ease;
        text-decoration: none;
        color: inherit;
        display: block;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
    }

    .activity-card:hover {
        transform: translateY(-6px);
        border-color: var(--green-300);
        box-shadow: 0 15px 40px rgba(0,0,0,0.08), 0 0 0 1px var(--green-300);
        color: inherit;
    }

    .activity-thumb {
        width: 100%;
        height: 220px;
        object-fit: cover;
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: center;
        color: var(--gray-300);
        font-size: 2.5rem;
        position: relative;
        overflow: hidden;
    }

    .activity-thumb img {
        width: 100%; height: 100%; object-fit: cover;
    }

    .activity-category {
        position: absolute;
        top: 12px; left: 12px;
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid var(--green-200);
        color: var(--green-700);
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.35rem 0.8rem;
        border-radius: 50px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }

    .activity-body { padding: 1.5rem; }

    .activity-meta {
        display: flex;
        align-items: center;
        gap: 1rem;
        font-size: 0.8rem;
        color: var(--gray-500);
        margin-bottom: 0.75rem;
    }

    .activity-meta i { color: var(--green-600); }

    .activity-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: var(--gray-900);
        margin-bottom: 0.75rem;
        line-height: 1.4;
    }

    .activity-desc {
        font-size: 0.9rem;
        color: var(--gray-600);
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    /* GALLERY */
    .gallery-section {
        background: var(--gray-50);
        border-top: 1px solid var(--gray-200);
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1rem;
    }

    .gallery-item {
        border-radius: 16px;
        overflow: hidden;
        aspect-ratio: 1;
        cursor: pointer;
        position: relative;
        background: var(--gray-200);
        box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    }

    .gallery-item:first-child {
        grid-column: span 2;
        grid-row: span 2;
    }

    .gallery-item img {
        width: 100%; height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .gallery-item:hover img { transform: scale(1.08); }

    .gallery-overlay {
        position: absolute;
        inset: 0;
        background: rgba(85, 96, 23, 0.7);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: opacity 0.3s;
        font-size: 2rem;
        color: white;
    }

    .gallery-item:hover .gallery-overlay { opacity: 1; }

    .gallery-placeholder {
        width: 100%; height: 100%;
        background: var(--gray-100);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        color: var(--gray-300);
    }

    @media (max-width: 1024px) {
        .hero-title { font-size: 3rem; }
        .activities-grid { grid-template-columns: 1fr 1fr; }
        .gallery-grid { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 768px) {
        .hero-content { grid-template-columns: 1fr; gap: 3rem; text-align: center; }
        .hero-title { font-size: 2.5rem; }
        .hero-subtitle { margin: 0 auto 2rem; }
        .hero-cta { justify-content: center; }
        .hero-visual { display: none; }
        .stats-grid { grid-template-columns: repeat(2, 1fr); }
        .stat-divider:nth-child(2) { border-left: none; }
        .welcome-grid { grid-template-columns: 1fr; gap: 2.5rem; }
        .activities-grid { grid-template-columns: 1fr; }
        .gallery-grid { grid-template-columns: repeat(2, 1fr); }
        .gallery-item:first-child { grid-column: span 2; grid-row: span 1; }
    }
</style>
@endpush

@section('content')
<!-- HERO SECTION -->
<section class="hero" id="beranda">
    <div class="hero-bg-pattern"></div>
    <div class="hero-grid-overlay"></div>
    <div class="hero-orb hero-orb-1"></div>
    <div class="hero-orb hero-orb-2"></div>

    <div class="hero-content">
        <div class="hero-text">
            <div class="hero-badge">
                <span class="dot"></span>
                Organisasi Resmi Paroki
            </div>
            <h1 class="hero-title">
                {{ $home?->hero_title ?? 'Orang Muda' }}<br>
                <span class="highlight">{{ 'Katolik' }}</span>
            </h1>
            <p class="hero-subtitle">
                {{ $home?->hero_subtitle ?? 'Bersama dalam Iman, Tumbuh dalam Kasih, Bergerak untuk Sesama.' }}
            </p>
            <div class="hero-cta">
                <a href="#tentang" class="btn btn-primary">
                    <i class="bi bi-info-circle"></i> Tentang Kami
                </a>
                <a href="#kegiatan" class="btn btn-outline">
                    <i class="bi bi-calendar-event"></i> Kegiatan
                </a>
            </div>
        </div>

        <div class="hero-visual">
            <div class="hero-card-center">
                @if($home?->hero_image)
                    <div class="hero-logo-inner" style="overflow:hidden;">
                        <img src="{{ Storage::url($home->hero_image) }}" alt="OMK" style="width:100%;height:100%;object-fit:cover;">
                    </div>
                @else
                    <div class="hero-logo-inner">OMK</div>
                @endif
            </div>
            <div class="hero-floating-stat stat-1">
                <div class="stat-num">{{ $home?->statistic_member ?? 50 }}+</div>
                <div class="stat-label">Anggota Aktif</div>
            </div>
            <div class="hero-floating-stat stat-2">
                <div class="stat-num">{{ $home?->statistic_activity ?? 25 }}+</div>
                <div class="stat-label">Total Kegiatan</div>
            </div>
        </div>
    </div>

    <div style="position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:2;animation:float 2s ease-in-out infinite;">
        <a href="#statistik" style="color:var(--green-700);font-size:1.75rem;text-decoration:none;opacity:0.7;">
            <i class="bi bi-chevron-double-down"></i>
        </a>
    </div>
</section>

<!-- STATS SECTION -->
<section class="stats-section" id="statistik">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item fade-in">
                <div class="num">{{ $leaders->count() ?? 15 }}+</div>
                <div class="label"><i class="bi bi-people-fill" style="color:#a2b435;margin-right:8px;"></i>Pengurus</div>
            </div>
            <div class="stat-item stat-divider fade-in">
                <div class="num">{{ $home?->statistic_member ?? 50 }}+</div>
                <div class="label"><i class="bi bi-person-fill" style="color:#a2b435;margin-right:8px;"></i>Anggota</div>
            </div>
            <div class="stat-item stat-divider fade-in">
                <div class="num">{{ $home?->statistic_activity ?? 25 }}+</div>
                <div class="label"><i class="bi bi-calendar-check-fill" style="color:#a2b435;margin-right:8px;"></i>Kegiatan</div>
            </div>
            <div class="stat-item stat-divider fade-in">
                <div class="num">{{ $galleries->count() ?? 100 }}+</div>
                <div class="label"><i class="bi bi-images" style="color:#a2b435;margin-right:8px;"></i>Foto Dokumentasi</div>
            </div>
        </div>
    </div>
</section>

<!-- WELCOME / SAMBUTAN KETUA -->
@if($home?->welcome_message)
<section class="section welcome-section" id="sambutan">
    <div class="container">
        <div class="welcome-grid">
            <div class="welcome-photo fade-in">
                <div class="photo-frame">
                    @if($home->welcome_photo)
                        <img src="{{ Storage::url($home->welcome_photo) }}" alt="{{ $home->welcome_name }}">
                    @else
                        <div class="photo-frame-placeholder">
                            <i class="bi bi-person-circle"></i>
                        </div>
                    @endif
                </div>
                <div class="photo-accent"></div>
            </div>
            <div class="welcome-content fade-in">
                <div class="section-badge">Sambutan</div>
                <h2>{{ $home->welcome_title ?? 'Sambutan Ketua OMK' }}</h2>
                <div class="ketua-name">
                    <i class="bi bi-star-fill"></i>
                    {{ $home->welcome_name ?? 'Ketua OMK' }}
                </div>
                <p class="welcome-text">{{ $home->welcome_message }}</p>
                <a href="#tentang" class="btn btn-outline">
                    <i class="bi bi-arrow-right"></i> Selengkapnya
                </a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- TENTANG SECTION -->
@if($about)
<section class="section tentang-section" id="tentang">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Identitas Kami</div>
            <h2>Tentang OMK</h2>
            <div class="divider"></div>
        </div>
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:5rem;align-items:center;" class="fade-in">
            <div>
                <h3 style="font-size:1.75rem;font-weight:800;color:var(--green-950);margin-bottom:1.5rem;">Sejarah Singkat</h3>
                <div style="color:var(--gray-600);line-height:1.9;font-size:1rem;margin-bottom:2rem;">
                    {!! nl2br(e(Str::limit($about->history, 800))) !!}
                </div>
                <div style="display:flex;gap:1rem;">
                    @if($about->vision)
                    <div style="background:var(--white);border:1px solid var(--green-200);border-radius:12px;padding:1.5rem;flex:1;box-shadow:0 4px 15px rgba(0,0,0,0.02);">
                        <h4 style="color:var(--green-700);font-size:1rem;font-weight:700;margin-bottom:0.5rem;"><i class="bi bi-bullseye"></i> Visi</h4>
                        <p style="color:var(--gray-600);font-size:0.9rem;line-height:1.7;">{{ $about->vision }}</p>
                    </div>
                    @endif
                </div>
            </div>
            <div style="position:relative;">
                @if($about->logo)
                <img src="{{ Storage::url($about->logo) }}" alt="Logo OMK" style="width:100%;max-width:380px;margin:0 auto;display:block;border-radius:16px;box-shadow:0 20px 40px rgba(0,0,0,0.06);">
                @else
                <div style="width:300px;height:300px;background:linear-gradient(135deg,var(--green-700),var(--green-600));border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:8rem;font-weight:900;color:white;margin:0 auto;box-shadow:0 15px 40px rgba(108,123,28,0.2);">OMK</div>
                @endif
                
                @if($about->pastor_name)
                <div style="background:var(--white);border:1px solid var(--green-200);border-radius:12px;padding:1.25rem;margin-top:1.5rem;display:flex;align-items:center;gap:1.25rem;box-shadow:0 10px 20px rgba(0,0,0,0.04);">
                    <div style="width:60px;height:60px;border-radius:50%;overflow:hidden;border:3px solid var(--green-500);flex-shrink:0;">
                        @if($about->pastor_photo)
                            <img src="{{ Storage::url($about->pastor_photo) }}" alt="Pastor" style="width:100%;height:100%;object-fit:cover;">
                        @else
                            <div style="width:100%;height:100%;background:var(--green-100);display:flex;align-items:center;justify-content:center;color:var(--green-700);font-size:1.5rem;"><i class="bi bi-person-fill"></i></div>
                        @endif
                    </div>
                    <div>
                        <h4 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.2rem;">{{ $about->pastor_name }}</h4>
                        <p style="color:var(--green-600);font-size:0.85rem;font-weight:500;">Pastor Pendamping OMK</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>
@endif

<!-- PENGURUS SECTION -->
<section class="section" style="background:var(--white);" id="pengurus">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Struktur Organisasi</div>
            <h2>Pengurus Inti</h2>
            <p>Kenali para pemimpin yang melayani dan menggerakkan OMK</p>
            <div class="divider"></div>
        </div>
        
        @if($leaders->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1.5rem;">
            @foreach($leaders->take(4) as $index => $leader)
            <div class="card fade-in" style="text-align:center;padding:2.5rem 1.5rem;border-radius:20px;
                {{ $index === 0 ? 'border-color:var(--green-300);background:var(--green-50);box-shadow:0 10px 30px rgba(108,123,28,0.1);' : '' }}">
                <div style="width:110px;height:110px;border-radius:50%;overflow:hidden;margin:0 auto 1.5rem;border:4px solid {{ $index === 0 ? 'var(--green-500)' : 'var(--green-200)' }};background:var(--white);">
                    @if($leader->photo)
                        <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--gray-300);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>
                
                @if($index === 0)
                <div style="display:inline-block;background:linear-gradient(135deg,var(--gold),var(--gold-light));color:#fff;font-size:0.75rem;font-weight:700;padding:0.25rem 1rem;border-radius:50px;margin-bottom:1rem;letter-spacing:0.05em;box-shadow:0 4px 10px rgba(212,175,55,0.3);">
                    ★ KETUA
                </div>
                @endif
                
                <h3 style="color:var(--gray-900);font-size:1.1rem;font-weight:700;margin-bottom:0.4rem;">{{ $leader->name }}</h3>
                <p style="color:var(--green-600);font-size:0.9rem;font-weight:600;margin-bottom:0.5rem;">{{ $leader->position }}</p>
                @if($leader->period)
                <p style="color:var(--gray-500);font-size:0.8rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                @endif
            </div>
            @endforeach
        </div>
        
        @if($leaders->count() > 4)
        <div style="text-align:center;margin-top:3rem;" class="fade-in">
            <a href="{{ route('leaders') }}" class="btn btn-outline">Lihat Semua Pengurus</a>
        </div>
        @endif
        @else
        <div style="text-align:center;color:var(--gray-500);">Belum ada data pengurus.</div>
        @endif
    </div>
</section>

<!-- ANGGOTA SECTION -->
<section class="section" style="background:var(--gray-50);border-top:1px solid var(--gray-200);" id="anggota">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Komunitas</div>
            <h2>Anggota OMK</h2>
            <p>Berjalan bersama dalam pelayanan dan persaudaraan</p>
            <div class="divider"></div>
        </div>

        @if($members->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1.5rem;margin-bottom:2rem;">
            @foreach($members->take(5) as $member)
            <div class="card fade-in" style="text-align:center;padding:2rem 1rem;">
                <div style="width:80px;height:80px;border-radius:50%;overflow:hidden;margin:0 auto 1.25rem;border:3px solid var(--green-200);background:var(--gray-100);">
                    @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--gray-400);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>
                <h4 style="color:var(--gray-900);font-size:0.95rem;font-weight:700;margin-bottom:0.35rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $member->name }}</h4>
                @if($member->division)
                <p style="color:var(--green-600);font-size:0.8rem;font-weight:500;">{{ $member->division }}</p>
                @endif
            </div>
            @endforeach
            @if($members->count() > 5)
            <a href="{{ route('members') }}" class="card fade-in" style="text-align:center;padding:2rem 1rem;background:var(--green-50);border:2px dashed var(--green-300);display:flex;flex-direction:column;align-items:center;justify-content:center;text-decoration:none;color:var(--green-700);">
                <div style="width:70px;height:70px;border-radius:50%;background:var(--white);display:flex;align-items:center;justify-content:center;font-size:1.75rem;margin-bottom:0.75rem;box-shadow:0 4px 10px rgba(0,0,0,0.05);">
                    +{{ $members->count() - 5 }}
                </div>
                <span style="font-size:0.9rem;font-weight:700;">Lihat Semua</span>
            </a>
            @endif
        </div>
        @else
        <div style="text-align:center;color:var(--gray-500);">Belum ada data anggota.</div>
        @endif
    </div>
</section>

<!-- KEGIATAN SECTION -->
<section class="section activities-section" id="kegiatan">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Program Kami</div>
            <h2>Kegiatan Terbaru</h2>
            <p>Dokumentasi kegiatan dan program yang telah kami laksanakan bersama</p>
            <div class="divider"></div>
        </div>

        @if($activities->count() > 0)
        <div class="activities-grid">
            @foreach($activities->take(3) as $activity)
            <a href="{{ route('activity.detail', $activity->slug) }}" class="activity-card fade-in">
                <div class="activity-thumb">
                    @if($activity->thumbnail)
                        <img src="{{ Storage::url($activity->thumbnail) }}" alt="{{ $activity->title }}">
                    @else
                        <i class="bi bi-calendar-event-fill"></i>
                    @endif
                    @if($activity->category)
                    <span class="activity-category">{{ $activity->category->name }}</span>
                    @endif
                </div>
                <div class="activity-body">
                    <div class="activity-meta">
                        @if($activity->activity_date)
                        <span><i class="bi bi-calendar3"></i> {{ $activity->activity_date->format('d M Y') }}</span>
                        @endif
                        @if($activity->location)
                        <span><i class="bi bi-geo-alt"></i> {{ Str::limit($activity->location, 15) }}</span>
                        @endif
                    </div>
                    <div class="activity-title">{{ $activity->title }}</div>
                    @if($activity->description)
                    <div class="activity-desc">{{ strip_tags($activity->description) }}</div>
                    @endif
                </div>
            </a>
            @endforeach
        </div>

        @if($activities->count() > 3)
        <div style="text-align:center;margin-top:3rem;" class="fade-in">
            <a href="{{ route('activities') }}" class="btn btn-outline">
                <i class="bi bi-grid-3x3-gap"></i> Lihat Semua Kegiatan
            </a>
        </div>
        @endif
        @else
        <div style="text-align:center;color:var(--gray-500);">Belum ada kegiatan yang tersedia.</div>
        @endif
    </div>
</section>

<!-- GALERI SECTION -->
<section class="section gallery-section" id="galeri">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Dokumentasi</div>
            <h2>Galeri Terpilih</h2>
            <p>Momen-momen berharga dalam setiap kegiatan dan perjalanan OMK</p>
            <div class="divider"></div>
        </div>

        @if($galleries->count() > 0)
        <div class="gallery-grid fade-in">
            @foreach($galleries->take(8) as $photo)
            <div class="gallery-item" onclick="openLightbox('{{ Storage::url($photo->image) }}', '{{ $photo->caption }}')">
                <img src="{{ Storage::url($photo->image) }}" alt="{{ $photo->caption ?? 'Galeri OMK' }}" loading="lazy">
                <div class="gallery-overlay">
                    <i class="bi bi-zoom-in"></i>
                </div>
            </div>
            @endforeach
        </div>
        
        @if($galleries->count() > 8)
        <div style="text-align:center;margin-top:3rem;" class="fade-in">
            <a href="{{ route('gallery') }}" class="btn btn-primary">
                <i class="bi bi-images"></i> Lihat Galeri Lengkap
            </a>
        </div>
        @endif
        @else
        <div class="gallery-grid fade-in">
            @for($i = 0; $i < 4; $i++)
            <div class="gallery-item">
                <div class="gallery-placeholder"><i class="bi bi-image"></i></div>
            </div>
            @endfor
        </div>
        @endif
    </div>
</section>

<!-- KONTAK SECTION -->
<section class="section" style="background:var(--white);" id="kontak">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Hubungi Kami</div>
            <h2>Kontak & Lokasi</h2>
            <p>Kami siap membantu dan menjawab pertanyaan Anda</p>
            <div class="divider"></div>
        </div>
        
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:start;" class="fade-in">
            <div>
                <div style="display:flex;flex-direction:column;gap:2rem;">
                    @if($contact?->address)
                    <div style="display:flex;gap:1.5rem;align-items:flex-start;">
                        <div style="width:56px;height:56px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.5rem;color:var(--green-600);box-shadow:0 4px 10px rgba(0,0,0,0.02);">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.95rem;margin-bottom:0.35rem;">Alamat Sekretariat</p>
                            <p style="color:var(--gray-600);font-size:1rem;line-height:1.6;">{{ $contact->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if($contact?->phone)
                    <div style="display:flex;gap:1.5rem;align-items:flex-start;">
                        <div style="width:56px;height:56px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.5rem;color:var(--green-600);box-shadow:0 4px 10px rgba(0,0,0,0.02);">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.95rem;margin-bottom:0.35rem;">WhatsApp</p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="color:var(--gray-600);font-size:1rem;text-decoration:none;">{{ $contact->phone }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->instagram)
                    <div style="display:flex;gap:1.5rem;align-items:flex-start;">
                        <div style="width:56px;height:56px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.5rem;color:var(--green-600);box-shadow:0 4px 10px rgba(0,0,0,0.02);">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.95rem;margin-bottom:0.35rem;">Instagram</p>
                            <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" target="_blank" style="color:var(--gray-600);font-size:1rem;text-decoration:none;">{{ $contact->instagram }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div>
                @if($contact?->maps)
                <div style="border-radius:20px;overflow:hidden;border:1px solid var(--gray-200);height:100%;min-height:350px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">
                    <iframe src="{{ $contact->maps }}" width="100%" height="100%" style="border:0;min-height:350px;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                @else
                <div style="background:var(--green-50);border:1px dashed var(--green-300);border-radius:20px;padding:3rem;text-align:center;height:100%;display:flex;flex-direction:column;justify-content:center;">
                    <div style="font-size:3rem;margin-bottom:1rem;">🤝</div>
                    <h3 style="color:var(--green-950);font-size:1.35rem;font-weight:800;margin-bottom:0.75rem;">Bergabung Bersama Kami</h3>
                    <p style="color:var(--gray-600);font-size:0.95rem;line-height:1.7;">Kami selalu terbuka untuk menyambut anggota baru yang ingin berkarya bersama dalam pelayanan gereja dan masyarakat.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- LIGHTBOX -->
<div id="lightbox" style="display:none;position:fixed;inset:0;background:rgba(15, 23, 42, 0.95);z-index:9999;align-items:center;justify-content:center;flex-direction:column;gap:1rem;backdrop-filter:blur(5px);" onclick="closeLightbox()">
    <img id="lightbox-img" src="" alt="" style="max-width:90vw;max-height:80vh;border-radius:16px;object-fit:contain;box-shadow:0 20px 50px rgba(0,0,0,0.5);">
    <p id="lightbox-caption" style="color:white;font-size:1rem;font-weight:500;"></p>
    <button onclick="closeLightbox()" style="position:absolute;top:1.5rem;right:1.5rem;background:rgba(255,255,255,0.1);border:1px solid rgba(255,255,255,0.2);color:white;width:44px;height:44px;border-radius:50%;font-size:1.25rem;cursor:pointer;transition:all 0.2s;">
        <i class="bi bi-x-lg"></i>
    </button>
</div>
@endsection

@push('scripts')
<script>
function openLightbox(src, caption) {
    document.getElementById('lightbox-img').src = src;
    document.getElementById('lightbox-caption').textContent = caption || '';
    document.getElementById('lightbox').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}
function closeLightbox() {
    document.getElementById('lightbox').style.display = 'none';
    document.body.style.overflow = '';
}
document.addEventListener('keydown', e => { if(e.key === 'Escape') closeLightbox(); });
</script>
@endpush
