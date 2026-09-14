<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk - POS Garam</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="{{ asset('css/material.css') }}">
    <style>
        .login-page {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            padding: 20px;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            background-color: #ffffff;
            border-radius: var(--md-shape-corner-medium);
            box-shadow: var(--md-elevation-2);
            border: 1px solid var(--md-sys-color-outline-variant);
            padding: 36px 32px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .login-logo {
            width: 52px;
            height: 52px;
            background-color: var(--md-sys-color-primary);
            color: #ffffff;
            border-radius: var(--md-shape-corner-medium);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }
        .login-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--md-sys-color-on-surface);
            margin-bottom: 4px;
        }
        .login-subtitle {
            font-size: 13px;
            color: var(--md-sys-color-on-surface-variant);
        }
        .demo-box {
            background-color: var(--md-sys-color-surface-container-high);
            border: 1px solid var(--md-sys-color-outline-variant);
            border-radius: var(--md-shape-corner-small);
            padding: 12px;
            margin-top: 24px;
            font-size: 12px;
            color: var(--md-sys-color-on-surface-variant);
        }
        .demo-role-btn {
            display: inline-block;
            margin: 4px 4px 0 0;
            padding: 4px 8px;
            background-color: #ffffff;
            border: 1px solid var(--md-sys-color-outline);
            border-radius: 4px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 500;
        }
    </style>
</head>
<body class="login-page">
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">
                <span class="material-symbols-outlined" style="font-size: 32px;">grain</span>
            </div>
            <h1 class="login-title">Masuk Sistem</h1>
            <p class="login-subtitle">POS Penjualan & Inventori Garam</p>
        </div>

        @if($errors->any())
            <div class="md-alert md-alert-error" style="margin-bottom: 20px;">
                <span class="material-symbols-outlined">error</span>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST">
            @csrf
            <div class="form-group">
                <label class="form-label" for="email">Email</label>
                <input type="email" id="email" name="email" class="form-input {{ $errors->has('email') ? 'is-invalid' : '' }}" value="{{ old('email') }}" required autofocus placeholder="nama@email.com">
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" class="form-input {{ $errors->has('password') ? 'is-invalid' : '' }}" required placeholder="••••••••">
            </div>

            <div style="display: flex; align-items: center; justify-content: space-between; margin-bottom: 24px;">
                <label style="display: flex; align-items: center; gap: 8px; font-size: 13px; cursor: pointer;">
                    <input type="checkbox" name="remember">
                    <span>Ingat Saya</span>
                </label>
            </div>

            <button type="submit" class="md-btn md-btn-primary" style="width: 100%; padding: 12px; font-size: 14px;">
                <span class="material-symbols-outlined">login</span>
                <span>Masuk</span>
            </button>
        </form>

        <div class="demo-box">
            <div style="font-weight: 600; margin-bottom: 6px; color: var(--md-sys-color-on-surface);">Akun Pengujian:</div>
            <div>Admin: <strong>admin@posgaram.com</strong> (Sandi: password123)</div>
            <div>Owner: <strong>owner@posgaram.com</strong> (Sandi: password123)</div>
            <div style="margin-top: 8px;">
                <button type="button" class="demo-role-btn" onclick="fillLogin('admin@posgaram.com', 'password123')">Isi Admin</button>
                <button type="button" class="demo-role-btn" onclick="fillLogin('owner@posgaram.com', 'password123')">Isi Owner</button>
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
