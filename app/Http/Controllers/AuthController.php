<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login(){
        return view('auth.login');
    }
    function register(){
        return view('auth.register');
    }

    // register new user
    function post_register(){
        
        $validation=request()->validate([
            "userName"=>"required",
            "email"=>"required",
            "password"=>"required||min:8||confirmed",
            "image"=>"required"
            
        ]);
       
        if($validation){
            $image=$validation['image']; //=>move to public/images
            $image_name=uniqid()."_".$image->getClientOriginalName(); //->save to databases
            $image->move(public_path("images/profiles"),"$image_name");

            // make password to hash code
            $password=Hash::make($validation['password']);
           


            $users=new User();
            $users->name=$validation['userName'];
            $users->email=$validation['email'];
            $users->image=$image_name;
            $users->password=$password;
           
            $users->save();

            if(Auth::attempt(['email'=>$validation['email'],'password'=>$validation['password']])){
                return redirect()->route('home');

            }

            
        }else{



            return back()->withErrors($validation);
        }
    }

     //log in accout
    function post_login(){
            $validation=request()->validate([
                "email"=>"required",
                "password"=>"required",
            ]);
            if($validation){
                $auth=Auth::attempt(['email'=>$validation['email'],'password'=>$validation['password']]);
                if($auth){
                    return redirect()->route('home');
                }else{
                    return back()->with('error',"Authentication Fail Try Again");
                }


            }else{
                return back()->withErrors($validation);
            }
            
       
    }

    //log out
    function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

   

}

