<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\StoreRequestItem;
use App\Models\StoreReuqest;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class ShowRequest extends Component
{

    Use WithFileUploads;

    public $store_request_id;
    public $newRequestItemForm = false;
    public $deleteStatusForm = false;
    public $selectedLineId;
    public $editStoreRequestItemModal = false;
    public $approvedPdf;
    public $filePath;


    protected $listeners = ['closeModalRequest'];


    public function updatedApprovedPdf()
    {
        $this->validate([
            'approvedPdf' =>  'required|mimetypes:application/pdf|max:10000'
        ]);

        $fileExtention = $this->approvedPdf->getClientOriginalExtension();

        $this->filePath = Storage::disk('public')->putFileAs('approvedPdf', $this->approvedPdf, $this->store_request_id.'.'.$fileExtention);

        $this->render();

    }


    public function closeModalRequest()
    {
        $this->newRequestItemForm = false;
        $this->deleteStatusForm = false;
        $this->editStoreRequestItemModal = false;
    }

    public function openDeleteForm($itemId)
    {
        $this->deleteStatusForm = true;
        $this->selectedLineId = $itemId;
    }

    public function deleteLineItem()
    {

        $result = StoreRequestItem::find($this->selectedLineId)->delete();

        if($result)
        {
            $this->closeModalRequest();
        }



    }


    public function editStoreRequestItem($lineId)
    {
        $this->selectedLineId = $lineId;
        $this->editStoreRequestItemModal = true;
    }

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
