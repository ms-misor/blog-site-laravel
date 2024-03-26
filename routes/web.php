<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SettingController;

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\InformationsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\CommonAdminController;
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

// Route::get('/', function(){
//     return view('welcome');
// });

Route::get('/',[HomeController::class,'index']);
Route::get('/detail/{slug}/{id}',[HomeController::class,'detail']);
Route::get('/all-categories',[HomeController::class,'all_category']);
Route::get('/category/{slug}/{id}',[HomeController::class,'category']);
Route::post('/save-comment/{slug}/{id}',[HomeController::class,'save_comment']);
Route::get('save-post-form',[HomeController::class,'save_post_form']);
Route::post('save-post-form',[HomeController::class,'save_post_data']);
Route::get('manage-posts',[HomeController::class,'manage_posts']);
// Admin Routes
Route::get('/admin/login',[AdminController::class,'login']);
Route::post('/admin/login',[AdminController::class,'submit_login']);
Route::get('/admin/logout',[AdminController::class,'logout']);
Route::get('/admin/dashboard',[AdminController::class,'dashboard']);
// Post
Route::get('admin/user',[AdminController::class,'users']);
Route::get('admin/user/delete/{id}',[AdminController::class,'delete_user']);
// Comment
Route::get('admin/comment',[AdminController::class,'comments']);
Route::get('admin/comment/delete/{id}',[AdminController::class,'delete_comment']);
// Categories
Route::get('admin/category/{id}/delete',[CategoryController::class,'destroy']);
Route::resource('admin/category',CategoryController::class);
// Posts
Route::get('admin/post/{id}/delete',[PostController::class,'destroy']);
Route::resource('admin/post',PostController::class);
// Settings
Route::get('/admin/setting',[SettingController::class,'index']);
Route::post('/admin/setting',[SettingController::class,'save_settings']);

// CMS
Route::get('admin/about_us',[AboutusController::class,'aboutUsPages']);
Route::get('admin/about/{id}/delete',[AboutusController::class,'destroy']);
Route::resource('admin/about',AboutusController::class);

Route::get('admin/information_pages',[InformationsController::class,'informationPages']);
Route::get('admin/information/{id}/delete',[InformationsController::class,'destroy']);
Route::resource('admin/information',InformationsController::class);

Route::get('admin/event_pages',[EventsController::class,'eventPages']);
Route::get('admin/event/{id}/delete',[EventsController::class,'destroy']);
Route::resource('admin/event',EventsController::class);

// Website banners
Route::get('admin/banners',[CommonAdminController::class,'index']);
Route::get('admin/create-banner',[CommonAdminController::class,'create_banner']);
Route::post('admin/banner-add-save',[CommonAdminController::class,'banner_add_save']);
Route::get('admin/banner/{id}/edit',[CommonAdminController::class,'banner_edit']);
Route::put('admin/banner-update-save/{id}',[CommonAdminController::class,'banner_update_save']);
Route::get('admin/banner/{id}/delete',[CommonAdminController::class,'banner_delete']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); 
