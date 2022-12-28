<?php

namespace App\Http\Livewire\Components;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemSearchBar extends Component
{

       use WithPagination;
    // protected $paginationTheme = 'bootstrap';

    public $search_value;
    public $search_results=[];

    public function updatedSearchValue()
    {

        // dump(isset($this->search_value));

        // $result = Item::where('item', 'like', $this->search_value.'%' )->get();

        if(isset($search_value) || $this->search_value == ""){

            $this->disableSearchQuery = true;
        }

        else
        {

            $search_value = preg_replace("/[^A-Za-z0-9 ]/", '', $this->search_value);
            $result = Item::where('item', 'like','%'.$search_value.'%' )->take(2)->get();

            // dump($result);
            if(count($result) > 0)
            {
                $this->search_results = $result;
            }
            else {
                $this->search_results = [];

            }

        }


    }

    public function selectedItem($item)
    {
        $this->search_value = $item['item'];
        $this->emit('sendSelectedItemId', $item['id']);
    }

    public function render()
    {
        return view('livewire.components.item-search-bar');
    }
}
