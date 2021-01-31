<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')
    </head>
    <body class="font-sans antialiased">

        <!-- Page Heading -->
        @if (!empty($header))
            {{ $header }}
        @else
        @include('layouts.website-navigation')
        @endif

        {{-- Page Message --}}
        <livewire:notify />

        <!-- Page Content -->
        <main class="min-h-screen">
            {{ $slot }}
        </main>

        <!--Footer-->
        <footer class="bg-gray-200">
            <div class="flex flex-col justify-between max-w-screen-xl pt-4 pb-3 mx-auto mt-5 text-sm text-center md:flex-row md:px-6 md:text-left fade-in">
                <a class="text-gray-500 no-underline hover:no-underline" href="#">&copy; IK2T {{date('Y')}}</a>
                <a class="text-gray-500 no-underline hover:no-underline" href="#">Powered by Hendro Wibowo</a>
            </div>
        </footer>

        @livewireScripts
    </body>
</html>
