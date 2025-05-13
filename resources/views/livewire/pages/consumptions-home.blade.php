<div>

    <div class="card">
        <div class="card-header">
            <div class="card-heading">Consumption Report
                <button class="btn-info">Count:: {{ $totalRows }}</button>
            </div>
        </div>

        <form action="">
            <div class="formGroup flex justify-between m-3 text-sm" >
                <input type="date" name="" id="" class="form-controll" wire:model.live="startDate">
                <input type="date" name="" id="" class="form-controll" wire:model.live="endDate">
            </div>
        </form>

        <div class="">

            @dump($storeRequestItemsGrouped)
{{-- {{ $storeRequestItemsGrouped }} --}}


            {{-- {{ $storeRequestItemsGrouped->dd() }} --}}


            {{-- @dump($storeRequestItems->groupBy('itemSize')) --}}
            {{-- <div>{{ $item->id }}</div> --}}



        <div class="table-overflow">
                <table class="table">
                    <th class="table-th">#</th>
                    <th class="table-th">ITEM ID</th>
                    <th class="table-th">ITEM</th>
                    <th class="table-th">ITEM SIZE ID</th>
                    <th class="table-th">ITEM SIZE</th>
                    <th class="table-th">QTY</th>

                <tbody>

                        {{-- @foreach ($storeRequestItemsGrouped as $storeRequestItem) --}}


                                {{-- <tr>
                                    <td class="table-td">{{ $loop->iteration}}</td>
                                    <td class="table-td">{{ $storeRequestItem[0]->itemSize->item->id }}</td>
                                    <td class="table-td">{{ $storeRequestItem[0]->itemSize->item->item }}</td>
                                    <td class="table-td">{{ $storeRequestItem[0]->item_size_id }}</td>
                                    <td class="table-td">{{ $storeRequestItem[0]->itemSize->size->size }}</td>
                                    <td class="table-td">{{ $storeRequestItem->sum('qty')}}</td> --}}
                                    {{-- <td class="table-td">{{ $item->itemSize->item->item}}</td> --}}
                                    {{-- <td class="table-td">{{ $item->item_size_id }}</td> --}}


                        </tr>
                    {{-- @endforeach --}}

            </table>

        </div>




        </div>

    </div>




</div>
