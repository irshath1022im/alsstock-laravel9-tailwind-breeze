<div class="">



    <div class="card">
        <div class="card-header">

            <h3 class="card-heading">STORE REQUEST</h3>

            {{-- <div>
                <button type="button" class="btn btn-primary btn-sm"
                    wire:click="openFormModal(0)"
                 >
                 NEW REQUEST </button>

            </div> --}}

        </div>

        <div class="card-body" >

            <div class="px-3 py-3">

                <ul class="flex justify-between p-3 mb-2 bg-orange-500">
                    <li class="border-r-2 flex-1 p-2 border-orange-600">DATE</li>
                    <li class="border-r-2 flex-1 p-2 border-orange-600">REQUESTED BY</li>
                    <li class="border-r-2 flex-1 p-2 border-orange-600">APPROVED BY</li>
                    <li class="border-r-2 flex-1 p-2 border-orange-600">STATUS</li>
                    <li class="border-r-2 flex-1 p-2 border-orange-600">REMARK</li>
                    <li class="border-r-2 flex-1 p-2 border-orange-600">ACTION</li>
                </ul>


                <div wire:loading>

                    <x-spinner></x-spinner>
                </div>

                <div wire:loading.remove>

                    @foreach ($store_requests as $item)

                    <ul class="flex justify-between p-3 mb-3 uppercase bg-orange-50 text-sm font-normal ">
                        <li class="border-r-2 flex-1 p-2">{{ $item->date }}</li>
                        <li class="border-r-2 flex-1 p-2">{{ $item->requestedBy }}</li>
                        <li class="border-r-2 flex-1 p-2">{{ $item->approvedBy }}</li>
                        <li class="border-r-2 flex-1 p-2">{{ $item->status }}</li>
                        <li class="border-r-2 flex-1 p-2">{{ $item->remark }}</li>
                        <div class="flex flex-col text-sm flex-1 p-2">

                            {{-- <button class="border p-2 bg-sky-600">ITEMS</button> --}}
                            <button class="border p-2 bg-sky-600">VIEW</button>
                            <button class="border p-2 bg-red-600">EDIT</button>
                        </div>
                    </ul>

                    @endforeach
                </div>


            </div>



        </div>

        <div class="card-footer">
            {{ $store_requests->links() }}
        </div>
    </div>



















</div>
