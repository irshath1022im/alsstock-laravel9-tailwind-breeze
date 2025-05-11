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

            {{-- @dump($storeRequestItems) --}}
            {{-- <div>{{ $item->id }}</div> --}}

        <div class="table-overflow">
                <table class="table">
                    <th class="table-th">#</th>
                    <th class="table-th">Date</th>
                    <th class="table-th">CATEGORY</th>
                    <th class="table-th">ITEM</th>
                    <th class="table-th">SIZE</th>
                    <th class="table-th">QTY</th>
                <tbody>
                    @foreach ($storeRequestItems as $item)
                    {{-- {{ $item }} --}}
                        <tr class="table-tr">
                            <td class="table-td">{{ $loop->iteration}}</td>
                            <td class="table-td">{{ $item->storeRequest->date}}</td>
                            <td class="table-td">{{ $item->itemSize->item->category->category}}</td>
                            <td class="table-td">{{ $item->itemSize->item->item}}</td>
                            <td class="table-td">{{ $item->itemSize->size->size}}</td>
                            <td class="table-td">{{ $item->qty }}</td>
                        </tr>
                    @endforeach
                </tbody>
                {{-- <tfoot>
                    <tr>
                        <td class="no-border">&nbsp;</td>
                    </tr>

                </tfoot> --}}

            </table>

        </div>




        </div>

    </div>




</div>
