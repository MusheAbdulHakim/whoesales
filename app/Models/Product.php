<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_id','category_id','product',
        'price','discount','image','description'
    ];

    public function purchase(){
        return $this->belongsTo(Purchase::class);
    }

    static function purchase_products(){
        return Purchase::get('products');
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
