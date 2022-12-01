@extends('layouts.app')

@section('content')

    @component('components.success')

    @endcomponent

    @livewire('item.new-item-form', ['item_id' => $id])
@endsection

