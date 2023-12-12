<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title class="print:hidden">ALS STOCK </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                    <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">

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


       @media print {

                * {
                        display:block;
                    }
                    script, style {
                        display:none;
                    }
                    .pageBreadDiv {
                        page-break-inside:avoid;
                    }


            }

        </style>

        @livewireStyles


    </head>



    <body class=" h-screen m-auto bg-gradient-to-b from-blue-600 to-purple-800">

        <div class="AdminHome w-[90%] h-full m-auto flex">

            <div class="Rectangle1 w-80 h-full bg-gradient-to-b from-violet-950 to-black">

                <div class="flex justify-center pt-6">

                    <img class="AlShahaniaWhiteLogo1 w-45 h-32" src="/images/AlShahaniaWhiteLogo1.png" />
                </div>

                <div class="Group1 mt-10 ml-5 p-5 ">
                    <a href="/">
                    <div class="Home  text-white text-base font-bold p-3 font-['lato']">HOME</div>
                    </a>

                   <a href="{{ route('stores') }}">
                     <div class="Store  text-white text-base font-bold  p-3 font-['lato']">STORE</div>
                   </a>

                   <a href="{{ route('categories.index') }}">
                     <div class="Category  text-white text-base font-bold p-3 font-['lato']">CATEGORY</div>
                   </a>

                   <a href="{{ route('itemHome') }}">
                     <div class="Items  text-white text-base font-bold p-3 font-['lato']">ITEMS</div>
                   </a>

                    <div class="StoreRequests  text-white text-base font-bold  p-3 font-['lato']">STORE REQUESTS</div>
                    <div class="Reports  text-white text-base font-bold p-3 font-['lato']">REPORTS</div>
                </div>

            </div>


            <div class="container p-2 mx-auto">
                @yield('content')
            </div>

        </div>






        @livewireScripts

    </body>
</html>
