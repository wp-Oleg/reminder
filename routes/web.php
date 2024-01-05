<?php

//use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\UsersController;
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

Route::get('/admin', [DashboardController::class, 'index']);
Route::resource('admin/categories', CategoriesController::class);
Route::resource('admin/tags', TagsController::class);
Route::resource('admin/users', UsersController::class);
Route::resource('admin/posts', PostsController::class);
Route::get('/post/{slug}', 'App\Http\Controllers\HomeController@show')->name('post.show');
Route::get('/tag/{slug}', 'App\Http\Controllers\HomeController@tag')->name('tag.show');
Route::get('/category/{slug}', 'App\Http\Controllers\HomeController@category')->name('category.show');
