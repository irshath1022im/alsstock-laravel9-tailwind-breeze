<div>


    <div class="mb-3">
        <label for="" class="">Search For Item</label>
        <input type="text"
            class="form-controll"
            value="{{ $search_value }}"
            wire:model.debounce.500ms="search_value"
            placeholder="Type Item For Search"
            >
      </div>


      {{-- SEARCH RESULT --}}


      @empty($search_value)

          <div class="bg-green-200 p-2 rounded-md opacity-60 my-1" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            <strong>No Search Value</strong>
          </div>

     @else

     @if (count($search_results) > 0)

          <div class="bg-blue-200 px-2 py-1 m-3" role="alert">
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <ul class="list-group divide-y divide-blue-100  ">

                            @foreach ($search_results as $item)

                                <li class="p-2">
                                    <input class="" type="radio" name="flexRadioDefault" id="flexRadioDefault1"
                                        value="{{ $item->id }}"
                                        wire:click="selectedItem({{ $item }})"
                                        >

                                    <label class="form-check-label" for="flexRadioDefault1">
                                        {{ $item['item'] }}
                                    </label>
                                </li>

                            @endforeach
                    </ul>

                </div>

            @else

            <div class="bg-green-200 p-2 rounded-md opacity-60 my-1" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

                <strong>No Items Found !!!</strong>
              </div>


            @endif







      @endempty






</div>
