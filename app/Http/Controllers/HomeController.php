<?php
// Homecontrollers điều khiển view page  Home.blade.php với điều hướng hiển thị đc gọi đến ở routers/web.php
namespace App\Http\Controllers;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use DB;
session_start();

use Illuminate\Http\Request;

class HomeController extends Controller //class đc tạo để điều hướng
{
    public function index(){
        $Danhmuc_sp = DB::table('loaisanpham')->get();
        $SanPham = DB::table('sanpham')->limit(6)->get();
         $SanPham1 = DB::table('sanpham')->limit(3)->get();
        //$Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        return view('page.Home')->with('loaisp',$Danhmuc_sp)->with('all_SP',$SanPham)->with('all_SP1',$SanPham1);//name page home thuộc Home.blade.php 
    }
   
}
