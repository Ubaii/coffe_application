<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#147d72">
    <title>Password baru — KOPI SENJA</title>
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
                        <span class="login-eyebrow">PENGATURAN AKUN</span>
                        <h2>Buat password baru yang aman.</h2>
                        <p>Setelah disimpan, gunakan password baru ini untuk masuk kembali ke KOPI SENJA.</p>
                    </div>
                    <span class="login-photo-caption">Jaga password Anda tetap aman.</span>
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
                    <h1>Buat password baru</h1>
                    <p class="login-intro">Buat password baru minimal 8 karakter untuk akun Anda.</p>
                    @if($errors->any())<p class="form-alert error" role="alert">{{ $errors->first() }}</p>@endif
                    <form class="login-form" action="{{ route('password.update') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="form-group">
                            <label class="field-label" for="email">Email</label>
                            <input class="input-control" id="email" name="email" type="email" value="{{ old('email', $email) }}" autocomplete="email" required>
                        </div>
                        <div class="form-group">
                            <label class="field-label" for="password">Password baru</label>
                            <div class="password-field">
                                <input class="input-control" id="password" name="password" type="password" placeholder="Minimal 8 karakter" minlength="8" autocomplete="new-password" required data-password-input>
                                <button class="password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false" data-password-toggle><x-icon name="eye" /></button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="field-label" for="password_confirmation">Konfirmasi password</label>
                            <div class="password-field">
                                <input class="input-control" id="password_confirmation" name="password_confirmation" type="password" placeholder="Ulangi password baru" minlength="8" autocomplete="new-password" required data-password-input>
                                <button class="password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false" data-password-toggle><x-icon name="eye" /></button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary login-submit">Simpan password baru</button>
                    </form>
                    <p class="login-signup">Ingat password? <a href="{{ route('login') }}">Kembali ke halaman masuk</a></p>
                </section>
            </div>
        </section>
    </main>
</body>
</html>
