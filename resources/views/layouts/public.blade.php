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
            --green-950: #1a1e06;
            --green-900: #2b310a;
            --green-800: #3f4710;
            --green-700: #556017;
            --green-600: #6c7b1c;
            --green-500: #869722;
            --green-400: #a2b435;
            --green-300: #bdcc5f;
            --green-200: #d5e092;
            --green-100: #ecf3cc;
            --green-50: #f7faeb;
            
            --gold: #d4af37;
            --gold-light: #f0d060;
            
            --white: #ffffff;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }
        
        html { scroll-behavior: smooth; }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--gray-50);
            color: var(--gray-800);
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
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.7);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(0,0,0,0.06);
            border-bottom: 1px solid var(--green-100);
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.25rem;
            position: relative;
        }

        .nav-right {
            position: absolute;
            right: 0;
        }

        .nav-brand {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            position: absolute;
            left: 0;
        }

        .nav-logo {
            width: 42px;
            height: 42px;
            background: linear-gradient(135deg, var(--green-700), var(--green-600));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
            color: white;
            box-shadow: 0 4px 15px rgba(108, 123, 28, 0.2);
        }

        .nav-brand-text .brand-name {
            font-size: 1.1rem;
            font-weight: 700;
            color: var(--green-950);
            line-height: 1.2;
        }

        .nav-brand-text .brand-sub {
            font-size: 0.65rem;
            color: var(--green-700);
            font-weight: 500;
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
            color: var(--gray-600);
            font-size: 0.95rem;
            font-weight: 500;
            padding: 0.5rem 0.125rem;
            transition: all 0.2s ease;
            position: relative;
        }

        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
