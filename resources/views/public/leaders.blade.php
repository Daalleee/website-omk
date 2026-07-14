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
        @if($leaders->count() > 0)
        <div style="display:flex;flex-direction:column;gap:3rem;">
            <!-- Baris 1: Ketua & Wakil -->
            <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:2rem;">
                @foreach($leaders->take(2) as $index => $leader)
                <div class="fade-in" style="text-align:center;width:100%;max-width:260px;">
                    <div style="width:100%;aspect-ratio:3/4;border-radius:16px;overflow:hidden;margin:0 auto 1.25rem;background:var(--green-50);box-shadow:0 8px 20px rgba(108,123,28,0.12);">
                        @if($leader->photo)
                            <img src="{{ Storage::url($leader->photo) }}" alt="{{ $leader->name }}" style="width:100%;height:100%;object-fit:cover;">
                        @else
                            <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:4rem;color:var(--gray-300);">
                                <i class="bi bi-person-bounding-box"></i>
                            </div>
                        @endif
                    </div>

                    <h3 style="color:var(--gray-900);font-size:1.1rem;font-weight:700;margin-bottom:0.5rem;">{{ $leader->name }}</h3>
                    <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;">{{ $leader->position }}</span>
                    @if($leader->period)
                    <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                    @endif
                </div>
                @endforeach
            </div>

            <!-- Baris 2+: Sekretaris, Bendahara, dll -->
            @if($leaders->count() > 2)
            <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:2rem;">
                @foreach($leaders->skip(2) as $leader)
                <div class="fade-in" style="text-align:center;width:100%;max-width:240px;">
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
                    <span style="display:inline-block;background:var(--green-100);color:var(--green-800);border:1px solid var(--green-300);font-size:0.72rem;font-weight:600;padding:0.3rem 1rem;border-radius:50px;letter-spacing:0.03em;">{{ $leader->position }}</span>
                    @if($leader->period)
                    <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $leader->period }}</p>
                    @endif
                </div>
                @endforeach
            </div>
            @endif
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
