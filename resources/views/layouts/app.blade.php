<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-..." crossorigin="anonymous">
    @yield('additional_styles')
</head>

<body class="font-sans antialiased">

    <div class="container my-4">
        <!-- Навигационная панель -->
        @include('layouts.navigation')

        <!-- Заголовок страницы -->
        @isset($header)
            <div class="bg-light p-4 rounded shadow-sm mb-4">
                <h1 class="display-6">{{ $header }}</h1>
            </div>
        @endisset

        <!-- Основной контент страницы -->
        <main>
            @if (isset($slot) && $slot)
                {{ $slot }}
            @endif
            @yield('content')
        </main>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>
