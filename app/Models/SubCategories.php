<?php

namespace App\Models;
use App\Models\Categories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategories extends Model
{
    use HasFactory;

    protected $table = 'sub_categories';

    protected $guarded = ['id'];

    public function category(){ 
        return $this->belongsTo(Category::class, 'category_id','id'); 
    }
}
