@extends('layouts.app')

@section('content')


<h4>Loged As a : <span class="border px-2 py-1 bg-green-400 rounded-md text-white uppercase">{{ Auth::user()->name }}</span></h4>

@can('isAdmin')

    <h4>I am Admin</h4>

    @else

    <h4>I am not Admin</h4>
@endcan

{{-- <h4>Loged As a : <span class="border px-2 py-1 bg-green-400 rounded-md text-white uppercase">{{ Auth::user()->name }}</span></h4>

<h4>welcome</h4> --}}


@endsection
