<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'user roles';
        $roles = Role::get();
        return view('admin.roles.index',compact(
            'title', 'roles'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create user roles';
        $permissions = Permission::get();
        return view('admin.roles.create',compact(
            'title', 'permissions'
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
            'role' => 'required|min:1|max:200',
            'permission' => 'required|min:1|max:200'
        ]);
        $role = Role::create(['name' => $request->role]);
        $role->syncPermissions($request->permission);
        $notification = notify("new role created successfully");
        return redirect()->route('roles.index')->with($notification);
    }

 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $title = 'edit user roles';
        $permissions = Permission::get();
        $role_permissions = $role->permissions->pluck('name')->toArray();
        return view('admin.roles.edit',compact(
            'title', 'permissions','role','role_permissions'
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
            'role' => 'required|min:1|max:200',
            'permission' => 'required|min:1|max:200'
        ]);
        $role = Role::findOrFail($id);
        $role->update(['name' => $request->role]);
        $role->syncPermissions($request->permission);
        $notification = notify("user role updated successfully");
        return redirect()->route('roles.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        if($role->name == 'super-admin'){
            $notification = notify("Sorry, Can't Delete super-admin",'danger');
            return back()->with($notification);
        }
        $role->delete();
        $notification = notify("role has been deleted");
        return back()->with($notification);
    }
}
