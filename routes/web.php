<?php

use App\Http\Controllers\Admin\PostController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', 'HomeController@index')->name('index');
Route::resource('/posts', 'PostController');




Auth::routes();

/* Route::get('/admin', 'Admin\HomeController@index')->name('admin'); */
/* Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')
    ->group(function() {
        Route::get('/', 'HomeController@index')->name('index');

        Route::resource('/posts', "PostController");

        }); */

         //Admin Routes
Route::namespace('Admin')->namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::get('/home','HomeController@index');

    Route::resource('/posts','PostController');
/*  Route::resource('admin/tag','TagController');
    Route::resource('admin/category','CategoryController');
    Route::resource('admin/user','UserController'); */
});
