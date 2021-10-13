@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('suppliers.create')}}"><button class="btn btn-primary right">Create Supplier</button></a>
                <h5 class="card-title">Suppliers</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Products</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($suppliers as $supplier)
                        <tr>
                            <td>{{$supplier->name}}</td>
                            <td>{{$supplier->email}}</td>
                            <td>{{$supplier->phone}}</td>
                            <td>{{$supplier->address}}</td>
                            <td>
                                @foreach ($supplier->products as $product)
                                    <span class="chip">{{implode(",",$product)}}</span>
                                @endforeach
                            </td>
                            <td>{{date_format(date_create($supplier->created_at),'D M, Y')}}</td>
                            <td>
                                <a href="{{route('suppliers.edit',$supplier)}}"><button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons">edit</i></button></a>
                                <br><br>
                                <form action="{{route('suppliers.destroy',$supplier)}}" method="post">
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
