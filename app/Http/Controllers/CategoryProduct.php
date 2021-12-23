<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Models\dondathang;


class CategoryProduct extends Controller
{
    public function add_category_product()
    {
        $type_category_product = DB::table('loaisanpham')->get();
        $company_category_product = DB::table('hangsanxuat')->get();
        
        $manager_category_product = view('admin.add_category_product')->with('type_category_product',$type_category_product)->with('company_category_product',$company_category_product);
        return view('admin_layout')->with('admin.add_category_product', $manager_category_product);
    }

    

    public function all_category_product($page_focus)
    {
        //SELECT sp.TenSanPham, sp.GiaSanPham, sp.NgayNhap, sp.SoLuongTon, lsp.TenLoaiSanPham, 
        //hsx.TenHangSanXuat FROM sanpham sp 
        //JOIN loaisanpham lsp on sp.MaLoaiSanPham = lsp.MaLoaiSanPham 
        //JOIN hangsanxuat hsx ON sp.MaHangSanXuat = hsx.MaHangSanXuat
        $all_category_product = DB::table('sanpham')
        ->join('loaisanpham', 'sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')
        ->join('hangsanxuat','hangsanxuat.MaHangSanXuat','=', 'sanpham.MaHangSanXuat')
        ->orderBy('sanpham.MaSanPham', 'asc')
        ->select('sanpham.*','loaisanpham.*','hangsanxuat.*')
        ->get();
        $view_category_product = DB::table('sanpham')
        ->join('loaisanpham', 'sanpham.MaLoaiSanPham','=','loaisanpham.MaLoaiSanPham')
        ->join('hangsanxuat','hangsanxuat.MaHangSanXuat','=', 'sanpham.MaHangSanXuat')
        ->orderBy('sanpham.MaSanPham', 'asc')
        ->skip($page_focus*5-5)
        ->take(5)
        ->select('sanpham.*','loaisanpham.*','hangsanxuat.*')
        ->get();
        $Max_page = count($all_category_product) % 5 == 0 ? count($all_category_product) / 5: ((count($all_category_product) / 5)+1);
        Session::put('page_focus', $page_focus);
        $manager_category_product = view('admin.all_category_product')->with('all_category_product',$view_category_product)->with('Max_page',$Max_page);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    
    public function save_category_product(Request $request )
    {
        $data = array();
        $data['TenSanPham'] =  $request->category_product_name;
        
        $data['GiaSanPham'] = $request->category_product_price;
        $data['NgayNhap'] = $request->category_product_date;
        $data['SoLuongTon'] = $request->category_product_quantity;
        $data['MaLoaiSanPham'] = $request->category_product_type;
        $data['MaHangSanXuat'] = $request->category_product_company;
        $data['MoTa'] = $request->category_product_dest;
        $getImage1 = $request->file('image1');
        $getImage2 = $request->file('image2');

        if($getImage1 && $getImage2)
        {
            $new_image1 = rand(0,99).'.'.$getImage1->getClientOriginalExtension();
            $new_image2 = rand(0,99).'.'.$getImage2->getClientOriginalExtension();
            $getImage1->move('public/uploads/product', $new_image1);
            $getImage2->move('public/uploads/product', $new_image2);
            $data['imageSP'] = $new_image1;
            $data['imageSP2'] = $new_image2;
            
            DB::table('sanpham')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công:');
            return Redirect::to('add-category-product');
        }
        else
        {
            $data['imageSP'] = '';
            $data['imageSP2'] = '';
            
            DB::table('sanpham')->insert($data);
            Session::put('message', 'Thêm sản phẩm thành công:');
            return Redirect::to('add-category-product');
        }

    }
    public function edit_category_product($MaSanPham)
    {
        $edit_category = DB::table('sanpham')->where('MaSanPham',$MaSanPham)->get();
        $type_category_product = DB::table('loaisanpham')->get();
        $company_category_product = DB::table('hangsanxuat')->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category)->with('type_category_product',$type_category_product)->with('company_category_product',$company_category_product);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
        
    } 
    public function delete_category_product($MaSanPham)
    {
        $edit_category = DB::table('sanpham')->where('MaSanPham',$MaSanPham)->get();
        $manager_category_product = view('admin.edit_category_product')->with('edit_category_product',$edit_category);
        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
        
    } 
    public function update_category_product(Request $request,$MaSanPham)
    {
        $data = array();
        $data['TenSanPham'] = $request->category_product_name;
        $data['MoTa'] = $request->category_product_dest;
        $data['GiaSanPham'] = $request->category_product_price;
        $data['NgayNhap'] = $request->category_product_date;
        $data['SoLuongTon'] = $request->category_product_quantity;
        $data['MaLoaiSanPham'] = $request->category_product_type;
        $data['MaHangSanXuat'] = $request->category_product_company;

        DB::table('sanpham')->where('MaSanPham',$MaSanPham)->update($data);
        Session::put('message', 'Cập nhật sản phẩm thành công:');
        $page_focus = Session::get('page_focus');
        return Redirect::to('all-category-product/'.$page_focus);
    } 

    public function statistics_day()
    {
        $dathanhtoan=3;
        $data = DB::table('dondathang')
        ->where('MaTinhTrang',$dathanhtoan)
        ->orderBy('NgayLap', 'asc')
        ->get();
        $manager_data = view('admin.statistics_day')->with('data',$data);
        return view('admin_layout')->with('admin.statistics_day', $manager_data);
    }
    public function statistics_month()
    {
        $dathanhtoan=3;
        $data = DB::table('dondathang')
        ->where('MaTinhTrang',$dathanhtoan)
        ->orderBy('NgayLap', 'asc')->get();
        $manager_data = view('admin.statistics_month')->with('data',$data);
        return view('admin_layout')->with('admin.statistics_month', $manager_data);
    }
    public function statistics_year()
    {
        $dathanhtoan=3;
        $data = DB::table('dondathang')
        ->where('MaTinhTrang',$dathanhtoan)
        ->orderBy('NgayLap', 'asc')->get();
        $manager_data = view('admin.statistics_year')->with('data',$data);
        return view('admin_layout')->with('admin.statistics_year', $manager_data);
    }
    public function statistics_quy()
    {
        $dathanhtoan=3;
        $data = DB::table('dondathang')
        ->where('MaTinhTrang',$dathanhtoan)
        ->orderBy('NgayLap', 'asc')->get();
        $manager_data = view('admin.statistics_quy')->with('data',$data);
        return view('admin_layout')->with('admin.statistics_quy', $manager_data);
    }
}
