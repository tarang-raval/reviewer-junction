<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function index(){
        $CustomerCount=User::with("roles")->whereHas("roles", function($q) {
            $q->whereIn("name", ["customer"]);
        })->count();
        $productCount=Product::count();
        $reviewCount=Review::count();

            return view('admin.dashboard',compact('CustomerCount','productCount','reviewCount'));
    }
}
