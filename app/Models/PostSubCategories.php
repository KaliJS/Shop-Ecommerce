<?php

namespace App\Models;
use App\Models\SubCategories;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostSubCategories extends Model
{
    use HasFactory;

    protected $table = 'post_sub_categories';

    protected $guarded = ['id'];

    public function subcategory(){ 
        return $this->belongsTo(SubCategories::class, 'sub_category_id','id'); 
    }
}
