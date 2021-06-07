<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Category;

class Brand extends Model
{
    use HasFactory;

    protected $table = 'brands';

    protected $guarded = ['id'];

    public function products(){
    	return $this->hasMany(Product::Class,'id','product_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class,'category_brands','brand_id','category_id');
    }
}
