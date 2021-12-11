<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
Session_start();


class OrderController extends Controller
{
    public function all_order($page_focus)
    {
        //SELECT sp.TenSanPham, sp.GiaSanPham, sp.NgayNhap, sp.SoLuongTon, lsp.TenLoaiSanPham, 
        //hsx.TenHangSanXuat FROM sanpham sp 
        //JOIN loaisanpham lsp on sp.MaLoaiSanPham = lsp.MaLoaiSanPham 
        //JOIN hangsanxuat hsx ON sp.MaHangSanXuat = hsx.MaHangSanXuat
        $all_order = DB::table('dondathang')
        ->join('tinhtrang','dondathang.MaTinhTrang','=','tinhtrang.MaTinhTrang')
        ->join('taikhoan','taikhoan.MaTaiKhoan','=','dondathang.MaTaiKhoan')
        ->orderBy('dondathang.MaDonDatHang', 'asc')
        ->select('dondathang.*','tinhtrang.*','taikhoan.*')
        ->get();
        $Max_page = count($all_order) % 5 == 0 ? count($all_order) / 5: ((count($all_order) / 5)+1);
        $view_order = DB::table('dondathang')
        ->join('tinhtrang','dondathang.MaTinhTrang','=','tinhtrang.MaTinhTrang')
        ->join('taikhoan','taikhoan.MaTaiKhoan','=','dondathang.MaTaiKhoan')
        ->orderBy('dondathang.MaDonDatHang', 'asc')
        ->skip($page_focus*5-5)
        ->take($page_focus*5)
        ->select('dondathang.*','tinhtrang.*','taikhoan.*')
        ->get();
        
        Session::put('page_focus', $page_focus);
        $manager_order = view('admin.all_order')->with('all_order',$view_order)->with('Max_page',$Max_page);
        return view('admin_layout')->with('admin.all_order', $manager_order);
    }
    public function edit_order_status($MaDonHang)
    {
        $edit_status_order = DB::table('dondathang')
        ->join('taikhoan','taikhoan.MaTaiKhoan','=','dondathang.MaTaiKhoan')
        ->where('MaDonDatHang',$MaDonHang)
        ->select('dondathang.*','taikhoan.*')
        ->get();
        $all_status_order = DB::table('tinhtrang')->get();
        
        $manager_status_order = view('admin.edit_status_order')->with('edit_status_order',$edit_status_order)
        ->with('all_status_order',$all_status_order);
        return view('admin_layout')->with('admin.edit_status_order', $manager_status_order);
        
    }
    public function update_status_order(Request $request,$MaDonHang)
    {
        
        $data = array();
        $data['MaTinhTrang'] = $request->order_status;

        DB::table('dondathang')->where('MaDonDatHang',$MaDonHang)->update($data);
        Session::put('message', 'Cập nhật Tình Trạng thành công:');
        $page_focus = Session::get('page_focus');
        return Redirect::to('all-order/'.$page_focus);
    }
}
