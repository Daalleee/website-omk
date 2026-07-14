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
<section class="section" style="background:#080f09;">
    <div class="container">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;align-items:start;">
            <!-- Info Kontak -->
            <div class="fade-in">
                <h2 style="color:white;font-size:1.75rem;font-weight:700;margin-bottom:2rem;">Informasi Kontak</h2>
                <div style="display:flex;flex-direction:column;gap:1.5rem;">
                    @if($contact?->address)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:48px;height:48px;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-400);">
                            <i class="bi bi-geo-alt-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-400);font-weight:600;font-size:0.85rem;margin-bottom:0.25rem;">Alamat</p>
                            <p style="color:rgba(255,255,255,0.75);font-size:0.9rem;line-height:1.6;">{{ $contact->address }}</p>
                        </div>
                    </div>
                    @endif
                    @if($contact?->phone)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:48px;height:48px;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-400);">
                            <i class="bi bi-whatsapp"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-400);font-weight:600;font-size:0.85rem;margin-bottom:0.25rem;">WhatsApp</p>
                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="color:rgba(255,255,255,0.75);font-size:0.9rem;text-decoration:none;" onmouseover="this.style.color='var(--green-400)'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">{{ $contact->phone }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->email)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:48px;height:48px;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-400);">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-400);font-weight:600;font-size:0.85rem;margin-bottom:0.25rem;">Email</p>
                            <a href="mailto:{{ $contact->email }}" style="color:rgba(255,255,255,0.75);font-size:0.9rem;text-decoration:none;" onmouseover="this.style.color='var(--green-400)'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">{{ $contact->email }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->instagram)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:48px;height:48px;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-400);">
                            <i class="bi bi-instagram"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-400);font-weight:600;font-size:0.85rem;margin-bottom:0.25rem;">Instagram</p>
                            <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" target="_blank" style="color:rgba(255,255,255,0.75);font-size:0.9rem;text-decoration:none;" onmouseover="this.style.color='var(--green-400)'" onmouseout="this.style.color='rgba(255,255,255,0.75)'">{{ $contact->instagram }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->facebook)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:48px;height:48px;background:rgba(34,197,94,0.12);border:1px solid rgba(34,197,94,0.2);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-400);">
                            <i class="bi bi-facebook"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-400);font-weight:600;font-size:0.85rem;margin-bottom:0.25rem;">Facebook</p>
                            <p style="color:rgba(255,255,255,0.75);font-size:0.9rem;">{{ $contact->facebook }}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Maps / Join CTA -->
            <div class="fade-in">
                @if($contact?->maps)
                <div style="border-radius:16px;overflow:hidden;margin-bottom:1.5rem;border:1px solid rgba(34,197,94,0.2);">
                    <iframe src="{{ $contact->maps }}" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
                @endif
                <div style="background:rgba(34,197,94,0.07);border:1px solid rgba(34,197,94,0.2);border-radius:16px;padding:2rem;text-align:center;">
                    <div style="font-size:2.5rem;margin-bottom:1rem;">🤝</div>
                    <h3 style="color:white;font-size:1.25rem;font-weight:700;margin-bottom:0.75rem;">Bergabung Bersama Kami</h3>
                    <p style="color:rgba(255,255,255,0.6);font-size:0.9rem;margin-bottom:1.5rem;line-height:1.7;">Kami selalu terbuka untuk menyambut anggota baru yang ingin berkarya bersama dalam pelayanan gereja dan masyarakat.</p>
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
