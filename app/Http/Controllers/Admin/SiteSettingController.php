<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $setting=SiteSetting::orderBy('id','DESC')->first();
        return view('admin.setting.index',compact('setting'));
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
        $setting=SiteSetting::orderBy('id','DESC')->first();
        if(empty($setting)){
            $setting=new SiteSetting();
        }

        $setting->number_of_review_per_day=$request->number_of_review_per_day;
        $setting->one_points_equal_money=$request->one_points_equal_money;
        $setting->no_of_days_account_redeem_points=$request->no_of_days_account_redeem_points;
        $setting->minimum_points_required_to_redeem=$request->minimum_points_required_to_redeem;
        $setting->no_of_review_show_as_guest=$request->no_of_review_show_as_guest;

        $setting->save();
        return redirect()->route('admin.setting.index');
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
}
