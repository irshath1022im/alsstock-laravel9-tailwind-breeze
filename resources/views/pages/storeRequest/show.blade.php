@extends('layouts.app')

@section('content')


@livewire('store-request.show-request',['store_request_id' => $store_request->id])
@endsection
