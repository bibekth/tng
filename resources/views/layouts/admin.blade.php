<!DOCTYPE html>
<html lang="en">

<head>
    <base href="{{ config('app.url') }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="{{ config('app.name', 'TnG - The Next Group') }}">
    <meta name="author" content="{{ config('app.admin') }}">
    <meta name="keyword" content="tng, TnG, TNG, The Next Group">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'TnG - The Next Group') }}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
    <link rel="android-chrome" sizes="192x192" href="{{ asset('android-chrome-192x192.png') }}">
    <link rel="android-chrome" sizes="512x512" href="{{ asset('android-chrome-512x512.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.1/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script>
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            document.documentElement.setAttribute('data-bs-theme', 'dark');
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <div class="admin-left-section">
            @include('layouts.admin-left-section')
        </div>
        <div class="admin-top-section">
            @include('layouts.admin-top-section')
        </div>
        <div class="admin-main-section">
            @include('layouts.admin-session')
            <div class="container p-5">
                @yield('admin-section')
            </div>
        </div>
        <div class="admin-footer-section">
            @include('layouts.admin-footer-section')
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>
<script src="{{ asset('js/admin.js') }}"></script>
</html>
