<?php

namespace App\Http\Livewire\Pages;

use App\Models\ItemTransectionLog;
use App\Models\StoreRequestItem;
use App\Models\StoreReuqest;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ConsumptionsHome extends Component
{

    public $startDate = '2023-01-01';
    public $endDate ='2023-01-30';
    public $totalRows;


    public function render()
    {

        // $results = StoreRequestItem::with(['storeRequest' => function($q){
        //     return $q->whereBetween('date', ['2022-01-01', '2022-01-30']);
        // },'itemSize'])->orderBy('id', 'desc')->get();


    $results = StoreRequestItem::query()
                    ->whereHas('storeRequest', function($q){
                        $q->when($this->startDate || $this->endDate, function($w){
                            return $w -> whereBetween('date', [$this->startDate, $this->endDate]);
                        });

                    })
                    ->with(['storeRequest', 'itemSize'=>function($q){
                        return $q->with(['item'=>function($q){
                            return $q->with('category');
                        }, 'size']);
                    }])
                    ->get();

    $this->totalRows = $results->count();


        return view('livewire.pages.consumptions-home',['storeRequestItems' => $results])
            ->extends('layouts.printConsumption')
        ;


    }



}
