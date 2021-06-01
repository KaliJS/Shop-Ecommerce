<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SubCategories;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $guarded = ['id']; 

    public function subCategories(){
    	return $this->hasMany(SubCategories::class,'category_id','id');
    }
}
