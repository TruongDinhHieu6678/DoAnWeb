<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
     public function index(){
         Session::put('login','Hãy đăng nhập để sử dụng chức năng này!');
        return view('Login');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
    public function dashboard(Request $request){

        $taikhoan = $request->Taikhoan;
        
        $MatKhau = md5($request->Matkhau);
        

        $result = DB::table('accountlogin')->where('Email',$taikhoan)->where('MatKhau', $MatKhau)->where('MaLoaiTaiKhoan',2)->first();
        if($result)
        {
            Session::put('admin_name',$result->TenHienThi);
            Session::put('admin_id',$result->id);
            return Redirect::to('/dashboard');
            
        }
        else
        {
            Session::put('message','Tài khoản hoặc mật khẩu không chính xác hoặc đây không phải tài khoản admin:');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
        Session::put('admin_name',null);
        Session::put('admin_id',null);
         return view('Login');
    }
      

    
}
