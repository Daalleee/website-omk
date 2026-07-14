@extends('layouts.public')
@section('title', $activity->title . ' - OMK')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> <a href="{{ route('activities') }}">Kegiatan</a> <i class="bi bi-chevron-right"></i> {{ Str::limit($activity->title, 40) }}</nav>
        <h1 class="page-title" style="font-size:2rem;">{{ $activity->title }}</h1>
    </div>
</section>
<section class="section" style="background:var(--white);">
    <div class="container" style="max-width:900px;">
        @if($activity->banner)
        <img src="{{ Storage::url($activity->banner) }}" alt="{{ $activity->title }}" style="width:100%;border-radius:16px;margin-bottom:2rem;max-height:450px;object-fit:cover;">
        @elseif($activity->thumbnail)
        <img src="{{ Storage::url($activity->thumbnail) }}" alt="{{ $activity->title }}" style="width:100%;border-radius:16px;margin-bottom:2rem;max-height:450px;object-fit:cover;">
        @endif

        <div style="display:flex;gap:1.5rem;flex-wrap:wrap;margin-bottom:2rem;">
            @if($activity->category)<span style="background:var(--green-100);border:1px solid var(--green-300);color:var(--green-800);padding:0.35rem 0.875rem;border-radius:50px;font-size:0.8rem;font-weight:600;">{{ $activity->category->name }}</span>@endif
            @if($activity->activity_date)<span style="color:var(--gray-500);font-size:0.875rem;"><i class="bi bi-calendar3" style="color:var(--green-600);"></i> {{ $activity->activity_date->format('d F Y') }}</span>@endif
            @if($activity->location)<span style="color:var(--gray-500);font-size:0.875rem;"><i class="bi bi-geo-alt-fill" style="color:var(--green-600);"></i> {{ $activity->location }}</span>@endif
        </div>

        @if($activity->description)
        <div style="color:var(--gray-700);line-height:1.9;font-size:0.95rem;margin-bottom:3rem;">
            {!! nl2br(e($activity->description)) !!}
        </div>
        @endif

        <div style="margin-top:3rem;padding-top:2rem;border-top:1px solid var(--gray-200);text-align:center;">
            <a href="{{ route('activities') }}" class="btn btn-outline"><i class="bi bi-arrow-left"></i> Kembali ke Kegiatan</a>
        </div>
    </div>
</section>
@endsection
