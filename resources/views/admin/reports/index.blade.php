@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')

<div class="row">
    <div class="col s12 l8">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">General App Settings</h5>
                <form action="{{route('generate-reports')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input class="datepicker" type="text" name="from" id="from_date">
                            <label for="date_range">From</label>
                        </div>
                        <div class="input-field col s6">
                            <input class="datepicker" type="text" name="to" id="to_date">
                            <label for="date_range">To</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="resource" id="resource">
                                <option>Sales</option>
                                <option>Purchases</option>
                                <option>Products</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/extra-libs/prism/prism.js')}}"></script>
<script src="{{asset('dist/js/pages/forms/jquery.validate.min.js')}}"></script>
@endpush