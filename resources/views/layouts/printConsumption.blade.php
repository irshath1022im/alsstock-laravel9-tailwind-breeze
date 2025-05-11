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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">


        <!-- Alpine Core -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>


        {{-- @vite('resources/css/app.css') --}}


        <style>
            [x-cloak] {
           display: none !important;
        }

        .table-tr{
            margin-top: 5px;
            border-bottom: 1px solid rgb(210, 210, 224);
        }

        .btn-info {
            padding:0 5px 0 5px;
            margin: 2px;
            border-radius: 10px;
        }
         </style>

        @livewireStyles


    </head>



    <body class="w-[90%] mx-auto bg-gray-700 mt-3"
        {{-- onload=window:print(); --}}
        >

        <div class=" text-white p-3 font-bold  flex items-center justify-between border-white ">
            <span><img src="/images/logo.png" class="w-16 h-16 rounded" /> </span>
           <span class="text-2xl sm:text-3xl items-end font-['Righteous'] shadow-gray-200 shadow-md ml-2"> ALS STOCK MANAGEMENT </span>
        </div>

            @yield('content')




        @livewireScripts

    </body>
</html>
