<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\ItemSize;
use App\Models\StoreRequestItem;
use Livewire\Component;

class NewStoreRequestItemForm extends Component
{


    public $store_request_id;
    public $item_size_id;
    public $qty;
    public $remark;
    public $selectedItemId;
    public $item_sizes=[];
    public $availableQty=0;



    protected $rules=[
        'store_request_id' => 'required',
        'item_size_id' => 'required',
        'qty' => 'required',
        'remark'=>''
    ];



    protected $listeners=['sendSelectedItemId' => 'receiveSelectedItemId'];


    public function receiveSelectedItemId($id)
    {
        $this->selectedItemId = $id;
        $this->item_sizes = ItemSize::where('item_id', $id)->with('size')->get();

    }

    public function updatedItemSizeId()
    {

            if(!empty($this->item_size_id ))

            {
                $this->availableQty = $this->item_size_id;

                $total = ItemSize::with('transectionLogs','storeRequestItems')->find($this->item_size_id);

                $this->availableQty = $total->transectionLogs->sum('qty') - $total->storeRequestItems->sum('qty');
            }



    }

    public function updated($qty)
    {
        // $this->availableQty = $this->availableQty + $this->qty;

        $this->qty = intval($this->qty);
        if($this->qty > $this->availableQty)
        {
            $this->addError('qty', 'We Dont have enought Qty');

        }
        else{
            $this->resetErrorBag('qty');
        }






    }


    public function formSubmit()
    {
        $validated =$this->validate();

        $validatedQty = $this->validate(
            ['qty' => 'required|integer|min:1|max:'.$this->availableQty.' ']
        );

        $data= [
            'store_request_id' => $validated['store_request_id'],
            'item_size_id' => $validated['item_size_id'],
            'qty' => $validatedQty['qty'],
            'remark' => $validated['remark']
        ];

        StoreRequestItem::create($data);
        $this->emit('newItemAdded');
        $this->resetExcept('store_request_id');
        session()->flash('created', 'Item Has been Added...');
    }

    public function mount($store_request_id)
    {
        $this->store_request_id = $store_request_id;
    }

    public function closeModal()
    {
        $this->emit('closeModalRequest');
        $this->resetExcept('store_request_id');
        $this->resetErrorBag();
    }


    public function render()
    {
        return view('livewire.store-request.new-store-request-item-form');
    }
}
