<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\StoreReuqest;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;


    public function render()
    {
        $result = StoreReuqest::paginate(3);
        return view('livewire.store-request.index',['store_requests' => $result]);
    }


}
