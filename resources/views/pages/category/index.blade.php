@extends('layouts.app')

@section('content')

        <div
            x-data="{open:false}"
        >
            <div>

                <button @click="open=true" type="button" class="bg-white border border-black px-4 py-2 focus:ring-8 focus:ring-amber-800">New</button>
            </div>


        {{-- @livewire('category.new-category-form') --}}
{{--
    @foreach ($categories as $category)
        <ul>
            <li>{{ $category->category }}</li>
        </ul>
    @endforeach --}}

        <div class="fixed inset-0"
        x-show= "open"
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

                        <h2 class="text-3xl font-medium" id="category-form">confirm</h2>

                        <div class="mt-8 flex space-x-2">
                            <button class="bg-white border border-black px-4 py-2 focus:outline-none focus:ring-4 focus:ring-aqua">confirm</button>
                            <button class="bg-white border border-black px-4 py-2 focus:outline-none focus:ring-4 focus:ring-aqua"
                                @click="open = false"
                            >cancell</button>
                        </div>


                    </div>

                </div>


            </div>


 </div>

@endsection
