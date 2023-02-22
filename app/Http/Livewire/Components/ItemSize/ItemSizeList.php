<?php

namespace App\Http\Livewire\Components\ItemSize;

use App\Models\ItemSize;
use Livewire\Component;

class ItemSizeList extends Component
{

    public $item_id;
    public $item_size_id;
    public $active_id=1;
    public $transLogsModal = false;
    public $storeRequestLogs = false;


    protected $listeners=['itemFormSubmitted', 'transectionLogsFormClose', 'storeRequestLogsFormClose'];

    public function itemFormSubmitted()
    {

    }

    public function transectionLogsFormClose()
    {
        $this->transLogsModal = false;
    }


    public function storeRequestLogsFormClose()
    {
        $this->storeRequestLogs = false;
    }



    public function showLogs($item_size_id)
    {

        $this->transLogsModal = true;
        $this->emit('getItemSizeTransections', $item_size_id);
    }

    public function getTransections($item_size_id)
    {
        $this->item_size_id = $item_size_id;
    }

    public function getStoreRequestLogs($item_size_id)
    {
        $this->storeRequestLogs = true;
        $this->item_size_id = $item_size_id;
        $this->emit('getStoreRequestLogs', $item_size_id);
    }

    public function mount($item_id)
    {
        $this->item_id= $item_id;
    }

    public function render()
    {

        $result = ItemSize::where('item_id', $this->item_id)
                        ->with(['size','transectionLogs','storeRequestItems'])
                        ->get();
        return view('livewire.components.item-size.item-size-list',['item_sizes' => $result]);
    }
}
