<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css?family=inter:400,600&display=swap" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-100 text-gray-800">
<div class="min-h-screen">
    {{-- ナビゲーションバー --}}
    @include('layouts.navigation')

    {{-- フラッシュメッセージ --}}
    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded m-4">
            {{ session('success') }}
        </div>
    @endif

    {{-- コンテンツ --}}
    <main class="py-8 px-4 sm:px-8 max-w-6xl mx-auto">
        @yield('content')
    </main>
</div>
</body>
</html>
