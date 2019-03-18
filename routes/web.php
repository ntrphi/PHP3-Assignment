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

use App\User;
Route::get('/', 'HomeController@home')->name('homepage');
Route::get('posts/{id}','HomeController@posts');

Route::get('danh-muc/{cateId}', 'HomeController@postsByCategory')->name('post.by.cate');
Route::get('login', 'Auth\LoginController@login')->name('login');
Route::post('login', 'Auth\LoginController@postLogin');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::view('forbiden', '403')->name('forbiden');
