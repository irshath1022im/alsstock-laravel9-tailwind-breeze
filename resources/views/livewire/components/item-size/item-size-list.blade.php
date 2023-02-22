<div
    x-cloak
    x-data="{
        transLogsModal : @entangle('transLogsModal'),
        storeRequestLogs : @entangle('storeRequestLogs')
        }"
>

            {{-- <div wire:loading>

                <x-spinner></x-spinner>
            </div> --}}


    <div class=" relative  m-2 rounded-lg  bg-slate-100 ">

            <div class="grid grid-cols-7 font-bold bg-violet-300 m-2 rounded-md bg-opacity-30 p-2">

                <div class="col-span-3 border px-2 py-2">
                    <div class="">SIZE</div>
                </div>

                <div class="col-span-2 border flex justify-around px-2 py-1">

                    <div class="underline">ITEM IN</div>
                    <div class="underline" >ITEM OUT</div>
                    <div class="underline" >BALANCE</div>
                </div>


            </div>


        @foreach ($item_sizes as $item_size)



                <div class="grid grid-cols-7 p-2 bg-violet-300 m-2 rounded-md bg-opacity-30">

                        <div class="col-span-3 ">
                            <button type="button"

                                    class="  {{  $item_size->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}
                                    inline-flex items-center px-4 py-2.5 text-small font-medium text-center text-white  rounded-lg focus:ring-blue-300 flex-1"
                                    {{  $item_size->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                                >

                                {{ $item_size->size->size }}

                                        <span class=" inline-flex  justify-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                                        {{  $item_size->transectionLogs->sum('qty') - $item_size->storeRequestItems->sum('qty') }}
                                        </span>

                            </button>
                        </div>


                        <div class="col-span-2  flex justify-around px-2 py-1">
                                <div class="rounded-full border bg-green-200 px-3 py-1">
                                    {{ $item_size->transectionLogs->sum('qty') }}
                                </div>

                                <div class="rounded-full border bg-red-200 px-3 py-1">
                                    {{ $item_size->storeRequestItems->sum('qty') }}
                                </div>

                                <div class="rounded-full border bg-orange-200 px-3 py-1">
                                    {{  $item_size->transectionLogs->sum('qty') - $item_size->storeRequestItems->sum('qty') }}
                                </div>
                        </div>

                        <div class="col-span-2  flex justify-between px-2 py-1 text-sm bg rounded ">

                            <div>
                                <button type="button"
                                    wire:click="showLogs({{ $item_size->id }})"
                                    class=" uppercase rounded px-3 py-2 {{  $item_size->transectionLogs->sum('qty') > 0 ? 'bg-violet-400 text-black hover:bg-violet-900' : 'bg-slate-400 text-gray-500' }}
                                        hover:text-white
                                    "
                            {{  $item_size->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                            >
                                    Logs
                                </button>

                                <button
                                    class="uppercase rounded px-3 py-2  bg-violet-400 {{ $item_size->storeRequestItems->sum('qty') > 0 ? 'bg-violet-400 text-black hover:bg-violet-900   hover:text-white' : 'bg-slate-400 text-gray-500'  }}

                                    "

                                    wire:click="getStoreRequestLogs({{ $item_size->id }})"

                                    @if (count($item_size->storeRequestItems) < 1)
                                        disabled
                                    @endif
                                    >
                                StoreRequests
                            </button>
                            </div>

                        </div>




                </div>

                {{-- <div class="mb-1 flex justify-around"  >



                    <button type="button"
                        wire:click="showLogs({{ $item_size->id }})"
                        class=" mx-2 p-4 rounded-lg {{  $item_size->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}"
                    {{  $item_size->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                    >
                            Logs
                        </button>


                    <button
                        class="border px-2 py-1 bg-blue-400 rounded"
                        wire:click="getStoreRequestLogs({{ $item_size->id }})"
                        @if (count($item_size->storeRequestItems) < 1)
                              disabled
                        @endif
                    >Transection Logs</button>



                </div> --}}


        @endforeach



        </div>


{{-- Modal for Logs --}}

      <div
        x-show="transLogsModal"
        {{-- x-on:keydown.escape.prevent.stop="transLogsModal = true"
        role="dialog"
        aria-modal="true"
        x-id="['modal-title3']"
        :aria-labelledby="$id('modal-title3')" --}}
        class="fixed inset-0 z-10 overflow-y-auto"
      >


  {{-- Overlay --}}
    <x-modal.overlay status="transLogsModal"></x-modal.overlay>

      <!-- Panel -->
        <div

              x-transition
              x-on:click="transLogsModal = false"
              class="relative flex items-center justify-center p-4"
          >

                  <div
                  x-on:click.stop
                  x-trap.noscroll.inert="transLogsModal"
                  class="relative w-full max-w-4xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
              >
                  <!-- Title -->
                  {{-- @livewire('item.item-size-form',['item_id' => $item_id]) --}}
                  @livewire('transection-logs.item-size-transection-logs')

                  </div>


        </div>



      </div>

{{-- Modal for Store Request Logs --}}

      <div
      x-show="storeRequestLogs"
      {{-- x-on:keydown.escape.prevent.stop="transLogsModal = true"
      role="dialog"
      aria-modal="true"
      x-id="['modal-title3']"
      :aria-labelledby="$id('modal-title3')" --}}
      class="fixed inset-0 z-10 overflow-y-auto">


  {{-- Overlay --}}
      <x-modal.overlay status="storeRequestLogs"></x-modal.overlay>

      <!-- Panel -->
          <div

              x-transition
              x-on:click="storeRequestLogs = false"
              class="relative flex items-center justify-center p-4"
          >

                  <div
                  x-on:click.stop
                  x-trap.noscroll.inert="storeRequestLogs"
                  class="relative w-full max-w-4xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
              >
                  <!-- Title -->
                  {{-- @livewire('item.item-size-form',['item_id' => $item_id]) --}}
                  {{-- @livewire('transection-logs.item-size-transection-logs') --}}

                    @livewire('item-size.store-request-logs')

                    <x-button class="bg-gray-500"
                        {{-- x-on:click="storeRequestLogs = false" --}}
                        wire:click="storeRequestLogsFormClose"
                        >Close</x-button>


                  </div>




          </div>


      </div>






</div>

