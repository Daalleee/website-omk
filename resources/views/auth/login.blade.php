<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - OMK CMS</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        :root {
            --green-950: #052e16;
            --green-900: #14532d;
            --green-700: #15803d;
            --green-600: #16a34a;
            --green-500: #22c55e;
            --green-400: #4ade80;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { 
            font-family:'Poppins',sans-serif; 
            background: linear-gradient(135deg, #020d04 0%, #052e16 40%, #0a1f0f 70%, #000 100%);
            color:white; 
            display:flex; 
            min-height:100vh;
            align-items:center;
            justify-content:center;
            position:relative;
            overflow:hidden;
        }
        
        .bg-pattern {
            position:absolute; inset:0;
            background-image: 
                radial-gradient(ellipse at 20% 50%, rgba(22, 163, 74, 0.1) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(34, 197, 94, 0.08) 0%, transparent 50%);
            z-index:0;
        }
        
        .login-card {
            background: rgba(5, 46, 22, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(34, 197, 94, 0.2);
            border-radius: 24px;
            width: 100%;
            max-width: 420px;
            padding: 3rem 2.5rem;
            position: relative;
            z-index: 10;
            box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5), 0 0 40px rgba(34,197,94,0.1);
        }

        .login-logo {
            width: 70px; height: 70px;
            background: linear-gradient(135deg, var(--green-700), var(--green-500));
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.5rem; margin: 0 auto 1.5rem;
            box-shadow: 0 10px 25px rgba(22, 163, 74, 0.4);
        }

        .login-title { text-align:center; font-size:1.5rem; font-weight:700; margin-bottom:0.25rem; }
        .login-subtitle { text-align:center; font-size:0.85rem; color:rgba(255,255,255,0.6); margin-bottom:2.5rem; }

        .form-group { margin-bottom:1.5rem; }
        .form-label { display:block; font-size:0.85rem; font-weight:500; color:rgba(255,255,255,0.8); margin-bottom:0.5rem; }
        
        .input-group { position:relative; display:flex; align-items:center; }
        .input-group i { position:absolute; left:1rem; color:rgba(255,255,255,0.4); font-size:1.1rem; transition:color 0.3s; }
        .form-input {
            width:100%; background:rgba(0,0,0,0.2); border:1px solid rgba(255,255,255,0.1);
            border-radius:12px; padding:0.875rem 1rem 0.875rem 2.75rem; color:white;
            font-family:'Poppins',sans-serif; font-size:0.9rem; transition:all 0.3s;
        }
        .form-input:focus {
            outline:none; border-color:var(--green-500);
            background:rgba(22,163,74,0.05); box-shadow:0 0 0 4px rgba(22,163,74,0.15);
        }
        .form-input:focus + i { color:var(--green-400); }

        .btn-login {
            width:100%; background:linear-gradient(135deg, var(--green-700), var(--green-500));
            color:white; border:none; padding:1rem; border-radius:12px;
            font-size:1rem; font-weight:600; cursor:pointer; transition:all 0.3s;
            box-shadow: 0 10px 20px rgba(22, 163, 74, 0.2); margin-top:0.5rem;
            font-family:'Poppins',sans-serif;
        }
        .btn-login:hover { transform:translateY(-2px); box-shadow: 0 12px 25px rgba(22, 163, 74, 0.3); }

        .alert-error {
            background: rgba(239, 68, 68, 0.15); border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5; padding: 0.875rem 1rem; border-radius: 10px;
            font-size: 0.85rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;
        }

        .back-link {
            display:block; text-align:center; margin-top:2rem;
            color:rgba(255,255,255,0.5); font-size:0.85rem; text-decoration:none; transition:color 0.2s;
        }
        .back-link:hover { color:var(--green-400); }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>
    <div class="login-card">
        <div class="login-logo">OMK</div>
        <h1 class="login-title">Admin Akses</h1>
        <p class="login-subtitle">Masuk untuk mengelola konten website</p>

        @if($errors->any())
        <div class="alert-error">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>{{ $errors->first() }}</div>
        </div>
        @endif

        @if(session('error'))
        <div class="alert-error">
            <i class="bi bi-shield-lock-fill"></i>
            <div>{{ session('error') }}</div>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="form-group">
                <label class="form-label">Email Address</label>
                <div class="input-group">
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus placeholder="admin@omk.com">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" class="form-input" required placeholder="••••••••">
                    <i class="bi bi-lock"></i>
                </div>
            </div>

            <div class="form-group" style="display:flex;align-items:center;gap:0.5rem;">
                <input type="checkbox" name="remember" id="remember" style="accent-color:var(--green-500);width:16px;height:16px;">
                <label for="remember" style="font-size:0.85rem;color:rgba(255,255,255,0.7);cursor:pointer;">Ingat Saya</label>
            </div>

            <button type="submit" class="btn-login">Login ke Dashboard</button>
        </form>
        
        <a href="{{ route('home') }}" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
    </div>
</body>
</html>
