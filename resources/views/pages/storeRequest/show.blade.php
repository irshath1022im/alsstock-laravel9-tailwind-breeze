@extends('layouts.app')

@section('content')

<div class="card  bg-gray-300">
    <div class="card-header">
        <p class="card-heading">STORE REQUEST # <span>5</span></p>
    </div>

    <div class="card-body">

        <div class="card">
            <div class="card-header">
                <div class="card-heading">REQUEST INFO</div>
            </div>


            <div class="card-body flex justify-between" >

                <div>
                    <x-forms.label>Date</x-forms.label>
                    <input type="date" disabled value="{{ $store_request->date }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Requested By</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->requestedBy }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Approved By</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->approvedBy }}" class="form-controll">
                </div>

                <div>
                    <x-forms.label>Status</x-forms.label>
                    <input type="text" disabled value="{{ $store_request->status }}" class="form-controll">
                </div>

            </div>

        </div>

        <hr/>

        <div>
            {{-- @dump($store_request->store_request_items_count) --}}



        </div>


    </div>

</div>

@endsection
