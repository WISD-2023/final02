<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | 校園書籍後台</title>

    <!-- css, js -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 dark:bg-slate-900">
<!-- header -->
@include('layouts.partials.backstage.header')

<!-- Navigation -->
@include('layouts.partials.backstage.navigation')

<!-- Content -->
<div class="w-full pt-10 px-4 sm:px-6 md:px-8 lg:ps-72 ">

    <main class="bg-white dark:bg-gray-800 text-gray-800 dark:text-white">
        <!-- Toast Component -->
        @include('components.toasts')

        @yield('page-content')
    </main>

</div>
<!-- End Content -->

</body>
</html>
