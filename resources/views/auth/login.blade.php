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
            --green-950: #011a01;
            --green-900: #022602;
            --green-700: #044204;
            --green-600: #055205;
            --green-500: #066406;
            --green-400: #1a7a1a;
            --green-50: #eaf5ea;
            --gray-50: #f8fafc;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
        }
        * { margin:0; padding:0; box-sizing:border-box; }
        body { 
            font-family:'Poppins',sans-serif; 
            background: linear-gradient(135deg, var(--gray-50) 0%, var(--green-50) 100%);
            color: var(--gray-800); 
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
                radial-gradient(ellipse at 20% 50%, rgba(3, 52, 3, 0.05) 0%, transparent 50%),
                radial-gradient(ellipse at 80% 20%, rgba(3, 52, 3, 0.03) 0%, transparent 50%);
            z-index:0;
        }
        
        .login-card {
            background: #ffffff;
            border: 1px solid var(--gray-200);
            border-radius: 24px;
            width: 100%;
            max-width: 380px;
            padding: 2rem 2rem;
            position: relative;
            z-index: 10;
            box-shadow: 0 20px 40px rgba(0,0,0,0.05), 0 0 40px rgba(3,52,3,0.05);
        }

        .login-logo {
            width: 60px; height: 60px;
            background: linear-gradient(135deg, var(--green-700), var(--green-500));
            border-radius: 16px;
            display: flex; align-items: center; justify-content: center;
            font-weight: 800; font-size: 1.25rem; margin: 0 auto 1rem; color: white;
            box-shadow: 0 8px 20px rgba(3, 52, 3, 0.2);
        }

        .login-title { text-align:center; font-size:1.25rem; font-weight:800; margin-bottom:0.25rem; color: var(--green-950); }
        .login-subtitle { text-align:center; font-size:0.8rem; color:var(--gray-500); margin-bottom:2rem; font-weight: 500; }

        .form-group { margin-bottom:1rem; }
        .form-label { display:block; font-size:0.875rem; font-weight:600; color:var(--gray-700); margin-bottom:0.5rem; }
        
        .input-group { position:relative; display:flex; align-items:center; }
        .input-group i { position:absolute; left:1rem; color:var(--gray-400); font-size:1.1rem; transition:color 0.3s; }
        .form-input {
            width:100%; background:#ffffff; border:1px solid var(--gray-300);
            border-radius:12px; padding:0.875rem 1rem 0.875rem 2.75rem; color:var(--gray-800);
            font-family:'Poppins',sans-serif; font-size:0.95rem; transition:all 0.3s;
        }
        .form-input:focus {
            outline:none; border-color:var(--green-500);
            box-shadow:0 0 0 4px rgba(3,52,3,0.1);
        }
        .form-input:focus + i { color:var(--green-600); }

        .btn-login {
            width:100%; background:linear-gradient(135deg, var(--green-700), var(--green-600));
            color:white; border:none; padding:0.875rem; border-radius:12px;
            font-size:0.95rem; font-weight:600; cursor:pointer; transition:all 0.3s;
            box-shadow: 0 10px 20px rgba(3, 52, 3, 0.2); margin-top:0.5rem;
            font-family:'Poppins',sans-serif;
        }
        .btn-login:hover { transform:translateY(-2px); box-shadow: 0 12px 25px rgba(3, 52, 3, 0.3); }

        .alert-error {
            background: #fef2f2; border: 1px solid #fecaca;
            color: #b91c1c; padding: 0.875rem 1rem; border-radius: 10px;
            font-size: 0.85rem; margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;
            font-weight: 500;
        }

        .back-link {
            display:block; text-align:center; margin-top:1.5rem;
            color:var(--gray-500); font-size:0.85rem; text-decoration:none; transition:color 0.2s; font-weight: 500;
        }
        .back-link:hover { color:var(--green-700); text-decoration: underline; }
    </style>
</head>
<body>
    <div class="bg-pattern"></div>
    <div class="login-card">
        <div class="login-logo" style="overflow:hidden;border-radius:50%;">
            @if(isset($_home) && $_home && $_home->brand_logo)
            <img src="{{ Storage::url($_home->brand_logo) }}" alt="Logo" style="width:100%;height:100%;object-fit:cover;">
            @else
            OMK
            @endif
        </div>
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
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus placeholder="Masukkan email">
                    <i class="bi bi-envelope"></i>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <input type="password" name="password" id="login-password" class="form-input" required placeholder="Masukkan password" style="padding-right:2.75rem;">
                    <i class="bi bi-lock" style="left:1rem;right:auto;"></i>
                    <i class="bi bi-eye-slash" id="toggle-password" style="position:absolute;right:0.875rem;left:auto;color:var(--gray-400);cursor:pointer;font-size:1.1rem;transition:color 0.2s;" onclick="togglePassword()"></i>
                </div>
            </div>

            <button type="submit" class="btn-login">Login ke Dashboard</button>
        </form>
        
        <a href="{{ route('home') }}" class="back-link"><i class="bi bi-arrow-left"></i> Kembali ke Beranda</a>
    </div>

<script>
function togglePassword() {
    var input = document.getElementById('login-password');
    var icon = document.getElementById('toggle-password');
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
    } else {
        input.type = 'password';
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
    }
}
</script>
</body>
</html>
