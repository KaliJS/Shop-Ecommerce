<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrderItems;

class Orders extends Model
{
	use HasFactory;

    protected $table = 'orders';

    protected $guarded = ['id'];

    public function items(){
    	return $this->hasMany(OrderItems::class,'order_id','id');
    }

    public function user(){
    	return $this->hasOne(User::class,'id','user_id');
    }

    public function delivery_boy(){
    	return $this->hasOne(User::class,'id','delivery_boy_id');
    }
}
