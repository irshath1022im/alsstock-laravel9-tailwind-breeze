<?php

namespace App\Http\Livewire\Components;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemList extends Component
{

    use WithPagination;

    public $selected_category = 1;
    public $selected_store = 1;
    public $categories=[];


    protected $listeners=['updateSelectedStore' => 'selectedStoreItemRequest', 'selectedCategory'];


    public function selectedCategory($id)
    {
        $this->resetPage();
        $this->categories = [$id];
    }

    public function selectedStoreItemRequest($store_id)
    {
        $this->selected_store = $store_id;
        $this->getCategoriesForStore();
    }

    public function getCategoriesForStore()
    {
        $this->resetPage();
      $categories = Category::where('store_id', $this->selected_store)->get();
        $this->categories = $categories->pluck('id');
    }

    public function mount()
    {
        $this->getCategoriesForStore();
    }



    public function render()
    {
        // $result = Item::where('category_id', $this->selected_category)->with('category')->paginate(9);

        // $result = Item::whereIn('category_id', $this->categories)->paginte(5);
            $result = Item::with('category')->whereIn('category_id',$this->categories)->paginate(8);
        return view('livewire.components.item-list',['items' => $result]);
    }
}
