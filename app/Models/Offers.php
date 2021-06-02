<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class Offers extends Model
{
	use HasFactory;
	
    protected $table = 'offers';

    protected $guarded = ['id'];

    public function products(){
    	return $this->belongsToMany(Product::class,'product_offers','offer_id','product_id');
    }
    
}
