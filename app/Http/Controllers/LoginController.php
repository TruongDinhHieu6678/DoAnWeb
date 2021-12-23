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


    //tương tự đăng nhập với tk user
   public function login_user(){
        // lấy thông tin từ form đưa vào các biến
     $name_acc = $_REQUEST['tenuser'];
        $pas_acc = md5($_REQUEST['matkhauuser']);//md5 thư viện mẫ hóa
        $result_user = DB::table('accountlogin')->where('Email',$name_acc)->where('MatKhau',$pas_acc)->first();//đưa dữa liệu đã lưu so sánh với các thuộc tính tương ứng ở table ..
        if ($result_user && $result_user->MaLoaiTaiKhoan === 1)//nếu kt đúng <=> tồn tại và mã = 2 <=> tk admin
        {   
           //lấy data hiển thị 
           Session::put('acc',$result_user->id);
           Session::put('ten_user',$result_user->TenDangNhap);
           Session::put('acc',$result_user->id);
           Session::put('ten_user',$result_user->TenDangNhap);
           Session::put('diachi',$result_user->diachi);
           Session::put('sdt',$result_user->dienthoai);
           Session::put('mail',$result_user->Email);
           
           Session::put('hinh_anh',$result_user->hinh_anh);
            return Redirect::to('/Trang-Chu');//trả về page home
        }
        else{
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác!');// sai xuất thông báo
            Session::put('message_cn','Hãy đăng nhập để sử dụng chức năng này!');
            return Redirect::to('/Login-page');//trả về page đăng nhập
        }
    }
    //hàm đăng xuất
    public function logout(){// gán các thuộc tính đã kt và thêm trở về null
     Session::put('acc',null);
     Session::put('ten_user',null);  
     return view('Login');
 }
}
