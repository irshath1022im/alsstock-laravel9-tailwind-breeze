<div>


    <x-success></x-success>

    <div wire:loading>
        <x-spinner></x-spinner>
    </div>

    <form>

        <div>
            <x-forms.label>ITEM ID</x-forms.label>
            <x-forms.input type="text" value="{{ $item_id }}" disabled></x-forms.input>

            @error('item_id')

                <x-form_error field="item_id"></x-form_error>

             @enderror

        </div>

        <div>
            <x-forms.label>POSTED DATE</x-forms.label>
            <x-forms.input type="date" wire:model.defer="date" ></x-forms.input>

            @error('date')

                <x-form_error field="date"></x-form_error>

             @enderror

        </div>


        <div>

            <x-forms.label>SIZE</x-forms.label>

             <select name="" id="" class="form-select  text-sm font-normal w-full  border-gray-200 focus:ring focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-3 rounded-full" wire:model.defer="item_size_id">
                <option value="" >Select</option>

                @foreach ($availableSizes as $item)

                    <option value="{{ $item->id }}" >{{ $item->size->size }}</option>

                @endforeach

             </select>

             @error('item_size_id')

             <x-form_error field="item_size_id"></x-form_error>

             @enderror


        </div>

        <div>

            <x-forms.label>TRANSECTION</x-forms.label>
            <select  class="form-select  text-sm font-normal w-full  border-gray-200 focus:ring focus:border-indigo-300 focus:ring-indigo-200 focus:ring-opacity-50 px-4 py-3 rounded-full" wire:model.defer="transection_type">
                <option value="" >Select</option>
                    @foreach ($transections_type as $trans)

                    <option value="{{ $trans->id }}" >{{ $trans->type }}</option>
                    @endforeach

             </select>

            @error('transection_type')

                <x-form_error field="transection_type"></x-form_error>

             @enderror

        </div>

        <div>
            <x-forms.label>QTY</x-forms.label>
            <x-forms.input type="number" wire:model.defer="qty"></x-forms.input>

            @error('qty')

                <x-form_error field="qty"></x-form_error>

             @enderror

        </div>

        <x-button type="button" class="" wire:click="formSubmit" wire:loading.attr="disabled">Submit</x-button>
        <x-button type="button" class="bg-gray-300" wire:click="formCancell">Cancell</x-button>


    </form>







































</div>
