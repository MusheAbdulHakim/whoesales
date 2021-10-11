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
                <form method="post" action="{{route('settings')}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="app" name="app" type="text" value="">
                            <label for="app">App Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn blue darken-1">
                                    <input id="logo" name="logo" type="file" value="">
                                    <label for="logo">App Logo</label>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <div class="file-field input-field">
                                <div class="btn blue darken-1">
                                    <input id="favicon" name="favicon" type="file" value="">
                                    <label for="favicon">App Favicon</label>
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <label>
                                <input name="printpos" value="" type="checkbox" />
                                <span>Print Receipt</span>
                            </label>
                        </div>
                    </div>
                    
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn green waves-effect waves-light right" type="submit" name="submit">Submit
                            </button>
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