<nav class="absolute inset-0 transform duration-200 lg:relative z-10 w-48 bg-indigo-900 text-white h-screen p-3 lg:transform-none opacity-100"
    :class="open ? 'translate-x-0 ease-in opacity-100' : '-translate-x-full ease-out' "
>

    <div class="flex justify-between">
        <span class="font-bold text-2xl sm:text-3xl p-2 ">SideBar</span>

        <button
            class="p-2 focus:outline-none focus:bg-indigo-800 hover:bg-indigo-800 rounded-md lg:hidden"
            {{-- alpine behaviour to close the open side bar --}}
            @click="open = !open"
            >

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
              </svg>
        </button>
    </div>

    <ul class="mt-8">
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">HOME</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">STORE</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">CATEGORIES</a>
        </li>
        <li>
            <a href="#" class="block px-4 py-2 hover:bg-indigo-800 rounded-md">ITEMS</a>
        </li>
    </ul>

</nav>
