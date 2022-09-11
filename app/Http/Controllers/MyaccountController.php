<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MyaccountController extends Controller
{
    //
    function index(){
        $user=Auth::user();
        return view('myaccount',compact('user'));
    }
    function profileupdate(Request $request){
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'mobile_no' => ['required'],
        ]);
        if(!empty($request->id)){
            $user=User::find(Auth::id());
            if(!empty($user)){
                 $user->first_name = $request->first_name;
                 $user->last_name = $request->last_name;
                 $user->name = $request->first_name . ' ' . $request->last_name;
                 $user->mobile_no=$request->mobile_no;
                 $user->save();
                 return back();
            }else{
                return back();
            }
        }else{
            return back();
        }
    }

    function changepassword(Request $request){
        $response=[
            'status'=>0,
            'message'=>'something is wrong',
        ];
        $request->validate([
            'old_password' => ['required'],
            'password' => ['required', Rules\Password::defaults(),'confirmed'],
        ]);
        $user=Auth::user();
        if(!Hash::check($request->old_password, $user->password)){
            $response['message']='Old password is not match';
        }else{
            $user=User::find($user->id);
            $user->password=Hash::make($request->password);
            if($user->save()){
                $response['status']=1;
                $response['message']='Change Password successfully';
            }
        }


        return response()->json($response);
    }
    function userReviewlist(Request $request){
        $review=Review::select('reviews.*','categories.name as category_name','subcategories.name as subcategory_name','products.product_name','products.slug')
        ->join('categories','categories.id','reviews.category_id')
        ->join('subcategories','subcategories.id','reviews.subcategory_id')
        ->leftJoin('products','products.id','reviews.product_id')
        ->where('reviews.user_id',Auth::id())
        ->orderBy('reviews.id','DESC')->get();
                $review= $review->map(function($row){



                    $str='<div class="d-flex">
                    <div class=" col-12 thumbnail">
						          	<div class="thumbnail-img">
						            	<img src="img/review/review-img-2.jpg" class="figure-img img-fluid" alt="">
						            </div>
						              <div class="caption">
                                      <div class="text-right">
                                        '.$row->statusText().'
                                      </div>

						                <a href="'.route('singleProduct',['product_slug'=>$row->slug]).'"><h6 class="caption-title">'.$row->product_name.'</h6></a>
                                        <div class="row">


                                        <div class="col-md-12">
                                            <p class="author-name"> Reviewed at <b>'.$row->created_at.'</b></p>
                                        </div>
                                    </div>
						                <p class="review-content">'.$row->review_text.'</p>
						                <p>

						                </p>
						            </div>
						          </div>
                                  </div>
                                  ';

                return [
                    'review'=>$str
                ];

                });
                return response()->json(['data'=>$review]);
    }
}
