<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $table = 'wish_list';

    protected $guarded = ['id']; 

    public function product(){
        return $this->hasOne('App\Models\Product', 'id','product_id');
    }

    public function user(){
        return $this->hasOne('App\Models\User', 'id','user_id');
    }
}
