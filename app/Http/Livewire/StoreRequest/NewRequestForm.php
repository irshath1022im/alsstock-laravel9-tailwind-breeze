<?php

namespace App\Http\Livewire\StoreRequest;

use App\Models\Requester;
use App\Models\StoreReuqest;
use Livewire\Component;

class NewRequestForm extends Component
{

    public $request_id;
    public $date;
    public $requestedBy;
    public $approvedBy;
    public $remark;
    public $status;
    public $edit_request_id;
    public $mode= '';
    public $requesters=[];


    protected $listeners=['getRequestDetails'];
    protected $rules=[
        'date' => 'required',
        'requestedBy' => 'required',
        'approvedBy' => 'required',
        'status'=>'required',
        'remark'=>''
    ];


    public function getRequestDetails($request_id)
    {

        $this->mode="Edit";
        $this->request_id = $request_id;

        $this->edit_request_id = $this->request_id;

        if($request_id > 0) {

            $result = StoreReuqest::find($request_id);
            $this->date = $result['date'];
            $this->requestedBy = $result['requestedBy'];
            $this->approvedBy = $result['approvedBy'];
            $this->status = $result['status'];
            $this->remark = $result['remark'];


        }else {
            $this->mode="New";
        }

    }

    public function updateForm()
    {

        $validated = $this->validate();

        $data = [
            'date' => $validated['date'],
            'requestedBy' => $validated['requestedBy'],
            'approvedBy' => $validated['approvedBy'],
            'remark' => $validated['remark'],
            'status' => $validated['status']
        ];


        StoreReuqest::find($this->request_id)->update($data);
        session()->flash('updated', 'Store Request is being Updated...');
        // return redirect()->route('storeRequest.index');
    }

    public function newRequest()
    {

        $validated = $this->validate();
        $data = [
            'date' => $validated['date'],
            'requestedBy' => $validated['requestedBy'],
            'approvedBy' => $validated['approvedBy'],
            'remark' => $validated['remark'],
            'status' => $validated['status']
        ];

        StoreReuqest::create($data);

        session()->flash('created', 'Store Request is being Added...');
        $this->resetExcept('requesters');
        $this->resetErrorBag();
        // return redirect()->route('storeRequest.index');

        // $this->emit('closeOpenForm');

    }

    public function closeForm()
    {
        $this->emit('closeOpenModal');
        $this->resetExcept('requesters');
        $this->resetErrorBag();
    }

    public function mount()
    {

        $this->requesters = Requester::all();
    }

    public function render()
    {
        return view('livewire.store-request.new-request-form');
    }
}
