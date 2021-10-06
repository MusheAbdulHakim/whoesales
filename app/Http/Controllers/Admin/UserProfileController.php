<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index(){
        $title = 'user profile';
        return view('admin.user-profile',compact('title'));
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name' => 'required|min:5|max:255',
            'email' => 'required|email',
            'avatar' => 'nullable|file|image|mimes:png,jpg,jpeg'
        ]);
        $imageName = auth()->user()->avatar;
        if($request->hasFile('avatar')){
            $imageName = time().'.'.$request->avatar->extension();
            $request->avatar->move(public_path('storage/users'), $imageName);
        }    
        auth()->user()->update([
            'name'=> $request->name,
            'email' => $request->email,
            'avatar' => $imageName,
        ]);
        $notification = notify('user profile updated');
        return back()->with($notification);
    }

    /**
     * Update current user password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updatePassword(Request $request)
    {
        $this->validate($request,[
            'current_password'=>'required',
            'password'=>'required|max:200|confirmed',
        ]);

        if (password_verify($request->current_password,auth()->user()->password)){
            auth()->user()->update(['password'=>Hash::make($request->password)]);
            $notification = notify('password updated successfully!!!');
            $logout = auth()->logout();
            return back()->with($notification,$logout);
        }else{
            $notification = notify('Incorrect Current Password !!!','danger');
            return back()->with($notification);
        }
    }
}
