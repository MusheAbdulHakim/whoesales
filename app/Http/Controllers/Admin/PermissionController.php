<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'user permissions';
        $permissions = Permission::get();
        return view('admin.permissions.index',compact(
            'title','permissions'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create permissions';
        return view('admin.permissions.create',compact(
            'title',
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
            'permission' => 'required|max:255'
        ]);
        foreach (explode(',',$request->permission) as  $permission) {
            $permission = Permission::create(['name' => $permission]);
            $permission->assignRole('super-admin');
        }
        $notification = notify("user permission created successfully");
        return redirect()->route('permissions.index')->with($notification);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        $title = 'edit permissions';
        return view('admin.permissions.edit',compact(
            'title','permission'
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
            'permission' => 'required|max:255'
        ]);
        foreach(explode(',',$request->permission) as $permission){
            $permission = Permission::findOrFail($id);
            $permission->update(['name' => $permission]);
            $permission->assignRole('super-admin');
        }
        $notification = notify("user permission updated successfully");
        return redirect()->route('permissions.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        $notification = notify("user permission has been deleted");
        return back()->with($notification);
    }
}
