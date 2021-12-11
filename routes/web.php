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

//trang chu
Route::get('/','HomeController@index' );


Route::get('/trang-chu','HomeController@index' );//trả về hàm HomeController với đường dẫn có /trang-chu
Route::get('/Trang-Chu','HomeController@index' );


//danh mục sp
Route::get('/danh-muc-sp/{MaLoaiSanPham}','ProductController@show_danh_muc' );
//hang sp
Route::get('/thuong-hieu-sp/{MaHangSanXuat}','ProductController@show_thuong_hieu' );
Route::get('/chi-tiet-sp/{MaSanPham}','ProductController@show_chi_tiet_sp' );


//trang login
Route::get('/Login-page','LoginController@index' );

Route::post('/Trang-Chu','LoginController@login_user' );
Route::post('/Admin-page','LoginController@login_admin' );

Route::get('/Login-page','LoginController@logout' );


//đăng ký
Route::get('/dang-ky','RegisterController@index');
Route::post('/trang-chu','RegisterController@add_user');

//user page

Route::get('/User-page','UserController@index' );


Route::get('/Edit-page','UserController@edit');
Route::post('/User-page','UserController@upload');
Route::get('Product-Interest-page','UserController@Product_Interest');




//admin page
Route::get('/Admin-page','AdminController@index' );// cùng 1 page index là khung

//trang giỏ hàng
Route::get('/Cart-page','CartController@index' );

//send mail
Route::get('/Mail-page','HomeController@mail' );
Route::post('/Forgot-Password','ForgotPasswordController@reset');
Route::get('/Forgot-Password','ForgotPasswordController@index');
Route::get('/update-new-pass','ForgotPasswordController@Update_New_Password');
Route::post('/Login-page','ForgotPasswordController@Update_Pass');