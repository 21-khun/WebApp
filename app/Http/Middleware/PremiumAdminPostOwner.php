<?php

namespace App\Http\Middleware;

use App\Models\Post;

use Closure;
use Illuminate\Http\Request;

class PremiumAdminPostOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        $id=request('id');
        $postOwner=Post::find($id)->user_id;
        if(auth()->user()->isAdmin=="1" || auth()->user()->isPremium=="1" || auth()->user()->id==$postOwner ){
            return $next($request);

        }else{
            return back()->with('error',"You Are Not Admin or Premium User");
        }
    }
}
