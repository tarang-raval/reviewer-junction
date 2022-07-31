<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Review;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class ReviewController extends Controller
{
    //

    function index(){

            $categories=Category::all();
            $subcategories=Subcategory::all();
            return view('submit_review', compact('categories','subcategories'));
    }

    function store(Request $request){
          try{
             $request->validate([
                'category'=>'required',
                'subcategory'=>'required',
                'type_of_purchase'=>'required',
                'review_text'=>'required',
             ]);
             $review=new Review();
             $review->category_id=$request->category;
             $review->subcategory_id=$request->subcategory;
             $review->product_id = $request->product;
             $review->type_of_purchase = $request->type_of_purchase;
             $review->website = $request->website;
             $review->shop_name = $request->shop_name;
             $review->address_line1 = $request->address_line1;
             $review->address_line2 = $request->address_line2;
             $review->city = $request->city;
             $review->state = $request->state;
             $review->pincode = $request->pincode;
             $review->review_text = $request->review_text;
             $review->rating = $request->star_review;
             if($review->save()){
                return redirect()->route('submit.review')->with('success','Thank you for submit review.') ;
            }else{
                return redirect()->route('submit.review')->with('error','some thing is wrong.') ;
            }

          }
          catch(\Exception $exception){
            return back()->with('error',$exception->getMessage());
          }
    }
    /**
     * Subcategory List
     */

     function subcategory(Request $request){
                $subcategories=[];
             if(!empty($request->category_id)){
                        $subcategories=Subcategory::select('id','name')->where('category_id',$request->category_id)->get();
             }
             return response()->json(['status'=>1,'data'=>$subcategories]);
     }
}
