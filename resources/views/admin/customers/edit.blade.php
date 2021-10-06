@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l12">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Create New Customer </h5>
                <form method="post" action="{{route('customers.update',$customer)}}">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="supplier"value="{{old('name') ?? $customer->name}}" name="name" type="text">
                            <label for="supplier">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone" value="{{old('phone') ?? $customer->phone}}" name="phone" type="text" >
                            <label for="phone">Phone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="email" value="{{old('email') ?? $customer->email}}" name="email" type="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="address" value="{{old('address') ?? $customer->address}}" name="address" type="text">
                            <label for="address">Address</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="comment" value="{{old('comment') ?? $customer->comment}}" id="comment" cols="30" rows="15">{{$customer->comment}}</textarea>
                            <label for="comment">Comment</label>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn green waves-effect waves-light " type="submit">Submit
                        </button>
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