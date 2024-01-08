<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased flex min-h-screen bg-gray-100 dark:bg-gray-800">
    @include('layouts.partials.navigation')

    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white shadow max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </header>
    @endif

    <!-- Page Content -->
    <main class="flex-1 bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-white min-h-screen">
        {{ $slot }}
    </main>
    </body>

</html>
