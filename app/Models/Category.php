<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;
use App\Models\Product;
use App\Models\Brand;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id']; 

    public function subcategories(){
    	return $this->hasMany(SubCategories::class,'category_id','id');
    }

    public function products() {
        return $this->hasManyThrough(Product::class, Category::class, 'parent_id', 'category_id', 'id');
    }

    public function brands()
    {
        return $this->belongsToMany(Brand::class,'category_brands','category_id','brand_id');
    }

    
}
