@extends('layouts.auth')

@section('content')
<form class="col s12" action="{{route('login')}}" method="post">
    @csrf
    <!-- email -->
    <div class="row">
        <div class="input-field col s12">
            <input id="email" type="email" class="validate" name="email">
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
    <div class="row m-t-5">
        <div class="col s7">
            <label>
                <input type="checkbox" name="remember" />
                <span>Remember Me?</span>
            </label>
        </div>
        <div class="col s5 right-align"><a href="{{route('password.request')}}" class="link" id="to-recover">Forgot Password?</a></div>
    </div>
    <!-- pwd -->
    <div class="row m-t-40">
        <div class="col s12">
            <button class="btn-large w100 blue accent-4" type="submit">Login</button>
        </div>
    </div>
</form>
@endsection

@push('form-footer')
<div class="center-align m-t-20 db">
    <a href="#" class="btn indigo darken-1 tooltipped m-r-5" data-position="top" data-tooltip="Login with Facebook"><i class="fab fa-facebook-f"></i></a> <a href="#" class="btn orange darken-4 tooltipped" data-position="top" data-tooltip="Login with Facebook"><i class="fab fa-google-plus-g"></i></a>
</div>
<div class="center-align m-t-20 db">
    Don't have an account? <a href="{{route('register')}}">Sign Up!</a>
</div>
@endpush
