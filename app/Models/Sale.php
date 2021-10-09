<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sale extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'product_id','customer_id','reference','code','quantity','subtotal'
    ];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function product_name(){
        return $this->belongsTo(Product::class,'product');
    }

    public function purchase_products(){
        return $this->hasManyThrough(Purchase::class,Product::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
