<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KAKU</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css?family=nunito:300" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body {
                font-family: 'Nunito', sans-serif;
                font-size: 20px;
            }
        </style>

    </head>
    <body class="antialiased bg-slate-900">
        
        @yield('content')

        @stack('scripts')

    </body>
</html>
