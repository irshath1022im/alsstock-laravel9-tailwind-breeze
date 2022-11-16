<?php

namespace App\Http\Livewire\Components;

use App\Models\Store;
use Livewire\Component;

class StoreList extends Component
{

    public $selected_store = 1;


    public function selectedStore($id)
    {
        $this->selected_store = $id;
        $this->emit('updateSelectedStore', $id);
    }

    public function render()
    {
        $result = Store::get();
        return view('livewire.components.store-list',['stores' => $result]);
    }
}
