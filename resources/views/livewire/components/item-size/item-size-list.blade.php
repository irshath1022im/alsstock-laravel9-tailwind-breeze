<div>



    <div class=" relative col-span-12 sm:col-span-9 m-2 rounded-lg border flex flex-col items-center bg-slate-100"
        x-data="{
                active_id: @entangle('active_id'),
                expanded:false
            }"
    >

    <p x-text="active_id"></p>

    @foreach ($item_sizes as $item)

        <div>


            <div class="mb-1 flex"  >

                <button type="button"

                    class="  {{  $item->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}
                    inline-flex items-center px-5 py-2.5 text-small font-medium text-center text-white  rounded-lg focus:ring-blue-300"
                    {{  $item->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                >

                {{ $item->size->size }}
                    <span class=" inline-flex  justify-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                    {{  $item->transectionLogs->sum('qty') }}
                    </span>

                </button>



            </div>

            {{-- <div
                x-show ="active_id == {{ $item->id }} ? true : false"
                x-transition.duration.500ms >

                <div class="relative">

                    <button>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-0 right-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                          </svg>
                    </button>
                </div>

                <div class="ooverflow-x-auto rounded-lg shadow">
                    <table class="border-separate border  border-slate-400 w-full">
                        <thead>
                            <tr class="">
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">TRANS ID</th>
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">ITEM SIZE ID</th>
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">SIZE</th>
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">TRANS TYPE</th>
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">QTY</th>
                                <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">REMARK</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-green-600">

                            @foreach ($item->transectionLogs as $log)


                                <tr class="bg-gray-100 border-b">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->item_size_id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->itemSize->size->size}}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->transectionType->type }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->qty }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->remark }}</td>
                                </tr>

                            @endforeach

                        </tbody>


                    </table>
                </div>

            </div> --}}

            @endforeach


        </div>




</div>



</div>

