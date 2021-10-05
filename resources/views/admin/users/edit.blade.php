@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l11">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Edit User Details<i class="material-icons right tooltipped" data-position="left" data-delay="50" data-tooltip="Get Code">more_vert</i></h5>
                <form method="post" action="{{route('users.update',$user)}}">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="name" name="name" value="{{$user->name ?? old('name')}}" type="text">
                            <label for="name">Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" name="email" value="{{$user->email ?? old('email')}}" type="email">
                            <label for="email">Email</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="password" name="password" type="password">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="confirm_password" name="password_confirmation" type="password">
                            <label for="confirm_password">Confirm Password</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="role" id="role">
                                @foreach ($roles as $role)
                                    <option value="{{!empty($user->role) ? $user->role : $role->name}}">{{!empty($user->role) ? $user->role : $role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn btn-primary waves-effect waves-light right" type="submit" name="action">Submit
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