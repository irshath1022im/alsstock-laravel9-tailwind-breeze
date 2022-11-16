
    <div>

        <div wire:loading>
            @component('components.loading')

            @endcomponent
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


