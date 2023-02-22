<?php

namespace App\Http\Livewire\ItemSize;

use App\Models\StoreRequestItem;
use Livewire\Component;

class StoreRequestLogs extends Component
{

    public $item_size_id;


    protected $listeners = ['getStoreRequestLogs'];


    public function getStoreRequestLogs($item_size_id)
    {

        $this->item_size_id = $item_size_id;

    }

    public function formClose()
    {
        $this->emit('storeRequestLogsFormClose');
    }

    public function render()
    {

        $results = StoreRequestItem::with('storeRequest', 'itemSize')
                                        ->where('item_size_id', $this->item_size_id)

                                    ->get();
        return view('livewire.item-size.store-request-logs', ['storeRequestLogs' => $results]);
    }
}
