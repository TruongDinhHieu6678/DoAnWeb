<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
session_start();
class LoginController extends Controller
{
    public function index(){
         Session::put('login','Hãy đăng nhập để sử dụng chức năng này!');
        return view('Login');
    }


    //đăng nhập với tk admin
    public function login_admin(){
        // lấy thông tin từ form đưa vào các biến
        $name_acc = $_REQUEST['tendn'];
        $pas_acc = md5($_REQUEST['matkhaudn']);//md5 thư viện mẫ hóa
        $result = DB::table('accountlogin')->where('Email',$name_acc)->where('MatKhau',$pas_acc)->first();//đưa dữa liệu đã lưu so sánh với các thuộc tính tương ứng ở table ..
        if ($result && $result->MaLoaiTaiKhoan === 2)//nếu kt đúng <=> tồn tại và mã = 2 <=> tk admin
        {   
            Session::put('name_admin',$result->TenDangNhap);//lấy tên hiển thị 
            return Redirect::to('/Admin-page');//trả về page admin
        }
        else{
            Session::put('message1','Tài khoản hoặc mật khẩu không chính xác!');// sai xuất thông báo
            return Redirect::to('/Login-page');//trả về page đăng nhập
        }
        
    }

    //tương tự đăng nhập với tk admin
    public function login_user(){
       $name_acc = $_REQUEST['tenuser'];
        $pas_acc = md5($_REQUEST['matkhauuser']);
        $result_user = DB::table('accountlogin')->where('Email',$name_acc)->where('MatKhau',$pas_acc)->first();
        if ($result_user && $result_user->MaLoaiTaiKhoan === 1)
        {
             Session::put('acc',$result_user->id);
            Session::put('ten_user',$result_user->TenDangNhap);
            Session::put('diachi',$result_user->diachi);
            Session::put('sdt',$result_user->dienthoai);
            Session::put('mail',$result_user->Email);
            return Redirect::to('/Trang-Chu');
        }
        else{
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác!');
            Session::put('message_login','Hãy đăng nhập để sử dụng chức năng này!');
            return Redirect::to('/Login-page');
        }
    }
    //hàm đăng xuất
    public function logout(){// gán các thuộc tính đã kt và thêm trở về null
       Session::put('id',null);
       Session::put('TenDangNhap',null);
       Session::put('diachi',null);
       Session::put('dienthoai',null);
       Session::put('Email',null);
      return view('Login');
    }
}
