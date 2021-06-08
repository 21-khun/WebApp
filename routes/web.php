<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// AuthMiddleware

Route::middleware("auth")->group(function(){
    // user
Route::get('/',[PagesController::class,"index"])->name("home");
Route::get('/User/CreatePost',[PagesController::class,"createPost"])->name("createPost");
Route::get('/User/UserProfile',[PagesController::class,"userProfile"])->name("userProfile");
Route::get('/contactUs',[PagesController::class,"contact"])->name("contact");
Route::get('/User/Mail',[PagesController::class,"mail"])->name("mail");
Route::get('/User/Mail/delete/{id}',[PagesController::class,"delete_mail"])->name("delete_mail");
Route::get('/posts/SeeMore/{id}',[PagesController::class,"seeMore"])->name("seeMore");


// CDU route 

Route::post('/User/UserProfile',[PostController::class,"update_profile"])->name("update_profile");
Route::post('/User/CreatePost',[PostController::class,"post_create"])->name("post_create");
Route::post('/contactUs',[PostController::class,"post_contact"])->name("post_contact");
Route::get('/posts/SeeMore/delete/{id}',[PostController::class,"delete_post"])->name("delete_post")->middleware('PremiumAdminPostOwner');
Route::get('/posts/SeeMore/edit/{id}',[PostController::class,"edit_post"])->name("edit_post")->middleware('PremiumAdminPostOwner');
Route::post('/posts/SeeMore/update/{id}',[PostController::class,"update_post"])->name("update_post");

//auth logout
Route::get('/logout',[AuthController::class,"logout"])->name('logout');



Route::middleware('admin')->group(function(){
    // admin
Route::get('/admin/index',[AdminController::class,"index"])->name('adminControl');
Route::get('/admin/manage_premium_user',[AdminController::class,"manage_premium_user"])->name('manage_premium_user');
Route::get('/admin/manage_premium_user/delete{id}',[AdminController::class,"delete_user"])->name('delete_user');
Route::get('/admin/manage_premium_user/update{id}',[AdminController::class,"update_user"])->name('update_user');
Route::post('/admin/manage_premium_user/update_user{id}',[AdminController::class,"post_update_user"])->name('post_update_user');


Route::get('/admin/message_box',[AdminController::class,"message_box"])->name('message_box');
Route::get('/admin/message_box/delete/{id}',[AdminController::class,"delete_message"])->name('delete_message');
Route::get('/admin/message_box/reply/{id}',[AdminController::class,"reply_message"])->name('reply_message');
Route::post('/admin/message_box/post_reply',[AdminController::class,"post_reply_message"])->name('post_reply_message');


});





});



// NoAuthMiddleware

Route::middleware('guest')->group(function(){

Route::get('/login',[AuthController::class,"login"])->name('login');
Route::post('/login',[AuthController::class,"post_login"])->name('post_login');
Route::get('/register',[AuthController::class,"register"])->name('register');
Route::post('/register',[AuthController::class,"post_register"])->name('post_register');
});
//auth
