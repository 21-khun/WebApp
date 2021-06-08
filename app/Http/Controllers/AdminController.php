<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\MailBox;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index(){
        return view('admin.index');
    }
    function message_box(){
        $messages=ContactMessage::latest()->get();
        
        return view('admin.message_box',['messages'=>$messages]);
    }
    function manage_premium_user(){
        $users=User::all();
        return view('admin.manage_premium_user',['users'=>$users]);
    }

    //delete user's contact message
    function delete_message($id){
        $delete=ContactMessage::find($id);
        $delete->delete();
        return back()->with('message',"Deleted Mail");
        
        
    }
    function reply_message($id){
       $userInfo=User::find($id);
      return view('admin.reply_message',['userInfo'=>$userInfo]);
    }
    function post_reply_message(){
       
     $validation=request()->validate([
         'user_id'=>'required',
         'adminEmail'=>'required',
         'message'=>'required'
     ]);
      if($validation){
          $adminReply=new MailBox();
          $adminReply->user_id=$validation['user_id'];
          $adminReply->email=$validation['adminEmail'];
          $adminReply->message=$validation['message'];
          $adminReply->save();
          return back()->with('message',"Replied Message To User");

      }else{
          return back()->withErrors($validation);
      }
    }

    // delete user

    function delete_user($id){
      $delete_user=User::find($id);
      $delete_user->delete();
      return back()->with('message',"Deleted User");
        
    }

    //update user

    function update_user($id){
       $user=User::find($id);
       return view('admin.update_user',['user'=>$user]);

    }

    function post_update_user($id){
        $validation=request()->validate([
            'isAdmin'=>'required',
            'isPremium'=>'required',
        ]);
        if($validation){
            $update=User::find($id);
            $update->isAdmin=$validation['isAdmin'];
            $update->isPremium=$validation['isPremium'];
            $update->update();
            return redirect()->route('manage_premium_user')->with('message',"Updated User Information");
        }
    }
    
}
