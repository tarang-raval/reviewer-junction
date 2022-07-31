<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class UsersController extends Controller
{
    //
    function  login(){
        return view('auth.login');
    }
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.users.index');

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

    function datatable(Request $request){

        $user=User::with("roles")->whereHas("roles", function($q) {
            $q->whereIn("name", ["customer"]);
        })->get();
        $user= $user->map(function($row){
            return [
                'id'=>$row->id,
                'name'=>$row->fullName(),
                'email'=>$row->email,
                'created_at'=>Carbon::parse($row->created_at)->format('Y/m/d'),
                'action'=>''
                //'<a href="javascript:void(0)" class="edit" data-toggle="tooltip" data-placement="top" title="Edit" > <i class="las la-edit"></i></a><a href="javascript:void(0)" onclick="deleterow('.$row['id'].')" data-toggle="tooltip" data-placement="top" title="Delete"> <i class="las la-trash"></i></a>',
            ];
         });
         return response()->json(['data'=>$user]);
    }

    function checkunique(Request $request){


    }

    function logout(){
            Auth::logout();
         return redirect()->route('admin.login');
    }


}
