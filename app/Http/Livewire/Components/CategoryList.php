<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use Livewire\Component;

class CategoryList extends Component
{

    public $selected_store =1;


    protected $listeners = ['updateSelectedStore'];

    public function updateSelectedStore($id)
    {
        $this->selected_store = $id;
    }

    public function selectedCategory($id)
    {
        $this->emit('selectedCategory', $id);
    }

    public function render()
    {

        if($this->selected_store) {
        $query = Category::withCount('items')
                        ->where('store_id', $this->selected_store)
                        ->get();

        } else {
            $query = [];
        }
        return view('livewire.components.category-list',['categories' => $query]);
    }
}
