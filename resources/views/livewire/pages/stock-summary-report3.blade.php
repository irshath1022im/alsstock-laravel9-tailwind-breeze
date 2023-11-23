<div>
    <form class="print:hidden ">
        <div>
            <div class="form-label">SEARCH
                <select name="" id="" class="form-controll" wire:model="report_store">
                    <option value="1">Uniform</option>
                    <option value="2">Promotional Items</option>
                </select>
            </div>

        </div>

    </form>


    <div class="card">
        <div class="card-header">
            <div class="card-heading print:text-sm">
                @if ($report_store == 1)
                    <h3>UNIFORMS</h3>
                @else

                <h3>PROMOTINAL ITEMS</h3>
                @endif
            </div>
        </div>

        <div class="card-body print:object-contain">

            @foreach ($store->items as $item)



                <div class="card mb-2 pageBreadDiv">
                    <div class="card-header">
                        <div class="card-heading print:text-xs">
                            <h4>{{ $item->item }}</h4>
                        </div>
                    </div>

                    <div class="card-body overflow-auto flex justify-end  print:text-xs ">

                        @foreach ($item->itemSize as $subItem)

                            <div class="">
                                <div class="ml-5">
                                {{ $subItem->size->size }}
                                </div>

                                <div class="ml-5 flex justify-end">
                                    <span>{{ $subItem->transectionLogs->sum('qty') -  $subItem->storeRequestItems->sum('qty') }}</span></td>
                                </div>
                            </div>
                        @endforeach


                    </div>
                    {{-- end of card body --}}

                </div>

                {{-- end of card --}}



                {{-- <div class="pagebreak"></div> --}}

                @endforeach





        </div>
    </div>

























</div>
