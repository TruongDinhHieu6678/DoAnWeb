<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//các thư viện cho myspl truy vấn
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use DB;
use Mail;
session_start();
use Session;
class ProductController extends Controller
{
        //hàm lấy danh mục sản phẩm trả về page show_danh_muc
  public function show_danh_muc($MaLoaiSanPham){
    $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
    $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        $id_spp = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->where('sanpham.MaLoaiSanPham',$MaLoaiSanPham)->paginate(6);// <=> select * form sanpham sp jost loaisanpham lsp where lsp.MaLoaiSanPham = sp.MaLoaiSanPham and sp.MaLoaiSanPham == $MaLoaiSanPham;     
        return view('product.show_danh_muc')->with('sanpham_loai',$id_spp)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
      }


    //hàm lấy thương hiệu sp trả về page show_hang 
      public function show_thuong_hieu($MaHangSanXuat){
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        $id_sps = DB::table('sanpham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('sanpham.MaHangSanXuat',$MaHangSanXuat)->paginate(6);// <=> select * form sanpham sp jost hangsanxuat lsp where lsp.MaHangSanXuat = sp.MaHangSanXuat and sp.MaHangSanXuat == $MaHangSanXuat;   
        return view('product.show_hang')->with('sanpham_hang',$id_sps)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu);
      }


    //hàm lấy sản phẩm theo mã trả về page Prodcut detail
      public function show_chi_tiet_sp($MaSanPham){
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();
        $Show_sp = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('MaSanPham',$MaSanPham)->get();
         //lấy sản phẩm có liên quan(sản phẩm thuộc cùng thuong hieu)
        foreach ($Show_sp as $key => $value){
         $id_dm = $value->MaHangSanXuat;//lấy mã nhà sản xuất của sản phẩm vừa lấy ở trên
       }
         $sp_lienquan = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('sanpham.MaHangSanXuat',$id_dm)->whereNotIn('sanpham.MaSanPham',[$MaSanPham])->paginate(3);//lấy thông tin sp where hãng = hãng của sp ở trên với "whereNotIn" trừ sp đã lấy - trả về 3sp trên 1 page

         return view('product.show_detail_sp')->with('dateil_sp',$Show_sp)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu)->with('sp_lienquan',$sp_lienquan);
       }


       public function comment($MaSanPham){
         $data = array();            
         $name_acc = $_REQUEST['tenuser'];// lấy email
         $data['mail'] = $_REQUEST['tenuser'];
         $data['ten_hienthi'] = $_REQUEST['tenhienthi'];
         $data['BinhLuan'] = $_REQUEST['comment'];//lấy bình luận

         $result_user = DB::table('accountlogin')->where('Email',$name_acc)->first();//kiểm tra email với csd
          
         //lấy sản phẩm với mã tương ứng và nối các bảng liên quan với first() lấy duy nhất
         $Show_sp = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('MaSanPham',$MaSanPham)->first();
         $id = $Show_sp->MaSanPham;//lấy duy nhất để khi lấy sản phẩm trỏ tới mã đc
         $data['MaSanPham'] = $id;// thêm mã sp đã lấy đc vào mảng

         $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();
         $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();



         $Show_sp = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('MaSanPham',$MaSanPham)->get();//lấy sản phẩm với mã tương ứng và nối các bảng liên quan lấy toàn bổ dữ liệu tương từ với first nhưng lấy get để duyệt sp liên quan

         
         //lấy sản phẩm có liên quan(sản phẩm thuộc cùng thuong hieu)
         foreach ($Show_sp as $key => $value){
         $id_dm = $value->MaHangSanXuat;//lấy mã nhà sản xuất của sản phẩm vừa lấy ở trên
       }
         $sp_lienquan = DB::table('sanpham')->join('loaisanpham','sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')->join('hangsanxuat','sanpham.MaHangSanXuat','=','hangsanxuat.MaHangSanXuat')->where('sanpham.MaHangSanXuat',$id_dm)->whereNotIn('sanpham.MaSanPham',[$MaSanPham])->paginate(3);//lấy thông tin sp where hãng = hãng của sp ở trên với "whereNotIn" trừ sp đã lấy - trả về 3sp trên 1 page

         if($result_user)//nếu email tồn tại đúng với email đăng nhập
         {
          
          DB::table('binhluan')->insertGetId($data);//thêm bình luận vào csdl
          $showcomment = DB::table('binhluan')->where('MaSanPham',$MaSanPham)->get();//lấy bình luận
          return view('product.Comment_sp')->with('dateil_sp',$Show_sp)->with('show_comment',$showcomment)->with('sp_lienquan',$sp_lienquan);//trả về page comment
        }
        else{//nếu sai thông báo và trả về page chi tiết
          Session::put('thongbao','mail không phù hợp hoặc chưa tồn tại!');
          return view('product.show_detail_sp')->with('dateil_sp',$Show_sp)->with('loaisp',$Danhmuc_sp)->with('t_h',$thuonghieu)->with('sp_lienquan',$sp_lienquan);
        }
        
      }
    }