background: #033403;
            border-radius: 2px;
            transition: width 0.25s ease;
        }

        .nav-links a:hover::after, .nav-links a.active::after {
            width: 100%;
        }

        .nav-links a:hover, .nav-links a.active {
            color: var(--green-800);
            font-weight: 600;
        }

        .nav-admin-btn {
            background: #033403;
            color: white !important;
            border-radius: 8px !important;
            padding: 0.5rem 1.1rem !important;
            font-weight: 600 !important;
            box-shadow: 0 4px 12px rgba(3, 52, 3, 0.25);
            text-decoration: none !important;
        }

        .nav-admin-btn::after {
            display: none !important;
            content: none !important;
        }

        .nav-admin-btn:hover {
            background: #033403 !important;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(3, 52, 3, 0.35) !important;
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
            background: var(--green-950);
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
            background: rgba(255, 255, 255, 0.98);
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
            color: var(--gray-800);
            font-size: 1.4rem;
            font-weight: 600;
            transition: color 0.2s;
        }

        .mobile-nav a:hover { color: var(--green-700); }

        .mobile-close {
            position: absolute;
            top: 1.5rem;
            right: 1.5rem;
            background: none;
            border: none;
            color: var(--gray-800);
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
            background: var(--green-50);
            border: 1px solid var(--green-200);
            color: var(--green-700);
            padding: 0.35rem 1rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: 700;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            margin-bottom: 0.75rem;
        }

        .section-title h2 {
            font-size: 2.25rem;
            font-weight: 800;
            color: var(--green-950);
            margin-bottom: 0.75rem;
        }

        .section-title p {
            color: var(--gray-600);
            font-size: 1rem;
            max-width: 550px;
            margin: 0 auto;
        }

        .divider {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, var(--green-700), var(--green-500));
            margin: 1.25rem auto 0;
            border-radius: 4px;
        }

        /* CARDS */
        .card {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 20px rgba(0,0,0,0.03);
        }

        .card:hover {
            transform: translateY(-4px);
            border-color: var(--green-200);
            box-shadow: 0 15px 40px rgba(108, 123, 28, 0.08);
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
            background: linear-gradient(135deg, var(--green-800), var(--green-700));
            color: white;
            box-shadow: 0 4px 15px rgba(108, 123, 28, 0.25);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--green-700), var(--green-600));
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(108, 123, 28, 0.35);
            color: white;
        }

        .btn-outline {
            background: transparent;
            color: var(--green-800);
            border: 1.5px solid var(--green-700);
        }

        .btn-outline:hover {
            background: var(--green-50);
            border-color: var(--green-700);
            transform: translateY(-2px);
            color: var(--green-900);
        }

        /* FOOTER */
        footer {
            background: var(--green-950);
            border-top: 5px solid var(--green-700);
            padding: 4rem 0 1.5rem;
            color: white;
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
            color: rgba(255,255,255,0.7);
            font-size: 0.875rem;
            line-height: 1.7;
            margin-bottom: 1.25rem;
        }

        .social-links { display: flex; gap: 0.75rem; }

        .social-link {
            width: 36px;
            height: 36px;
            border-radius: 8px;
            background: rgba(255,255,255,0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            border: 1px solid rgba(255,255,255,0.15);
        }

        .social-link:hover {
            background: var(--green-600);
            color: white;
            border-color: var(--green-500);
            transform: translateY(-2px);
        }

        .footer-col h4 {
            color: var(--white);
            font-size: 0.95rem;
            font-weight: 700;
            margin-bottom: 1.25rem;
            padding-bottom: 0.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.15);
        }

        .footer-col ul { list-style: none; }

        .footer-col ul li { margin-bottom: 0.6rem; }

        .footer-col ul li a {
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            font-size: 0.875rem;
            transition: color 0.2s;
        }

        .footer-col ul li a:hover { color: var(--green-300); }

        .footer-contact li {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            color: rgba(255,255,255,0.7);
            font-size: 0.85rem;
            margin-bottom: 0.75rem;
        }

        .footer-contact li i { color: var(--green-400); margin-top: 2px; flex-shrink: 0; font-size: 1rem; }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,0.1);
            padding-top: 1.5rem;
            text-align: center;
            color: rgba(255,255,255,0.5);
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
            background: var(--green-50);
            border: 1px solid var(--green-200);
            color: var(--green-800);
        }

        .alert-error {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #b91c1c;
        }

        /* BREADCRUMB PAGE HERO */
        .page-hero {
            min-height: 250px;
            display: flex;
            align-items: center;
            background: linear-gradient(135deg, var(--green-50) 0%, var(--green-100) 100%);
            position: relative;
            overflow: hidden;
            padding: 7rem 0 3rem;
            border-bottom: 1px solid var(--green-200);
        }

        .page-hero-content { position: relative; z-index: 1; }

        .breadcrumb {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.85rem;
            color: var(--gray-500);
            margin-bottom: 1rem;
        }

        .breadcrumb a { color: var(--green-700); text-decoration: none; font-weight: 500; }

        .breadcrumb a:hover { color: var(--green-800); text-decoration: underline; }

        .page-title {
            font-size: 2.5rem;
            font-weight: 800;
            color: var(--green-950);
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: var(--gray-600);
            font-size: 1.05rem;
        }

        /* FORM INPUTS */
        .form-input {
            width: 100%;
            background: #ffffff;
            border: 1px solid var(--gray-300);
            border-radius: 10px;
            padding: 0.75rem 1rem;
            color: var(--gray-800);
            font-family: 'Poppins', sans-serif;
            font-size: 0.95rem;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--green-600);
            box-shadow: 0 0 0 3px rgba(108, 123, 28, 0.15);
        }

        .form-input::placeholder { color: var(--gray-400); }

        .form-label {
            display: block;
            color: var(--gray-700);
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .form-group { margin-bottom: 1.25rem; }

        /* PAGINATION */
        .pagination { display: flex; gap: 0.5rem; justify-content: center; margin-top: 3rem; }
        .pagination a, .pagination span {
            padding: 0.5rem 0.875rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 500;
            text-decoration: none;
            color: var(--gray-600);
            background: #ffffff;
            border: 1px solid var(--gray-200);
            transition: all 0.2s;
        }
        .pagination a:hover { background: var(--green-50); border-color: var(--green-200); color: var(--green-700); }
        .pagination .active { background: var(--green-700); border-color: var(--green-700); color: white; }

        /* SCROLL MARGIN FOR NAVBAR */
        section[id] {
            scroll-margin-top: 80px;
        }

        /* RESPONSIVE */
        @media (max-width: 1024px) {
            .footer-grid { grid-template-columns: 1fr 1fr; gap: 2rem; }
        }

        @media (max-width: 768px) {
            .nav-links { display: none; }
            .hamburger { display: flex; }
            .section { padding: 3.5rem 0; }
            .section-title h2 { font-size: 1.85rem; }
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
                <li><a href="{{ route('home') }}" class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}">Beranda</a></li>
                <li><a href="{{ route('about') }}" class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}">Tentang</a></li>
                <li><a href="{{ route('leaders') }}" class="nav-link {{ request()->routeIs('leaders') ? 'active' : '' }}">Pengurus</a></li>
                <li><a href="{{ route('members') }}" class="nav-link {{ request()->routeIs('members') ? 'active' : '' }}">Anggota</a></li>
                <li><a href="{{ route('activities') }}" class="nav-link {{ request()->routeIs('activities') || request()->routeIs('activity.detail') ? 'active' : '' }}">Kegiatan</a></li>
                <li><a href="{{ route('gallery') }}" class="nav-link {{ request()->routeIs('gallery') ? 'active' : '' }}">Galeri</a></li>
                <li><a href="{{ route('contact') }}" class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Kontak</a></li>
            </ul>

            <div class="nav-right">
                @auth
                    <a href="{{ route('admin.dashboard') }}" class="nav-admin-btn">Admin</a>
                @else
                    <a href="{{ route('login') }}" class="nav-admin-btn">Login</a>
                @endauth
            </div>

            <div class="hamburger" id="hamburger">
                <span></span><span></span><span></span>
            </div>
        </div>
    </nav>

    <!-- MOBILE NAV -->
    <div class="mobile-nav" id="mobileNav">
        <button class="mobile-close" id="mobileClose"><i class="bi bi-x-lg"></i></button>
        <a href="{{ route('home') }}" class="mobile-link">Beranda</a>
        <a href="{{ route('about') }}" class="mobile-link">Tentang</a>
        <a href="{{ route('leaders') }}" class="mobile-link">Pengurus</a>
        <a href="{{ route('members') }}" class="mobile-link">Anggota</a>
        <a href="{{ route('activities') }}" class="mobile-link">Kegiatan</a>
        <a href="{{ route('gallery') }}" class="mobile-link">Galeri</a>
        <a href="{{ route('contact') }}" class="mobile-link">Kontak</a>
        @auth
            <a href="{{ route('admin.dashboard') }}" style="color: var(--green-600);">Admin Panel</a>
        @else
            <a href="{{ route('login') }}" style="color: var(--green-600);">Login Admin</a>
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
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('about') }}">Tentang OMK</a></li>
                        <li><a href="{{ route('leaders') }}">Pengurus</a></li>
                        <li><a href="{{ route('members') }}">Anggota</a></li>
                        <li><a href="{{ route('activities') }}">Kegiatan</a></li>
                        <li><a href="{{ route('gallery') }}">Galeri</a></li>
                        <li><a href="{{ route('contact') }}">Kontak</a></li>
                    </ul>
                </div>

                <div class="footer-col">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="{{ route('about') }}">Visi &amp; Misi</a></li>
                        <li><a href="{{ route('about') }}">Sejarah</a></li>
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

        // Active state is now handled server-side via route matching

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
