
    <div>

        <div wire:loading>
            @component('components.loading')

            @endcomponent
        </div>

        <div>
           <x-button class="btn-blue opacity-60">New Item</x-button>
        </div>

        <div wire:loading.remove>

            @if (count($items) > 0)

                @component('components.card',['items' => $items])

                @endcomponent



            @else

                    @component('components.emptyAlert', ['message' => 'NO ITEMS ARE FOUND !!!'])

                    @endcomponent

            @endif

        </div>

    </div>


