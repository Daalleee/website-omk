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
            <div class="card fade-in" style="text-align:center;padding:1.75rem 1.25rem;border-radius:16px;">
                <div style="width:80px;height:80px;border-radius:50%;overflow:hidden;margin:0 auto 1rem;border:3px solid var(--green-200);background:var(--gray-100);">
                    @if($member->photo)
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:2rem;color:var(--gray-400);">
                            <i class="bi bi-person-fill"></i>
                        </div>
                    @endif
                </div>
                <h4 style="color:var(--gray-900);font-size:0.9rem;font-weight:700;margin-bottom:0.35rem;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;">{{ $member->name }}</h4>
                @if($member->division)
                <p style="color:var(--green-600);font-size:0.75rem;font-weight:500;margin-bottom:0.5rem;">{{ $member->division }}</p>
                @endif
                <span style="display:inline-block;padding:0.2rem 0.7rem;border-radius:50px;font-size:0.72rem;font-weight:600;
                    {{ $member->status === 'aktif' ? 'background:var(--green-100);color:var(--green-700);border:1px solid var(--green-200);' : 'background:#fee2e2;color:#b91c1c;border:1px solid #fecaca;' }}">
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
        <div style="text-align:center;padding:4rem 0;color:var(--gray-400);">
            <i class="bi bi-people" style="font-size:3rem;display:block;margin-bottom:1rem;"></i>
            <p>Tidak ada anggota ditemukan.</p>
        </div>
        @endif
    </div>
</section>
@endsection
