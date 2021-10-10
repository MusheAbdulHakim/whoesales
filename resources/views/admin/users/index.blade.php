@extends('layouts.app')

@push('page-css')
    <link rel="stylesheet" href="{{asset('dist/css/pages/data-table.css')}}">
@endpush

@section('content')
<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <a href="{{route('users.create')}}"><button class="btn btn-primary right">Add User</button></a>
                <h5 class="card-title">Users</h5>
                <table id="file_export" class="table table-striped table-bordered display">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="chip">{{$role->name}}</span>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{route('users.edit',$user)}}"><button class="btn tooltipped" data-position="top" data-delay="50" data-tooltip="Edit"><i class="material-icons">edit</i></button></a>
                                <br><br>
                                <form action="{{route('users.destroy',$user)}}" method="post">
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
