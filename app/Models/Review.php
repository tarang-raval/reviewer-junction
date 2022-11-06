<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
