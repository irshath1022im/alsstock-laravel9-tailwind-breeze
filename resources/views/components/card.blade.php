
<div>

<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-2">

    @foreach ($items as $item)



    <div class=" border-gray-200 border-2 p-2 rounded-xl">

        <div class="mb-1">
            <h5 class="bg-blue-700 text-center text-sm uppercase text-white p-3 rounded-md">{{ $item->item }}</h5>
        </div>

        <div class="h-60">
            <a href="#">
                <img src="{{ Storage::URL($item->thumbnail) }}" alt="" class="md:w-full border h-full">
            </a>
        </div>



        <div class="mt-1 flex justify-between">
            <a href="{{ route('items.show',['item' => $item->id]) }}" target="_blank" >
                <x-button class="bg-orange-100 border-orange-300 focus:ring ring-orange-500">View More </x-button>
            </a>
            <x-button class="bg-gray-100 border-blue-300 focus:ring ring-blue-500">{{ $item->category->category }} </x-button>

        </div>


     </div>

     @endforeach



</div>

{{ $items->links() }}
</div>

