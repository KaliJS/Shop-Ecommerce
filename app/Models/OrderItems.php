<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderItems;
use App\Models\ProductVariants;


class OrderItems extends Model
{
	use HasFactory;
	
    protected $table = 'order_items';

    protected $guarded = ['id'];

    public function product_variant(){
        return $this->hasOne(ProductVariants::class,'id','product_variant_id');
    }
}
