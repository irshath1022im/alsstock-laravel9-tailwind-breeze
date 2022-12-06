@extends('layouts.app')

@section('content')

<div>
    <form>

        <x-forms.input type="number" ></x-forms.input>

        <x-button type="button" color="green" class="text-white">Button1</x-button>
        <x-button type="button" color="green" >Button1</x-button>

    </form>
</div>

@endsection
