<div>

@component('components.success')

@endcomponent

    <div
            x-data="{open:$entangle('modalOpen')}"
            {{-- x-data="{open:$wire.modalOpen}" --}}
        >
            <div>

                <button @click="$wire.set('modalOpen', true)" type="button" class="bg-white border border-black px-4 py-2 focus:ring-8 focus:ring-amber-800">New</button>

                <h5 x-text="open"></h5>

            </div>



    @foreach ($categories as $category)
        <ul>
            <li>{{ $category->category }}
                     <button class="bg-red-200 text-sm rounded-md p-2 my-1"
                     wire:click="editCategoryRequest({{ $category }})"
                     >Edit</button>
            </li>
        </ul>
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
