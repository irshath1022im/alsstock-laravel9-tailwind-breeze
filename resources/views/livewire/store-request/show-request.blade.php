<div>

    <div wire:loading>

        <x-spinner></x-spinner>
    </div>


    <div
    x-data="{
            newRequestItemForm : @entangle('newRequestItemForm'),
            deleteItemForm : @entangle('deleteStatusForm'),
            editStoreRequestItemModal : @entangle('editStoreRequestItemModal'),
            uploadPdfForm : false

        }"
    x-cloak
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

                    @if ($store_request->status !== 'Approved')

                    <button
                        x-on:click="newRequestItemForm = true"
                        class="mx-3"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                      </button>
                    @endif
                </div>

                <div class="card-body">

                    @if (count($store_request->storeRequestItems) >= 1)


                    <div class="overflow-auto rounded-lg shadow">

                        <table class="w-full">
                            <thead class="bg-gray-50 border-b-2 border-gray-200">
                                <tr>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">#</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">SIZE</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">ITEM</th>
                                    <th class="p-3 text-sm font-semibold tracking-wide text-left">QTY</th>
                                    @if ($store_request->status !== 'Approved')
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">ACTION</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-300">

                                @foreach ($store_request->storeRequestItems as $item)

                                <tr class="bg-white my-1">
                                    <td class="w-2 p-3 text-sm text-gray-700 whitespace-nowrap">{{ $item->id }}</td>
                                    <td class="w-4 p-3 text-sm text-gray-700 whitespace-nowrap">{{ $item->itemSize->size->size }}</td>
                                    <td class="w-15 p-3 text-sm text-gray-700 whitespace-nowrap"> {{ $item->itemSize->item->item }}</td>
                                    <td class="w-4 p-3 text-sm text-gray-700 whitespace-nowrap">
                                        <span class="bg-orange-500 px-2 rounded-lg py-1 mt-1">{{ $item->qty }}</span></td>

                                    @if ($store_request->status !== 'Approved')

                                        <td class="w-8 p-3 text-sm text-gray-700 whitespace-nowrap">

                                            <x-button
                                                class="bg-blue-500 text-white"
                                                wire:click="editStoreRequestItem({{ $item->id }})"
                                            >

                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-white">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                </svg>
                                            </x-button>


                                            <x-button
                                                class="bg-red-500 text-white "
                                                wire:click="openDeleteForm({{ $item->id }})"
                                                >
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3.5" stroke="currentColor"
                                                    class="w-3 h-3"
                                                >
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                            </svg>

                                            </x-button>


                                        </td>
                                    @endif

                                </tr>

                                @endforeach

                            </tbody>
                        </table>

                        <hr />

                        <div class="flex justify-between">

                            <div class="order-2">

                                <a href="{{ route('StoreRequestPrint',['id'=> $store_request_id]) }}" target="_blank">
                                    <x-button class="bg-purple-400 m-3  focus:ring-purple-800">Print</x-button>
                                </a>
                            </div>

                            <div>

                                @if ($store_request->status == 'Approved')


                                {{-- @dump(Storage::exists('/approvedPdf/'.$store_request_id.'.pdf')) --}}

                                @if (Storage::disk('public')->exists('/approvedPdf/'.$store_request_id.'.pdf'))

                                    <div class="flex  items-center">

                                        <a href="{{ route('approvedPdf',['id' => $store_request_id ]) }}" target="_blank">
                                            <x-button class="bg-blue-400 m-3  focus:ring-purple-800">
                                                <img src="/images/icons8-pdf-16.png" /></x-button>
                                        </a>

                                        <div x-on:click="uploadPdfForm = !uploadPdfForm" class="cursor-pointer">

                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                                <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-8.4 8.4a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32l8.4-8.4z" />
                                                <path d="M5.25 5.25a3 3 0 00-3 3v10.5a3 3 0 003 3h10.5a3 3 0 003-3V13.5a.75.75 0 00-1.5 0v5.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5V8.25a1.5 1.5 0 011.5-1.5h5.25a.75.75 0 000-1.5H5.25z" />
                                              </svg>
                                        </div>

                                    </div>

                                    @else

                                        <div>
                                            <input type="file" class="form-controll" wire:model="approvedPdf">
                                        </div>

                                        @error('approvedPdf')
                                            {{ $message }}
                                        @enderror



                                @endif


                                <div>

                                    <div
                                        x-show="uploadPdfForm"
                                    >
                                        <input type="file" class="form-controll" wire:model="approvedPdf">
                                    </div>

                                    @error('approvedPdf')
                                        {{ $message }}
                                    @enderror
                                </div>
                            @endif

                            </div>



                        </div>






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
        x-show="newRequestItemForm"
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

    {{-- End Modal --}}

    {{-- Delete Item Modal --}}

        <div
        x-show="deleteItemForm"
        class="modal"
    >

    {{-- modal overlay --}}

        <div class="modal-overlay">

        </div>

    {{-- modal body --}}
        <div class="relative flex justify-center  p-4">

            <div class="relative w-full max-w-2xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg">

                Do You Wish to Delete this Request Line ID {{ $selectedLineId }}?
                    <x-button class="bg-red-600"
                        wire:click="deleteLineItem"
                    >Yes</x-button>

                    <x-button class="bg-blue-400"
                        wire:click="closeModalRequest"
                    >No</x-button>

            </div>
        </div>


    </div>

    {{-- End Modal --}}



    {{-- Edit Item Modal --}}

    <div
    x-show="editStoreRequestItemModal"
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

{{-- End Modal --}}




</div>


</div>
