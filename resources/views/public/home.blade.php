@extends('layouts.public')

@section('title', 'Orang Muda Katolik St. Mikael Itci Kenangan')
@section('description', 'Website resmi Orang Muda Katolik. Bersama dalam iman, tumbuh dalam kasih, bergerak untuk sesama.')

@push('styles')
<style>
    /* HERO */
    .hero {
        min-height: 100vh;
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        background-color: var(--green-950);
    }

    .hero-bg-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: 0;
    }

    .hero-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(26, 30, 6, 0.85) 0%, rgba(43, 49, 10, 0.75) 100%);
        z-index: 1;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        width: 100%;
        max-width: 1300px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 0 2rem;
    }

    .hero-text-container {
        text-align: center;
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.1);
        border: 1px solid rgba(255, 255, 255, 0.2);
        color: white;
        padding: 0.4rem 1.25rem;
        border-radius: 50px;
        font-size: 0.8rem;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
        margin-bottom: 2rem;
        backdrop-filter: blur(5px);
    }

    .hero-badge .dot {
        width: 8px; height: 8px;
        background: var(--green-400);
        border-radius: 50%;
        animation: pulse-dot 2s infinite;
    }

    @keyframes pulse-dot {
        0%, 100% { opacity: 1; transform: scale(1); }
        50% { opacity: 0.5; transform: scale(0.8); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-15px); }
    }

    .hero-title {
        font-size: 4.5rem;
        font-weight: 800;
        line-height: 1.15;
        color: white;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .hero-title .highlight {
        color: #033403;
        text-shadow: 0 0 15px rgba(255,255,255,0.9), 0 0 30px rgba(255,255,255,0.5), 0 0 60px rgba(255,255,255,0.2);
    }

    .hero-subtitle {
        font-size: 1.15rem;
        color: rgba(255, 255, 255, 0.85);
        margin: 0 auto 3rem;
        line-height: 1.8;
        max-width: 600px;
    }

    .hero-cta {
        display: flex;
        gap: 1.25rem;
        flex-wrap: wrap;
        justify-content: center;
    }
    
    .btn-hero-outline {
        background: rgba(255, 255, 255, 0.1);
        color: white;
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(5px);
    }
    .btn-hero-outline:hover {
        background: white;
        color: var(--green-950);
        border-color: white;
    }

    /* STATS BUTTON */
    .hero-stats-wrapper {
        position: absolute;
        right: 2rem;
        bottom: -8rem;
    }

    .stats-glass {
        background: rgba(255,255,255,0.1);
        backdrop-filter: blur(5px);
        -webkit-backdrop-filter: blur(5px);
        border: 1.5px solid rgba(255,255,255,0.3);
        border-radius: 10px;
        padding: 0.75rem 1.25rem;
        transition: all 0.25s ease;
    }

    .stats-glass:hover {
        background: rgba(255,255,255,0.2);
        border-color: rgba(255,255,255,0.5);
        transform: translateY(-2px);
    }

    .stats-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem 1.25rem;
    }

    .stat-item {
        text-align: center;
    }

    .stat-item .num {
        font-size: 1.15rem;
        font-weight: 700;
        color: white;
        line-height: 1.2;
    }

    .stat-item .label {
        color: rgba(255,255,255,0.85);
        font-size: 0.7rem;
        font-weight: 500;
    }

    /* WELCOME */
    .welcome-section {
        background: var(--white);
    }

    .welcome-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0.5rem;
        align-items: start;
    }

    .welcome-photo {
        position: relative;
        max-width: 320px;
        justify-self: center;
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

    .welcome-content {
        margin-left: -2rem;
        width: min-content;
    }

    .welcome-content h2 {
        white-space: nowrap;
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
        top: 8px; left: 8px;
        background: rgba(255, 255, 255, 0.95);
        border: 1px solid var(--green-200);
        color: var(--green-700);
        font-size: 0.65rem;
        font-weight: 600;
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
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
        .hero-stats-wrapper { position: static; margin-top: 3rem; }
        .stats-grid { gap: 0.75rem; }
        .activities-grid { grid-template-columns: 1fr 1fr; }
        .gallery-grid { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 768px) {
        .hero { min-height: 100vh; }
        .hero-content { padding: 11rem 1rem 0; }
        .hero-title { font-size: 2.2rem; margin-bottom: 1rem; }
        .hero-subtitle { font-size: 0.95rem; margin-bottom: 2rem; line-height: 1.7; }
        .hero-badge { font-size: 0.7rem; padding: 0.35rem 1rem; margin-bottom: 1.5rem; }
        .hero-cta { gap: 0.75rem; }
        .hero-cta .btn { padding: 0.75rem 1.5rem !important; font-size: 0.9rem !important; }
        .hero-visual { display: none; }
        .hero-stats-wrapper { position: static; margin-top: 4rem; }
        .stats-grid { gap: 0.35rem 0.75rem; }
        .stats-glass { padding: 0.5rem 0.85rem; }
        .stat-item .num { font-size: 0.85rem; }
        .stat-item .label { font-size: 0.6rem; }
        .welcome-grid { grid-template-columns: 1fr; gap: 2rem; }
        .welcome-photo { max-width: 220px; }
        .welcome-content { margin-left: 0; width: auto; text-align: center; }
        .welcome-content h2 { font-size: 1.5rem; white-space: normal; }
        .welcome-text { font-size: 0.9rem; }
        .welcome-content .btn { margin: 0 auto; }
        .photo-accent { display: none; }
        .activities-grid { grid-template-columns: 1fr; }
        .activity-thumb { height: 180px; }
        .activity-body { padding: 1rem; }
        .activity-title { font-size: 1rem; }
        .gallery-grid { grid-template-columns: repeat(2, 1fr); gap: 0.6rem; }
        .gallery-item { border-radius: 10px; }
        .gallery-item:first-child { grid-column: span 2; grid-row: span 1; }
    }

    @media (max-width: 480px) {
        .hero { min-height: 100vh; }
        .hero-content { padding: 10rem 1rem 0; }
        .hero-title { font-size: 1.85rem; }
        .hero-subtitle { font-size: 0.88rem; }
        .hero-cta { flex-direction: row; flex-wrap: wrap; justify-content: center; gap: 0.5rem; }
        .hero-stats-wrapper { margin-top: 3rem; }
        .stats-grid { gap: 0.25rem 0.5rem; }
        .stats-glass { padding: 0.4rem 0.75rem; }
        .stat-item .num { font-size: 0.8rem; }
        .stat-item .label { font-size: 0.55rem; }
        .welcome-photo { max-width: 180px; }
        .welcome-content h2 { font-size: 1.35rem; }
        .activity-thumb { height: 160px; }
        .gallery-grid { gap: 0.4rem; }
    }
</style>
@endpush

@section('content')
<!-- HERO SECTION -->
<section class="hero" id="beranda">
    @if($home?->hero_image)
        <img src="{{ Storage::url($home->hero_image) }}" alt="Banner OMK" class="hero-bg-image">
    @endif
    <div class="hero-overlay"></div>

    <div class="hero-content">
        <div class="hero-text-container">
            <h1 class="hero-title fade-in" style="transition-delay: 0.1s;">
                {{ $home?->hero_title ?? 'Orang Muda' }}<br>
                <span class="highlight">{{ $home?->hero_tagline ?? 'Katolik' }}</span>
            </h1>
            <p class="hero-subtitle fade-in" style="transition-delay: 0.2s;">
                {{ $home?->hero_subtitle ?? 'Bersama dalam Iman, Tumbuh dalam Kasih, Bergerak untuk Sesama.' }}
            </p>
            <div class="hero-cta fade-in" style="transition-delay: 0.3s;">
                <a href="#tentang" class="btn btn-primary" style="padding: 0.875rem 2.25rem; font-size: 1rem;">
                    <i class="bi bi-info-circle"></i> Tentang Kami
                </a>
                <a href="#kegiatan" class="btn btn-hero-outline" style="padding: 0.875rem 2.25rem; font-size: 1rem; border-radius: 10px; display: inline-flex; align-items: center; gap: 0.5rem; font-weight: 600; text-decoration: none; transition: all 0.25s ease;">
                    <i class="bi bi-calendar-event"></i> Kegiatan
                </a>
            </div>
        </div>

        <div class="hero-stats-wrapper fade-in" style="transition-delay: 0.4s;">
            <div class="stats-glass">
                <div class="stats-grid">
                    <div class="stat-item">
                        <div class="num">{{ $leaders->count() }}</div>
                        <div class="label"><i class="bi bi-people-fill"></i> Pengurus</div>
                    </div>
                    <div class="stat-item">
                        <div class="num">{{ $members->count() }}</div>
                        <div class="label"><i class="bi bi-person-fill"></i> Anggota</div>
                    </div>
                    <div class="stat-item">
                        <div class="num">{{ $activities->count() }}</div>
                        <div class="label"><i class="bi bi-calendar-check-fill"></i> Kegiatan</div>
                    </div>
                    <div class="stat-item">
                        <div class="num">{{ $galleries->count() }}</div>
                        <div class="label"><i class="bi bi-images"></i> Foto</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WELCOME / SAMBUTAN KETUA -->
@if($home?->welcome_message)
<section class="section welcome-section" style="background:var(--green-50);" id="sambutan">
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
                <p style="text-align:center;margin-top:0.75rem;font-weight:600;color:var(--green-700);">{{ $home->welcome_name ?? 'Ketua OMK' }}</p>
            </div>
            <div class="welcome-content fade-in">
                <h2>{{ $home->welcome_title ?? 'Sambutan Ketua OMK' }}</h2>
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
<!-- SEJARAH -->
<section class="section" style="background:var(--white);" id="tentang">
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
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:2rem;" class="fade-in visi-misi-grid">
            <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
                <h3 style="color:var(--green-800);font-size:1.75rem;font-weight:800;margin-bottom:1rem;text-align:center;">Visi</h3>
                <div style="color:var(--gray-600);line-height:1.8;text-align:left;font-size:1rem;" class="editor-content">
                    {!! $about->vision !!}
                </div>
            </div>
            <div style="background:var(--white);border:1px solid var(--green-200);border-radius:20px;padding:2rem;box-shadow:0 4px 15px rgba(0,0,0,0.03);">
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
            @media (max-width: 768px) {
                .visi-misi-grid { grid-template-columns: 1fr !important; gap: 1rem !important; }
                .visi-misi-grid > div { padding: 1.5rem !important; text-align: center !important; }
                .visi-misi-grid h3 { font-size: 1.35rem !important; }
                .visi-misi-grid .editor-content { text-align: center !important; }
                .visi-misi-grid .editor-content ul,
                .visi-misi-grid .editor-content ol { text-align: left; display: inline-block; }
            }
        </style>
    </div>
</section>

<!-- BAPAK PENDAMPING -->
@if($about->pastor_name)
<section class="section" style="background:var(--white);">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Pembimbing</div>
            <h2>Pendamping</h2>
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
            <p style="color:var(--green-600);font-size:0.9rem;margin-bottom:1rem;font-weight:600;">Pendamping OMK</p>
            @if($about->pastor_bio)
            <p style="color:var(--gray-600);font-size:0.9rem;line-height:1.7;">{{ str_replace('Pastor', 'Bapak', $about->pastor_bio) }}</p>
            @endif
        </div>
    </div>
</section>
@endif
@endif

<!-- PENGURUS SECTION -->
<section class="section" style="background:var(--white);" id="pengurus">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Struktur Organisasi</div>
            <h2>Pengurus</h2>
            <p>Kenali para pemimpin yang melayani dan menggerakkan OMK</p>
            <div class="divider"></div>
        </div>
        
        @php
            $homeGroups = ['pendamping' => 'Pendamping', 'inti' => 'Inti', 'kerohanian' => 'Bidang Kerohanian', 'sosial' => 'Bidang Sosial', 'seni_budaya' => 'Bidang Seni & Budaya', 'olahraga' => 'Bidang Olahraga', 'usaha' => 'Koordinator Usaha Dana', 'humas' => 'Hubungan Masyarakat', 'dokumentasi' => 'Dokumentasi', 'liturgi' => 'Koordinator Liturgi', 'perlengkapan' => 'Koordinator Perlengkapan'];
            $grouped = $leaders->groupBy('group');
        @endphp
        @if($leaders->count() > 0)
        <div style="display:flex;flex-direction:column;gap:2.5rem;">
            @foreach($homeGroups as $key => $label)
                @if(isset($grouped[$key]) && $grouped[$key]->count() > 0)
                <div class="fade-in">
                    @if($key === 'inti')
                        @php
                            $leaders = $grouped[$key];
                            $pimpinan = $leaders->filter(fn($l) => in_array($l->position, ['Ketua', 'Wakil Ketua']));
                            $staff = $leaders->filter(fn($l) => !in_array($l->position, ['Ketua', 'Wakil Ketua']));
                        @endphp
                        @if($pimpinan->count() > 0)
                        <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:1.5rem;margin-bottom:2.5rem;">
                            @foreach($pimpinan as $leader)
                            <div style="text-align:center;width:100%;max-width:260px;">
                                <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                                    @if($leader->photo)
                                        <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                                            <i class="bi bi-person-bounding-box"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.5rem;">{{ $leader->name }}</h3>
                                <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;">{{ $leader->position }}</span>
                                @if($leader->period)
                                <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                        @if($staff->count() > 0)
                        <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:1.5rem;">
                            @foreach($staff as $leader)
                            <div style="text-align:center;width:100%;max-width:260px;">
                                <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                                    @if($leader->photo)
                                        <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                                    @else
                                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                                            <i class="bi bi-person-bounding-box"></i>
                                        </div>
                                    @endif
                                </div>
                                <h3 style="color:var(--gray-900);font-size:1rem;font-weight:700;margin-bottom:0.5rem;">{{ $leader->name }}</h3>
                                <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;">{{ $leader->position }}</span>
                                @if($leader->period)
                                <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @endif
                    @else
                    <h3 style="color:var(--green-800);font-size:1.1rem;font-weight:700;margin-bottom:1rem;text-align:center;text-transform:uppercase;letter-spacing:0.05em;">{{ $label }}</h3>
                    <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:1.5rem;">
                        @foreach($grouped[$key] as $leader)
                        <div style="text-align:center;width:100%;max-width:260px;">
                            <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                                @if($leader->photo)
                                    <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                                        <i class="bi bi-person-bounding-box"></i>
                                    </div>
                                @endif
                            </div>
                            <h3 style="color:var(--gray-900);font-size:1rem;font-weight:700;margin-bottom:0.5rem;">{{ $leader->name }}</h3>
                            <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;">{{ $leader->position }}</span>
                            @if($leader->period)
                            <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
                @endif
            @endforeach
        </div>
        
        <div style="text-align:center;margin-top:3rem;" class="fade-in">
            <a href="{{ route('leaders') }}" class="btn btn-outline">Lihat Semua Pengurus</a>
        </div>
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
        <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:2rem;margin-bottom:2rem;">
            @foreach($members->take(5) as $member)
            <div class="fade-in" style="text-align:center;width:100%;max-width:240px;">
                <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                    @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                            <i class="bi bi-person-bounding-box"></i>
                        </div>
                    @endif
                </div>
                <h4 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.5rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $member->name }}</h4>
                <span style="display:inline-block;background:var(--green-100);color:var(--green-700);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.2rem 0.85rem;border-radius:50px;">Anggota</span>
                @if($member->period)
                <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $member->period }}</p>
                @endif
            </div>
            @endforeach
        </div>

        @if($members->count() > 5)
        <div style="text-align:center;margin-top:2rem;" class="fade-in">
            <a href="{{ route('members') }}" class="btn btn-outline">Lihat Semua Anggota</a>
        </div>
        @endif
        @else
        <div style="text-align:center;color:var(--gray-500);">Belum ada data anggota.</div>
        @endif
    </div>
