<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Подключение стилей AdminLTE -->
    <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
    @yield('styles')
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Navbar -->
    @include('admin.partials.navbar')

    <!-- Sidebar -->
    @include('admin.partials.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Footer -->
    @include('admin.partials.footer')
</div>

<!-- Подключение скриптов AdminLTE -->
<script src="{{ asset('js/adminlte.js') }}"></script>
@yield('scripts')
</body>
</html>
