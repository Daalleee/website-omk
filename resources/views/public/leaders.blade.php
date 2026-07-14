@extends('layouts.public')

@section('title', 'Pengurus OMK - Orang Muda Katolik')

@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Pengurus</nav>
        <h1 class="page-title">Struktur Pengurus</h1>
        <p class="page-subtitle">Kenali para pemimpin yang melayani OMK</p>
    </div>
</section>

<section class="section" style="background:#080f09;">
    <div class="container">
        @if($leaders->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1.5rem;">
            @foreach($leaders as $index => $leader)
            <div class="card fade-in" style="text-align:center;padding:2rem 1.5rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);border-radius:20px;transition:all 0.3s;
                {{ $index === 0 ? 'border-color:rgba(34,197,94,0.3);background:rgba(34,197,94,0.06);' : '' }}">
                <div style="width:100px;height:100px;border-radius:50%;overflow:hidden;margin:0 auto 1.25rem;border:3px solid {{ $index === 0 ? 'var(--green-500)' : 'rgba(34,197,94,0.2)' }};background:rgba(22,101,52,0.3);">
                    @if($leader->photo)
                        <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2.5rem;color:rgba(34,197,94,0.4);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>
                
                @if($index === 0)
                <div style="display:inline-block;background:linear-gradient(135deg,#d4af37,#f0d060);color:#000;font-size:0.7rem;font-weight:700;padding:0.2rem 0.75rem;border-radius:50px;margin-bottom:0.75rem;letter-spacing:0.05em;">
                    ★ KETUA
                </div>
                @endif
                
                <h3 style="color:white;font-size:1rem;font-weight:700;margin-bottom:0.35rem;">{{ $leader->name }}</h3>
                <p style="color:var(--green-400);font-size:0.8rem;font-weight:600;margin-bottom:0.35rem;">{{ $leader->position }}</p>
                @if($leader->period)
                <p style="color:rgba(255,255,255,0.45);font-size:0.75rem;margin-bottom:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                @endif
                @if($leader->motto)
                <p style="color:rgba(255,255,255,0.55);font-size:0.8rem;font-style:italic;border-top:1px solid rgba(255,255,255,0.08);padding-top:0.75rem;margin-top:0.5rem;">
                    "{{ $leader->motto }}"
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center;padding:4rem 0;color:rgba(255,255,255,0.4);">
            <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Data pengurus belum tersedia.</p>
        </div>
        @endif
    </div>
</section>
@endsection
