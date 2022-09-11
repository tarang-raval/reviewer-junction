<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
     function index(){


        return view('index');
     }


     function category($slug){

        $products=Product::join('categories','categories.id','products.category')->where('categories.slug',$slug)->get();

       return view('category-product',compact('products'));
     }
     function subcategory($category_slug,$subcategory_slug){

        $products=Product::join('categories','categories.id','products.category')
        ->leftJoin('subcategories','subcategories.id','products.sub_category')
        ->where('categories.slug',$category_slug)
        ->where('subcategories.slug',$subcategory_slug)->get();

       return view('category-product',compact('products'));
     }

     function singleProduct(Request $request,$product_slug){
        $product=Product::select('products.*','categories.name as category_name','subcategories.name as subcategory_name')
        ->join('categories','categories.id','products.category')
        ->leftJoin('subcategories','subcategories.id','products.sub_category')
        ->where('products.slug',$product_slug)
       ->firstorFail();

       return view('single-product',compact('product'));
     }
     function productlist(Request $request){
        $products=Product::join('categories','categories.id','products.category')
        ->leftJoin('subcategories','subcategories.id','products.sub_category')
        ->get();

        return view('category-product',compact('products'));
     }
}
