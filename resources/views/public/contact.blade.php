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
        @if(session('success'))
        <div style="background:var(--green-50);border:1px solid var(--green-200);color:var(--green-800);padding:1rem 1.5rem;border-radius:12px;margin-bottom:2rem;display:flex;align-items:center;gap:0.75rem;font-weight:600;">
            <i class="bi bi-check-circle-fill" style="color:var(--green-600);"></i> {{ session('success') }}
        </div>
        @endif
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:4rem;margin-bottom:3rem;align-items:start;">
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
                    @if($contact?->email)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:52px;height:52px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.35rem;color:var(--green-600);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                            <i class="bi bi-envelope-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.9rem;margin-bottom:0.25rem;">Email</p>
                            <a href="mailto:{{ $contact->email }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--green-600)'" onmouseout="this.style.color='var(--gray-600)'">{{ $contact->email }}</a>
                        </div>
                    </div>
                    @endif
                    @if($contact?->phone)
                    <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                        <div style="width:52px;height:52px;background:var(--green-50);border:1px solid var(--green-200);border-radius:14px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.35rem;color:var(--green-600);box-shadow:0 2px 8px rgba(0,0,0,0.03);">
                            <i class="bi bi-telephone-fill"></i>
                        </div>
                        <div>
                            <p style="color:var(--green-700);font-weight:700;font-size:0.9rem;margin-bottom:0.25rem;">Telepon</p>
                            <a href="tel:{{ $contact->phone }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;transition:color 0.2s;" onmouseover="this.style.color='var(--green-600)'" onmouseout="this.style.color='var(--gray-600)'">{{ $contact->phone }}</a>
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

            <!-- Hubungi via WA -->
            <div class="fade-in">
                <div style="background:var(--white);border:1px solid var(--gray-200);border-radius:24px;padding:3rem;text-align:center;box-shadow:0 10px 30px rgba(0,0,0,0.03);display:flex;flex-direction:column;align-items:center;justify-content:center;min-height:100%;">
                    @if($contact?->phone)
                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="display:inline-flex;align-items:center;gap:0.75rem;background:linear-gradient(135deg,#25D366,#128C7E);color:white;padding:1.25rem 2.5rem;border-radius:16px;font-size:1.15rem;font-weight:700;text-decoration:none;transition:all 0.2s;box-shadow:0 8px 25px rgba(37,211,102,0.25);" onmouseover="this.style.transform='translateY(-3px)';this.style.boxShadow='0 12px 35px rgba(37,211,102,0.35)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 8px 25px rgba(37,211,102,0.25)'">
                        <i class="bi bi-whatsapp" style="font-size:1.75rem;"></i> Hubungi via WhatsApp
                    </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Map -->
        @if($contact?->maps)
        <div class="fade-in">
            <h2 style="color:var(--green-950);font-size:1.5rem;font-weight:800;margin-bottom:1.25rem;">Lokasi Kami</h2>
            <div style="border-radius:20px;overflow:hidden;border:1px solid var(--gray-200);box-shadow:0 10px 30px rgba(0,0,0,0.04);">
                <iframe src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed&t=k" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection


