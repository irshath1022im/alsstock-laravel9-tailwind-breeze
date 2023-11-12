<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">NEW ITEM / {{ $item_id }}</div>
        </div>

        <div class="card-body">

            <form class="px-2 my-3">
                <div class="my-2">
                    <label for="item_name" class="block w-full">Item Name</label>
                    <input type="text" wire:model.defer="item" class="form-controll block w-full rounded-md" />
                </div>

                @component('components.form_error',['field' => 'item'])

                @endcomponent

                <div class="my-3">
                    <label for="item_name" class="">Category</label>
                    <select name="" id="" wire:model.defer="category_id" class="form-controll">
                        <option value="">Select</option>

                        @foreach ($categories as $category)

                        <option value="{{ $category->id }}">{{ $category->category }}</option>

                        @endforeach
                    </select>
                </div>

                @component('components.form_error',['field' => 'category_id'])

                @endcomponent

                <div class="my-2">
                    <label for="thumbnail" class="block w-full">Thumbnail</label>
                    <input type="file" wire:model="thumbnail" class="form-controll block w-full rounded-md" />
                </div>

                <div class="border border-spacing-1 w-1/5 h-1/5">


                        @if($mode == 'edit')

                            <strong>{{ $filePath }}</strong>
                        </br>

                            <img src="{{ Storage::url($filePath) }}" class="w-25">

                        @endif

                        @isset($thumbnail)
                                <div style="width: 100px;" >
                                    <img src="{{ $thumbnail->temporaryUrl()}}" class="img-fluid" >
                                </div>

                        @endisset
                </div>


                @component('components.form_error',['field' => 'thumbnail'])

                @endcomponent





            </div>



        </div>

        <div class="card-footer">

            <div wire:loading.remove>

                @if ($mode !== 'edit')

                    <button
                        wire:click.prevent = "AddNewItem"
                        type="button"
                        class="border bg-green-600 text-sm p-2 hover:bg-sky-700 hover:text-white rounded-lg">SUBMIT
                    </button>


                    @else

                    <button
                    wire:click.prevent = "UpdateItem"
                    type="button"
                    class="border bg-blue-600 text-sm p-2 hover:bg-sky-700 hover:text-white rounded-lg">UPDATE</button>

                @endif

                </div>

        </div>

    </form>


    </div>





   <div wire:loading>
        @component('components.spinner')

        @endcomponent
   </div>

   @component('components.success')

   @endcomponent



</div>
