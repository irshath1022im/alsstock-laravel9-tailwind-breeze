<div>

    <form>


        <div class="" >

            <label class="block font-medium text-sm text-gray-700">Item Size</label>
            <input type="text" class="form-input p-2 block mt-1 w-full rounded-md shadow-sm border border-gray-200 focus:ring focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50" disabled value="{{ $item_id }}"/>

            @error('item_id')

            <x-form_error field="item_id"></x-form_error>

             @enderror

        </div>

        <div class="mt-4" >

            <label class="block font-medium text-sm text-gray-700">Sizes</label>
            <select wire:model="size" class="form-select text-sm font-normal w-full  border-gray-200 focus:ring focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-3 rounded-full">
                <option value="" class="py-2">Select</option>

                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" class="px-2 py-4 text-sm">{{ $size->size }}</option>
                @endforeach
            </select>

            @error('size')

                <x-form_error field="size"></x-form_error>

            @enderror

        </div>

        <x-button type="button" class="" wire:click="formSubmit" wire:loading.attr="disabled">Submit</x-button>
        <x-button type="button" class="bg-gray-300" wire:click="formCancell">Cancell</x-button>


    </form>
</div>
