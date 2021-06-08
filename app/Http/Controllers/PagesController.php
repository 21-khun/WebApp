<?php

namespace App\Http\Controllers;

use App\Models\MailBox;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class PagesController extends Controller
{
    function index(){
        $posts=Post::latest()->paginate(9);
        return view('index',["posts"=>$posts]);
    }
    function createPost(){
        return view('User.createPost');
    }

    function userProfile(){
        
        return view('User.userProfile');
    }
    function contact(){
        return view('User.contact');
    }
    function mail(){
        $id=auth()->user()->id;
        $user=User::find($id);
      $mails=$user->mails;
        return view('User.mail',["mails"=>$mails]);
    }

    //delete Mail
    function delete_mail($id){
        $delete_mail=MailBox::find($id);
       $delete_mail->delete();
       return back()->with('message','Deleted Mail');
    }
   

    
  //see More
    function seeMore($id){
       $post=Post::find($id);
        return view('User.seeMore',["post"=>$post]);
    }

    

}
