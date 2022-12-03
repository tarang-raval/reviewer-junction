<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Review extends Model
{
    use HasFactory;
    Protected $primaryKey = "id";

    function statusText(){
        $text='';
             switch($this->status){
                 case 0:
                    $text='<span class="badge badge-warning p-1">Pending</span>';
                    break;
                 case 1:
                    $text='<span class="badge badge-success p-1">Approved</span>';
                    break;
                 case 2:
                    $text='<span class="badge badge-danger p-1">Declined</span>';
                    break;

             }
            return  $text;
    }
    function getUser(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public static function getTodaySubmitReviewUser($user_id){
        return Self::where('user_id',$user_id)->where('created_at','now()')->count();
    }
}
