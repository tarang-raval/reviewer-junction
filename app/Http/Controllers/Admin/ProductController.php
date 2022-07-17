<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\ProductAttribute;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $category=Category::all();
        $subcategory=Subcategory::all();
        return view('admin.product.create',compact('category','subcategory'));
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
            'product_name'=>['required'],
            'category'=>['required'],
            'subcategory'=>['required'],
        ]);

        $product=new Product();

        $product->product_name=$request->product_name;
        $product->slug=Str::slug($request->product_name);
        $product->category=$request->category;
        $product->sub_category=$request->subcategory;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->affliated_link=$request->affliatedLink;
        $product->short_description=$request->short_description;
        $product->full_description=$request->full_description;
        $product->thumbnail_image=null;
        if($product->save()){
            $product_id=$product->id;
            $attribute=$request->attribute;

            $data=[];
            if(!empty($attribute)){
                foreach($attribute as $attr){
                    if(!empty($attr['attribute_name'])){
                        $data=['product_id'=>$product_id,'attribute_name'=>$attr['attribute_name'],'attribute_value'=>$attr['attribute_value']];
                    }

                }
            if(!empty($data)){
                ProductAttribute::create($data);
            }
            }
        return redirect()->route('admin.product.index');
        }else{
            return back();
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
        $product=Product::findOrfail($id);
        $category=Category::all();
        $subcategory=Subcategory::all();
        return view('admin.product.create',compact('category','subcategory','product'));
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
            'product_name'=>['required'],
            'category'=>['required'],
            'subcategory'=>['required'],
        ]);

        try{

        $product=Product::findOrFail($id);

        $product->product_name=$request->product_name;
        $product->slug=Str::slug($request->product_name);
        $product->category=$request->category;
        $product->sub_category=$request->subcategory;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->affliated_link=$request->affliatedLink;
        $product->short_description=$request->short_description;
        $product->full_description=$request->full_description;
        $product->thumbnail_image=null;
        if($product->save()){
            $product_id=$product->id;
            $attribute=$request->attribute;
            $existingId=array_filter(array_column($attribute,'attribute_id'));
            $tableid=ProductAttribute::where('product_id',$product_id)->get()->pluck('id')->toArray();

            $delid=array_diff($tableid,$existingId);
            if(!empty($delid)){
                ProductAttribute::whereIn('id',$delid)->delete();
            }
            $data=[];
            if(!empty($attribute)){
                foreach($attribute as $attr){
                    if(!empty($attr['attribute_name'])){
                        $data=['product_id'=>$product_id,'attribute_name'=>$attr['attribute_name'],'attribute_value'=>$attr['attribute_value'],'id'=>$attr['attribute_id']];
                        if(!empty($data)){
                            ProductAttribute::updateOrCreate($data);
                        }
                    }

                }
            }
        return redirect()->route('admin.product.index');
        }else{
            return back();
        }
        }
        catch(\Exception $exception){
           dd($exception->getMessage());
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
        $product=Product::findOrFail($id);
        $s=$product->delete();
        if($s){
           ProductAttribute::where('product_id',$id)->delete();
           return response()->json(['status'=>true,'message'=>'product deleted successfully']);
        }else{
           return response()->json(['status'=>false,'message'=>'something is wrong, please Try again later']);
        }
    }

    function  datatable(Request $request){

        $products=Product::select('products.*','categories.name as category_name','subcategories.name as sub_category_name')->leftJoin('categories','categories.id','=','products.category')->leftJoin('subcategories','subcategories.id','=','products.sub_category')->get();
        $products= $products->map(function($row){
            $row['action']='<a href="'.route('admin.product.edit',$row['id']).'" class="edit" data-toggle="tooltip" data-placement="top" title="Edit" > <i class="las la-edit"></i></a><a href="javascript:void(0)" onclick="deleterow('.$row['id'].')" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="las la-trash"></i></a>';
            return $row;
         });

         return response()->json(['recordsTotal'=>count($products),'recordsFiltered'=>count($products),'data'=>$products]);
    }
}