</section>

<!-- KEGIATAN SECTION -->
<section class="section activities-section" style="background:var(--green-50);" id="kegiatan">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Program Kami</div>
            <h2>Kegiatan</h2>
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
<section class="section gallery-section" style="background:var(--white);" id="galeri">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Dokumentasi</div>
            <h2>Galeri</h2>
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
<section class="section" style="background:var(--gray-50);border-top:1px solid var(--gray-200);" id="kontak">
    <div class="container">
        <div class="section-title fade-in">
            <div class="section-badge">Hubungi Kami</div>
            <h2>Kontak & Lokasi</h2>
            <p>Kami siap membantu dan menjawab pertanyaan Anda</p>
            <div class="divider"></div>
        </div>
        
        <div class="fade-in" style="max-width:700px;margin:0 auto;">
            <div style="display:flex;flex-direction:column;gap:1.5rem;">
                @if($contact?->address)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <p style="color:var(--gray-600);font-size:0.95rem;line-height:1.6;">{{ $contact->address }}</p>
                    </div>
                </div>
                @endif
                @if($contact?->phone)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="tel:{{ $contact->phone }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->phone }}</a>
                    </div>
                </div>
                @endif
                @if($contact?->email)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="mailto:{{ $contact->email }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->email }}</a>
                    </div>
                </div>
                @endif
                @if($contact?->instagram)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" target="_blank" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->instagram }}</a>
                    </div>
                </div>
                @endif
            </div>

            @if($contact?->phone)
            <div style="text-align:center;margin-top:2.5rem;">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="display:inline-flex;align-items:center;gap:0.75rem;background:#033403;color:white;padding:1rem 2rem;border-radius:14px;font-size:1rem;font-weight:600;text-decoration:none;transition:all 0.2s;box-shadow:0 6px 20px rgba(5,59,0,0.25);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 30px rgba(5,59,0,0.35)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(5,59,0,0.25)'">
                    <i class="bi bi-whatsapp" style="font-size:1.5rem;"></i> Hubungi via WhatsApp
                </a>
            </div>
            @endif
        </div>

        @if($contact?->maps)
        <div style="margin-top:3rem;" class="fade-in">
            <div style="border-radius:20px;overflow:hidden;border:1px solid var(--gray-200);min-height:350px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">
                <iframe src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed&t=k" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        @endif
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
