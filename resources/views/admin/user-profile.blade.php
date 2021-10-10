@extends('layouts.app')

@push('page-css')
    
@endpush

@section('content')
<div class="row">
    <div class="col s12 m4">
        <div class="card">
            <div class="card-content">
                <div class="center-align m-t-30">
                     <img src="{{!empty(auth()->user()->avatar) ? asset('storage/users/'.auth()->user()->avatar) : asset('assets/images/users/2.jpg')}}" class="circle"  width="150" />
                </div>
            </div>
            <hr>
            <div class="card-content">
                <small>Name</small>
                <h6>{{auth()->user()->name}}</h6>

                <small>Email address </small>
                <h6>{{auth()->user()->email}}</h6>

                <small>Roles</small>
                <br>
                @foreach (auth()->user()->roles as $role)
                <h6 class="chip">{{$role->name}}</h6>
                @endforeach
            </div>
        </div>
    </div>
    <div class="col s12 m8">
        <div class="card">
            <div class="row">
                <div class="col s12">
                    <ul class="tabs">
                        <li class="tab col s3"><a class="active" href="#profile">Profile</a></li>
                        <li class="tab col s3"><a href="#update-password">Password</a></li>
                    </ul>
                </div>
                
                <div id="profile" class="col s12">
                    <div class="card-content">
                        <form method="post" enctype="multipart/form-data" action="{{route('update-profile')}}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="text" name="name" value="{{old('name') ?? auth()->user()->name}}">
                                    <label for="name">Name</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="email" type="email" name="email" value="{{old('email') ?? auth()->user()->email}}">
                                    <label for="email">Email</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="file-field input-field">
                                    <div class="btn blue darken-1">
                                        <input id="avatar" type="file" value="{{auth()->user()->avatar}}" name="avatar">
                                        <label for="avatar">Avatar</label>
                                    </div>
                                    <div class="file-path-wrapper">
                                        <input class="file-path validate" type="text">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn teal waves-effect waves-light" type="submit" name="action">Update Profile</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div id="update-password" class="col s12">
                    <div class="card-content">
                        <form method="post" action="{{route('update-password')}}">
                            @csrf
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="current_password" type="password" name="current_password" >
                                    <label for="current_password">Current Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password" type="password" name="password" >
                                    <label for="password">New Password</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="password_confirmation" type="password" name="password_confirmation" >
                                    <label for="password_confirmation">Confirm Password</label>
                                </div>
                            </div>
                            
                            
                            <div class="row">
                                <div class="input-field col s12">
                                    <button class="btn teal waves-effect waves-light" type="submit" name="action">Update Password</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection

@push('page-js')
    
@endpush