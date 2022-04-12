<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.category.index');

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
         $request->validate([
             'name'=>'required|unique:categories,name',
         ]);

         $category=new Category();
         $category->name=$request->name;
         $category->status=1;
         $s=$category->save();
         if($s){
            return response()->json(['status'=>true,'message'=>'Category added successfully']);
         }else{
            return response()->json(['status'=>false,'message'=>'somethinf is wrong, please Try again later']);
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

   function datatable(Request $request){
        $category=Category::all();
       $category= $category->map(function($row){
                return [
                    'id'=>$row['id'],
                    'name'=>$row['name'],
                    'action'=>'<a href=""> <i class="las la-edit"></i></a><a href=""> <i class="las la-edit"></i></a>',
                ];
        });
        return response()->json(['data'=>$category]);
    }

    function checkunique(Request $request){

        $status=false;
        $category=Category::select('*');
        if(!empty($request->category_name)){
            $category->where('name',$request->category_name);
        }
        if(!empty($request->id)){
            $category->where('id','!=',$request->id);
        }
        if($category->count()==0){
            $status=true;
        }

        return response()->json($status);

    }
}
