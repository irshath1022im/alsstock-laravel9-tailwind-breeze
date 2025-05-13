<?php

namespace App\Http\Livewire\Pages;

use App\Models\Item;
use App\Models\ItemTransectionLog;
use App\Models\StoreRequestItem;
use App\Models\StoreReuqest;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ConsumptionsHome extends Component
{

    public $startDate = '2024-11-28';
    public $endDate ='2024-11-28';
    public $totalRows;


    public function render()
    {

        // $results = StoreRequestItem::with(['storeRequest' => function($q){
        //     return $q->whereBetween('date', ['2022-01-01', '2022-01-30']);
        // },'itemSize'])->orderBy('id', 'desc')->get();


    // $results = StoreRequestItem::query()
    //                 ->whereHas('storeRequest', function($q){
    //                     $q->when($this->startDate || $this->endDate, function($w){
    //                         return $w -> whereBetween('date', [$this->startDate, $this->endDate]);
    //                     });
    //                 })


    //                 ->with(['storeRequest', 'itemSize'=>function($q){
    //                     return $q->with(['item'=>function($q){
    //                         return $q->with('category');
    //                     }, 'size']);
    //                 }])
    //                 ->get();

    // $this->totalRows = $results->count();

    //                 $results3 = $results->groupBy(function( $results, int $item_size_id) {
    //                     return $results['item_size_id'];
    //                     // return $results;
    //                 });


    //                 // $results4 = $results->keyBy('item_size_id');



        // $results3 = StoreReuqest::whereBetween('date', [$this->startDate, $this->endDate])
        //                         ->with('storeRequestItems')
        //                         ->get();

                    // $results3 = $result->mapToGroups(function(array $item, int $key){
                    //     return [$item['item_size_id'] => $tem['']]
                    // })


                    $results = Item::query()
                                ->whereHas()



        return view('livewire.pages.consumptions-home',['storeRequestItemsGrouped' => $results])
            ->extends('layouts.printConsumption')
        ;


    }



}
