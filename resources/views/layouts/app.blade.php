<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#147d72">
    <title>@yield('title', 'Dashboard') — KOPI SENJA</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="app-body">
    <div class="app-shell">
        <x-sidebar />
        <div class="app-main">
            <x-navbar />
            <main class="page-content">
                @if(session('status'))
                    <p class="form-alert success" role="status">{{ session('status') }}</p>
                @endif
                @if($errors->any())
                    <p class="form-alert error" role="alert">{{ $errors->first() }}</p>
                @endif
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
