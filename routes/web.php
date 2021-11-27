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


Route::get('/','HomeController@index' );

Route::get('/trang-chu','HomeController@index' );//trả về hàm HomeController với đường dẫn có /trang-chu
    
Route::get('/Login','LoginController@index' );


Route::get('/Admin-page','AdminController@index' );// cùng 1 page index là khung

Route::get('/Admin-page','AdminController@dasboard_admin' );//nội dung

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/trang-chu', function () {
//    return view('welcome');
//});
