@extends('layouts.public')
@section('title', 'Kegiatan OMK')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Kegiatan</nav>
        <h1 class="page-title">Kegiatan OMK</h1>
        <p class="page-subtitle">Berbagai kegiatan dan program yang kami laksanakan</p>
    </div>
</section>
<section class="section" style="background:#080f09;">
    <div class="container">
        <form method="GET" style="display:flex;gap:1rem;margin-bottom:2.5rem;flex-wrap:wrap;">
            <input type="text" name="search" class="form-input" placeholder="Cari kegiatan..." value="{{ request('search') }}" style="max-width:280px;">
            <select name="category" class="form-input" style="max-width:200px;">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
            <select name="year" class="form-input" style="max-width:130px;">
                <option value="">Semua Tahun</option>
                @foreach($years as $year)
                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Filter</button>
            @if(request()->anyFilled(['search','category','year']))
            <a href="{{ route('activities') }}" class="btn btn-outline"><i class="bi bi-x"></i> Reset</a>
            @endif
        </form>
        @if($activities->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(320px,1fr));gap:1.5rem;margin-bottom:2rem;">
            @foreach($activities as $activity)
            <a href="{{ route('activity.detail', $activity->slug) }}" class="card fade-in" style="text-decoration:none;color:inherit;display:block;">
                <div style="height:200px;overflow:hidden;background:linear-gradient(135deg,#166534,#14532d);position:relative;">
                    @if($activity->thumbnail)
                        <img src="{{ Storage::url($activity->thumbnail) }}" alt="{{ $activity->title }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:3rem;color:rgba(255,255,255,0.2);">
                            <i class="bi bi-calendar-event-fill"></i>
                        </div>
                    @endif
                    @if($activity->category)
                    <span style="position:absolute;top:12px;left:12px;background:rgba(5,46,22,0.85);border:1px solid rgba(34,197,94,0.3);color:var(--green-400);font-size:0.7rem;font-weight:600;padding:0.25rem 0.6rem;border-radius:50px;">
                        {{ $activity->category->name }}
                    </span>
                    @endif
                </div>
                <div style="padding:1.5rem;">
                    <div style="display:flex;gap:1rem;font-size:0.78rem;color:rgba(255,255,255,0.45);margin-bottom:0.75rem;">
                        @if($activity->activity_date)<span><i class="bi bi-calendar3" style="color:var(--green-500);"></i> {{ $activity->activity_date->format('d M Y') }}</span>@endif
                        @if($activity->location)<span><i class="bi bi-geo-alt" style="color:var(--green-500);"></i> {{ $activity->location }}</span>@endif
                    </div>
                    <h3 style="color:white;font-size:1.05rem;font-weight:600;margin-bottom:0.75rem;line-height:1.4;">{{ $activity->title }}</h3>
                    @if($activity->description)
                    <p style="color:rgba(255,255,255,0.5);font-size:0.85rem;display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;margin-bottom:1rem;">{{ strip_tags($activity->description) }}</p>
                    @endif
                    <span style="color:var(--green-400);font-size:0.8rem;font-weight:600;">Baca Selengkapnya <i class="bi bi-arrow-right"></i></span>
                </div>
            </a>
            @endforeach
        </div>
        <div class="pagination">{{ $activities->appends(request()->query())->links('pagination::simple-bootstrap-5') }}</div>
        @else
        <div style="text-align:center;padding:4rem 0;color:rgba(255,255,255,0.4);">
            <i class="bi bi-calendar-x" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Tidak ada kegiatan ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection
