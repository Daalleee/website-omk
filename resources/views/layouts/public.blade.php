<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'OMK - Orang Muda Katolik')</title>
    <meta name="description" content="@yield('description', 'Website resmi Orang Muda Katolik - Komunitas pemuda Katolik yang aktif dalam iman, pelayanan, dan pengembangan diri.')">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        :root {
            --green-950: #052e16;
            --green-900: #14532d;
            --green-800: #166534;
            --green-700: #15803d;
            --green-600: #16a34a;
            --green-500: #22c55e;
            --green-400: #4ade80;
            --green-300: #86efac;
            --green-100: #dcfce7;
            --gold: #d4af37;
            --gold-light: #f0d060;
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-400: #94a3b8;
            --gray-600: #475569;
            --gray-800: #1e293b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        html { scroll-behavior: smooth; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0a1a0e;
            color: var(--white);
            line-height: 1.6;
        }

        /* NAVBAR */
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 0;
            transition: all 0.3s ease;
            background: transparent;
        }

        .navbar.scrolled {
            background: rgba(5, 46, 22, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(34, 197, 94, 0.2);
            padding: 0.6rem 0;
            box-shadow: 0 4px 30px rgba(0,0,0,0.3);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--white);
        }

        .nav-logo {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--green-600), var(--green-400));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
            color: white;
            box-shadow: 0 0 20px rgba(34, 197, 94, 0.4);
        }

        .nav-brand-text .brand-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--white);
            line-height: 1.2;
        }

        .nav-brand-text .brand-sub {
            font-size: 0.65rem;
            color: var(--green-400);
            letter-spacing: 0.05em;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 0.25rem;
            align-items: center;
        }

        .nav-links a {
            text-decoration: none;
            color: rgba(255,255,255,0.85);
            font-size: 0.875rem;
            font-weight: 500;
            padding: 0.5rem 0.875rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--green-400);
            background: rgba(34, 197, 94, 0.1);
        }

        .nav-admin-btn {
            background: linear-gradient(135deg, var(--green-700), var(--green-600));
            color: white !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.1rem !important;
            font-weight: 600 !important;
            box-shadow: 0 2px 12px rgba(22, 163, 74, 0.35);
        }

        .nav-admin-btn:hover {
            background: linear-gradient(135deg, var(--green-600), var(--green-500)) !important;
            transform: translateY(-1px);
            box-shadow: 0 4px 16px rgba(22, 163, 74, 0.5) !important;
        }

        .hamburger {
            display: none;
            flex-direction: column;
            cursor: pointer;
            gap: 5px;
            padding: 5px;
        }

        .hamburger span {
            width: 24px;
            height: 2px;
            background: var(--white);
            transition: all 0.3s;
            border-radius: 2px;
        }

        /* MOBILE NAV */
        .mobile-nav {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(5, 46, 22, 0.98);
            backdrop-filter: blur(20px);
            z-index: 999;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.5rem;
        }

        .mobile-nav.open { display: flex; }

        .mobile-nav a {
            text-decoration: none;
            color: var(--white);
            font-size: 1.4rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .mobile-nav a:hover { color: var(--green-400); }

        .mobile-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: white;
            font-size: 1.75rem;
            cursor: pointer;
        }

        /* SECTION STYLES */
        .section { padding: 5rem 0; }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3.5rem;
        }

        .section-badge {
            display: inline-block;
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: var(--green-400);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 600;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .section-title h2 {
            font-size: 2.25rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 0.75rem;
        }

        .section-title p {
            color: rgba(255,255,255,0.6);
            font-size: 1rem;
            max-width: 550px;
            margin: 0 auto;
        }

        .divider {
            width: 60px;
            height: 3px;
            background: linear-gradient(90deg, var(--green-600), var(--green-400));
            margin: 1rem auto 0;
            border-radius: 3px;
        }

        /* CARDS */
        .card {
            background: rgba(255,255,255,0.04);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: rgba(34, 197, 94, 0.25);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3), 0 0 30px rgba(34, 197, 94, 0.1);
        }

        /* BUTTONS */
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.75rem;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            cursor: pointer;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--green-700), var(--green-600));
            color: white;
            box-shadow: 0 4px 15px rgba(22, 163, 74, 0.35);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--green-600), var(--green-500));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(22, 163, 74, 0.5);
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: var(--green-400);
            border: 1.5px solid var(--green-600);
        }

        .btn-outline:hover {
            background: rgba(34, 197, 94, 0.1);
            border-color: var(--green-400);
            transform: translateY(-2px);
            color: var(--green-300);
        }

        /* FOOTER */
        footer {
            background: var(--green-950);
            border-top: 1px solid rgba(34, 197, 94, 0.15);
            padding: 3.5rem 0 1.5rem;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1.5fr;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .footer-brand .brand-name {
            font-size: 1.25rem;
            font-weight: 700;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .footer-brand p {
            color: rgba(255,255,255,0.5);
            font-size: 0.875rem;
            line-height: 1.7;
            margin-bottom: 1.25rem;
        }

        .social-links { display: flex; gap: 0.75rem; }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.07);
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border: 1px solid rgba(255,255,255,0.1);
        }

        .social-link:hover {
            background: var(--green-700);
            color: white;
            border-color: var(--green-600);
        }

        .footer-col h4 {
            color: var(--white);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.25rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(34, 197, 94, 0.2);
        }

        .footer-col ul { list-style: none; }

        .footer-col ul li { margin-bottom: 0.6rem; }

        .footer-col ul li a {
            color: rgba(255,255,255,0.55);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-col ul li a:hover { color: var(--green-400); }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            color: rgba(255,255,255,0.55);
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }

        .footer-contact li i { color: var(--green-500); margin-top: 2px; flex-shrink: 0; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.07);
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255,255,255,0.35);
            font-size: 0.8rem;
        }

        /* ANIMATIONS */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        }

        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ALERT */
        .alert {
            padding: 1rem 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.25rem;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.15);
            border: 1px solid rgba(34, 197, 94, 0.3);
            color: var(--green-300);
        }

        .alert-error {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
        }

        /* BREADCRUMB */
        .page-hero {
            min-height: 280px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--green-950) 0%, #0a1f0f 50%, var(--green-900) 100%);
            position: relative;
            overflow: hidden;
            padding: 6rem 0 3rem;
        }

        .page-hero::before {
            content: '';
            position: absolute;
            inset: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%2322c55e' fill-opacity='0.04'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }

        .page-hero-content { position: relative; z-index: 1; }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: rgba(255,255,255,0.5);
            margin-bottom: 1rem;
        }

        .breadcrumb a { color: var(--green-400); text-decoration: none; }

        .breadcrumb a:hover { color: var(--green-300); }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--white);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: rgba(255,255,255,0.6);
        }

        /* FORM INPUTS */
        .form-input {
            width: 100%;
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.12);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            color: var(--white);
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--green-600);
            background: rgba(22, 163, 74, 0.08);
            box-shadow: 0 0 0 3px rgba(22, 163, 74, 0.15);
        }

        .form-input::placeholder { color: rgba(255,255,255,0.35); }

        .form-label {
            display: block;
            color: rgba(255,255,255,0.75);
            font-size: 0.875rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-group { margin-bottom: 1.25rem; }

        /* PAGINATION */
        .pagination { display: flex; gap: 0.5rem; justify-content: center; margin-top: 3rem; }
        .pagination a, .pagination span {
            padding: 0.5rem 0.875rem;
            border-radius: 8px;
            font-size: 0.875rem;
            text-decoration: none;
            color: rgba(255,255,255,0.7);
            background: rgba(255,255,255,0.05);
            border: 1px solid rgba(255,255,255,0.1);
            transition: all 0.2s;
        }
        .pagination a:hover { background: var(--green-800); border-color: var(--green-700); color: white; }
        .pagination .active { background: var(--green-700); border-color: var(--green-600); color: white; }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hamburger { display: flex; }
            .section { padding: 3.5rem 0; }
            .section-title h2 { font-size: 1.75rem; }
            .page-title { font-size: 1.875rem; }
            .footer-grid { grid-template-columns: 1fr; gap: 2rem; }
        }
    </style>

    @stack('styles')
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar" id="mainNavbar">
        <div class="nav-container">
            <a href="{{ route('home') }}" class="nav-brand">
                <div class="nav-logo">OMK</div>
                <div class="nav-brand-text">
                    <div class="brand-name">OMK Paroki</div>
                    <div class="brand-sub">Orang Muda Katolik</div>
                </div>
            </a>

            <ul class="nav-links">
                <li><a href="{{ request()->routeIs('home') ? '#beranda' : route('home').'#beranda' }}" class="nav-link">Beranda</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#tentang' : route('home').'#tentang' }}" class="nav-link">Tentang</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#pengurus' : route('home').'#pengurus' }}" class="nav-link">Pengurus</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#anggota' : route('home').'#anggota' }}" class="nav-link">Anggota</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#kegiatan' : route('home').'#kegiatan' }}" class="nav-link">Kegiatan</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#galeri' : route('home').'#galeri' }}" class="nav-link">Galeri</a></li>
                <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home').'#kontak' }}" class="nav-link">Kontak</a></li>
                @auth
                    <li><a href="{{ route('admin.dashboard') }}" class="nav-admin-btn"><i class="bi bi-grid-fill"></i> Admin</a></li>
                @else
                    <li><a href="{{ route('login') }}" class="nav-admin-btn"><i class="bi bi-lock-fill"></i> Login</a></li>
                @endauth
            </ul>

            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAV -->
    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-close" id="mobileClose"><i class="bi bi-x-lg"></i></button>
        <a href="{{ request()->routeIs('home') ? '#beranda' : route('home').'#beranda' }}" class="mobile-link">Beranda</a>
        <a href="{{ request()->routeIs('home') ? '#tentang' : route('home').'#tentang' }}" class="mobile-link">Tentang</a>
        <a href="{{ request()->routeIs('home') ? '#pengurus' : route('home').'#pengurus' }}" class="mobile-link">Pengurus</a>
        <a href="{{ request()->routeIs('home') ? '#anggota' : route('home').'#anggota' }}" class="mobile-link">Anggota</a>
        <a href="{{ request()->routeIs('home') ? '#kegiatan' : route('home').'#kegiatan' }}" class="mobile-link">Kegiatan</a>
        <a href="{{ request()->routeIs('home') ? '#galeri' : route('home').'#galeri' }}" class="mobile-link">Galeri</a>
        <a href="{{ request()->routeIs('home') ? '#kontak' : route('home').'#kontak' }}" class="mobile-link">Kontak</a>
        @auth
            <a href="{{ route('admin.dashboard') }}" style="color: #4ade80;">Admin Panel</a>
        @else
            <a href="{{ route('login') }}" style="color: #4ade80;">Login Admin</a>
        @endauth
    </div>

    @yield('content')

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <div class="brand-name">🌿 OMK Paroki</div>
                    <p>Komunitas Orang Muda Katolik yang bergerak dalam semangat iman, harapan, dan kasih untuk pelayanan gereja dan masyarakat.</p>
                    <div class="social-links">
                        @if(isset($contact) && $contact && $contact->instagram)
                        <a href="https://instagram.com/{{ ltrim($contact->instagram, '@') }}" class="social-link" target="_blank"><i class="bi bi-instagram"></i></a>
                        @endif
                        @if(isset($contact) && $contact && $contact->facebook)
                        <a href="https://facebook.com/{{ $contact->facebook }}" class="social-link" target="_blank"><i class="bi bi-facebook"></i></a>
                        @endif
                        @if(isset($contact) && $contact && $contact->phone)
                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $contact->phone) }}" class="social-link" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        @endif
                    </div>
                </div>

                <div class="footer-col">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ request()->routeIs('home') ? '#beranda' : route('home').'#beranda' }}">Beranda</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#tentang' : route('home').'#tentang' }}">Tentang OMK</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#pengurus' : route('home').'#pengurus' }}">Pengurus</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#anggota' : route('home').'#anggota' }}">Anggota</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#kegiatan' : route('home').'#kegiatan' }}">Kegiatan</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#galeri' : route('home').'#galeri' }}">Galeri</a></li>
                        <li><a href="{{ request()->routeIs('home') ? '#kontak' : route('home').'#kontak' }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="{{ route('about') }}#visi">Visi & Misi</a></li>
                        <li><a href="{{ route('about') }}#sejarah">Sejarah</a></li>
                        <li><a href="{{ route('activities') }}">Jadwal Kegiatan</a></li>
                        <li><a href="{{ route('gallery') }}">Galeri Foto</a></li>
                        <li><a href="{{ route('login') }}">Login Admin</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Kontak Kami</h4>
                    <ul class="footer-contact">
                        @if(isset($contact) && $contact)
                        @if($contact->address)
                        <li><i class="bi bi-geo-alt-fill"></i> <span>{{ $contact->address }}</span></li>
                        @endif
                        @if($contact->phone)
                        <li><i class="bi bi-whatsapp"></i> <span>{{ $contact->phone }}</span></li>
                        @endif
                        @if($contact->email)
                        <li><i class="bi bi-envelope-fill"></i> <span>{{ $contact->email }}</span></li>
                        @endif
                        @if($contact->instagram)
                        <li><i class="bi bi-instagram"></i> <span>{{ $contact->instagram }}</span></li>
                        @endif
                        @else
                        <li><i class="bi bi-geo-alt-fill"></i> <span>Gereja Paroki</span></li>
                        @endif
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} OMK Paroki. Semua hak dilindungi. Dibuat dengan ❤️ untuk pelayanan gereja.</p>
            </div>
        </div>
    </footer>

    <script>
        // Navbar scroll
        const navbar = document.getElementById('mainNavbar');
        window.addEventListener('scroll', () => {
            navbar.classList.toggle('scrolled', window.scrollY > 50);
        });

        // Mobile nav
        const hamburger = document.getElementById('hamburger');
        const mobileNav = document.getElementById('mobileNav');
        const mobileClose = document.getElementById('mobileClose');

        hamburger?.addEventListener('click', () => mobileNav.classList.add('open'));
        mobileClose?.addEventListener('click', () => mobileNav.classList.remove('open'));

        // Fade in animation
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        // Active link highlighting on scroll
        const sections = document.querySelectorAll('section[id]');
        window.addEventListener('scroll', () => {
            let current = '';
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                if (scrollY >= sectionTop - 150) {
                    current = section.getAttribute('id');
                }
            });
            document.querySelectorAll('.nav-link').forEach(li => {
                li.classList.remove('active');
                if (li.getAttribute('href').includes(current)) {
                    li.classList.add('active');
                }
            });
        });

        document.querySelectorAll('.mobile-link').forEach(link => {
            link.addEventListener('click', () => {
                mobileNav.classList.remove('open');
            });
        });

        document.querySelectorAll('.fade-in').forEach(el => observer.observe(el));
    </script>

    @stack('scripts')
</body>
</html>
