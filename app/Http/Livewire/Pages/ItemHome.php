<?php

namespace App\Http\Livewire\Pages;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemHome extends Component
{

    use WithPagination;

    public function render()
    {

        $result = Item::with('category')->paginate(12);

        return view('livewire.pages.item-home',['items' => $result])
            ->extends('layouts.app');
    }
}
