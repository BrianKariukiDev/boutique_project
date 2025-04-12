<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Karis Boutique' }}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <style>
        h1 {
            color: black
        }
    </style>
</head>

<body class="bg-slate-200">
    @livewire('partials.navbar')
    <main>
        {{ $slot }}
        <div class="fixed bottom-4 right-4 z-50">
    @livewire('chatbot')
</div>
    </main>
    @livewire('partials.footer')
    @livewireScripts
</body>

</html>
