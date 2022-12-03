<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use App\Models\SiteSetting;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ReviewController extends Controller
{
    //

    function index(){

            $categories = Category::all();
            $subcategories = Subcategory::all();
            $sitesetting = SiteSetting::first()->toJson();
            return view('submit_review', compact('categories', 'subcategories' , 'sitesetting'));
    }
    function create(Request $request, $product){
        $product=Product::findorFail($product);
        $categories = Category::all();
        $subcategories = Subcategory::all();
        $sitesetting = SiteSetting::first()->toJson();
        $sitesettingData = SiteSetting::first()->toArray();
        $todayNoOfReview = Review::getTodaySubmitReviewUser(Auth::id());
        return view('add_review', compact('product','categories', 'subcategories' , 'sitesetting','sitesettingData','todayNoOfReview'));
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
                $review->files =$request->filesNameList;
                if($review->save()){
                    if($request->ajax()){
                        return response()->json(['status'=>true,'message'=>"review Submitted Successfully",'guestID'=>$review->id]);
                    }else{
                        return redirect()->back()->with('success','Thank you for submit review. Our team reviewed Your Review  update you shortly.');
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

                        if (empty($review_user)) {
                            $review->user_id=Auth::id();
                            $review->save();
                            $response['status']=1;
                            $response['review_id']=$review_id;
                            $response['message']='Updated successfully';

                            Session::flash('success', 'Thanks for sign Up! Please check you email , please verify Your indetity.<br/>The review has been submitted. Your review is under review. We will review it and update you shortly!');
                        } else {
                            $response['status']=0;
                            $response['review_id']=$review_id;
                            $response['message']='You Already addred review before';
                            Session::flash('error', 'You have already reviewed the selected product.');
                        }


                } else {
                    $response['message']='something is wrong please re submit Review';
                }
                return response()->json($response);

       }

       function uploadmedia(Request $request){
        $response=['status'=>false,
                   "message" =>"Something is wrong, please try again later"];
            $request->validate([
                'file' => 'required|mimes:jpeg,jpg,png,mp4|max:2048'
                ]);

            if(!empty($request->file('file'))) {
                $file = $request->file('file');
                $fileName = uniqid(). '.' .pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $filePath = $request->file('file')->storeAs('review', $fileName, 'public');
                $response['status'] = true;
                $response['message'] = 'file uploaded Successfully';
                $response['fileName'] = $fileName;
                $response['filePath'] = $filePath;

            }
            if ($response['status']) {
                return response() ->json($response, 200);
            } else {
                return response() ->json($response, 400);
            }
       }
       public function removemedia(Request $request) {
         $name= $request->name;
         $response=['status'=>0];
         if(Storage::exists('public/review/'.$name)){
            Storage::delete('public/review/'.$name);
             return response() ->json($response, 200);
             $response=['status'=>1];
         }
         return response() ->json($response, 200);
       }
       public function edit(Request $request, $id){

            $review = Review::findOrFail($id);
            $categories = Category::all();
            $subcategories = Subcategory::all();
            $sitesetting = SiteSetting::first()->toJson();
        //dd($review);
            return view('edit_review', compact('categories', 'subcategories' , 'sitesetting', 'review'));
       }


       function update(Request $request){

        //try{
            $request->validate([
               'category'=>'required',
               'subcategory'=>'required',
               'type_of_purchase'=>'required',
               'review_text'=>'required',
            ]);



               $review=Review::find($request->id);

               /* $review->category_id=$request->category;
               $review->subcategory_id=$request->subcategory;
               $review->product_id = $request->product;
               $review->type_of_purchase = $request->type_of_purchase;
               $review->website = $request->website;
               $review->shop_name = $request->shop_name;
               $review->address_line1 = $request->address_line1;
               $review->address_line2 = $request->address_line2;
               $review->city = $request->city;
               $review->state = $request->state;
               $review->pincode = $request->pincode; */
//$review->review_text = $request->review_text;
               $review->rating = $request->rating;

               $review->files =$request->filesNameList;
               
               if($review->save()){

                   if($request->ajax()){
                       return response()->json(['status'=>true,'message'=>"review Submitted Successfully",'guestID'=>$review->id]);
                   }else{
                       return redirect()->route('review.edit',[$request->id])->with('success','update Successfully');
                   }
               }else{

                   if($request->ajax()){
                       return response()->json(['status'=>false,'message'=>"some thing is wrong."]);
                   }else{
                    
                        return redirect()->route('review.edit',[$request->id])->with('error','some thing is wrong.') ;
                   }
               }
         //}
        /*  catch(\Exception $exception){
                dd($exception->getMessage());
           if($request->ajax()){
               return response()->json(['status'=>false,'message'=>$exception->getMessage(),'debug'=>$exception->getTraceAsString()]);
           }else{
               return back()->with('error',$exception->getMessage())->withInput();
           }
         } */
       }
}
