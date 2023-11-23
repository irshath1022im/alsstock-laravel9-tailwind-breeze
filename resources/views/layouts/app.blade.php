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



    <body class="">




        {{-- @include('navigation') --}}

        <div class="w-full">


            <header class="flex bg-gray-700 text-white justify-between items-end  h-[10vh] container mx-auto ">

                <div class=" text-white p-3 font-bold  flex items-center justify-between border-white ">
                    <span><img src="/images/logo.png" class="w-16 h-16 rounded" /> </span>
                   <span class="text-2xl sm:text-3xl items-end font-['Righteous'] shadow-gray-200 shadow-md ml-2"> ALS STOCK MANAGEMENT </span>
                </div>

                <nav class="print:hidden">
                    <ul class="flex-col md:flex md:flex-row items-center ">
                        <li class="border-r">
                            <a href="/" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">HOME</a>
                        </li>
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">STORE</a>
                        </li> --}}
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">CATEGORIES</a>
                        </li> --}}
                        {{-- <li>
                            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">ITEMS</a>
                        </li> --}}

                        <li class="border-r">
                            <a href="{{ route('storeRequest.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">STORE REQUEST</a>
                        </li>

                        @guest



                        <li class="block rounded-md px-2">
                            <a href="{{ route('login') }}">
                                {{-- <x-button class="bg-green-400">LogIn</x-button> --}}
                                <span class="bg-green-400 px-4 py-1 rounded text-sm">LOG IN</span>
                            </a>
                        </li>
                        @endguest

                        @auth

                        <li class="border-r">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('items.create') }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                NEW ITEM
                            </a>
                        </li>

                        <li class="border-r">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('reports',['store' => 'uniforms']) }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                UNIFORM REPORT
                            </a>
                        </li>

                        <li class="border-r">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('reports',['store' => 'promotional_items']) }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                PROMOTION ITEMS REPORT
                            </a>
                        </li>

                        <li class="border-r">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('reportSummary') }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                SUMMARY
                            </a>
                        </li>


                        <li class="block rounded-md px-2">

                            <form action="{{ route('logout') }}" method="POST" class="flex">
                                @csrf
                                    {{-- <x-button class="bg-red-400">LogOut</x-button> --}}
                                    <button class="bg-red-400 px-4 py-1 rounded text-sm">LOG OUT</button>
                            </form>
                        </li>


                        @endauth
                    </ul>

                </nav>
            </header>

        </div>


        <div class=" md:container mx-auto mt-3">
            @yield('content')
        </div>



        @livewireScripts

    </body>
</html>
