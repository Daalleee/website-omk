@extends('layouts.public')
@section('title', 'OMK | Kontak')
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

        <div class="fade-in" style="max-width:700px;margin:0 auto;">
            <div style="display:flex;flex-direction:column;gap:1.5rem;">
                @if($contact?->address)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-geo-alt-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <p style="color:var(--gray-600);font-size:0.95rem;line-height:1.6;">{{ $contact->address }}</p>
                    </div>
                </div>
                @endif
                @if($contact?->phone)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-telephone-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="tel:{{ $contact->phone }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->phone }}</a>
                    </div>
                </div>
                @endif
                @if($contact?->email)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-envelope-fill"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="mailto:{{ $contact->email }}" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->email }}</a>
                    </div>
                </div>
                @endif
                @if($contact?->instagram)
                <div style="display:flex;gap:1.25rem;align-items:flex-start;">
                    <div style="width:48px;height:48px;background:var(--green-50);border:1px solid var(--green-200);border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:1.25rem;color:var(--green-600);">
                        <i class="bi bi-instagram"></i>
                    </div>
                    <div style="flex:1;display:flex;align-items:center;min-height:48px;">
                        <a href="https://instagram.com/{{ ltrim($contact->instagram,'@') }}" target="_blank" style="color:var(--gray-600);font-size:0.95rem;text-decoration:none;">{{ $contact->instagram }}</a>
                    </div>
                </div>
                @endif
            </div>

            @if($contact?->phone)
            <div style="text-align:center;margin-top:2.5rem;">
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/','',$contact->phone) }}" target="_blank" style="display:inline-flex;align-items:center;gap:0.75rem;background:#033403;color:white;padding:1rem 2rem;border-radius:14px;font-size:1rem;font-weight:600;text-decoration:none;transition:all 0.2s;box-shadow:0 6px 20px rgba(5,59,0,0.25);" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 10px 30px rgba(5,59,0,0.35)'" onmouseout="this.style.transform='none';this.style.boxShadow='0 6px 20px rgba(5,59,0,0.25)'">
                    <i class="bi bi-whatsapp" style="font-size:1.5rem;"></i> Hubungi via WhatsApp
                </a>
            </div>
            @endif
        </div>

        @if($contact?->maps)
        <div style="margin-top:3rem;" class="fade-in">
            <div style="border-radius:20px;overflow:hidden;border:1px solid var(--gray-200);min-height:350px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">
                <iframe src="https://www.google.com/maps?q={{ urlencode($contact->maps) }}&output=embed&t=k" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
        @endif
    </div>
</section>
@endsection


