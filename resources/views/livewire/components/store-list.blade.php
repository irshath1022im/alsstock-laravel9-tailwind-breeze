<div class="divide-y divide-slate-300">

    @foreach ($stores as $item)

        <div class="form-check p-2 bg-stone-200">
            <input type="radio" name="flexRadioDefault" id="{{ $item->id }}" class="form-radio"
                wire:click="selectedStore({{ $item->id }})"
                @if ($item->id == $selected_store)

                    checked
                @endif
            >
            <label for="flexRadioDefault1" class="text-sm">{{ $item->store }}</label>
        </div>
    @endforeach

</div>
