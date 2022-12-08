@props(['label'])

<div class="flex">

    <label class="text-uppercase flex-0 border border-red-300">item name</label>
    <input {{ $attributes->merge(['class' => "w-full my-2 rounded-md shadow-sm border  focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 flex-1"]) }} />

</div>
