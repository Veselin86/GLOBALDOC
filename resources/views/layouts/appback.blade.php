<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- Metatags, títulos, y enlace a Tailwind CSS aquí -->
</head>

<body>
    @include('layouts.header')

    <div class="flex">

        @include('layouts.aside')

        <main class="flex-grow">
            @yield('page_title')
            @yield('content')
        </main>

    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.store('dropdown', {
                open: false
            });
        });
    </script>
</body>

</html>
