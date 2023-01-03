<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ALS STOCK  PRINT REQUEST </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />

        <!-- Alpine Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/focus@3.x.x/dist/cdn.min.js"></script>

        <!-- Alpine Core -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


        {{-- @vite('resources/css/app.css') --}}


        <style>
            [x-cloak] {
           display: none !important;
        }
         </style>

        @livewireStyles


    </head>



    <body class="w-full mx-auto"
        onload=window:print();
        >



            @yield('content')




        @livewireScripts

    </body>
</html>
