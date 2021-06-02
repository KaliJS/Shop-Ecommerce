<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;
use App\Models\Brand;
use App\Models\ProductVariants;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];
    
    public function subcategory(){
    	return $this->belongsTo(SubCategories::class,'sub_category_id','id');
    }

    public function brand(){
    	return $this->belongsTo(Brand::class,'brand_id','id');
    }

    public function variants(){
    	return $this->hasMany(ProductVariants::class,'product_id','id');
    }

}
