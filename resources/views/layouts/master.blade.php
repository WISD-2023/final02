<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 校園書籍交易網</title>

    <!-- css, js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-slate-900">
<div class="min-h-screen bg-gray-100">
    @include('layouts.partials.navigation')

    <!-- Page Content -->
    <main class="bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white">
        <!-- Toast Component -->
        @include('components.toasts')

        @yield('page-content')
    </main>
</div>
</body>
</html>
