@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l12">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Create New Supplier </h5>
                <form method="post" action="{{route('suppliers.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="supplier"value="{{old('name')}}" name="name" type="text" required>
                            <label for="supplier">Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="phone" value="{{old('phone')}}" name="phone" type="text" >
                            <label for="phone">Phone</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s6">
                            <input id="email" value="{{old('email')}}" name="email" type="email">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="address" value="{{old('address')}}" name="address" type="text">
                            <label for="address">Address</label>
                        </div>
                    </div>
                    
                    <div class="row form-repeater">
                        <div data-repeater-list="products">
                            <div data-repeater-item>
                                <div class="input-field col s10">
                                    <input id="product" type="text" name="name">
                                    <label for="product">Product</label>
                                </div>
                                <div class="input-field col s2">
                                    <button data-repeater-delete="" data-position="top" data-delay="50" data-tooltip="Remove" class="btn red waves-effect waves-light tooltipped" type="button"><i class="material-icons">clear</i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" data-repeater-create="" class="btn teal waves-effect waves-light m-l-10">Add Product
                        </button>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="comment" value="{{old('comment')}}" id="comment" class="materialize-textarea" data-length="255"></textarea>
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