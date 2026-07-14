@extends('layouts.public')
@section('title', 'OMK | Kegiatan')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Kegiatan</nav>
        <h1 class="page-title">Kegiatan OMK</h1>
        <p class="page-subtitle">Berbagai kegiatan dan program yang kami laksanakan</p>
    </div>
</section>
<section class="section" style="background:var(--gray-50);">
    <div class="container">
        <!-- Filter -->
        <form method="GET" style="display:flex;gap:1rem;margin-bottom:2.5rem;flex-wrap:wrap;background:var(--white);padding:1.25rem;border-radius:14px;border:1px solid var(--gray-200);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
            <input type="text" name="search" class="form-input" placeholder="Cari kegiatan..." value="{{ request('search') }}" style="flex:1;min-width:200px;">
            <button type="submit" class="btn btn-primary" style="flex-shrink:0;"><i class="bi bi-search"></i> Cari</button>
            @if(request('search'))
            <a href="{{ route('activities') }}" class="btn btn-outline" style="flex-shrink:0;"><i class="bi bi-x"></i> Reset</a>
            @endif
        </form>

        @if($activities->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(280px,1fr));gap:1.5rem;margin-bottom:2rem;">
            @foreach($activities as $activity)
            <a href="{{ route('activity.detail', $activity->slug) }}" class="card fade-in" style="text-decoration:none;color:inherit;display:block;">
                <div style="height:210px;overflow:hidden;background:var(--green-50);position:relative;">
                    @if($activity->thumbnail)
                        <img src="{{ Storage::url($activity->thumbnail) }}" alt="{{ $activity->title }}" style="width:100%;height:100%;object-fit:cover;transition:transform 0.4s;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;color:var(--gray-300);">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                    @endif
                    @if($activity->category)
                    <span style="position:absolute;top:12px;left:12px;background:rgba(255,255,255,0.95);border:1px solid var(--green-200);color:var(--green-700);font-size:0.75rem;font-weight:700;padding:0.3rem 0.8rem;border-radius:50px;box-shadow:0 4px 10px rgba(0,0,0,0.08);">
                        {{ $activity->category->name }}
                    </span>
                    @endif
                </div>
                <div style="padding:1.5rem;">
                    <div style="display:flex;gap:1rem;font-size:0.78rem;color:var(--gray-500);margin-bottom:0.75rem;">
                        @if($activity->activity_date)<span><i class="bi bi-calendar3" style="color:var(--green-600);"></i> {{ $activity->activity_date->format('d M Y') }}</span>@endif
                        @if($activity->location)<span><i class="bi bi-geo-alt" style="color:var(--green-600);"></i> {{ $activity->location }}</span>@endif
                    </div>
                    <h3 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.75rem;line-height:1.4;">{{ $activity->title }}</h3>
                    @if($activity->description)
                    <p style="color:var(--gray-500);font-size:0.85rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:1rem;">{{ strip_tags($activity->description) }}</p>
                    @endif
                    <span style="color:var(--green-700);font-size:0.8rem;font-weight:600;">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="pagination">{{ $activities->appends(request()->query())->links('pagination::simple-bootstrap-5') }}</div>
        @else
        <div style="text-align:center;padding:4rem 0;color:var(--gray-400);">
            <i class="bi bi-calendar-x" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Tidak ada kegiatan ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection
