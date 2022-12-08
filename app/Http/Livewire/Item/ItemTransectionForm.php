<?php

namespace App\Http\Livewire\Item;

use App\Models\ItemSize;
use App\Models\ItemTransectionLog;
use App\Models\TransectionType;
use Livewire\Component;

class ItemTransectionForm extends Component
{

    public $item_id;
    public $availableSizes= [];
    public $size_id;
    public $transections_type=[];
    public $qty;
    public $transection_type;
    public $remark;
    public $date;
    public $item_size_id;

    protected $rules=[
        'date' => 'required',
        'item_size_id' => 'required',
        'qty' => 'required',
        'transection_type' => 'required',
        'remark' => ''
    ];




    public function formSubmit()
    {
        $validated = $this->validate();

        ItemTransectionLog::create($validated);

        session()->flash('created', 'Transection is being added SuccessFully');

        $this->resetExcept('item_id','availableSizes', 'transections_type');
        $this->resetErrorBag();
        $this->formCancell();
        $this->emit('itemFormSubmitted');




    }


    public function formCancell()
    {
        $this->emit('formCloseRequest');
        $this->resetExcept('item_id','availableSizes', 'transections_type');
        $this->resetErrorBag();
    }

    public function mount($item_id)
    {
        $this->item_id = $item_id;
         $this->availableSizes = ItemSize::with('size')->where('item_id', $item_id)
                                ->get();
        $this->transections_type = TransectionType::get();
    }


    public function render()
    {
        return view('livewire.item.item-transection-form');
    }
}
