@extends('layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <div class="card-heading">
                REPORTS
            </div>
        </div>

        <div class="card-body">
            <div class="p-3 border-b "><a href ="{{ route('uniformReports') }}" target="_blank" >UNIFORMS REPORT</a></div>
            <div class="p-3 border-b"><a href="{{ route('promotionalItemsReports') }}"target="_blank" >PROMOTIONAL REPORT</a></div>
            <div class="p-3 border-b"><a href="{{ route('consumptionPage') }}" target="_blank">CONUMPTION REPORTS</a></div>
            <div class="p-3 border-b"><a href="{{ route('reportSummary') }}" target="_blank">SUMMARY</a></div>
        </div>
    </div>

@endsection
