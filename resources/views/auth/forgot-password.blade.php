@extends('layouts.auth')


@section('content')
 <!-- Form -->
 <form class="col s12" action="{{route('password.email')}}" method="post">
    @csrf
    <!-- email -->
    <div class="row">
        <div class="input-field col s12">
            <input id="email1" type="email" name="email" value="{{old('email')}}" class="validate" required>
            <label for="email1">Email</label>
        </div>
    </div>
    <!-- pwd -->
    <div class="row m-t-20">
        <div class="col s12">
            <button class="btn-large w100 red" type="submit" name="action">Reset</button>
        </div>
    </div>
</form>
@endsection

@push('form-footer')
<div class="center-align m-t-20 db">
    Remember your password? <a href="{{route('login')}}">Login!</a>
</div>
@endpush