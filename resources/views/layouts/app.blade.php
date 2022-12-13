<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @hasSection('title')
            @yield('title')
        @else
            {{ config('app_name', 'Shoe Store') }}
        @endif
    </title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;0,700;0,900;1,400&display=swap" rel="stylesheet">
</head>
<body>
<div id="app">
    <div class="d-flex flex-column min-wh-100">
        @include('partials.navbar')
        <main id="main" class="flex-shrink-0">
            <div class="container-fluid">
                @yield('content')
            </div>
        </main>
        @include('partials.footer')
    </div>
</div>
<script>
    feather.replace()
</script>
</body>
</html>
