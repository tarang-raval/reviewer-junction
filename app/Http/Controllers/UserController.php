<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    //
    function login(Request $request){
        $request->validate([
            'email' => ['required', 'string', 'max:255',],
            'password' => ['required', Rules\Password::defaults()],
        ]);

    }

    function register(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users,email'],
            'mobile_no' => ['required', 'unique:users,mobile_no'],
            'password' => ['required', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'mobile_no'=>$request->mobile_no
        ]);
        $user->assignRole('customer');

        //event(new Registered($user));

        Auth::login($user);
        $request->session()->put('is_new', 1);
        return response()->json(['status' => true, 'message' => "Register Successfully"]);
    }
    /**
     * Check Unique Mobile No
     */
    function checkMobileNo(Request $request)
    {

        $mobile_no = $request->mobile_no;

        $check = User::where('mobile_no', $mobile_no)->count();
        if ($check > 0) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }

    /**
     * Check Unique Mobile No
     */
    function checkEmailId(Request $request)
    {

        $email = $request->email;

        $check = User::where('email', $email)->count();
        if ($check > 0) {
            return response()->json(false);
        } else {
            return response()->json(true);
        }
    }
    function  confirmation(Request $request){
        if($request->session()->get('')){
            $request->session()->flash('success', 'Thanks for sign Up! Please check you email , please verify Your indetity. ');
        }
        return view('confirmation');
    }
}
