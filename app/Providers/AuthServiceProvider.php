<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define("admin",function(User $user){
            return $user->isAdmin=='1';
        });

        Gate::define('user',function(User $user){
           return $user->isAdmin=="0";
        });

        Gate::define('roleCheck',function(User $user){
           $id=request('id');
           $postOwner=Post::find($id)->user_id;
           return auth()->user()->isAdmin=='1' || auth()->user()->isPremium=="1" || auth()->user()->id==$postOwner;

        });
    }
}
