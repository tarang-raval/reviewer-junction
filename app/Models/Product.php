<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    function productAttributes(){
       return  $this->hasMany(ProductAttribute::class,'product_id','id');
    }

    function getReview() {
        if(Auth::check()){
            return $this->hasMany(Review::class, 'product_id', 'id')->where('status', '1');
        }else{
            $sitesetting = SiteSetting::first();
            if(!empty($sitesetting)){
                return $this->hasMany(Review::class, 'product_id', 'id')->where('status', '1')->limit($sitesetting[' no_of_review_show_as_guest ']);
            }else{
                return $this->hasMany(Review::class, 'product_id', 'id')->where('status', '1')->limit(5);
            }
        }
    }
}
