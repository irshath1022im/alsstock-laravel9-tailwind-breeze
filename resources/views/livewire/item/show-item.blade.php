<div>

    <x-success></x-success>

        <h1 x-text="$wire.newTransFormModalStatus"></h1>

    <div  class="border border-slate-700 rounded "
                x-data="{ open2: @entangle('itemSizeFormModal')}"
        >

        <h5 class="bg-slate-500 py-1 px-2 text-2xl">ITEM :
            <span class="bg-blue-200  px-2 mx-3 rounded-full text-lg">{{ $item_id }}</span>
        </h5>

        {{-- ADMIN MENU --}}

        <div class="flex justify-end mr-5">

            @auth

                    <div class="flex justify-center mx-2" >
                        <x-button class="bg-orange-200"
                                x-on:click="open2 = true"
                            > NEW ITEM SIZE
                        </x-button>
                    </div>



                    <div class="flex justify-center"
                        x-data="{ newTransFormModalStatus: @entangle('newTransFormModalStatus')}"
                        >

                        <x-button class="bg-cyan-500"
                                x-on:click="$wire.set('newTransFormModalStatus', true)"
                            > TRANSECTIONS
                        </x-button>

                        {{-- <h1 x-text="$wire.transModalShowStatus"></h1> --}}


                        {{-- Transection Modal --}}
                            <div
                            x-show="$wire.newTransFormModalStatus"
                            style="display: none"
                            x-on:keydown.escape.prevent.stop="newTransFormModalStatus = false"
                            role="dialog"
                            aria-modal="true"
                            x-id="['modal-title2']"
                            :aria-labelledby="$id('modal-title2')"
                            class="fixed inset-0 z-20 overflow-y-auto"
                        >


                            {{-- Overlay --}}
                                <x-modal.overlay
                                    status="newTransFormModalStatus"
                                    x-on:click="newTransFormModalStatus = false"
                                ></x-modal.overlay>

                                <!-- Panel -->
                                    <div
                                        x-show="newTransFormModalStatus"
                                        x-transition
                                        x-on:click="newTransFormModalStatus = true"
                                        class="relative flex min-h-screen items-center justify-center p-4"
                                    >

                                            <div
                                            x-on:click.stop
                                            x-trap.noscroll.inert="newTransFormModalStatus"
                                            class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
                                        >
                                            <!-- Title -->
                                            @livewire('item.item-transection-form',['item_id' => $item_id])

                                            </div>


                                    </div>


                            </div>


                    </div>

                     @endauth


        </div>




        <div class="grid grid-cols-12">


            {{-- ITEM IAMGE COLUMN --}}

            <div class="sm:col-span-3 col-span-full border-r border-pink-200 m-1 p-1">

                <h4 class="text-center text-lg uppercase bg-slate-300 p-2">{{ $item->item }}</h4>

                <div class="relative p-2 ">

                    {{-- /images/logo.png --}}
                    <img src="{{ Storage::url($item->thumbnail) }}" class="border border-red-300 rounded-full" />

                        <a href="{{ route('items.edit',['item' => $item->id]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-0 right-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>

                    </a>
                </div>

            </div>



            {{-- ITEMS SIZE COLUMN --}}





            <div class="col-span-9 border-r border-pink-200 m-1 p-1">


                @if (count($item->itemSize) > 0)

                 @livewire('components.item-size.item-size-list',['item_id' => $item_id])

                @else


                <div class="px-3 border-2 bg-orange-200 rounded py-3 text-center font-bold">
                    No Item Sizes are Found !!!
                </div>

                @endif


            </div>



        </div>




{{-- ITEM SIZE MODAL --}}
        <div
            x-show="open2"
            style="display: none"
            {{-- x-on:keydown.escape.prevent.stop="open2 = false" --}}
            role="dialog"
            aria-modal="true"
            x-id="['modal-title']"
            :aria-labelledby="$id('modal-title')"
            class="fixed inset-0 z-10 overflow-y-auto">


            {{-- Overlay --}}
            <x-modal.overlay status="open2"></x-modal.overlay>

              <!-- Panel -->
                <div
                    x-show="open2" x-transition
                    x-on:click="open = false"
                    class="relative flex min-h-screen items-center justify-center p-4"
                >

                        <div
                        x-on:click.stop
                        x-trap.noscroll.inert="open2"
                        class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
                    >
                        <!-- Title -->
                        @livewire('item.item-size-form',['item_id' => $item_id])

                        </div>


                </div>


        </div>






    </div>












</div>
