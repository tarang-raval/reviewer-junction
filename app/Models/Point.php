<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Point extends Model
{
    use HasFactory;
    public static function getSubcategoryPoint($subcategory_id=null){
        $point=0;

            if(!empty($subcategory_id)){
                $po=Self::where('sub_category_id',$subcategory_id)->first();
                $point=!empty($po)?$po->points:0;
            }
        return $point;
    }
}
