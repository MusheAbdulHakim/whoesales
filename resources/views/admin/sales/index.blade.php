@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('sales.create')}}"><button class="btn btn-primary right">Add Sale</button></a>
                <h5 class="card-title">Sales</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Reference</th>
                            <th>Customer</th>
                            <th>Quantity</th>
                            <th>Amount Paid</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($sales as $sale)
                        <tr>
                            <td>{{$sale->product->product}}</td>
                            <td>{{$sale->reference}}</td>
                            <td>{{$sale->customer->name}}</td>
                            <td>{{$sale->quantity}}</td>
                            <td>{{$sale->subtotal}}</td>
                            <td>{{date_format(date_create($sale->created_at),'Y M, Y')}}</td>
                            <td>
                                <a href="{{route('sales.edit',$sale)}}"><button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons">edit</i></button></a>
                                <br><br>
                                <form action="{{route('sales.destroy',$sale)}}" method="post">
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
