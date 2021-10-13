<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'products';
        $products = Product::get();
        return view('admin.products.index',compact(
            'title','products'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'create product';
        $purchases = Purchase::query();
        return view('admin.products.create',compact(
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
            'product' => 'required',
            'category' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg',
            'description' => 'nullable|min:5|max:255'
        ]);
        $imageName = null;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/products'), $imageName);
        }

        Product::create([
            'purchase_id' => $request->purchase,
            'category_id' => $request->category,
            'product' => $request->product,
            'price' => $request->price,
            'discount' => $request->discount,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        $notification = notify('product has been added');
        return redirect()->route('products.index')->with($notification);

    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  Model $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $title = 'edit product';
        return view('admin.products.edit',compact(
            'title','product'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request,[
            'purchase' => 'required',
            'category' => 'required',
            'price' => 'required',
            'discount' => 'nullable',
            'image' => 'nullable|file|image|mimes:png,jpg,jpeg',
            'description' => 'nullable|min:5|max:255'
        ]);
        $imageName = $product->image;
        if($request->hasFile('image')){
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('storage/products'), $imageName);
        }
        $product->update([
            'purchase_id' => $request->purchase,
            'category_id' => $request->category,
            'product' => $request->product,
            'price' => $request->price,
            'discount' => $request->discount,
            'image' => $imageName,
            'description' => $request->description,
        ]);

        $notification = notify('product has been updated');
        return redirect()->route('products.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $notification = notify('product deleted successfully');
        return back()->with($notification);
    }
}
