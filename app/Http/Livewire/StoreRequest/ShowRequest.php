<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\StoreRequestItem;
use App\Models\StoreReuqest;
use Livewire\Component;

class ShowRequest extends Component
{

    public $store_request_id;


    public function mount($store_request_id)
    {
        $this->store_request_id= $store_request_id;
    }

    public function render()
    {
        $result = StoreReuqest::withCount('storeRequestItems')
                                    ->with(['storeRequestItems' => function($query){
                                        return $query->with(['itemSize' => function($query){
                                            return $query->with(['item', 'size']);
                                        }]);
                                    }])
                                    ->findOrFail($this->store_request_id);
        return view('livewire.store-request.show-request',['store_request' => $result]);
    }
}
