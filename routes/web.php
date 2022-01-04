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

//tìm kiếm

Route::post('/Tim-kiem','HomeController@search' );
//danh mục sp
Route::get('/danh-muc-sp/{MaLoaiSanPham}','ProductController@show_danh_muc' );
//hang sp
Route::get('/thuong-hieu-sp/{MaHangSanXuat}','ProductController@show_thuong_hieu' );
//chi tiet sp
Route::get('/chi-tiet-sp/{MaSanPham}','ProductController@show_chi_tiet_sp' );
Route::post('/comment-sp/{MaSanPham}','ProductController@comment' );


//trang login
Route::get('/Login-page','LoginController@index' );
Route::post('/Trang-Chu','LoginController@login_user' );
//Route::post('/Admin-page','LoginController@login_admin' );
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
Route::post('/chi-tiet-sp/{MaSanPham}','GioHangController@giohang' );

Route::get('/show_cart','GioHangController@show_cart');
Route::get('/delete-cart/{rowId}','GioHangController@delete_cart');
Route::post('/update-cart-quantity','GioHangController@update_cart_quantity' );
//Check out
Route::get('/thanhtoan','CheckoutController@thanhtoan');
Route::get('/thanhtoan_thanhcong','CheckoutController@thanhtoan_thanhcong');

//send mail
Route::get('/Mail-page','HomeController@mail' );
Route::post('/Forgot-Password','ForgotPasswordController@reset');
Route::get('/Forgot-Password','ForgotPasswordController@index');
Route::get('/update-new-pass','ForgotPasswordController@Update_New_Password');
Route::post('/Login-page','ForgotPasswordController@Update_Pass');



//--------------------------dmin-----------------------------//
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::get('/logout', 'AdminController@logout');


//Admin-CategoryProduct
Route::get('/add-category-product', 'CategoryProduct@add_category_product');
Route::get('/edit-category-product/{MaSanPham}', 'CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{MaSanPham}', 'CategoryProduct@delete_category_product');
Route::post('/update-category-product/{MaSanPham}', 'CategoryProduct@update_category_product');
Route::get('/all-category-product/{number_page}', 'CategoryProduct@all_category_product');
Route::post('/save-category-product', 'CategoryProduct@save_category_product');
//Admin-account
Route::get('/list-account/{number_page}', 'AccountController@list_account');
//Admin-order
Route::get('/all-order/{number_page}', 'OrderController@all_order');
Route::get('/edit-status-order/{MaDonHang}', 'OrderController@edit_order_status');
Route::post('/update-status-order/{MaDonHang}', 'OrderController@update_status_order');

//statistics
Route::get('/statistics-day', 'CategoryProduct@statistics_day');
Route::get('/statistics-month', 'CategoryProduct@statistics_month');
Route::get('/statistics-year', 'CategoryProduct@statistics_year');
Route::get('/statistics-quy', 'CategoryProduct@statistics_quy');
