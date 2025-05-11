@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-heading">
                REPORTS
            </div>
        </div>

        <div class="card-body">
            <div class="p-3 border-b "><a href ="{{ route('uniformReports') }}" >UNIFORMS REPORT</a></div>
            <div class="p-3"><a href="{{ route('promotionalItemsReports') }}">PROMOTIONAL REPORT</a></div>
            <div class="p-3"><a href="{{ route('consumptionPage') }}">CONUMPTION REPORTS</a></div>
        </div>
    </div>

@endsection
