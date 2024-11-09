<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}">
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

<!-- JQuery -->
<script src="{{ asset('js/jquery.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('js/bootstrap-switch.js') }}"></script>
<!-- Dropzone -->
<script src="{{ asset('js/dropzone.js') }}"></script>
<!--Select 2-->
<script src="{{asset('js/select2.full.min.js')}}"></script>
<script src="{{ asset('js/adminlte.js') }}"></script>
@yield('scripts')
</body>
</html>
