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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', function () {
    echo "About";
});
Route::get('/myprofile', 'HomeController@get_my_profile');
Route::post('/profileimage', 'HomeController@profile_image_upload');
Route::post('/updateprofile', 'HomeController@update_my_profile');
Route::get('/userprofile/{id}', 'HomeController@get_user_profile');
Route::get('/addconnection/{id}', 'HomeController@add_connection');
Route::get('/myconnection', 'HomeController@get_my_connection');