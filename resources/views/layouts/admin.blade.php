<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') - OMK</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --green-950: #011a01;
            --green-900: #022602;
            --green-800: #033403;
            --green-700: #044204;
            --green-600: #055205;
            --green-500: #066406;
            --green-400: #1a7a1a;
            --green-300: #4a9e4a;
            --green-200: #90c490;
            --green-100: #c8e2c8;
            --green-50: #eaf5ea;
            
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
            --sidebar-w: 260px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:var(--gray-50); color:var(--gray-800); display:flex; min-height:100vh; }

        /* SIDEBAR (Dark for contrast) */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--green-950);
            border-right: 1px solid var(--green-900);
            position: fixed;
            top: 0; left: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
            transition: transform 0.3s ease;
        }
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.08);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .sidebar-brand .logo {
            width: 40px; height: 40px;
            background: linear-gradient(135deg,var(--green-600),var(--green-500));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800; font-size: 0.95rem; color: white;
            box-shadow: 0 4px 10px rgba(3,52,3,0.2);
            flex-shrink: 0;
        }
        .sidebar-brand .brand-info .name { font-size: 0.95rem; font-weight: 700; color: white; }
        .sidebar-brand .brand-info .sub { font-size: 0.65rem; color: var(--green-400); }

        .sidebar-nav { flex: 1; padding: 1.25rem 0.75rem; }
        .sidebar-section-title {
            font-size: 0.65rem;
            font-weight: 700;
            color: rgba(255,255,255,0.4);
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.5rem 0.75rem;
            margin-top: 1rem;
            margin-bottom: 0.25rem;
        }
        .sidebar-section-title:first-child { margin-top: 0; }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.6rem 0.875rem;
            border-radius: 10px;
            text-decoration: none;
            color: rgba(255,255,255,0.7);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 2px;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
            border-left: 3px solid var(--green-400);
            padding-left: calc(0.875rem - 3px);
        }
        .sidebar-link i { font-size: 1.05rem; width: 1.25rem; text-align: center; color: var(--green-400); }
        .sidebar-link.active i { color: white; }

        .sidebar-submenu {
            display: flex; flex-direction: column; gap: 0.25rem;
            margin-left: 2.75rem; margin-bottom: 0.5rem; margin-top: -0.25rem;
        }
        .submenu-link {
            color: rgba(255,255,255,0.5);
            text-decoration: none; font-size: 0.8rem;
            padding: 0.35rem 0.75rem; border-radius: 6px;
            transition: all 0.2s; display: block;
        }
        .submenu-link:hover, .submenu-link.active {
            color: white; background: rgba(255,255,255,0.05);
        }

        .sidebar-footer {
            padding: 1rem 0.75rem;
            border-top: 1px solid rgba(255,255,255,0.08);
        }

        /* SIDEBAR OVERLAY (mobile) */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,0.5);
            z-index: 99;
            backdrop-filter: blur(2px);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        /* TOPBAR */
        .topbar {
            background: rgba(255,255,255,0.98);
            border-bottom: 1px solid var(--gray-200);
            padding: 0.875rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        }
        .topbar-left { display: flex; align-items: center; gap: 0.75rem; min-width: 0; }
        .mobile-menu-btn {
            display: none;
            background: none;
            border: 1px solid var(--gray-200);
            border-radius: 8px;
            padding: 0.5rem;
            cursor: pointer;
            color: var(--green-800);
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .page-heading { font-size: 1.15rem; font-weight: 700; color: var(--green-950); white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
        .user-info { display: flex; align-items: center; gap: 1rem; flex-shrink: 0; }
        .user-chip {
            display: flex; align-items: center; gap: 0.6rem;
            background: var(--green-50);
            border: 1px solid var(--green-200);
            border-radius: 8px;
            padding: 0.4rem 0.875rem;
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--green-800);
        }
        .user-chip i { color: var(--green-600); }
        .view-site-btn {
            display: inline-flex;
            align-items: center;
            color: var(--green-700);
            font-size: 0.85rem;
            font-weight: 500;
            text-decoration: none;
            padding: 0.4rem 0.75rem;
            border-radius: 8px;
            border: 1px solid var(--green-200);
            background: var(--green-50);
            transition: all 0.2s;
            white-space: nowrap;
        }
        .view-site-btn:hover { background: var(--green-100); }

        /* CONTENT AREA */
        .content-area { padding: 2rem; flex: 1; }

        /* CARDS */
        .admin-card {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            margin-bottom: 1.5rem;
        }
        .admin-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid var(--gray-200);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--white);
            flex-wrap: wrap;
            gap: 0.75rem;
        }
        .admin-card-header h2 { font-size: 1.05rem; font-weight: 700; color: var(--green-950); margin: 0; }
        .admin-card-body { padding: 1.5rem; }

        /* STATS CARDS */
        .stats-row { display: grid; grid-template-columns: repeat(auto-fill,minmax(200px,1fr)); gap: 1.25rem; margin-bottom: 2rem; }
        .stat-card {
            background: var(--white);
            border: 1px solid var(--gray-200);
            border-radius: 14px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s;
            box-shadow: 0 4px 10px rgba(0,0,0,0.02);
        }
        .stat-card:hover { border-color: var(--green-300); transform: translateY(-3px); box-shadow: 0 10px 20px rgba(3,52,3,0.08); }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.35rem;
            flex-shrink: 0;
            background: var(--green-50);
            color: var(--green-600);
        }
        .stat-info .num { font-size: 1.75rem; font-weight: 800; color: var(--green-950); line-height: 1; }
        .stat-info .label { font-size: 0.8rem; color: var(--gray-500); margin-top: 4px; font-weight: 500; }

        /* TABLE */
        .admin-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        .admin-table th {
            padding: 0.75rem 1rem;
            background: var(--gray-50);
            color: var(--gray-600);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid var(--gray-200);
            text-align: left;
        }
        .admin-table td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid var(--gray-100);
            color: var(--gray-800);
            vertical-align: middle;
        }
        .admin-table tbody tr:hover { background: var(--green-50); }
        .admin-table tbody tr:last-child td { border-bottom: none; }

        /* BUTTONS */
        .btn { display:inline-flex; align-items:center; gap:0.4rem; padding:0.5rem 1rem; border-radius:8px; font-size:0.85rem; font-weight:600; text-decoration:none; transition:all 0.2s; cursor:pointer; border:none; font-family:'Poppins',sans-serif; }
        .btn-sm { padding:0.35rem 0.75rem; font-size:0.78rem; }
        .btn-primary { background:linear-gradient(135deg,var(--green-700),var(--green-600)); color:white; box-shadow:0 2px 10px rgba(3,52,3,0.25); }
        .btn-primary:hover { background:linear-gradient(135deg,var(--green-800),var(--green-700)); transform:translateY(-1px); color: white; }
        
        .btn-danger { background:#fee2e2; color:#b91c1c; border:1px solid #fecaca; }
        .btn-danger:hover { background:#fca5a5; color:#7f1d1d; }
        
        .btn-secondary { background:var(--white); color:var(--gray-700); border:1px solid var(--gray-300); }
        .btn-secondary:hover { background:var(--gray-50); color:var(--gray-900); }
        
        .btn-warning { background:#fef3c7; color:#b45309; border:1px solid #fde68a; }
        .btn-warning:hover { background:#fde68a; color:#92400e; }

        /* BADGE */
        .badge { display:inline-block; padding:0.25rem 0.6rem; border-radius:50px; font-size:0.75rem; font-weight:600; }
        .badge-green { background:var(--green-100); color:var(--green-700); border:1px solid var(--green-200); }
        .badge-red { background:#fee2e2; color:#b91c1c; border:1px solid #fecaca; }
        .badge-gray { background:var(--gray-100); color:var(--gray-600); border:1px solid var(--gray-200); }

        /* FORM */
        .form-group { margin-bottom:1.25rem; }
        .form-label { display:block; color:var(--gray-700); font-size:0.875rem; font-weight:600; margin-bottom:0.5rem; }
        .form-input {
            width:100%; background:var(--white); border:1px solid var(--gray-300);
            border-radius:8px; padding:0.65rem 0.875rem; color:var(--gray-900);
            font-family:'Poppins',sans-serif; font-size:0.875rem; transition:all 0.2s;
        }
        .form-input:focus { outline:none; border-color:var(--green-500); box-shadow:0 0 0 3px rgba(3,52,3,0.15); }
        .form-input::placeholder { color:var(--gray-400); }
        textarea.form-input { resize:vertical; min-height:120px; }
        .form-hint { font-size:0.75rem; color:var(--gray-500); margin-top:0.35rem; }

        /* ALERT */
        .alert { padding:0.875rem 1.25rem; border-radius:10px; margin-bottom:1.5rem; font-size:0.875rem; display:flex; align-items:center; gap:0.75rem; font-weight: 500; }
        .alert-success { background:var(--green-50); border:1px solid var(--green-200); color:var(--green-800); }
        .alert-error { background:#fef2f2; border:1px solid #fecaca; color:#b91c1c; }

        /* BREADCRUMB */
        .admin-breadcrumb { display:flex; align-items:center; gap:0.5rem; font-size:0.85rem; color:var(--gray-500); margin-bottom:1.5rem; font-weight: 500; flex-wrap: wrap; }
        .admin-breadcrumb a { color:var(--green-600); text-decoration:none; }
        .admin-breadcrumb a:hover { color:var(--green-800); text-decoration:underline; }

        /* AVATAR */
        .avatar { width:40px; height:40px; border-radius:8px; object-fit:cover; background:var(--gray-100); display:flex; align-items:center; justify-content:center; font-size:1.1rem; color:var(--gray-400); border: 1px solid var(--gray-200); flex-shrink: 0; }

        /* ===== RESPONSIVE: TABLET ===== */
        @media (max-width: 1024px) {
            .stats-row { grid-template-columns: repeat(2, 1fr); }
            .content-area { padding: 1.5rem; }
        }

        /* ===== RESPONSIVE: MOBILE ===== */
        @media (max-width: 768px) {
            :root { --sidebar-w: 280px; }

            /* Sidebar mobile drawer */
            .sidebar {
                transform: translateX(-100%);
                box-shadow: none;
            }
            .sidebar.open {
                transform: translateX(0);
                box-shadow: 5px 0 25px rgba(0,0,0,0.3);
            }
            .sidebar-overlay.active {
                display: block;
            }

            /* Main fills full width */
            .main-content { margin-left: 0; }

            /* Show hamburger */
            .mobile-menu-btn { display: flex; }

            /* Topbar mobile */
            .topbar { padding: 0.75rem 1rem; }
            .page-heading { font-size: 1rem; }
            .view-site-btn { display: none; }
            .user-chip span { display: none; }
            .user-chip .badge { display: none; }
            .user-chip { padding: 0.4rem 0.6rem; }

            /* Content mobile */
            .content-area { padding: 1rem; }

            /* Stats 2 kolom di HP */
            .stats-row { grid-template-columns: repeat(2, 1fr); gap: 0.75rem; }
            .stat-card { padding: 1rem; gap: 0.75rem; }
            .stat-icon { width: 40px; height: 40px; font-size: 1.15rem; border-radius: 10px; }
            .stat-info .num { font-size: 1.35rem; }
            .stat-info .label { font-size: 0.72rem; }

            /* Card mobile */
            .admin-card { border-radius: 12px; margin-bottom: 1rem; }
            .admin-card-header { padding: 1rem 1.25rem; }
            .admin-card-header h2 { font-size: 0.95rem; }
            .admin-card-body { padding: 1rem 1.25rem; }

            /* Table wrapper overflow */
            .table-responsive { overflow-x: auto; -webkit-overflow-scrolling: touch; }

            /* Form mobile: bigger tap targets */
            .form-input {
                padding: 0.75rem 1rem;
                font-size: 1rem;
                border-radius: 10px;
            }
            .form-label { font-size: 0.9rem; }
            .btn { padding: 0.6rem 1.1rem; font-size: 0.9rem; }
            .btn-sm { padding: 0.45rem 0.85rem; font-size: 0.82rem; }

            /* Alert mobile */
            .alert { padding: 0.75rem 1rem; font-size: 0.82rem; }

            /* Breadcrumb mobile */
            .admin-breadcrumb { font-size: 0.8rem; margin-bottom: 1rem; }

            /* Section header inside forms */
            .admin-card-body h3 { font-size: 0.95rem !important; }

            /* Make checkbox/radio bigger for touch */
            input[type="checkbox"], input[type="radio"] {
                width: 18px;
                height: 18px;
            }

            /* Fix inline grid for mobile (contact, activity forms) */
            .mobile-stack {
                grid-template-columns: 1fr !important;
            }
        }

        /* ===== RESPONSIVE: SMALL PHONE ===== */
        @media (max-width: 400px) {
            .stats-row { grid-template-columns: 1fr 1fr; gap: 0.5rem; }
            .stat-card { padding: 0.75rem; }
            .stat-info .num { font-size: 1.15rem; }
            .content-area { padding: 0.75rem; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- SIDEBAR OVERLAY -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            @if(isset($_home) && $_home && $_home->brand_logo)
            <img src="{{ Storage::url($_home->brand_logo) }}" alt="Logo" style="width:38px;height:38px;object-fit:cover;border-radius:50%;flex-shrink:0;">
            @else
            <div class="logo">OMK</div>
            @endif
            <div class="brand-info">
                <div class="name">{{ $_home->brand_name ?? 'OMK' }} Admin</div>
                <div class="sub">Content Management</div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-section-title">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <div class="sidebar-section-title">Konten</div>
            <a href="{{ route('admin.home.index') }}" class="sidebar-link {{ request()->routeIs('admin.home.*') ? 'active' : '' }}">
                <i class="bi bi-layout-text-window"></i> Beranda
            </a>
            <a href="{{ route('admin.about.index') }}" class="sidebar-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="bi bi-info-circle-fill"></i> Tentang
            </a>
            <a href="{{ route('admin.leaders.index') }}" class="sidebar-link {{ request()->routeIs('admin.leaders.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i> Pengurus
            </a>
            <a href="{{ route('admin.members.index') }}" class="sidebar-link {{ request()->routeIs('admin.members.*') ? 'active' : '' }}">
                <i class="bi bi-person-lines-fill"></i> Anggota
            </a>
            <a href="{{ route('admin.activities.index') }}" class="sidebar-link {{ request()->routeIs('admin.activities.*') ? 'active' : '' }}">
                <i class="bi bi-calendar-event-fill"></i> Kegiatan
            </a>
            <a href="{{ route('admin.gallery.index') }}" class="sidebar-link {{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">
                <i class="bi bi-images"></i> Galeri
            </a>
            <a href="{{ route('admin.contact.index') }}" class="sidebar-link {{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                <i class="bi bi-telephone-fill"></i> Kontak
            </a>


            @if(auth()->user()->isAdmin())
            <div class="sidebar-section-title">Sistem</div>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-person-gear"></i> Pengguna
            </a>
            @endif
        </nav>
        <div class="sidebar-footer">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" style="width:100%;justify-content:center;background:rgba(255,255,255,0.1);color:white;border:none;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="topbar">
            <div class="topbar-left">
                <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Buka menu">
                    <i class="bi bi-list"></i>
                </button>
                <div class="page-heading">@yield('page-title', 'Dashboard')</div>
            </div>
            <div class="user-info">
                <a href="{{ route('home') }}" target="_blank" class="view-site-btn">
                    Lihat Website
                </a>
                <div class="user-chip">
                    <i class="bi bi-person-circle"></i>
                    <span>{{ auth()->user()->name }}</span>
                    <span class="badge badge-green" style="background:var(--green-100);color:var(--green-800);">{{ ucfirst(auth()->user()->role) }}</span>
                </div>
            </div>
        </div>

        <div class="content-area">
            @if(session('success'))
            <div class="alert alert-success"><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</div>
            @endif
            @if(session('error'))
            <div class="alert alert-error"><i class="bi bi-exclamation-circle-fill"></i> {{ session('error') }}</div>
            @endif

            @yield('content')
        </div>
    </div>

    <script>
        // Mobile sidebar toggle
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const menuBtn = document.getElementById('mobileMenuBtn');

        function openSidebar() {
            sidebar.classList.add('open');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        function closeSidebar() {
            sidebar.classList.remove('open');
            overlay.classList.remove('active');
            document.body.style.overflow = '';
        }

        menuBtn?.addEventListener('click', openSidebar);
        overlay?.addEventListener('click', closeSidebar);

        // Close sidebar when clicking a nav link (mobile)
        document.querySelectorAll('.sidebar-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) closeSidebar();
            });
        });
    </script>

    @stack('scripts')

    @include('admin.partials.cropper')
</body>
</html>
