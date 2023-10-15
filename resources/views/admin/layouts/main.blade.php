<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">
    @vite('resources/scss/admin.scss')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="preloader flex-column justify-content-center align-items-center">
            <div class="animation__shake">{{ config('app.name') }}</div>
        </div>

        @include('admin.includes.main.navbar')
        @include('admin.includes.main.sidebar')

        <div class="content-wrapper">
            @include('admin.includes.main.header')
            <div class="content-wrapper">

                @yield('content')

                @include('admin.includes.main.footer')
                <aside class="control-sidebar control-sidebar-dark">
                </aside>
            </div>
            @include('admin.includes.main.script')
</body>

</html>
