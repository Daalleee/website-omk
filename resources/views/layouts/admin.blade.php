<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - OMK CMS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
            --sidebar-w: 260px;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { font-family:'Poppins',sans-serif; background:#0d1f10; color:#e2e8f0; display:flex; min-height:100vh; }

        /* SIDEBAR */
        .sidebar {
            width: var(--sidebar-w);
            background: #061209;
            border-right: 1px solid rgba(34,197,94,0.12);
            position: fixed;
            top: 0; left: 0; bottom: 0;
            display: flex;
            flex-direction: column;
            z-index: 100;
            overflow-y: auto;
        }
        .sidebar-brand {
            padding: 1.5rem;
            border-bottom: 1px solid rgba(34,197,94,0.1);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        .sidebar-brand .logo {
            width: 40px; height: 40px;
            background: linear-gradient(135deg,var(--green-700),var(--green-500));
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800; font-size: 0.95rem;
            box-shadow: 0 0 20px rgba(34,197,94,0.3);
        }
        .sidebar-brand .brand-info .name { font-size: 0.95rem; font-weight: 700; color: white; }
        .sidebar-brand .brand-info .sub { font-size: 0.65rem; color: var(--green-400); }

        .sidebar-nav { flex: 1; padding: 1.25rem 0.75rem; }
        .sidebar-section-title {
            font-size: 0.65rem;
            font-weight: 700;
            color: rgba(255,255,255,0.3);
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
            color: rgba(255,255,255,0.6);
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
            margin-bottom: 2px;
        }
        .sidebar-link:hover, .sidebar-link.active {
            background: rgba(34,197,94,0.1);
            color: var(--green-400);
            border-left: 3px solid var(--green-500);
            padding-left: calc(0.875rem - 3px);
        }
        .sidebar-link i { font-size: 1rem; width: 1.25rem; text-align: center; }

        .sidebar-footer {
            padding: 1rem 0.75rem;
            border-top: 1px solid rgba(34,197,94,0.1);
        }

        /* MAIN CONTENT */
        .main-content {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        /* TOPBAR */
        .topbar {
            background: rgba(6,18,9,0.95);
            border-bottom: 1px solid rgba(34,197,94,0.1);
            padding: 0.875rem 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(10px);
        }
        .page-heading { font-size: 1.1rem; font-weight: 700; color: white; }
        .user-info { display: flex; align-items: center; gap: 1rem; }
        .user-chip {
            display: flex; align-items: center; gap: 0.6rem;
            background: rgba(34,197,94,0.08);
            border: 1px solid rgba(34,197,94,0.15);
            border-radius: 8px;
            padding: 0.4rem 0.875rem;
            font-size: 0.8rem;
            color: rgba(255,255,255,0.8);
        }
        .user-chip i { color: var(--green-400); }

        /* CONTENT AREA */
        .content-area { padding: 2rem; flex: 1; }

        /* CARDS */
        .admin-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.08);
            border-radius: 14px;
            overflow: hidden;
        }
        .admin-card-header {
            padding: 1.25rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.06);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .admin-card-header h2 { font-size: 1rem; font-weight: 600; color: white; }
        .admin-card-body { padding: 1.5rem; }

        /* STATS CARDS */
        .stats-row { display: grid; grid-template-columns: repeat(auto-fill,minmax(180px,1fr)); gap: 1.25rem; margin-bottom: 2rem; }
        .stat-card {
            background: rgba(255,255,255,0.03);
            border: 1px solid rgba(255,255,255,0.07);
            border-radius: 14px;
            padding: 1.5rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            transition: all 0.2s;
        }
        .stat-card:hover { border-color: rgba(34,197,94,0.25); background: rgba(34,197,94,0.05); }
        .stat-icon {
            width: 48px; height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.25rem;
            flex-shrink: 0;
        }
        .stat-info .num { font-size: 1.75rem; font-weight: 800; color: white; line-height: 1; }
        .stat-info .label { font-size: 0.78rem; color: rgba(255,255,255,0.5); margin-top: 2px; }

        /* TABLE */
        .admin-table { width: 100%; border-collapse: collapse; font-size: 0.875rem; }
        .admin-table th {
            padding: 0.75rem 1rem;
            background: rgba(255,255,255,0.03);
            color: rgba(255,255,255,0.5);
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 1px solid rgba(255,255,255,0.07);
            text-align: left;
        }
        .admin-table td {
            padding: 0.875rem 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.04);
            color: rgba(255,255,255,0.8);
            vertical-align: middle;
        }
        .admin-table tbody tr:hover { background: rgba(34,197,94,0.04); }
        .admin-table tbody tr:last-child td { border-bottom: none; }

        /* BUTTONS */
        .btn { display:inline-flex; align-items:center; gap:0.4rem; padding:0.5rem 1rem; border-radius:8px; font-size:0.85rem; font-weight:600; text-decoration:none; transition:all 0.2s; cursor:pointer; border:none; font-family:'Poppins',sans-serif; }
        .btn-sm { padding:0.35rem 0.75rem; font-size:0.78rem; }
        .btn-primary { background:linear-gradient(135deg,var(--green-800),var(--green-700)); color:white; box-shadow:0 2px 10px rgba(22,163,74,0.25); }
        .btn-primary:hover { background:linear-gradient(135deg,var(--green-700),var(--green-600)); transform:translateY(-1px); }
        .btn-danger { background:rgba(239,68,68,0.15); color:#fca5a5; border:1px solid rgba(239,68,68,0.25); }
        .btn-danger:hover { background:rgba(239,68,68,0.25); }
        .btn-secondary { background:rgba(255,255,255,0.07); color:rgba(255,255,255,0.8); border:1px solid rgba(255,255,255,0.1); }
        .btn-secondary:hover { background:rgba(255,255,255,0.12); }
        .btn-warning { background:rgba(245,158,11,0.15); color:#fcd34d; border:1px solid rgba(245,158,11,0.25); }
        .btn-warning:hover { background:rgba(245,158,11,0.25); }

        /* BADGE */
        .badge { display:inline-block; padding:0.2rem 0.6rem; border-radius:50px; font-size:0.7rem; font-weight:600; }
        .badge-green { background:rgba(34,197,94,0.15); color:var(--green-400); border:1px solid rgba(34,197,94,0.2); }
        .badge-red { background:rgba(239,68,68,0.12); color:#fca5a5; border:1px solid rgba(239,68,68,0.2); }
        .badge-gray { background:rgba(255,255,255,0.08); color:rgba(255,255,255,0.5); }

        /* FORM */
        .form-group { margin-bottom:1.25rem; }
        .form-label { display:block; color:rgba(255,255,255,0.7); font-size:0.85rem; font-weight:500; margin-bottom:0.5rem; }
        .form-input {
            width:100%; background:rgba(255,255,255,0.05); border:1px solid rgba(255,255,255,0.1);
            border-radius:8px; padding:0.65rem 0.875rem; color:white;
            font-family:'Poppins',sans-serif; font-size:0.875rem; transition:all 0.2s;
        }
        .form-input:focus { outline:none; border-color:var(--green-600); background:rgba(22,163,74,0.06); box-shadow:0 0 0 3px rgba(22,163,74,0.12); }
        .form-input::placeholder { color:rgba(255,255,255,0.3); }
        textarea.form-input { resize:vertical; min-height:120px; }
        .form-hint { font-size:0.75rem; color:rgba(255,255,255,0.35); margin-top:0.35rem; }

        /* ALERT */
        .alert { padding:0.875rem 1.25rem; border-radius:10px; margin-bottom:1.25rem; font-size:0.875rem; display:flex; align-items:center; gap:0.75rem; }
        .alert-success { background:rgba(34,197,94,0.12); border:1px solid rgba(34,197,94,0.25); color:var(--green-300); }
        .alert-error { background:rgba(239,68,68,0.12); border:1px solid rgba(239,68,68,0.25); color:#fca5a5; }

        /* BREADCRUMB */
        .admin-breadcrumb { display:flex; align-items:center; gap:0.5rem; font-size:0.8rem; color:rgba(255,255,255,0.4); margin-bottom:1.5rem; }
        .admin-breadcrumb a { color:var(--green-400); text-decoration:none; }

        /* AVATAR */
        .avatar { width:36px; height:36px; border-radius:8px; object-fit:cover; background:rgba(34,197,94,0.2); display:flex; align-items:center; justify-content:center; font-size:1rem; color:var(--green-400); }

        @media (max-width:768px) {
            .sidebar { transform:translateX(-100%); transition:transform 0.3s; }
            .sidebar.open { transform:translateX(0); }
            .main-content { margin-left:0; }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <div class="logo">OMK</div>
            <div class="brand-info">
                <div class="name">OMK Admin</div>
                <div class="sub">Content Management</div>
            </div>
        </div>
        <nav class="sidebar-nav">
            <div class="sidebar-section-title">Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-fill"></i> Dashboard
            </a>
            <a href="{{ route('home') }}" class="sidebar-link" target="_blank">
                <i class="bi bi-house-fill"></i> Lihat Website
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
                <button type="submit" class="btn btn-danger" style="width:100%;justify-content:center;">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- MAIN CONTENT -->
    <div class="main-content">
        <div class="topbar">
            <div class="page-heading">@yield('page-title', 'Dashboard')</div>
            <div class="user-info">
                <div class="user-chip">
                    <i class="bi bi-person-fill"></i>
                    <span>{{ auth()->user()->name }}</span>
                    <span class="badge badge-green">{{ ucfirst(auth()->user()->role) }}</span>
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

    @stack('scripts')
</body>
</html>
