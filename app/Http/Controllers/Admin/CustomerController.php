<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'customers';
        $customers = Customer::get();
        return view('admin.customers.index',compact(
            'title','customers'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create customer';
        return view('admin.customers.create',compact(
            'title'
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
            'comment' => 'nullable|min:5|max:255'
        ]);        
        Customer::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'comment' => $request->comment,
        ]);
        $notification = notify('customer created successfully');
        return redirect()->route('customers.index')->with($notification);
    }

   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        $title = 'edit customer';
        return view('admin.customers.edit',compact(
            'title','customer'
        ));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Model $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $this->validate($request,[
            'name' => 'required|min:5|max:255',
            'phone' => 'nullable|min:10|max:15',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|min:3|max:255',
            'comment' => 'nullable|min:5|max:255'
        ]);        
        $customer->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'comment' => $request->comment,
        ]);
        $notification = notify('customer updated successfully');
        return redirect()->route('customers.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        $notification = notify("customer has been deleted");
        return back()->with($notification);
    }
}
