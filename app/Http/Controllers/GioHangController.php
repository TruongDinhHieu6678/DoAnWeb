<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use Cart;
session_start();
use Session;

class GioHangController extends Controller
{
    public function giohang(Request $request)
    {
        $product_id = $request -> productid_hidden;
        $quantity = $request -> soluong;
        $product_info = DB::table('sanpham')->where('MaSanPham',$product_id)->first();
        
        $data['id'] = $product_info ->MaSanPham;
        $data['qty'] = $quantity;
        $data['name'] = $product_info ->TenSanPham;
        $data['price'] = $product_info ->GiaSanPham;
        $data['options']['image'] = $product_info->HinhURL;
        Cart::add($data);
        $ma = DB::table('sanpham')->where('MaSanPham',$product_id)->first();
        $masp = $ma->MaSanPham;
        return Redirect::to('/chi-tiet-sp/'.$masp);   
    }


    public function show_cart()
    {
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        return view('Cart.show_cart')->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
    }
    public function delete_cart($rowId)
    {
        Cart::update($rowId, 0);
        return Redirect::to('/show_cart');
    }
    public function update_cart_quantity(Request $request)
    { 
        $rowId = $request ->rowId_cart;
        $qty = $request -> cart_quantity;
        Cart::update($rowId,$qty);
        return Redirect::to('/show_cart');
    }
}
