<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use Mail;
use Cart;
session_start();
use Session;

class CheckoutController extends Controller
{
    public function thanhtoan()
    {
       $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        return view('page.checkout.show-checkout')->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
    }
    public function thanhtoan_thanhcong()
    {
        
        Cart::destroy(); //Thanh toán xong thì xóa session cũ đi// làm rỗng giỏ hàng
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        return view('page.checkout.handcash')->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
    }

}
