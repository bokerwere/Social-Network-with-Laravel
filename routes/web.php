<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\PagesController;
 use App\Http\Controllers\BlogController;



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
Route::group(['middleware'=>['web']],function(){
Route::get('blog/{slug}',['as'=>'blog.single','uses'=>'App\Http\Controllers\BlogController@getSingle'])
->where('slug','[\w\d\-\_]+');
Route::get('blog',['as'=>'blog.index','uses'=>'App\Http\Controllers\BlogController@getIndex']);
Route::get('contact','App\Http\Controllers\PagesController@getContact');
Route::get('about','App\Http\Controllers\PagesController@getAbout' );
Route::get('/',[PagesController::class ,'getIndex'] );
Route::resource('posts','App\Http\Controllers\PostController');
//categories

Route::resource('categories','App\Http\Controllers\CategoryController',['except'=>['create']]);

Route::resource('tags','App\Http\Controllers\TagController',['except'=>['create']]);


//comments
Route::post('comments/{post_id}',['uses'=>'App\Http\Controllers\CommentsController@store','as'=>'comments.store']);
Route::get('comments/{id}edit',['uses'=>'App\Http\Controllers\CommentsController@edit','as'=>'comments.edit']);
Route::put('comments/{id}',['uses'=>'App\Http\Controllers\CommentsController@update','as'=>'comments.update']);
Route::delete('comments/{id}',['uses'=>'App\Http\Controllers\CommentsController@destroy','as'=>'comments.destroy']);
Route::get('comments/{id}/delete',['uses'=>'App\Http\Controllers\CommentsController@delete','as'=>'comments.delete']);



});

Route::get('register',['as'=>'register','uses'=>
'App\Http\Controllers\Auth\RegisterController@showRegistrationForm'] );

Route::get('login',['as'=>'login','uses'=>
'App\Http\Controllers\Auth\LoginController@showLoginForm'] );

Route::get('logout',['as'=>'logout','uses'=>
'App\Http\Controllers\Auth\LoginController@logout'] );

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
