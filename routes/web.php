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




Route::resource('/post','PostController');
Route::resource('/student','StudentController');

Route::get('/catpost/{category}','CategoryController@postview')->name('postview');
Route::post('/catpost','CategoryController@postadd')->name('postadd');
Route::get('/catpost/{post}/edit','CategoryController@postedit')->name('postedit');
Route::patch('/catpost/{post}','CategoryController@postupdate')->name('postupdate');
Route::delete('/catpost/{post}','CategoryController@postdelete')->name('postdelete');

Route::resource('/category', 'CategoryController');


Route::get('/register','UserController@registerView')->name('register');
Route::post('/register','UserController@registerProcess');


Route::get('/login','UserController@showLogin')->name('login');
Route::post('/login','UserController@processLogin');


Route::get('/profile','UserController@showProfile')->name('profile');
Route::get('/logout','UserController@logout')->name('logout');



