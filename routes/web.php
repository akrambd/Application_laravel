<?php

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

use App\Category;
use App\Post;

use App\Student;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');


Route::resource('/category', 'CategoryController');
Route::resource('/post','PostController');
Route::resource('/student','StudentController');
Route::get('/catpost/{id}','CategoryController@postone')->name('post1');

