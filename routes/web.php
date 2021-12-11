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





//Admin
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_dashboard']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);


//Admin-CategoryProduct
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{MaSanPham}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{MaSanPham}', [CategoryProduct::class, 'delete_category_product']);
Route::post('/update-category-product/{MaSanPham}', [CategoryProduct::class, 'update_category_product']);
Route::get('/all-category-product/{number_page}', [CategoryProduct::class, 'all_category_product']);
Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
//Admin-account
Route::get('/list-account/{number_page}', [AccountController::class, 'list_account']);
//Admin-order
Route::get('/all-order/{number_page}', [OrderController::class, 'all_order']);
Route::get('/edit-status-order/{MaDonHang}', [OrderController::class, 'edit_order_status']);
Route::post('/update-status-order/{MaDonHang}', [OrderController::class, 'update_status_order']);

//statistics_admin
Route::get('/statistics-day', [CategoryProduct::class, 'statistics_day']);
Route::get('/statistics-month', [CategoryProduct::class, 'statistics_month']);
Route::get('/statistics-year', [CategoryProduct::class, 'statistics_year']);
Route::get('/statistics-quy', [CategoryProduct::class, 'statistics_quy']);


//trang giỏ hàng
Route::get('/Cart-page','CartController@index' );

//send mail
Route::get('/Mail-page','HomeController@mail' );
Route::post('/Forgot-Password','ForgotPasswordController@reset');
Route::get('/Forgot-Password','ForgotPasswordController@index');
Route::get('/update-new-pass','ForgotPasswordController@Update_New_Password');
Route::post('/Login-page','ForgotPasswordController@Update_Pass');