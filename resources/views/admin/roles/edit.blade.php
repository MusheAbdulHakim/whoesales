@extends('layouts.app')

@push('page-css')
<link href="{{asset('assets/extra-libs/prism/prism.css')}}" rel="stylesheet">
@endpush

@section('content')
<div class="row">
    <div class="col s12 l11">
        <div class="card">
            <div class="card-content">
                <h5 class="card-title activator">Edit User Role </h5>
                <form method="post" action="{{route('roles.update',$role)}}">
                    @csrf
                    @method("PUT")
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="role" name="role" value="{{$role->name}}" type="text">
                            <label for="role">Role</label>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="input-field col s12">
                            <select name="permission[]" id="permissions" multiple>
                                @foreach ($permissions as $permission)
                                    <option {{(in_array($permission->name,$role_permissions)) ? 'selected' : ''}}>{{$permission->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn success block waves-effect waves-light right" type="submit" name="action">Submit
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