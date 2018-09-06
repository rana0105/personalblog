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
//Route::resource('roles','RoleController');
//Route::resource('users','UserController');
Auth::routes();


Route::get('/', 'HomeController@index')->name('home');
//Route::get('/', 'HomeController@index')->name('home');


Route::group(['middleware' => ['auth']], function() {
    Route::resource('users','UserController');
    Route::get('userShowModal/{id}','UserController@userShowModal');
    Route::get('userEditModal/{id}','UserController@userEditModal');
    Route::resource('roles','RoleController');
    Route::get('roleShowModal/{id}','RoleController@roleShowModal');
    Route::get('roleEditModal/{id}','RoleController@roleEditModal');
    Route::resource('permissions','PermissionController');
    Route::get('permissionEditModal/{id}','PermissionController@permissionEditModal');
    Route::resource('posts','ProductController');
});
