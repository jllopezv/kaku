<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>KAKU</title>

        @include('layouts.partials.appscripts')
        @include('layouts.partials.appstyles')

    </head>
    <body class="antialiased">
        
        <x-lopsoft.sidebar.sidebar-layout>

            <x-slot name='header'>
                {{--<div class='cursor-pointer' @click="goRoute('{{ route('dashboard') }}')"> <img class='h-8' src="{{ getImage(getSetting('VENDOR_LOGO_OVERBLACK')) }}" /></div>--}}
                header
            </x-slot>

            <x-slot name='headerright'>
                right
            </x-slot>

            <x-slot name='sidebar'>
                @include('dashboards.sidebars.'.auth()->user()->dashboard)
            </x-slot>

            <x-slot name='content'>
             
                    @yield('content')
             
            </x-slot>

        </x-lopsoft.sidebar.sidebar-layout>

        @stack('scripts')

    </body>
</html>
