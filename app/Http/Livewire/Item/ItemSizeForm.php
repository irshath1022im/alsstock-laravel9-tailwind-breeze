<?php

namespace App\Http\Livewire\Item;

use App\Models\ItemSize;
use App\Models\Size;
use Livewire\Component;

class ItemSizeForm extends Component
{

    public $sizes = [];
    public $size;
    public $item_id;

    protected $rules = [
        'size' => 'required',
        'item_id' => 'required'
    ];


    public function formSubmit()
    {
        $this->validate();

        $result = ItemSize::firstOrCreate([
            'item_id' => $this->item_id,
            'size_id' => $this->size
        ]);

    //   dd($result);


        session()->flash('created', 'Item Size has been addedd');

        redirect()->route('items.show',['item' => $this->item_id]);


    }

    public function formCancell()
    {
        $this->resetExcept('item_id','sizes');
        $this->resetErrorBag();
        $this->emit('formCloseRequest');

    }

    public function mount($item_id)
    {

        $this->item_id= $item_id;
        $this->sizes = Size::get();
    }




    public function render()
    {
        return view('livewire.item.item-size-form');
    }
}
