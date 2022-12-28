<div>

    {{-- @component('components.alert')

    @endcomponent --}}

    <div class="card">
        <div class="card-header">
            <h5>NEW ITEM FOR : <span class="bg-orange-300 rounded-md px-2 py-1">{{ $store_request_id }}</span></h5>
        </div>
        <div class="card-body">

            <form wire:submit.prevent ="formSubmit">

                @livewire('components.item-search-bar')


                <div wire:loading  wire:loading.target="item_size_id">
                    {{-- @component('components.spinner')

                    @endcomponent --}}
                </div>


                <div class="mb-3" wire:loading.remove>
                  <label for="" class="">Item Size</label>
                  <select type="select" class="form-controll" wire:model.lazy="item_size_id" >

                    <option value="">Select</option>
                    @foreach ($item_sizes as $item)

                {{-- this item return itemSize --}}
                        <option value="{{ $item->id }}"> {{ $item->size->size }}</option>
                    @endforeach

                  </select>

                    <small id="helpId" class="px-3">Available Qty
                            <span class="px-3 py-1 rounded-md @if ($availableQty > 0)
                                bg-green-500
                            @else
                                bg-red-200
                            @endif
                            ">{{ $availableQty }}</span> </small>

                       <x-form_error field="item_size_id"></x-form_error>

                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Qty</label>
                  <input type="number"
                    class="form-controll" wire:model.debounce.500mc="qty" placeholder="Qty">

                    <x-form_error field="qty"></x-form_error>


                </div>

                <div class="mb-3">
                  <label for="" class="form-label">Remark</label>
                  <textarea class="form-controll" wire:model.defer="remark" rows="3"></textarea>
                </div>

            <div class="flex justify-between">

                <x-button class="bg-blue-400" type="button" wire:click="formSubmit">Submit</x-button>
                <x-button class="bg-red-400" type="button" wire:click="closeModal">Cancell</x-button>
            </div>

            </form>
        </div>

    </div>
















        {{-- In work, do what you enjoy. --}}
    </div>
