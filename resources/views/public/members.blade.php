@extends('layouts.public')

@section('title', 'Anggota OMK - Orang Muda Katolik')

@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Anggota</nav>
        <h1 class="page-title">Daftar Anggota</h1>
        <p class="page-subtitle">Mengenal para anggota Orang Muda Katolik</p>
    </div>
</section>

<section class="section" style="background:var(--gray-50);">
    <div class="container">
        <!-- Filter/Search -->
        <form method="GET" style="display:flex;gap:1rem;margin-bottom:2.5rem;flex-wrap:wrap;background:var(--white);padding:1.25rem;border-radius:14px;border:1px solid var(--gray-200);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
            <input type="text" name="search" class="form-input" placeholder="Cari anggota..." value="{{ request('search') }}" style="flex:1;min-width:200px;">
            <button type="submit" class="btn btn-primary" style="flex-shrink:0;"><i class="bi bi-search"></i> Cari</button>
            @if(request('search'))
            <a href="{{ route('members') }}" class="btn btn-outline" style="flex-shrink:0;"><i class="bi bi-x"></i> Reset</a>
            @endif
        </form>

        @if($members->count() > 0)
        <div style="display:flex;justify-content:center;flex-wrap:wrap;gap:2rem;margin-bottom:2rem;">
            @foreach($members as $member)
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
                    <h4 style="color:var(--gray-900);font-size:1.05rem;font-weight:700;margin-bottom:0.5rem;">{{ $member->name }}</h4>
                    <span style="display:inline-block;background:var(--green-100);color:var(--green-700);border:1px solid var(--green-300);font-size:0.75rem;font-weight:600;padding:0.2rem 0.85rem;border-radius:50px;">Anggota</span>
                    @if($member->period)
                    <p style="color:var(--gray-400);font-size:0.75rem;margin-top:0.5rem;"><i class="bi bi-calendar3"></i> {{ $member->period }}</p>
                    @endif
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        @if($members->hasPages())
        <div class="pagination">
            {{ $members->appends(request()->query())->links('pagination::simple-bootstrap-5') }}
        </div>
        @endif
        @else
        <div style="text-align:center;padding:4rem 0;color:var(--gray-400);">
            <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Tidak ada anggota ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection
