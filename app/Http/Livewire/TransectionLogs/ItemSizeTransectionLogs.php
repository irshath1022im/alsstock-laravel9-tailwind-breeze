<?php

namespace App\Http\Livewire\TransectionLogs;

use App\Models\ItemTransectionLog;
use Livewire\Component;

class ItemSizeTransectionLogs extends Component
{

    public $item_size_id = null;



    protected $listeners=['getItemSizeTransections'];


    public function getItemSizeTransections($item_size_id)
    {
        $this->item_size_id = $item_size_id;
    }

    public function formClose()
    {
        $this->emit('transectionLogsFormClose');
    }


    public function render()
    {
        $result = ItemTransectionLog::where('item_size_id', $this->item_size_id)->with('itemSize')->get();
        return view('livewire.transection-logs.item-size-transection-logs',['transectionLogs' => $result]);
    }
}
