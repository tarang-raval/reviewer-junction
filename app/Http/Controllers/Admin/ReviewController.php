<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use App\Models\EarnPoint;
use App\Models\Point;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.review.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function  datatable(Request $request){

        $user=Review::select('reviews.*','categories.name as category_name','subcategories.name as subcategory_name','products.product_name')
                    ->join('categories','categories.id','reviews.category_id')
                    ->join('subcategories','subcategories.id','reviews.subcategory_id')
                    ->leftJoin('products','products.id','reviews.product_id')
                    ->orderBy('reviews.id','DESC')->get();
        $user= $user->map(function($row){

            $action='<a href="javascript:void(0)" class="approve" data-toggle="tooltip" data-placement="top" title="Approve" onclick="approve('.$row['id'].')" > <i class="las la-check"></i></a><a href="javascript:void(0)" onclick="declined('.$row['id'].')" data-toggle="tooltip" data-placement="top" title="Declined"> <i class="las la-times"></i></a>';
             if($row->status==1){
                    $action='<a href="javascript:void(0)" onclick="declined('.$row['id'].')" data-toggle="tooltip" data-placement="top" title="Declined"> <i class="las la-times"></i></a>';
             }else if($row->status==2){
                    $action='<a href="javascript:void(0)" class="approve" data-toggle="tooltip" data-placement="top" title="Approve" onclick="approve('.$row['id'].')" > <i class="las la-check"></i></a>';
             }


            return [
                'id'=>$row->id,
                'category_id'=>$row->category_id,
                'subcategory_id'=>$row->subcategory_id,
                'product_id'=>$row->product_id,
                'type_of_purchase'=>$row->type_of_purchase,
                'type_of_purchase'=>$row->type_of_purchase,
                'website'=>$row->website,
                'address_line1'=>$row->address_line1,
                'city'=>$row->city,
                'state'=>$row->state,
                'country'=>$row->country,
                'pincode'=>$row->pincode,
                'review_text'=>$row->review_text,
                'status'=>$row->status,
                'status_txt'=>$row->statusText(),
                'category_name'=>$row->category_name,
                'subcategory_name'=>$row->subcategory_name,
                'product_name'=>$row->product_name,
                'created_at'=>Carbon::parse($row->created_at)->format('Y/m/d'),
                'declined_reason'=> $row->declined_reason,
                'action'=>$action,
            ];

         });
         return response()->json(['data'=>$user]);
    }

    function statusupdate(Request $request){
        try{
             if(!empty($request->id)){
                    $review=Review::findOrFail($request->id);
                    $review->status=$request->status;
                    if($request->status==1){
                        $earnpoint=EarnPoint::where(['review_id'=>$review->id,'user_id'=>$review->user_id])->first();
                        $point=Point::getSubcategoryPoint($review->subcategory_id);
                        if(empty($earnpoint)){
                                $earnPoint=new EarnPoint();
                                $earnPoint->user_id=$review->user_id;
                                $earnPoint->review_id=$review->id;
                                $earnPoint->subcategory_id=$review->subcategory_id;
                                $earnPoint->subcategory_points=$point;
                                $earnPoint->earn_points=$point;
                                $earnPoint->save();
                        }
                    }else if($request->status==2){

                        $earnpoint=EarnPoint::where(['review_id'=>$review->id,'user_id'=>$review->user_id])->first();
                        if(!empty($earnpoint)){
                            $earnpoint->delete();
                        }
                        $review->declined_reason = $request->declined_reason;

                    }
                    if($review->save()){
                        return response()->json(['status'=>true,'message'=>(($request->status == 1)?'Review is approved':'Review is declined')]);
                    }else{
                       return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
                    }

             }
        }
        catch(\Exception $exception){
            return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
        }
    }
}
