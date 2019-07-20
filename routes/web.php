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

Route::get('/','defaultController@index');


Route::get('manage/{id}','HomeController@managepost');


Route::post('/delete/{id}','HomeController@delete');


Route::get('edit/deleteimg/{id}','HomeController@deleteimg');


Route::get('edit/{id}','HomeController@edit');



Route::post('update','HomeController@update');


Route::get('article','HomeController@index');


Route::get('category','HomeController@categoryMethod');


Auth::routes();


Route::get('/home', 'HomeController@dashboard');


Route::get('read/{id}', 'defaultController@show');


Route::get('admin', 'adminController@index');



Route::get('/{id}', 'defaultController@trends');



Route::post('/addcategory', 'HomeController@create_category');


Route::get('/ca_delete/{id}', 'HomeController@removeCat');


Route::post('/createpost', 'HomeController@createpost');




// For API Task Only


Route::get('apitest','apiController@index');













