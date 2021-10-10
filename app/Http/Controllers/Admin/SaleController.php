<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Sale;
use Illuminate\Http\Request;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Nette\Utils\Random;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'sales';
        $sales = Sale::latest()->get();
        return view('admin.sales.index',compact(
            'title','sales'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'add sales';
        return view('admin.sales.create',compact(
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
            'products' => 'required',
            'quantity' => 'required',
            'customer' => 'required'
        ]);
        $product = Product::findOrFail($request->products);
        $purchase = Purchase::findOrFail($product->purchase_id);
        $price = $product->price;
        $discount = $product->discount;
        $subtotal = ($request->quantity * $price);
        if($discount > 0){
            $subtotal *= ($discount/100) ;
        }
        $remaining_quantity = null;
        foreach($purchase->products as $purchase_products){
            if(in_array($product->product,$purchase_products)){
                $remaining_quantity = $purchase_products['quantity'] - $request->quantity;
                $purchase_products['quantity'] = $remaining_quantity;
            }
        }
        
        if(!($remaining_quantity < 0)){
            $purchase->update([
                'products' => array($purchase_products),
            ]);
            
            $sale = Sale::create([
                'product_id' => $request->products,
                'customer_id' => $request->customer,
                'reference' => uniqid('Sale-'),
                'code' => $request->code,
                'quantity' => $request->quantity,
                'subtotal' => $subtotal,
            ]);
            $notification = notify("sales has been added");
        }
        elseif($remaining_quantity <=3 && $remaining_quantity != 0){
            $notification = notify("$product->product is running out of stock.",'warning');
        }
        else{
            $notification = notify('Please check purchase product quantity','warning');
        }
        
        return redirect()->route('sales.index')->with($notification);   
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        $title = 'edit sale';
        return view('admin.sales.edit',compact(
            'title','sale'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $this->validate($request,[
            'products' => 'required',
            'quantity' => 'required|min:1',
            'customer' => 'required'
        ]);
        $product = Product::findOrFail($request->products);
        $purchase = Purchase::findOrFail($product->purchase_id);
        $price = $product->price;
        $discount = $product->discount;
        $subtotal = ($request->quantity * $price);
        if($discount > 0){
            $subtotal *= ($discount/100) ;
        }
        $remaining_quantity = null;
        foreach($purchase->products as $purchase_products){
            if(in_array($product->product,$purchase_products)){
                $remaining_quantity = $purchase_products['quantity'] - $request->quantity;
                $purchase_products['quantity'] = $remaining_quantity;
            }
        }
        
        if(!($remaining_quantity < 0)){
            $purchase->update([
                'products' => array($purchase_products),
            ]);
            
            $sale->update([
                'product_id' => $request->products,
                'customer_id' => $request->customer,
                'reference' => uniqid('Sale-'),
                'code' => $request->code,
                'quantity' => $request->quantity,
                'subtotal' => $subtotal,
            ]);
            $notification = notify("sales has been updated");
        }
        elseif($remaining_quantity <=3 && $remaining_quantity != 0){
            $notification = notify("$product->product is running out of stock.",'warning');
        }
        else{
            $notification = notify('Please check purchase product quantity','warning');
        }
        return redirect()->route('sales.index')->with($notification);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        $notification = notify('sale has been deleted');
        return back()->with($notification);
    }

    
     /**
     * Show sale receipt for printing
     *
     * @return \Illuminate\Http\Response
     */
    public function print()
    {
        $title = 'print sale receipt';
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data('Custom QR code contents')
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(200)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            // ->logoPath(__DIR__.'/assets/symfony.png')
            ->labelText('This is the label')
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();
            header('Content-Type: '.$result->getMimeType());

        return view('admin.sales.print',compact(
            'title','result'
        ));
    }
}
