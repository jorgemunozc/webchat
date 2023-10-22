<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    <title>{{ $title ?? 'Page Title' }}</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>

<body>
    <nav class="w-full bg-gray-200">
        @auth
        {{auth()->user()->visible_name}} ({{auth()->user()->id}})
        @endauth
    </nav>
    {{ $slot }}
</body>

</html>