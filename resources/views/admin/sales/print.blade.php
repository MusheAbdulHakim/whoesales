@extends('layouts.app')

@push('page-css')
    
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content white-text">
                <div class="card-title center">
                    <img class="dark-logo" src="{{asset('assets/images/logo-icon.png')}}">
                    <h5>Sales Card</h5>
                </div>
                <p>Date: </p>
                <p>Reference: </p>

            <ul>
                <li>item one</li>
                <li>item two</li>
                <li>item three</li>
            </ul>
            
            <p><b>Total</b> </p>
            <p><b>Grand Total</b></p>
            <p>Thank You For Shopping With Us. Please Come Again</p>
        </div>
        <div class="card-footer">
            <img class="centered" src="{{$result->getDataUri()}}" alt="qr code">
        </div>
    </div>
</div>
@endsection

@push('page-js')
    
@endpush


