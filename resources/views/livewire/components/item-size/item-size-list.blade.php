<div>



    <div class=" relative col-span-12 sm:col-span-9 m-2 rounded-lg border flex flex-col items-center bg-slate-100"
        x-data="{showLogs : @entangle('showLogsModalStatus')}"
    >


    @foreach ($item_sizes as $item)

        <div>


            <div class="mb-1 flex justify-around"


            >

                <button type="button"

                    class="  {{  $item->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}
                    inline-flex items-center px-5 py-2.5 text-small font-medium text-center text-white  rounded-lg focus:ring-blue-300 flex-1"
                    {{  $item->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                >

                {{ $item->size->size }}
                    <span class=" inline-flex  justify-center ml-2 w-4 h-4 text-xs font-semibold text-blue-800 bg-blue-200 rounded-full">
                    {{  $item->transectionLogs->sum('qty') }}
                    </span>

                </button>

                <button type="button"
                    wire:click="showLogs({{ $item->id }})"
                    class=" mx-2 p-4 rounded-lg {{  $item->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}"
                {{  $item->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
            >Logs</button>

                {{-- <x-button class="{{$item->transectionLogs->sum('qty') > 0 ? 'bg-green-500  hover:bg-green-900' : 'bg-slate-400' }}"

                    {{  $item->transectionLogs->sum('qty') > 0 ? null : 'disabled' }}
                >LOGS</x-button> --}}



            </div>



            @endforeach


        </div>

  {{-- Modal for Logs --}}
  <div
            x-show="showLogs"
            style="display: none"
            x-on:keydown.escape.prevent.stop="showLogs = true"
            role="dialog"
            aria-modal="true"
            x-id="['modal-title3']"
            :aria-labelledby="$id('modal-title3')"
            class="fixed inset-0 z-10 overflow-y-auto">


        {{-- Overlay --}}
            <x-modal.overlay status="showLogs"></x-modal.overlay>

              <!-- Panel -->
                <div
                    x-show="showLogs" x-transition
                    x-on:click="showLogs = false"
                    class="relative flex items-center justify-center p-4"
                >

                        <div
                        x-on:click.stop
                        x-trap.noscroll.inert="showLogs"
                        class="relative w-full max-w-4xl overflow-y-auto rounded-xl bg-white p-12 shadow-lg"
                    >
                        <!-- Title -->
                        {{-- @livewire('item.item-size-form',['item_id' => $item_id]) --}}
                        @livewire('transection-logs.item-size-transection-logs')

                        </div>


                </div>


        </div>




</div>



</div>

