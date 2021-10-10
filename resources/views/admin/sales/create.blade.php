@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l11">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Create New Sale </h5>
                <form id="sale_form" method="post" action="{{route('sales.store')}}">
                    @csrf
                    <div class="row">
                        <div class="input-field col s12">
                            <select class="select2" name="products" id="product">
                                @foreach (App\Models\Product::get() as $product)
                                <option data-purchase="{{$product->purchase_id}}" value="{{$product->id}}">{{$product->product}}</option>
                                @endforeach
                            </select>
                            <label for="product">Products</label>
                            <small>Choose multiple products using the checkbox</small>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select class="select2" name="customer" id="customer">
                                @foreach (App\Models\Customer::get() as $customer)
                                <option value="{{$customer->id}}">{{$customer->name}}</option>
                                @endforeach
                            </select>
                            <label for="customer">Customer</label>
                        </div>
                    </div>
                   <input type="hidden" id="purchase_id" name="purchase">
                    <div class="row">
                        <div class="input-field col s12">
                            <input class="chips"type="text" name="quantity" value="1" id="quantity" >
                            <small>If multiple products use comma to separate quantity in order of products. Eg: 1, 2</small>
                            <label for="quantity">Quantity</label>
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
<script>
    $(document).ready(function(){

        $('select#product').on('change', function() {
            var purchase_id = $('select#product option:selected').attr('data-purchase');
            $('#purchase_id').val(purchase_id);
        });

    });
</script>
@endpush