<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- @hasSection('title')
    <title>@yield('title') - {{ config('app.name') }}</title>
    @else
    <title>{{ config('app.name') }}</title>
    @endif --}}

    <title>{{ $title ?? config('app.name', 'Procurement MS') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url(asset('front-assets/images/superiorLogo.png')) }}">

    <!-- Fonts -->
    {{--
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css"> --}}

    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @livewireStyles
    @livewireScripts

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="max-h-[400px] overflow-y-auto
        [&::-webkit-scrollbar]:w-2
        [&::-webkit-scrollbar-track]:rounded-full
        [&::-webkit-scrollbar-track]:bg-gray-100
        [&::-webkit-scrollbar-thumb]:rounded-full
        [&::-webkit-scrollbar-thumb]:bg-blue-600">

    @livewire('components.modals.signout')
    <div class="overflow-auto">
        @yield('body')
    </div>


    @include('sweetalert::alert')

</body>

</html>