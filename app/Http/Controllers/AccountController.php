<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class AccountController extends Controller
{
    public function list_account($page_focus)
    {
        //SELECT sp.TenSanPham, sp.GiaSanPham, sp.NgayNhap, sp.SoLuongTon, lsp.TenLoaiSanPham, 
        //hsx.TenHangSanXuat FROM sanpham sp 
        //JOIN loaisanpham lsp on sp.MaLoaiSanPham = lsp.MaLoaiSanPham 
        //JOIN hangsanxuat hsx ON sp.MaHangSanXuat = hsx.MaHangSanXuat
        $all_account = DB::table('accountlogin')->where('MaLoaiTaiKhoan',1)
        ->orderBy('accountlogin.id', 'asc')
        ->get();
        $Max_page = count($all_account) % 5 == 0 ? count($all_account) / 5: ((count($all_account) / 5)+1);
        $view_account = DB::table('accountlogin')->where('MaLoaiTaiKhoan',1)
        ->orderBy('accountlogin.id', 'asc')
        ->skip($page_focus*5-5)
        ->take($page_focus*5)
        ->get();
        Session::put('page_focus', $page_focus);
        $manager_account = view('admin.list_account')->with('all_account',$view_account)->with('Max_page',$Max_page);
        return view('admin_layout')->with('admin.list_account', $manager_account);
    }
}
