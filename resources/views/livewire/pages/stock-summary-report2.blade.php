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
            <div class="card-heading">
                <h3>PROMOTINAL ITEMS</h3>
            </div>
        </div>

        <div class="card-body print:object-contain">

            @foreach ($store->items as $item)



                <div class="card">
                    <div class="card-header">
                        <div class="card-heading">
                            <h4>{{ $loop->iteration }} / {{ $item->item }}</h4>
                        </div>
                    </div>

                    <div class="card-body overflow-auto">

                    <div class="table-overflow">
                            <table class="table">
                                {{-- <thead class="table-head">
                                    <th class="table-th">#</th>
                                    <th class="table-th">SIZE</th>
                                    <th class="table-th">STOCK</th>
                                </thead> --}}



                                <tbody>
                                    @foreach ($item->itemSize as $subItem)

                                        <tr class="table-tr">
                                            <td class="table-td border w-1/3">{{ $loop->iteration }}</td>
                                            <td class="table-td border w-1/3">{{ $subItem->size->size }}</td>
                                            <td class="table-td border w-1/3">
                                                <span>{{ $subItem->transectionLogs->sum('qty') -  $subItem->storeRequestItems->sum('qty') }}</span></td>
                                        </tr>

                                        @endforeach


                                </tbody>


                            </table>
                    </div>

                    </div>
                </div>




                <div class="pagebreak"></div>

                @endforeach





        </div>
    </div>
































</div>
