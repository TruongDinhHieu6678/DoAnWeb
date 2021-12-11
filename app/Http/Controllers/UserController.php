<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use DB;
use Session;
use Mail;
session_start();
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        return view('User.ManagerUser');
    }

    public function edit(){
        return view('User.EditUser');
    }
    public function upload(){
        $data = array();

        $data['TenDangNhap'] = $_REQUEST['TenKhachHang'];
        $data['diachi'] = $_REQUEST['DiaChi'];
        $data['dienthoai'] = $_REQUEST['DienThoai'];
        $data['Email'] = $_REQUEST['Email'];
        DB::table('accountlogin')->where('id',$_REQUEST['MaKhachHang'])->update($data);
        return Redirect::to('User-page');
    }

    public function Product_Interest(){
        $Danhmuc_sp = DB::table('loaisanpham')->orderby('MaloaiSanPham','desc')->get();//show loại sp (danh muc)
        $SanPham = DB::table('sanpham')->orderby('MaSanPham','desc')->paginate(6);//show sp mới
        $thuonghieu = DB::table('hangsanxuat')->orderby('MaHangSanXuat','desc')->get();//show hãng sp
        return view('User.ProductInterest')->with('loaisp',$Danhmuc_sp)->with('all_SP',$SanPham)->with('t_h',$thuonghieu);
      
    }
}
