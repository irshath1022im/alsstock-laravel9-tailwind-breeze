<div>


     <div wire:loading>

                    <x-spinner></x-spinner>
                </div>

<div>

    <div class="relative">

        <button
            wire:click="formClose"
        >
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
                    <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">DATE</th>
                    <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">STORE REQUEST ID</th>
                    <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">SIZE</th>
                    <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">QTY</th>
                    <th scope="col" class="w-20 text-sm font-medium text-gray-900 px-6 py-4 text-left">REMARK</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-green-600" wire:loading.remove>



                @foreach ($storeRequestLogs as $log)


                    <tr class="bg-gray-100 border-b">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->store_request->date }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                            <a href="{{ route('storeRequest.show', ['storeRequest' => $log->store_request_id]) }}" target="_blank" >
                                {{ $log->store_request_id }} <x-button class="bg-lime-300">view</x-button>
                            </a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->itemSize->size->size}}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->qty }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->remark }}</td>
                    </tr>

                @endforeach

            </tbody>


        </table>
    </div>

</div>










</div>
