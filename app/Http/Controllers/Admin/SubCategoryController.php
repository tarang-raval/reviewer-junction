<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;


class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $category=Category::all()->pluck('name','id');
        return view('admin.subcategory.index',compact('category'));
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
        $request->validate([
            'name'=>'required|unique:subcategories,name',
        ]);

        $subcategory=new Subcategory();
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category;
        $subcategory->status=1;
        $s=$subcategory->save();
        if($s){
           return response()->json(['status'=>true,'message'=>'Sub Category added successfully']);
        }else{
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
        $request->validate([
            'name'=>'required|unique:subcategories,name',
        ]);

        $subcategory=Subcategory::findOrFail($id);
        $subcategory->name=$request->name;
        $subcategory->category_id=$request->category;
        $subcategory->status=1;
        $s=$subcategory->save();
        if($s){
           return response()->json(['status'=>true,'message'=>'Sub Category Update successfully']);
        }else{
           return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
        }
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

        $category=Subcategory::findOrFail($id);
        $s=$category->delete();
        if($s){
           return response()->json(['status'=>true,'message'=>'Category deleted successfully']);
        }else{
           return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
        }
    }

    function datatable(Request $request){
        $subcategory=Subcategory::select('subcategories.*','categories.name as category_name')->join('categories','categories.id','subcategories.category_id')->get();
       $subcategory= $subcategory->map(function($row){


                    $row['action']='<a href="javascript:void(0)" class="edit" data-toggle="tooltip" data-placement="top" title="Edit" > <i class="las la-edit"></i></a><a href="javascript:void(0)" onclick="deleterow('.$row['id'].')" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="las la-trash"></i></a>';
                    return $row;

        });
        return response()->json(['data'=>$subcategory]);
    }

    function checkunique(Request $request){

        $status=false;
        $subcategory=Subcategory::select('*');
        if(!empty($request->category)){
            $subcategory->where('category_id',$request->category);
        }
        if(!empty($request->sub_category_name)){
            $subcategory->where('name',$request->sub_category_name);
        }
        if(!empty($request->id)){
            $subcategory->where('id','!=',$request->id);
        }

        if($subcategory->count()==0){
            $status=true;
        }

        return response()->json($status);

    }
    function getsubcategory(Request $request){
            $id=$request->category_id;
            $category=Subcategory::select('id','name')->where('category_id',$id)->get();

            return response()->json($category);
    }
}
