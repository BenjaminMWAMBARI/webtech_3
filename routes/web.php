<?php

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

Route::get('/', 'AddsController@home')->name("name");




Route::Get("home","UserController@index");
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get("profile","UserController@profile")->name("profile");

Route::post("update_profile","UserController@update")->name("updateprofile");
Route::get("myadds","AddsController@index")->name("myadds");



Route::post("save_add","AddsController@save_add")->name("save_add");

Route::get("view_add/{id}","AddsController@view_add")->name("view_add");

Route::post("update_fav","AddsController@update_fav")->name("fav_color");


Route::get("edit-add/{id}","AddsController@edit_add")->name("edit_add");
Route::Post("edit-add/{id}","AddsController@edit_s_add")->name("edit_s_add");
Route::get("del-add/{id}","AddsController@del_add")->name("del_add");

Route::get("adds","SearchController@index")->name("adds");

Route::post("search_adds","SearchController@search")->name("search_query");