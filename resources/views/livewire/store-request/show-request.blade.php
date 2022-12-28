<div>

    <div
    x-data="{open : false}" x-cloak
class="card  bg-gray-300" >
    <div class="card-header">
        <p class="card-heading">STORE REQUEST # <span>{{ $store_request_id }}</span></p>
    </div>

    <div class="card-body">

        <div class="card mb-2">
            <div class="card-header">
                <div class="card-heading">REQUEST INFO</div>
            </div>


            <div class="card-body flex flex-col sm:flex-row justify-between " >

                <div>
                    <x-forms.label>Date</x-forms.label>
                    <input type="date" disabled value="{{ $store_request->date }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Requested By</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->requestedBy }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Approved By</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->approvedBy }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Status</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->status }}" class="form-controll">
                </div>

            </div>

        </div>

        <hr/>

        <div>
            {{-- @dump($store_request->store_request_items_count) --}}

            <div class="card mt-2">
                <div class="card-header flex ">
                    <div class="card-heading">REQUEST ITEMS </div>
                    <button
                        x-on:click="open = true"
                    class="mx-3"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                      </svg>
                      </button>
                </div>

                <div class="card-body">

                    @if ($store_request->store_request_items_count > 1)

                    <div class="overflow-auto rounded-lg shadow">

                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">SIZE</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">ITEM</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">QTY</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">ACTION</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">
                                @foreach ($store_request->storeRequestItems as $item)

                                <tr class="bg-white my-1">
                                    <td class="w-2 p-3 text-sm text-gray-700 whitespace-nowrap">{{ $item->id }}</td>
                                    <td class="w-4 p-3 text-sm text-gray-700 whitespace-nowrap">{{ $item->itemSize->size->size }}</td>
                                    <td class="w-15 p-3 text-sm text-gray-700 whitespace-nowrap"> {{ $item->itemSize->item->item }}</td>
                                    <td class="w-4 p-3 text-sm text-gray-700 whitespace-nowrap"><span class="bg-orange-500 px-2 rounded-lg py-1 mt-1">15</span></td>
                                    <td class="w-8 p-3 text-sm text-gray-700 whitespace-nowrap">
                                        <x-button class="bg-red-500 text-white"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor" class="w-3 h-3">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                          </svg>
                                          </x-button>
                                    </td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    @else

                    NO REQUEST ITEMS ARE FOUND !!

                    @endif

                </div>

            </div>

        </div>


    </div>


    {{-- modal --}}

    <div
        x-show="open"
        class="modal"
    >

    {{-- modal overlay --}}

        <div class="modal-overlay">

        </div>

    {{-- modal body --}}
        <div class="relative flex justify-center  p-4">

            <div class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg">
                @livewire('store-request.new-store-request-item-form',['store_request_id' => $store_request->id])
            </div>
        </div>


    </div>




</div>


</div>
