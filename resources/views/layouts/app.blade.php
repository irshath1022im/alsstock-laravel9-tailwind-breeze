<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ALS STOCK </title>

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



    <body class="">




        {{-- @include('navigation') --}}

        <div class="w-full">


            <header class="flex bg-gray-700 text-white item-center  justify-between items-center">

                <span class="text-2xl sm:text-3xl text-white p-3 block font-bold">
                   ALS STOCK MANAGEMENT
                </span>

                <nav class="">
                    <ul class="flex-col md:flex md:flex-row items-center ">
                        <li class="border-white border">
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

                        <li class="border-white border">
                            <a href="{{ route('storeRequest.index') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">STORE REQUEST</a>
                        </li>

                        @guest

                        <li class="border-white border">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('reports',['store' => 'uniforms']) }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                UNIFORM REPORT
                            </a>
                        </li>

                        <li class="border-white border">
                            {{-- <a href="{{ route('login') }}" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">LOGIN</a> --}}
                            <a href="{{ route('reports',['store' => 'promotional_items']) }}" target="_blank" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                PROMOTION ITEMS REPORT
                            </a>
                        </li>


                        <li class="">
                            <a href="{{ route('login') }}"   class="block px-4 py-2 hover:bg-indigo-800 rounded-md">
                                <x-button class="bg-green-400">LogIn</x-button>
                            </a>
                        </li>
                        @endguest

                        @auth

                        <div>

                            <form action="{{ route('logout') }}" method="POST" class="flex">
                                @csrf
                                    <x-button class="bg-red-400">LogOut</x-button>
                            </form>
                        </div>


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
