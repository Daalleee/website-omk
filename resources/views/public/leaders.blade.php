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

<section class="section" style="background:var(--white);">
    <div class="container">
        @if($leaders->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(240px,1fr));gap:1.5rem;">
            @foreach($leaders as $index => $leader)
            <div class="card fade-in" style="text-align:center;padding:2.5rem 1.5rem;border-radius:20px;
                {{ $index === 0 ? 'border-color:var(--green-300);background:var(--green-50);box-shadow:0 10px 30px rgba(108,123,28,0.1);' : '' }}">
                <div style="width:110px;height:110px;border-radius:50%;overflow:hidden;margin:0 auto 1.5rem;border:4px solid {{ $index === 0 ? 'var(--green-500)' : 'var(--green-200)' }};background:var(--gray-100);">
                    @if($leader->photo)
                        <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2.75rem;color:var(--gray-300);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>

                @if($index === 0)
                <div style="display:inline-block;background:linear-gradient(135deg,#d4af37,#f0d060);color:#000;font-size:0.75rem;font-weight:700;padding:0.25rem 1rem;border-radius:50px;margin-bottom:1rem;letter-spacing:0.05em;box-shadow:0 4px 10px rgba(212,175,55,0.25);">
                    ★ KETUA
                </div>
                @endif

                <h3 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.4rem;">{{ $leader->name }}</h3>
                <p style="color:var(--green-600);font-size:0.9rem;font-weight:600;margin-bottom:0.5rem;">{{ $leader->position }}</p>
                @if($leader->period)
                <p style="color:var(--gray-500);font-size:0.8rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                @endif
                @if($leader->motto)
                <p style="color:var(--gray-500);font-size:0.8rem;font-style:italic;border-top:1px solid var(--gray-200);padding-top:0.75rem;margin-top:0.75rem;">
                    "{{ $leader->motto }}"
                </p>
                @endif
            </div>
            @endforeach
        </div>
        @else
        <div style="text-align:center;padding:4rem 0;color:var(--gray-400);">
            <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Data pengurus belum tersedia.</p>
        </div>
        @endif
    </div>
</section>
@endsection
