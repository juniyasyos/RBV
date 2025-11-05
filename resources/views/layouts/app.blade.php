<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Ruang Baca Virtual')</title>

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- CSS Reset -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}" />

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    @stack('styles')
</head>
<body>
    <!-- Latar Belakang -->
    <div class="background-fade"></div>

    <!-- Konten Utama -->
    <div class="main-content">
        <!-- Navbar Atas -->
        @include('partials.navbar-top')

        <!-- Navbar Bawah -->
        @include('partials.navbar-bottom')

        <!-- Main Content -->
        @yield('content')

        <!-- Footer -->
        @include('partials.footer')
    </div>

    <!-- Main JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('scripts')
</body>
</html>
