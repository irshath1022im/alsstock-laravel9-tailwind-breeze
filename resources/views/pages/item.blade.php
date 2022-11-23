@extends('layouts.app')

@section('content')

    <div  class="border border-slate-700 rounded">
        <h5 class="bg-slate-500 p-2 text-2xl">ITEM : <span class="bg-blue-200  px-2 mx-3 rounded-full text-lg">{{ $item->id }}</span></h5>

        <div class="grid grid-cols-12">


            {{-- ITEM IAMGE COLUMN --}}

            <div class="sm:col-span-3 col-span-full border-r border-pink-200 m-1 p-1">

                <h4 class="text-center text-lg uppercase bg-slate-500">{{ $item->item }}</h4>

                <div class="relative p-2 ">

                    <img src="/images/logo.png" class="border border-red-300 rounded-full" />

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 absolute top-0 right-0">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                </div>

            </div>

            {{-- ITEMS SIZE COLUMN --}}

            <div class=" col-span-12 sm:col-span-9 m-2 rounded-lg border flex flex-col items-center bg-slate-100"
                x-data="{
                    active_id : null ,
                    setActiveId(value){
                        this.active_id = value
                    },
                    closeAll(){
                        this.active_id = null
                    }
                }"
            >

                @foreach ($item->itemSize as $item)

                <div x-data="{open:false}">


                    <div class="mb-1 flex"  >

                        <button   @click="setActiveId({{ $item->id }})" id="{{ $item->id }}" type="button" class="inline-flex items-center px-5 py-2.5 text-small font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-blue-300"   :aria-expanded="open">
                        {{ $item->id}} {{ $item->size->size }}
                            <span class=" inline-flex  justify-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            {{  $item->transectionLogs->sum('qty') }}
                            </span>


                        {{-- <span x-show="!open" class="border border-red-900 bg-slate-300 rounded" >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                            </svg>
                        </span>

                            <svg x-show = "open" class="border border-red-900 bg-slate-300 rounded" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                            </svg> --}}


                        </button>



                    </div>


                    <div x-show="active_id == {{ $item->id }} ? true : false" x-transition.duration.500ms>

                        <button @click="closeAll()" x-show="active_id == {{ $item->id }} ?? true" class="flex justify-end">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                              </svg>
                        </button>

                        <table class="table-auto   border-separate border  border-slate-400">
                            <thead>



                                <tr class="">
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">TRANS ID</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">ITEM SIZE ID</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">TRANS TYPE</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">QTY</th>
                                    <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">REMARK</th>
                                </tr>
                            </thead>

                            <tbody>

                                @foreach ($item->transectionLogs as $log)


                                    <tr class="bg-gray-100 border-b">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->size }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->transection_type }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->qty }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $log->remark }}</td>
                                    </tr>

                                @endforeach

                            </tbody>


                        </table>


                    </div>

                </div>



                @endforeach




                {{-- <div>


                    <button type="button" class="px-5 py-2.5 text--small font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-blue-300">
                        XL
                        <span class="inline-flex justify-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                            2
                        </span>
                    </button>

                </div> --}}

            </div>


        </div>

    </div>

@endsection
