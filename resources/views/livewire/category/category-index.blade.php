<div>

@component('components.success')

@endcomponent

    <div
            x-data="{open:$entangle('modalOpen')}"
            x-cloak
            {{-- x-data="{open:$wire.modalOpen}" --}}
        >
            <div>

                <button @click="$wire.set('modalOpen', true)"
                type="button" class="btn-green bg-white px-4 py-2 focus:ring-8 focus:ring-amber-800 rounded-md m-2">New Category</button>

                <h5 x-text="open"></h5>

            </div>


            <div class="Rectangle2  bg-white flex items-center p-3 ">
                <div class="  text-black text-base font-bold font-['lato'] basis-1/4 " >#</div>
                <div class="Store  text-black text-base font-bold font-['lato']  basis-1/4 ">CATEGORY</div>
                <div class="Categoryies  text-black text-base font-bold font-['lato'] basis-1/4  ">STORE</div>
                <div class="Items  text-black text-base font-bold font-['lato']  basis-1/4 ">ITEMS</div>
            </div>


    @foreach ($categories as $category)
        {{-- <ul>
            <li>{{ $category->category }}
                     <button class="bg-red-200 text-sm rounded-md p-2 my-1"
                     wire:click="editCategoryRequest({{ $category }})"
                     >Edit</button>
            </li>
        </ul> --}}

        <div class="Rectangle2  bg-white flex  items-center p-3  mt-1">
            <div class="  text-black text-base font-bold font-['lato'] basis-1/4  ">{{ $loop->iteration }}</div>
            <div class="  text-black text-base font-bold font-['lato'] basis-1/4 uppercase ">{{ $category->category }}</div>
            <div class="Store  text-black text-base font-bold font-['lato'] basis-1/4 ">{{ $category->store->store }}</div>
            <div class="Categoryies  text-black text-base font-bold font-['lato'] basis-1/4 flex  ">
                <div>{{ $category->items->count()}}</div>
                <a href="{{ route('itemHome') }}"><div>

                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                         <path d="M8.5 19H19.385C19.829 19 20.209 18.8417 20.525 18.525C20.8417 18.209 21 17.829 21 17.385V14.98H8.5V19ZM3 9.02H7.5V5H4.615C4.171 5 3.791 5.15833 3.475 5.475C3.15833 5.791 3 6.171 3 6.615V9.02ZM3 14H7.5V10.02H3V14ZM4.615 19H7.5V14.98H3V17.385C3 17.829 3.15833 18.209 3.475 18.525C3.791 18.8417 4.171 19 4.615 19ZM8.5 14H21V10.02H8.5V14ZM8.5 9.02H21V6.614C21 6.17 20.8417 5.79 20.525 5.474C20.209 5.158 19.829 5 19.385 5H8.5V9.02Z" fill="#B52F2F"/>
                         </svg>
                </div></a>
            </div>

            <div class="Rectangle4  bg-orange-600 rounded-md p-1">
                <div
                wire:click="editCategoryRequest({{ $category }})"
                class="Edit w-16 h-6 text-white text-base font-bold font-['lato'] text-center">EDIT</div>
            </div>


        </div>

    @endforeach

        <div class="fixed inset-0"
        x-show= "$wire.modalOpen"
        {{-- @keydown.escape.prevent.stop="open = false" --}}
        role="dialog"
        aria-labelledby="categor-form"
        >

            <div class="fixed inset-0 bg-black bg-opacity-50"></div>


    {{-- modal --}}

                <div class="relative h-full w-full flex items-center justify-center"
                    {{-- @click="open = false" --}}

                >

                {{-- modal body --}}
                    <div style="max-height: 80vh"
                        class="max-w-2xl  w-full bg-white border border-yellow-500 p-8 overflow-y-auto"
                        {{-- @click.stop --}}
                    >


                     @livewire('category.new-category-form')

                        {{-- <div class="mt-8 flex space-x-2">
                            <button class="bg-white border border-black px-4 py-2 focus:outline-none focus:ring-4 focus:ring-aqua">confirm</button>
                            <button class="bg-white border border-black px-4 py-2 focus:outline-none focus:ring-4 focus:ring-aqua"

                            >cancell</button>
                        </div> --}}


                    </div>

                </div>


            </div>


    </div>





</div>
