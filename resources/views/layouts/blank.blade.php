<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KAKU</title>

        @include('layouts.partials.appscripts')
        @include('layouts.partials.appstyles')

    </head>
    <body class="antialiased bg-slate-900">
        
        @yield('content')

        @stack('scripts')

    </body>
</html>
