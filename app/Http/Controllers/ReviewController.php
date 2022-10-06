<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

             if(Auth::id()){
                $reviewcount=Review::where(['product_id'=>$request->product,'user_id'=>Auth::id()])->count();
                if($reviewcount>0){
                    if($request->ajax()){
                        return response()->json(['status'=>false,'message'=>"some thing is wrong."]);
                    }else{
                        return redirect()->route('submit.review')->with('error','you have already reviewd the prouct')->withInput() ;
                    }
                }

             }

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
                $review->user_id = Auth::id();
                if($review->save()){
                    if($request->ajax()){
                        return response()->json(['status'=>true,'message'=>"review Submitted Successfully",'guestID'=>$review->id]);
                    }else{
                        return redirect()->route('submit.review')->with('success','Thank you for submit review.');
                    }
                }else{

                    if($request->ajax()){
                        return response()->json(['status'=>false,'message'=>"some thing is wrong."]);
                    }else{
                        return redirect()->route('submit.review')->with('error','some thing is wrong.') ;
                    }
                }
          }
          catch(\Exception $exception){

            if($request->ajax()){
                return response()->json(['status'=>false,'message'=>$exception->getMessage(),'debug'=>$exception->getTraceAsString()]);
            }else{
                return back()->with('error',$exception->getMessage())->withInput();
            }
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
    /**
     * Subcategory List
     */

     function getproductbysubcategory(Request $request){
                $product=[];
             if(!empty($request->subcategory_id)){
                        $product=Product::select('id','product_name as name')->where('sub_category',$request->subcategory_id)->get();
             }
             return response()->json(['status'=>1,'data'=>$product]);
     }

     /**
      * checkAlreadyReview
      */
      function checkAlreadyReview(Request $request){

         $product_id=$request->product_id;
         $user_id=$request->user_id;
         $review=0;
         if(!empty($user_id)){
         $review=Review::where(['product_id'=>$product_id,'user_id'=>$user_id])->count();
         }
         if($review>0){
            return response()->json(false, 200);
         }else{
            return response()->json(true, 200);
         }
      }

       function assignuser(Request $request,$review_id){
            $response=['status'=>0];
                $review=Review::find($review_id);
                if(!empty($review)){
                    $review_user=Review::where(['user_id'=>Auth::id(),'product_id'=>$review->product_id])->first();

                        if(empty($review_user)){
                            $review->user_id=Auth::id();
                            $review->save();
                            $response['status']=1;
                            $response['review_id']=$review_id;
                            $response['message']='Updated successfully';
                        }else{
                            $response['status']=0;
                            $response['review_id']=$review_id;
                            $response['message']='You Already addred review before';
                        }


                }
                return response()->json($response);

       }
}
