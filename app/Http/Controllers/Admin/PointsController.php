<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Point;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class PointsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return view('admin.points.index');
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
        $points=null;
        if(!empty($request->id)){
                $points=Point::find($request->id);
        }else{
                $points=new Point();
        }
           $points->sub_category_id=$request->subcategory_id;
        $points->points=$request->points;

        if($points->save()){

                return response()->json(['status'=>true,'message'=>(!empty($request->id)?'Points Update successfully':'Points added successfully')]);

        }
        else{
            return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
        }
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
    public function datatable(Request $request){

        $data=Subcategory::select('subcategories.id as subcategory_id','subcategories.name as subcategory_name','points.*','categories.name as category_name')->join('categories','categories.id','subcategories.category_id')
        ->leftJoin('points','points.sub_category_id','subcategories.id')
        ->get();
        $data= $data->map(function($row){
            $row['points']=!empty($row['points'])?$row['points']:0.00;
            $row['action']='<a href="'.route('admin.points.edit',[1]).'" class="edit" data-toggle="tooltip" data-placement="top" title="Edit" > <i class="las la-edit"></i></a>';
            return $row;
         });
        return response()->json(['recordsTotal'=>count($data),'recordsFiltered'=>count($data),'data'=>$data]);
    }
}
