 <div class="card">

        <div class="card-header">
            <div class="card-heading">Consumption Report
                <button class="btn-info print:hidden" >Count:: {{ $totalRows }}</button>
            </div>
        </div>

        {{-- main card --}}
        <div class="card-body">

              <form action="">

                <div class="flex">

                    <div class="formGroup flex justify-between m-3 text-sm print:hidden basis-[85%]" >
                       <input type="date" name="" id="" class="form-controll" wire:model.live="startDate">
                        <input type="date" name="" id="" class="form-controll" wire:model.live="endDate">
                   </div>

                    <button class="btn-info print:hidden basis-[15%]" wire:click="generate()" >Generate Report</button>

                </div>



             </form>


             {{-- report cards --}}
            <div class="card">

                <div class="card-heading flex justify-between items-center">

                    <div class="card-title">
                       Report Periods-


                       @if($totalRows > 0 )

                        <span class="">( {{ $results[0]->start_date }} - {{ $results[0]->end_date }})</span>
                       @endif

                    </div>

                    <div>
                        <select type="text" class="form-controll" wire:model.live="store">
                                <option value="">Select</option>
                                <option value="uniform">Uniform</option>
                                <option value="promotional items">Promotional Items</option>
                        </select>

                    </div>
                </div>


                 <div class="card-body">

                    <div class="table-overflow">

                        <table class="table">
                            <thead class="table-header-group">

                                <th class="table-th">#</th>
                                <th class="table-th">STORE</th>
                                <th class="table-th">CATEGORY</th>
                                <th class="table-th">ITEM</th>
                                <th class="table-th">SIZE</th>
                                <th class="table-th">QTY</th>
                            </thead>

                            <tbody>

                                @foreach ($results as $item)

                                <tr class="divide-y-2 print:text-sm">
                                    <td class="table-td"> {{$loop->iteration}}</td>
                                    <td class="table-td"> {{$item->store}}</td>
                                    <td class="table-td"> {{$item->category}}</td>
                                    <td class="table-td">{{$item->item->item}}</td>
                                    <td class="table-td"> {{$item->item_size->size->size}}</td>
                                    <td class="table-td"> {{$item->total}}</td>
                                </tr>

                                @endforeach

                            </tbody>

                        </table>

                    </div>
                 </div>

            </div>



        </div>

    </div>
