@extends('layouts.public')

@section('title', 'OMK | Pengurus')

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
        @php
            $groups = ['inti' => 'Inti', 'pendamping' => 'Pendamping', 'kerohanian' => 'Bidang Kerohanian', 'sosial' => 'Bidang Sosial', 'seni_budaya' => 'Bidang Seni & Budaya', 'olahraga' => 'Bidang Olahraga', 'usaha' => 'Koordinator Usaha', 'liturgi' => 'Koordinator Liturgi', 'perlengkapan' => 'Koordinator Perlengkapan'];
            $grouped = $leaders->groupBy('group');
        @endphp
        @if($leaders->count() > 0)
        <div style="display:flex;flex-direction:column;gap:3rem;">
            @foreach($groups as $key => $label)
                @if(isset($grouped[$key]) && $grouped[$key]->count() > 0)
                <div class="fade-in">
                    @if($key !== 'inti')
                    <h3 style="color:var(--green-800);font-size:1.25rem;font-weight:700;margin-bottom:1.5rem;text-align:center;text-transform:uppercase;letter-spacing:0.05em;">{{ $label }}</h3>
                    @endif
                    <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:2rem;">
                        @foreach($grouped[$key] as $leader)
                        <div style="text-align:center;width:100%;max-width:{{ $key === 'inti' ? '260px' : '240px' }};">
                            <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                                @if($leader->photo)
                                    <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                                @else
                                    <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                                        <i class="bi bi-person-bounding-box"></i>
                                    </div>
                                @endif
                            </div>
                            <h3 style="color:var(--gray-900);font-size:{{ $key === 'inti' ? '1.1rem' : '1.05rem' }};font-weight:700;margin-bottom:0.5rem;">{{ $leader->name }}</h3>
                            <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;">{{ $leader->position }}</span>
                            @if($leader->period)
                            <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                            @endif
                        </div>
                        @endforeach
                    </div>
                </div>
                @endif
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
