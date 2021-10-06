@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('customers.create')}}"><button class="btn btn-primary right">Create Customer</button></a>
                <h5 class="card-title">Customers</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Comment</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($customers as $customer)
                        <tr>
                            <td>{{$customer->name}}</td>
                            <td>{{$customer->email}}</td>
                            <td>{{$customer->phone}}</td>
                            <td>{{$customer->address}}</td>
                            
                            <td>{{$customer->comment}}</td>
                            <td>
                                <a href="{{route('customers.edit',$customer)}}"><button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons">edit</i></button></a>
                                <br><br>
                                <form action="{{route('customers.destroy',$customer)}}" method="post">
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
