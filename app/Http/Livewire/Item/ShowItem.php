<?php

namespace App\Http\Livewire\Item;

use App\Models\Item;
use Livewire\Component;

class ShowItem extends Component
{

    public $item_id;
    public $itemSizeFormModal = false;

    protected $listeners =['formCloseRequest'];


    public function formCloseRequest()
    {
        $this->itemSizeFormModal = false;
    }

    public function mount($item_id)
    {
        $this->item_id = $item_id;
    }

    public function render()
    {

        // $result = Item::with(['itemSize' => function($query){
            // return $query->with(['size', 'transectionLogs' => function($query){
            //     return $query->with(['transectionType','itemSize' => function($query){
            //         return $query->with('size');
            //     }]);
            // }]);
        // }])->findOrfail($this->item_id);

        $result = Item::findOrFail($this->item_id);

        return view('livewire.item.show-item',['item' => $result]);
    }
}
