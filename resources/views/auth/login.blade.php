<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - POS Garam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <style>
        .login-page-wrap {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8fafc;
            padding: 24px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .login-box {
            width: 100%;
            max-width: 440px;
            background-color: #ffffff;
            border-radius: 24px;
            box-shadow: 0 16px 40px rgba(18, 24, 38, 0.06);
            border: 1px solid #e5e9f2;
            padding: 40px 36px;
        }
        .login-brand-header {
            text-align: center;
            margin-bottom: 32px;
        }
        .login-brand-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #4f75ff 0%, #7693ff 100%);
            color: #ffffff;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
            box-shadow: 0 8px 18px rgba(79, 117, 255, 0.28);
        }
        .login-brand-title {
            font-size: 24px;
            font-weight: 800;
            color: #121826;
            letter-spacing: -0.5px;
            margin-bottom: 6px;
        }
        .login-brand-desc {
            font-size: 13.5px;
            color: #6b7280;
        }
        .login-input-group {
            margin-bottom: 20px;
        }
        .login-input-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: #121826;
            margin-bottom: 8px;
        }
        .login-input {
            width: 100%;
            padding: 13px 18px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            font-family: inherit;
            font-size: 14px;
            color: #121826;
            background-color: #ffffff;
            outline: none;
            transition: all 0.2s ease;
        }
        .login-input:focus {
            border-color: #4f75ff;
            box-shadow: 0 0 0 3px rgba(79, 117, 255, 0.12);
        }
        .login-submit-btn {
            width: 100%;
            padding: 14px;
            border-radius: 9999px;
            background-color: #4f75ff;
            color: #ffffff;
            font-family: inherit;
            font-size: 14.5px;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            box-shadow: 0 4px 14px rgba(79, 117, 255, 0.3);
            transition: all 0.25s ease;
            margin-top: 8px;
        }
        .login-submit-btn:hover {
            background-color: #3b62eb;
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(79, 117, 255, 0.38);
        }
        .demo-accounts-card {
            margin-top: 28px;
            padding: 16px 18px;
            background-color: #f8fafc;
            border: 1px solid #e5e9f2;
            border-radius: 16px;
            font-size: 12.5px;
            color: #4b5563;
        }
        .demo-pill-btn {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 6px 14px;
            background-color: #ffffff;
            border: 1px solid #cbd5e1;
            border-radius: 9999px;
            font-family: inherit;
            font-size: 11.5px;
            font-weight: 600;
            color: #121826;
            cursor: pointer;
            margin-top: 8px;
            margin-right: 6px;
            transition: all 0.2s ease;
        }
        .demo-pill-btn:hover {
            border-color: #4f75ff;
            color: #4f75ff;
            background-color: #eff3ff;
        }
    </style>
</head>
<body class="login-page-wrap">
    <div class="login-box">
        <div class="login-brand-header">
            <div class="login-brand-icon">
                <span class="material-symbols-outlined" style="font-size: 26px;">grain</span>
            </div>
            <h1 class="login-brand-title">Masuk ke Sistem</h1>
            <p class="login-brand-desc">POS Penjualan &amp; Pengolahan Garam</p>
        </div>

        @if($errors->any())
            <div class="md-alert md-alert-error" style="border-radius: 12px; margin-bottom: 20px;">
                <span class="material-symbols-outlined">error</span>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="login-input-group">
                <label class="login-input-label" for="email">Alamat Email</label>
                <input type="email" id="email" name="email" class="login-input" value="{{ old('email', 'admin@posgaram.com') }}" required autofocus placeholder="nama@posgaram.com">
            </div>

            <div class="login-input-group">
                <label class="login-input-label" for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" class="login-input" required placeholder="••••••••" value="password123">
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 13px; color: #4b5563; cursor: pointer;">
                    <input type="checkbox" name="remember" checked style="accent-color: #4f75ff;">
                    <span>Ingat saya</span>
                </label>
                <a href="{{ url('/') }}" style="color: #4f75ff; text-decoration: none; font-size: 13px; font-weight: 600;">Kembali ke Beranda</a>
            </div>

            <button type="submit" class="login-submit-btn">
                <span>Masuk Sekarang</span>
                <span class="material-symbols-outlined" style="font-size: 18px;">arrow_forward</span>
            </button>
        </form>

        <div class="demo-accounts-card">
            <div style="font-weight: 700; color: #121826; margin-bottom: 4px;">Akun Akses Cepat:</div>
            <div>Admin: <strong>admin@posgaram.com</strong> (password123)</div>
            <div>Owner: <strong>owner@posgaram.com</strong> (password123)</div>
            <div>
                <button type="button" class="demo-pill-btn" onclick="fillLogin('admin@posgaram.com', 'password123')">
                    <span class="material-symbols-outlined" style="font-size: 14px;">admin_panel_settings</span>
                    <span>Isi Admin</span>
                </button>
                <button type="button" class="demo-pill-btn" onclick="fillLogin('owner@posgaram.com', 'password123')">
                    <span class="material-symbols-outlined" style="font-size: 14px;">account_balance</span>
                    <span>Isi Owner</span>
                </button>
            </div>
        </div>
    </div>

    <script>
        function fillLogin(email, password) {
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
</body>
</html>
