<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'users';
        $users = User::with('roles')->get();
        return view('admin.users.index',compact(
            'title','users'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "add user";
        $roles = Role::get();
        return view('admin.users.create',compact(
            'title','roles'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:200',
            'email' => 'required|email',
            'password' => 'required|confirmed|max:255',
            'role' => 'required'
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $user->assignRole($request->role);
        $notification = notify("User has been created");
        return redirect()->route('users.index')>with($notification);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $title = "edit user";
        $roles = Role::get();
        return view('admin.users.edit',compact(
            'title','roles','user'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:200',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|max:255',
            'role' => 'required'
        ]);
        $user = User::findOrFail($id);
        $user_password = Hash::make($request->password);
        if (empty($request->password)){
            $user_password = $user->password;
        }
        // dd($request);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $user_password,
        ]);
        $user->assignRole($request->role);
        $notification = notify("user details updated successfully");
        return redirect()->route('users.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        
        if($user->hasRole("super-admin")){
            $notification = notify("Sorry,Can't delete super-admin",'warning');
            return back()->with($notification);
        }
        if($user->id == auth()->user()->id){
            $notification = notify("Sorry,Can't delete currently authenticated user",'danger');
            return back()->with($notification);
        }

        $user->delete();
        $notification = notify("user has been deleted");
        
        return back()->with($notification);
    }
}
