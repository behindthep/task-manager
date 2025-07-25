<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Простой Менеджер Задач. Создавайте задачи и назначайте их другим пользователям.">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />

        <title>@yield('title', __('Task manager'))</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">

            <!-- Page Heading -->
            <header class="bg-white shadow">
                @include('layouts.navigation')
            </header>

            <!-- Page Content -->
            <main class="max-w-screen-xl px-4 pt-10 pb-8 mx-auto">
                @include('flash::message')
                @yield('content')
            </main>

            <footer class="sticky top-full bg-gray-700 shadow">
                @include('layouts.footer')
            </footer>
        </div>
    </body>
</html>
