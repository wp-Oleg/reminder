<?php

//use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
//use App\Http\Controllers\Admin\CommentsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\HomeController@index');

Route::group(['prefix' => 'admin', 'namespase' => 'Admin', 'middleware' => 'admin'], function(){
    Route::get('/', [DashboardController::class, 'index']);
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/tags', TagsController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/posts', PostsController::class);
    Route::get('/comments', 'App\Http\Controllers\Admin\CommentsController@index');
    Route::get('/comments/toggle/{id}', 'App\Http\Controllers\Admin\CommentsController@toggle');
    Route::delete('/comments{id}/destroy', 'App\Http\Controllers\Admin\CommentsController@destroy')->name('comments.destroy');
    Route::resource('/subscribers', 'App\Http\Controllers\Admin\SubscribersController');
});


Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'App\Http\Controllers\HomeController@category')->name('category.show');
Route::post('/subscribe', 'App\Http\Controllers\SubsController@subscribe');
Route::get('/verify/{token}', 'App\Http\Controllers\SubsController@verify');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/profile', 'App\Http\Controllers\ProfileController@index');
    Route::post('/profile', 'App\Http\Controllers\ProfileController@store');
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout');
    Route::post('/comment', 'App\Http\Controllers\CommentsController@store');
});

Route::group(['middleware' => 'guest'], function(){
    Route::get('/register', 'App\Http\Controllers\AuthController@registerForm');
    Route::post('/register', 'App\Http\Controllers\AuthController@register');
    Route::get('/login', 'App\Http\Controllers\AuthController@loginForm')->name('login');
    Route::post('/login', 'App\Http\Controllers\AuthController@login');
});
