<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/sass/app.scss')
</head>

<body class="font-sans antialiased">
    <div id="app">
        <!-- Header -->
        @include('layouts.header')
        <div class="container-fluid">
            <div class="row">
                <!-- Aside -->
                <div class="col-md-3">
                    @include('layouts.aside')
                </div>
                <!-- Content -->
                <div class="col-md-9">
                    <main class="py-4">
                        @yield('content')
                    </main>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.translations = {
            'Are you sure?': '{{ __("Are you sure?") }}',
            'You won`t be able to revert this!': '{{ __("You won`t be able to revert this!") }}',
            'Yes, delete it!': '{{ __("Yes, delete it!") }}'
        };
    </script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('dropdown', {
                open: false
            });
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @vite('resources/js/confirm-deletion.js')
</body>

</html>
