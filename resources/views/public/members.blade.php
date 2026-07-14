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

<section class="section" style="background:#080f09;">
    <div class="container">
        <!-- Filter/Search -->
        <form method="GET" style="display:flex;gap:1rem;margin-bottom:2.5rem;flex-wrap:wrap;">
            <input type="text" name="search" class="form-input" placeholder="Cari anggota..." value="{{ request('search') }}" style="max-width:300px;">
            <select name="status" class="form-input" style="max-width:180px;">
                <option value="">Semua Status</option>
                <option value="aktif" {{ request('status') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="tidak aktif" {{ request('status') == 'tidak aktif' ? 'selected' : '' }}>Tidak Aktif</option>
            </select>
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
            @if(request('search') || request('status'))
            <a href="{{ route('members') }}" class="btn btn-outline"><i class="bi bi-x"></i> Reset</a>
            @endif
        </form>

        @if($members->count() > 0)
        <div style="display:grid;grid-template-columns:repeat(auto-fill,minmax(200px,1fr));gap:1.25rem;margin-bottom:2rem;">
            @foreach($members as $member)
            <div class="card fade-in" style="text-align:center;padding:1.75rem 1.25rem;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.08);border-radius:16px;">
                <div style="width:80px;height:80px;border-radius:50%;overflow:hidden;margin:0 auto 1rem;border:2px solid rgba(34,197,94,0.2);background:rgba(22,101,52,0.3);">
                    @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2rem;color:rgba(34,197,94,0.35);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>
                <h4 style="color:white;font-size:0.9rem;font-weight:600;margin-bottom:0.35rem;">{{ $member->name }}</h4>
                @if($member->division)
                <p style="color:var(--green-400);font-size:0.75rem;font-weight:500;margin-bottom:0.35rem;">{{ $member->division }}</p>
                @endif
                <span style="display:inline-block;padding:0.15rem 0.6rem;border-radius:50px;font-size:0.7rem;font-weight:600;
                    {{ $member->status === 'aktif' ? 'background:rgba(34,197,94,0.15);color:var(--green-400);border:1px solid rgba(34,197,94,0.2);' : 'background:rgba(239,68,68,0.1);color:#fca5a5;border:1px solid rgba(239,68,68,0.2);' }}">
                    {{ ucfirst($member->status) }}
                </span>
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
        <div style="text-align:center;padding:4rem 0;color:rgba(255,255,255,0.4);">
            <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Tidak ada anggota ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection
