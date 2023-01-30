<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\StoreReuqest;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{


    use WithPagination;

    public $newRequestFormModalStatus = false;

    protected $listeners=['closeOpenModal'];

    public function closeOpenModal()
    {
        $this->newRequestFormModalStatus = false;
    }

    public function openNewForm()
    {
        $this->newRequestFormModalStatus = true;
    }

    public function openUpdateForm($request_id)
    {
        $this->newRequestFormModalStatus = true;
        $this->emit('getRequestDetails', $request_id);
    }

    public function render()
    {
        $result = StoreReuqest::OrderByDesc('date')->paginate(3);
        return view('livewire.store-request.index',['store_requests' => $result]);
    }


}
