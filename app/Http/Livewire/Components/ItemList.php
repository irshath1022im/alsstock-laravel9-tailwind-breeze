<?php

namespace App\Http\Livewire\Components;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{

    use WithPagination;

    public $selected_category = 1;


    protected $listeners=['selectedCategory'];

    public function selectedCategory($id)
    {
        $this->resetPage();
        $this->selected_category = $id;
    }



    public function render()
    {
        $result = Item::where('category_id', $this->selected_category)->with('category')->paginate(9);
        return view('livewire.components.item-list',['items' => $result]);
    }
}
