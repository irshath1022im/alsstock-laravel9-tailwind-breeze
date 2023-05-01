
@extends('layouts.app')


@section('content')


<div class="w-100">

    {{ $pdf_id }}
    <iframe src =" {{ Storage::url('/approvedPdf/'.$pdf_id.'.pdf') }}" class="w-full" height="800px"></iframe>


</div>

@endsection

