@extends('layouts.public')
@section('title', 'Kontak OMK')
@section('content')
<section class="page-hero">
    <div class="container page-hero-content">
        <nav class="breadcrumb"><a href="{{ route('home') }}">Beranda</a> <i class="bi bi-chevron-right"></i> Kontak</nav>
        <h1 class="page-title">Hubungi Kami</h1>
        <p class="page-subtitle">Kami siap menjawab pertanyaan Anda</p>
    </div>
</section>
<section class="section" style="background:var(--white);">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:start;">
            <!-- Info Kontak -->
            <div class="fade-in">
                <h2 style="color:var(--green-950);font-size:1.75rem;font-weight:800;margin-bottom:2rem;">Informasi Kontak</h2>
                <div style="display:flex;flex-direction:column;gap:1.5rem;">
                    @if($contact?->address)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:52px;height:52px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.35rem;color:var(--green-600);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.9rem;margin-bottom:0.25rem;">Alamat</p>
                            <p style="color:var(--gray-600);font-size:0.95rem;line-height:1.7;">{{ $contact->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if($contact?->phone)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:52px;height:52px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.35rem;color:var(--green-600);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.9rem;margin-bottom:0.25rem;">WhatsApp</p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--green-600)'" onmouseout="this.style.color='var(--gray-600)'">{{ $contact->phone }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->instagram)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:52px;height:52px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.35rem;color:var(--green-600);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.9rem;margin-bottom:0.25rem;">Instagram</p>
                            <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" target="_blank" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--green-600)'" onmouseout="this.style.color='var(--gray-600)'">{{ $contact->instagram }}</a>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Maps / Join CTA -->
            <div class="fade-in">
                @if($contact?->maps)
                <div style="border-radius:20px;overflow:hidden;margin-bottom:1.5rem;border:1px solid var(--gray-200);box-shadow:0 10px 30px rgba(0,0,0,0.04);">
                    <iframe src="{{ $contact->maps }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                @endif
                <div style="background:var(--green-50);border:1px solid var(--green-200);border-radius:20px;padding:2.25rem;text-align:center;box-shadow:0 4px 15px rgba(0,0,0,0.02);">
                    <div style="font-size:2.5rem;margin-bottom:1rem;">🤝</div>
                    <h3 style="color:var(--green-950);font-size:1.25rem;font-weight:800;margin-bottom:0.75rem;">Bergabung Bersama Kami</h3>
                    <p style="color:var(--gray-600);font-size:0.9rem;margin-bottom:1.75rem;line-height:1.7;">Kami selalu terbuka untuk menyambut anggota baru yang ingin berkarya bersama dalam pelayanan gereja dan masyarakat.</p>
                    @if($contact?->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" class="btn btn-primary">
                        <i class="bi bi-whatsapp"></i> Hubungi via WhatsApp
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
