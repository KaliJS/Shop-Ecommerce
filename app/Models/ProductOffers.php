<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffers extends Model
{
    use HasFactory;

    protected $table = 'product_offers';

    protected $guarded = ["id"];

    public function product(){
        return $this->hasOne('App\Models\Product','id','product_id');
    }

    public function offer(){
        return $this->hasOne('App\Models\Offers','id','offer_id');
    }

}
