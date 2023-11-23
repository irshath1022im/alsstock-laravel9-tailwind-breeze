<?php

namespace App\Http\Livewire\Pages;

use App\Models\Store;
use Livewire\Component;

class StockSummaryReport2 extends Component
{

    public $report_store = 2;
    public $totalRow = 0;

    public function render()
    {


        $result = Store::with(['items' => function($query){
            return $query->with(['itemSize' => function($query){
                return $query->with('size','transectionLogs','storeRequestItems')->get();
            }]);
         }])->find($this->report_store);


        return view('livewire.pages.stock-summary-report2', ['store' => $result])
                ->extends('layouts.app');
    }
}
