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

    <!-- Tiny MCE -->
    <x-heads.tinymce-config />
</head>
<body>
<div id="app">
    <div class="d-flex flex-column min-wh-100">
        @include('partials.navbar')
        <main id="main" class="flex-shrink-0 pt-4">
            @yield('content')
        </main>
    </div>
</div>
<script>
    feather.replace()
</script>
</body>
</html>
