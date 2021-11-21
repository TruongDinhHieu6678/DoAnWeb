<?php
// Homecontrollers điều khiển view page  Home.blade.php với điều hướng hiển thị đc gọi đến ở routers/web.php
namespace App\Http\Controllers;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use DB;
session_start();

use Illuminate\Http\Request;

class HomeController extends Controller //class đc tạo để điều hướng
{
    public function index(){
        $Danhmuc_sp = DB::table('loaisanpham')->get();   
         $SanPham = DB::table('sanpham')->paginate(6);  
         $HangSX = DB::table('hangsanxuat')->get();
        //$Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        return view('page.Home')->with('all_SP',$SanPham)->with('loaisp',$Danhmuc_sp)->with('all_SX',$HangSX);//name page home thuộc Home.blade.php 
    }
    //public function phantrang(){
    //    $phan_trang=DB::table('sanpham')->paginate(6);
   //     return view('page.Home')->with('pt',$phan_trang);
   
  
}
