<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use DB;
use Mail;
session_start();
class ProductController extends Controller
{
        //hàm lấy danh mục sản phẩm trả về page show_danh_muc
    public function show_danh_muc($MaLoaiSanPham){
     $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
     $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();

        $id_spp = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->where('sanpham.MaLoaiSanPham',$MaLoaiSanPham)->paginate(9);// <=> select * form sanpham sp jost loaisanpham lsp where lsp.MaLoaiSanPham = sp.MaLoaiSanPham and sp.MaLoaiSanPham == $MaLoaiSanPham;  
        
        return view('product.show_danh_muc')->with('sanpham_loai',$id_spp)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
    }

    
    //hàm lấy thương hiệu sp trả về page show_hang 
    public function show_thuong_hieu($MaHangSanXuat){
      $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
      $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        $id_sps = DB::table('sanpham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('sanpham.MaHangSanXuat',$MaHangSanXuat)->paginate(9);// <=> select * form sanpham sp jost hangsanxuat lsp where lsp.MaHangSanXuat = sp.MaHangSanXuat and sp.MaHangSanXuat == $MaHangSanXuat;  
        
        return view('product.show_hang')->with('sanpham_hang',$id_sps)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
    }


    //hàm lấy sản phẩm theo mã trả về page Prodcut detail
    public function show_chi_tiet_sp($MaSanPham){
        $Show_sp = DB::table('sanpham')->where('MaSanPham',$MaSanPham)->get();
        return view('product.product-detail')->with('dateil_sp',$Show_sp);
    }
}
