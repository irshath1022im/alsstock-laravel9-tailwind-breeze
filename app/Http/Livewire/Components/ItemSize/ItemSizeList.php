<?php

namespace App\Http\Livewire\Components\ItemSize;

use App\Models\ItemSize;
use Livewire\Component;

class ItemSizeList extends Component
{

    public $item_id;
    public $active_id=1;


    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }

    public function render()
    {

        $result = ItemSize::where('item_id', $this->item_id)
                ->with(['size','transectionLogs' => function($query){
                         return $query->with(['transectionType','itemSize' => function($query){
                                return $query->with('size');
                                     }]);
                            }])
                        ->get();
        return view('livewire.components.item-size.item-size-list',['item_sizes' => $result]);
    }
}
