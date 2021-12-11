<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class RegisterController extends Controller
{
  public function index(){
     return view('Register');
  }
  //page đăng ký 
  public function add_user(){
   $data = array();//lấy các dữ liệu từ form lưu vào 1 array
   $data['TenDangNhap'] = $_REQUEST['Username'];
   $data['Email'] = $_REQUEST['email'];
   $data['MatKhau'] = md5($_REQUEST['password']);
   $data['MaLoaiTaiKhoan'] = '1';//gán mã = 1 <=> tk user
   
        $res = DB::table('accountlogin')->insertGetId($data);//thêm dữ liệu vào database và với cái id mới thêm

        if($res != null)//nếu id vừa gán != rỗng 
        {
         Session::put('name_user',$_REQUEST['Username']);//láy tên và id mới thêm
         Session::put('id_u',$res);

         return Redirect::to('/trang-chu');//trả về trang chính
      } else{
         return view('Register');//sai trả về page đăng ký
      }
   }
}
