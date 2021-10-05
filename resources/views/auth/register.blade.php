@extends('layouts.auth')

@section('content')
<form class="col s12" action="{{route('register')}}" method="post">
    @csrf
    <!-- email -->
    <div class="row">
        <div class="input-field col s12">
            <input id="name" type="text" class="validate" name="name" value="{{old('name')}}" required>
            <label for="name">Name</label>
        </div>
    </div>
    <!-- email -->
    <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" class="validate" name="email" value="{{old('email')}}" required>
            <label for="email">Email</label>
        </div>
    </div>
    <!-- pwd -->
    <div class="row">
        <div class="input-field col s12">
            <input id="password" type="password" class="validate" name="password" required>
            <label for="password">Password</label>
        </div>
    </div>
    <!-- pwd -->
    <div class="row">
        <div class="input-field col s12">
            <input id="cpassword" type="password" class="validate" name="password_confirmation" required>
            <label for="cpassword">Confirm Password</label>
        </div>
    </div>
    <!-- pwd -->
    
    <!-- pwd -->
    <div class="row m-t-40">
        <div class="col s12">
            <button class="btn-large w100 red" type="submit">Sign Up</button>
        </div>
    </div>
</form>
@endsection


@push('form-footer')
<div class="center-align m-t-20 db">
    Already have an account? <a href="{{route('login')}}">Sign In!</a>
</div>
@endpush