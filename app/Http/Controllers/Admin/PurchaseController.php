<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'purchases';
        $purchases = Purchase::get();
        return view('admin.purchases.index',compact(
            'title','purchases'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create purchase';
        return view('admin.purchases.create',compact(
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
            'supplier' => 'required',
            'products' => 'required',
            'cost' => 'required',
            'comment' => 'nullable|min:5|max:255'
        ]);
        Purchase::create([
            'supplier_id' => $request->supplier,
            'products' => $request->products,
            'cost' => $request->cost,
            'comment' => $request->comment,
        ]);
        $notification = notify('made purchase successfully');
        return redirect()->route('purchases.index')->with($notification);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        $title = 'edit purchase';
        return view('admin.purchases.edit',compact(
            'title','purchase'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $this->validate($request,[
            'supplier' => 'required',
            'products' => 'required',
            'cost' => 'required',
            'comment' => 'nullable|min:5|max:255'
        ]);
        $purchase->update([
            'supplier_id' => $request->supplier,
            'products' => $request->products,
            'cost' => $request->cost,
            'comment' => $request->comment,
        ]);
        $notification = notify('purchase updated successfully');
        return redirect()->route('purchases.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
