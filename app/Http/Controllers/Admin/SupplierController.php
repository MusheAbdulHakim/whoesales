<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'suppliers';
        $suppliers = Supplier::get();
        return view('admin.suppliers.index',compact(
            'title','suppliers'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'add supplier';
        return view('admin.suppliers.create',compact(
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
            'name' => 'required|min:5|max:255',
            'phone' => 'nullable|min:10|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|min:3|max:255',
            'products' => 'required|min:1',
            'comment' => 'nullable|min:5|max:255'
        ]);        
        Supplier::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'comment' => $request->comment,
            'products' => $request->products,
        ]);
        $notification = notify('supplier added');
        return redirect()->route('suppliers.index')->with($notification);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $title = 'edit supplier';
        return view('admin.suppliers.edit',compact(
            'title','supplier'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:255',
            'phone' => 'nullable|min:10|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|min:3|max:255',
            'products' => 'required|min:1',
            'comment' => 'nullable|min:5|max:255'
        ]);
        $supplier->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'comment' => $request->comment,
            'products' => $request->products,
        ]);
        $notification = notify('supplier updated successfully');
        return redirect()->route('suppliers.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Model $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        $notification = notify("supplier deleted successfully");
        return back()->with($notification);
    }
}
