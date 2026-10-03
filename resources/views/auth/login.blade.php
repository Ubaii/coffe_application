<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#147d72">
    <title>Masuk — KOPI SENJA</title>
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
                        <span class="login-eyebrow">SEJAK SENJA, SELALU ADA CERITA</span>
                        <h2>Ruang kecil untuk jeda yang berarti.</h2>
                        <p>Kelola kedai dengan tenang. Biar setiap cangkir punya ceritanya sendiri.</p>
                    </div>
                    <span class="login-photo-caption">Dibuat dengan hangat, diseduh dengan hati.</span>
                </div>
            </aside>
            <div class="login-form-side">
                <section class="login-card">
                    <div class="login-brand">
                        <span class="brand-mark">K</span>
                        <span class="brand-name">KOPI SENJA</span>
                        <span class="brand-subtitle">Coffee Shop Management System</span>
                    </div>
                    <h1>Selamat datang kembali</h1>
                    <p class="login-intro">Masuk untuk melanjutkan pengelolaan coffee shop Anda.</p>
                    @if(session('status'))<p class="form-alert success">{{ session('status') }}</p>@endif
                    @if($errors->any())<p class="form-alert error">{{ $errors->first() }}</p>@endif
                    <form class="login-form" action="{{ route('login.store') }}" method="post">
                        @csrf
                        <div class="form-group"><label class="field-label" for="email">Email</label><input class="input-control" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@email.com" autocomplete="email" required></div>
                        <div class="form-group">
                            <div class="login-label-row"><label class="field-label" for="password">Password</label><a href="{{ route('password.request') }}">Lupa password?</a></div>
                            <div class="password-field">
                                <input class="input-control" id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required data-password-input>
                                <button class="password-toggle" type="button" aria-label="Tampilkan password" aria-pressed="false" data-password-toggle>
                                    <x-icon name="eye" />
                                </button>
                            </div>
                        </div>
                        <label class="login-remember"><input type="checkbox" name="remember" value="1" @checked(old('remember'))> Ingat saya</label>
                        <button type="submit" class="btn btn-primary login-submit">Masuk ke dashboard</button>
                    </form>
                    @if($registrationAvailable)
                        <p class="login-signup">Pertama kali menggunakan aplikasi? <a href="{{ route('register') }}">Buat akun administrator</a></p>
                    @else
                        <p class="login-signup">Untuk membuat akun administrator atau kasir, masuk sebagai administrator lalu buka menu <strong>Akun Pegawai</strong>. Pendaftaran di halaman ini hanya untuk administrator pertama.</p>
                    @endif
                </section>
            </div>
        </section>
    </main>
</body>
</html>
