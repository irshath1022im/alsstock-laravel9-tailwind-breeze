@extends('layouts.app')

@section('content')


{{-- @dump($stores) --}}
    <div class="grid grid-cols-12">

        {{-- LEFT MENU --}}
        <div class="md:col-span-4 col-span-12 p-2 h-full ">

            {{-- menu-1 --}}
            <div class="border rounded border-stone-500 p-2 ">

                <h5 class=" p-2 rounded bg-stone-400 font-mono" >STORE</h5>


                @livewire('components.store-list')

            </div>

              {{-- menu-2 --}}
              <div class="mt-3  border rounded border-stone-500 p-2 h-auto">

                <h5 class=" p-2 rounded bg-stone-400 font-mono">CATEGORIES</h5>

                @livewire('components.category-list')


            </div>


        </div>






        {{-- ITEMS --}}

        <div class="md:col-span-8 col-span-full ">
            @livewire('components.item-list')
        </div>

    </div>



@endsection
