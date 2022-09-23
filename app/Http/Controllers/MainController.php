<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MainController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function check(Request $request){
        //validate request in log in
        $request->validate([
            'email'=>'required|email',
            'password'=>'required|min:5|max:12'
        ]);

        $userInfo = User::where('email',"=",$request->email)->first();
        if(!$userInfo){
            return back()->with('fail', 'We do not recognize your email address');
        }else{
            //check password
            if(Hash::chack($request->password, $userInfo->password)){
                $request->session()->put('LoggedUser', $userInfo->id);
                return redirect('redirects');
            }else{
                return back()->with('fail', 'Incorrect Password');
            }
        }
    }
}
