<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title', 'Halaman resmi organisasi Ikatan Keluarga Kampuang Tanjuang')</title>
        <meta name="description" content="@yield('description', 'Halaman resmi IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')">
        <meta name="keywords" content="@yield('keywords', 'Ikatan Keluarga Kampuang Tanjuang IK2T IKAKO AMAL PKDP Padang Pariaman Aurmalintang')">

		<meta property="og:title" content="@yield('title', 'Halaman resmi organisasi Ikatan Keluarga Kampuang Tanjuang')">
		<meta property="og:description" content="@yield('description', 'Halaman resmi IK2T Kampuang tanjuang, IV koto Aur Malintang. kab Padang pariaman.')">
		<meta property="og:site_name" content="IK2T-AMAL">
		<meta property="og:image" content="/image-ik2t.png">
        <!-- Fonts -->
        <link rel="shortcut icon" href="/favicon-ik2t.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <style>
            input.no-spin::-webkit-outer-spin-button,
            input.no-spin::-webkit-inner-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            input[type=number].no-spin {
                -moz-appearance:textfield;
            }
        </style>
        @livewireStyles
        @stack('styles')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @stack('scripts')
        @livewireScripts
    </head>
    <body class="font-sans antialiased bg-gray-100">

        <!-- Page Heading -->
        @if (!empty($header))
            {{ $header }}
        @else
        @include('layouts.website-navigation')
        @endif

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
        {{-- App Livewire Component  --}}
        <livewire:app-notify />
        {{-- <livewire:app-modal /> --}}


        {{-- Modals --}}

        @stack('modals')
    </body>
</html>
