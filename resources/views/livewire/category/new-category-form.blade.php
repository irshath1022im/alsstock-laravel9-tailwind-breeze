<div>



    <div wire:loading>
        @component('components.spinner')

        @endcomponent
    </div>

    @component('components.success')

    @endcomponent

    <form>

        <div class="mb-3">
          <label for="" class="block mb-2 text-sm font-medium text-gray-900">Category</label>
          <input type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Category" wire:model.defer="category">

           @error('category')
               <div class="bg-red-100 txt-sm rounded-lg p-2 my-1" role="alert">
                   <strong class="text-red-800">{{ $message }}</strong>
               </div>

           @enderror

        </div>


        <div class="mb-3">
            <label for="" class="block mb-2 text-sm font-medium text-gray-900">Store</label>
            <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"" name="" id="" wire:model.defer="store_id">
            <option value="">Select</option>
                @foreach ($stores as $item)
                <option value="{{ $item->id }}">{{ $item->store }}</option>
                @endforeach


            </select>
        </div>

        @error('store_id')
        <div class="bg-red-100 txt-sm rounded-lg p-2 my-1" role="alert">
            <strong class="text-red-800">{{ $message }}</strong>
        </div>

    @enderror

        @if ($editMode)
            {{-- <button type="button" class="btn btn-primary" wire:click="formUpdateRequest">UPDATE</button> --}}
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            wire:click="formUpdateRequest"
            @if (!$category_id)
                disabled
            @endif
            >UPDATE</button>

        @else

            {{-- <button type="button" class="btn btn-primary" wire:click="formSubmit">Submit</button> --}}
            <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            wire:click="formSubmit"
            >SUBMIT</button>
        @endif

         <button type="button" class="text-white bg-slate-400 hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            wire:click="closeModal"
         >CANCELL</button>

    </form>
</div>
