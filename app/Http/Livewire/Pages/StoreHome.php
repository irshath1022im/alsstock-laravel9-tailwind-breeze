<?php

namespace App\Http\Livewire\Pages;

use App\Models\Store;
use Livewire\Component;

class StoreHome extends Component
{
    public function render()
    {

        $result = Store::with('category')->get();

        return view('livewire.pages.store-home',['stores' => $result])
            ->extends('layouts.app')
        ;
    }
}
