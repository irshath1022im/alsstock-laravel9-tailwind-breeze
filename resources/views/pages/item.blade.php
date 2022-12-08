@extends('layouts.app')




@section('content')

    @livewire('item.show-item',['item_id' => $item_id])

@endsection
