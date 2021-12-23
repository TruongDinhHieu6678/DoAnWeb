<?php
// Homecontrollers điều khiển view page  Home.blade.php với điều hướng hiển thị đc gọi đến ở routers/web.php
namespace App\Http\Controllers;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use DB;
use Mail;
session_start();

use Illuminate\Http\Request;

class HomeController extends Controller //class đc tạo để điều hướng
{
    //hàm show toàn bộ sản phẩm hãng, thương hiệu
    public function index(){
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();//show loại sp (danh muc)
        $SanPham = DB::table('sanpham')->orderby('MaSanPham','desc')->paginate(6);//show sp mới
        $SanPhamz_cu = DB::table('sanpham')->orderby('SoLuongBan','desc')->paginate(3);//show sp bán chạy
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();//show hãng sp
        return view('page.Home')->with('loaisp',$Danhmuc_sp)->with('all_SP',$SanPham)->with('t_h',$thuonghieu)->with('sp_cu',$SanPhamz_cu);//name page home thuộc Home.blade.php 
    }

      public function search(){
        $key_words = $_REQUEST['Search'];
         $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
         $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
       
        $tim_kiem = DB::table('sanpham')->where('TenSanPham','like','%'.$key_words.'%')->paginate(6);
        return view('page.Search')->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu)->with('search',$tim_kiem);
    }



    // test gửi mail
    public function mail(){
     $to_name = "Quan";
     $to_email = "lnquan002@gmail.com";
     $data = array("name"=>"mail từ tk khách","body"=>"mail test");
     Mail::send('page.sendmail',$data,function($message) use ($to_name,$to_email){//vào page.sendmail.blade.php lấy nội dung gửi
        $message->to($to_email)->subject('hiloooo');
        $message->from($to_email,$to_name);
    });

     // return Redirect('/')->with('message','');
 }
}
