<?php

namespace App\Http\Livewire\Pages;

use App\Models\Item;
use App\Models\ItemTransectionLog;
use App\Models\ReportGeneration;
use App\Models\StoreRequestItem;
use App\Models\StoreReuqest;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ConsumptionsHome extends Component
{

    public $startDate;
    public $endDate;
    public $totalRows;
    public $store;

    // public $results = [];


    public function generate()
    {


        ReportGeneration::truncate();

        $query =StoreRequestItem::query()
                    ->whereHas('storeRequest', function($q){
                        $q->when($this->startDate || $this->endDate, function($w){
                            return $w ->whereBetween('date', [$this->startDate, $this->endDate]);
                        });
                    })

                    ->with(['storeRequest', 'itemSize'=>function($q){
                        return $q->with(['item'=>function($q){
                            return $q->with(['category' => function($q){
                                return $q->with('store');
                        }]);
                        }, 'size']);
                    }])
                    ->get();;


            foreach($query as $item)
                ReportGeneration::create(
                    [
                    'generated_date' => Carbon::now(),
                    'start_date' => $this->startDate,
                    'end_date' => $this->endDate,
                    'item_id' => $item->itemSize->item->id,
                    'store_request_id' => $item->storeRequest->id,
                    'item_size_id' => $item->item_size_id,
                    'qty' => $item->qty,
                    'category' => $item->itemSize->item->category->category,
                    'store' => $item->itemSize->item->category->store->store,
                    ]);


                // $this->results = ReportGeneration::get();




    }


    public function render()
    {



                    $query2 = ReportGeneration::
                                            select('item_id', 'item_size_id','category','store','start_date','end_date')
                                            ->selectRaw('SUM(qty) as total')
                                            ->groupBy('item_size_id')
                                            ->with(['item', 'item_size' =>function($query){
                                                return $query->with('size');
                                            }])
                                            ->when($this->store, function($query){
                                                return $query->where('store', $this->store);
                                            })
                                            ->get();

                    $this->totalRows = $query2->count();




        return view('livewire.pages.consumptions-home', ['results' => $query2])
            ->extends('layouts.printConsumption')
        ;


    }



}
