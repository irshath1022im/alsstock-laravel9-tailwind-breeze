<div>

    {{-- <h4>Selected Store: {{ $selected_store }}</h4> --}}

     {{-- @dump($categories) --}}

     <div wire:loading>
        @component('components.loading')

        @endcomponent
     </div>

     @isset($categories)


            @if (count($categories) > 0)



                    @foreach ($categories as $item)


                            <div class="form-check p-2 bg-blue-100 border border-b-blue-700">
                                <input type="radio" name="category" id="flexRadioDefault1" class="form-radio"
                                    wire:click="selectedCategory({{ $item->id }})"
                                >
                                <label for="flexRadioDefault1" class="text-sm">{{ $item->category }}
                                    <span class="inline-flex justify-center items-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                    {{ $item->items_count }}
                                    </span>
                                </label>
                            </div>

                    @endforeach

                @else

                 @component('components.emptyAlert',['message' => 'No Category Found'])

                 @endcomponent

                @endif





     @endisset






</div>
