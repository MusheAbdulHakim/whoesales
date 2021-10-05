@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l8">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Create New Category </h5>
                <form method="post" action="{{route('categories.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="category" name="name" type="text" required>
                            <label for="category">Category</label>
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