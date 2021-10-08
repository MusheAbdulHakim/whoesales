@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('purchases.create')}}"><button class="btn btn-primary right">Create Purchase</button></a>
                <h5 class="card-title">Purchases</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Product (s)</th>
                            <th>Product Quantity</th>
                            <th>Product Expiry Date</th>
                            <th>Purchase  Cost</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($purchases as $purchase)
                        <tr>
                            <td>
                                @foreach ($purchase->products as $product) 
                                <span class="chip">{{$product['name']}}</span>
                                @endforeach
                            </td>
                            <td>{{$product['quantity']}}</td>
                            <td>{{$product['expiry_date']}}</td>
                            <td>{{$purchase->cost}}</td>
                            <td>{{$purchase->comment}}</td>
                            <td>
                                <a href="{{route('purchases.edit',$purchase)}}"><button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons">edit</i></button></a>
                                <br><br>
                                <form action="{{route('purchases.destroy',$purchase)}}" method="post">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn red tooltipped" type="submit" data-position="top" data-delay="50" data-tooltip="Delete"><i class="material-icons">delete</i></button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-js')
<script src="{{asset('assets/extra-libs/DataTables/datatables.min.js')}}"></script>
<script src="{{asset('dist/js/pages/datatable/datatable-advanced.init.js')}}"></script>
@endpush
