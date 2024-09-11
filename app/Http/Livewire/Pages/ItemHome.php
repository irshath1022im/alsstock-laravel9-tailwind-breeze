<?php

namespace App\Http\Livewire\Pages;

use App\Models\Category;
use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemHome extends Component
{
    public $categories;
    public $filterBy;
    use WithPagination;


    public function mount()
    {
        $this->categories = Category::get();
    }

    public function updatedFilterBy()
    {
        $this->resetPage();
    }

    public function render()
    {

        $result = Item::with('category')
                ->when($this->filterBy, function($query){
                    return $query->where('category_id', $this->filterBy);
                })
                ->paginate(12);

        return view('livewire.pages.item-home',['items' => $result])
            ->extends('layouts.app');
    }
}
