<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PostController extends Controller
{
    //update post
    function update_post($id){
                $update=Post::find($id);
                $update->title=request('title');
                $update->content=request('content');
                $image=request('image');
            
                if($image){
                $image_name=uniqid()."_".$image->getClientOriginalName();
                $image->move(public_path('images/posts'),$image_name);
                
                $update->image=$image_name;
                $update->update();
                }
                $update->update();
                return redirect()->route('home')->with('message',"Updated Post");
    }  
        
        
    //edit post
    function edit_post($id){
        $post=Post::find($id);
        return view("User.edit_post",["post"=>$post]);
       
    }


    //delete post
    function delete_post($id){
            $delete_post=Post::find($id);
            $delete_post->delete();
            return redirect()->route('home')->with('message',"Deleted Post");
    
    }


   
    // user create Post
    function post_create(){
        $validation=request()->validate([
            "title"=>'required',
            "image"=>'required',
            "content"=>'required'
        ]);
        if($validation){
            $posts=new Post();
            $image=$validation['image'];
            $image_name=uniqid()."_".$image->getClientOriginalName();
            $image->move(public_path('images/posts'),$image_name);

           $posts->user_id=auth()->user()->id;
           $posts->title=$validation['title'];
           $posts->image=$image_name;
           $posts->content=$validation['content'];
           $posts->save();
        return redirect()->route('home')->with('message',"Uploaded Post");

        }else{
            return back()->withErrors($validation);
        }
    }

    //update User Profile
    function update_profile(){
     
        $id=auth()->user()->id;
                $old_password=request('old_password');
                $new_password=request('new_password');
            $userName=request('userName');

            $email=request('email');
            $image=request('image');

            $current_user=User::find($id);
                //if user is not select image and password overwirte name and email  to current user id
            $current_user->name=$userName;
            $current_user->email=$email;

            if($image){

                $image_name=uniqid()."_".$image->getClientOriginalName(); 
                $image->move(public_path("images/profiles"),$image_name);
                $current_user->image=$image_name;
                $current_user->update();
                return back()->with('success',"Image Changed");
            } 
            
            if($old_password && $new_password){

                    //check oldpassword is same sa current user pw

                    if(Hash::check($old_password,$current_user->password)){

                        // if same let change password
                        $current_user->password=Hash::make($new_password);
                        $current_user->update();
                        return back()->with('success',"Password Changed");

                    }else{
                        return back()->with('error',"Wrong Old Password Please Try Again");
                    }

        


                }
            
            
                    $current_user->update();
                    return back();
      
      
      


        
        
    }

    //contact to admin
    function post_contact(){
        $validation=request()->validate([
            "userName"=>"required",
            "email"=>"required",
            "message"=>"required",
        ]);
        if($validation){
            $message=new ContactMessage();
            $message->user_id=auth()->user()->id;
            $message->name=$validation['userName'];
            $message->email=$validation['email'];
            $message->message=$validation['message'];
            $message->save();
            return back()->with('message',"Message Send To Admin");
        }else{
            return back()->withErrors($validation);
        }
    }
    
}
