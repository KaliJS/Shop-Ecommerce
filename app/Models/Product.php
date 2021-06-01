<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PostSubCategory;
use App\Models\ProductVariants;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $guarded = ['id'];

    public function postsubcategory(){
    	return $this->hasOne(PostSubCategory::class,'id','post_sub_category_id');
    }

    public function variants(){
    	return $this->hasMany(ProductVariants::class,'product_id','id');
    }

}
