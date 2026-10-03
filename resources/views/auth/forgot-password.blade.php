<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#147d72">
    <title>Lupa password — KOPI SENJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <main class="login-page">
        <section class="login-layout">
            <aside class="login-visual">
                <img src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?auto=format&amp;fit=crop&amp;w=1400&amp;q=85" alt="Suasana hangat di kedai kopi" fetchpriority="high">
                <div class="login-visual-shade"></div>
                <div class="login-visual-content">
                    <a class="login-visual-brand" href="{{ route('login') }}"><span class="brand-mark">K</span><span>KOPI SENJA</span></a>
                    <div class="login-quote">
                        <span class="login-eyebrow">AKSES AKUN KOPI SENJA</span>
                        <h2>Kami bantu Anda masuk kembali.</h2>
                        <p>Masukkan email akun dan kami akan mengirim tautan untuk mengatur ulang password.</p>
                    </div>
                    <span class="login-photo-caption">Akun Anda tetap aman bersama KOPI SENJA.</span>
                </div>
            </aside>
            <div class="login-form-side">
                <x-back-button class="auth-back" :fallback="route('login')" />
                <section class="login-card">
                    <div class="login-brand">
                        <span class="brand-mark">K</span>
                        <span class="brand-name">KOPI SENJA</span>
                        <span class="brand-subtitle">Coffee Shop Management System</span>
                    </div>
                    <h1>Lupa password?</h1>
                    <p class="login-intro">Masukkan email akun Anda untuk menerima tautan pengaturan ulang password.</p>
                    @if(session('status'))<p class="form-alert success" role="status">{{ session('status') }}</p>@endif
                    @if($errors->any())<p class="form-alert error" role="alert">{{ $errors->first() }}</p>@endif
                    <form class="login-form" action="{{ route('password.email') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label class="field-label" for="email">Email</label>
                            <input class="input-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required>
                        </div>
                        <button type="submit" class="btn btn-primary login-submit">Kirim tautan reset</button>
                    </form>
                    <p class="login-signup">Ingat password? <a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
                </section>
            </div>
        </section>
    </main>
</body>
</html>
