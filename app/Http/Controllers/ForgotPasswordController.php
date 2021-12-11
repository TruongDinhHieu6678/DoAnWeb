<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Carbon\Carbon;
use DB;
use count;
session_start();
use Mail;
use Session;
use Illuminate\Mail\Mailable;
class ForgotPasswordController extends Controller
{
    public function index(){
        return view('ForgotPassword');
    }

     public function Update_New_Password(){
        
        return view('Reset');
    }

    public function Update_Pass(){
        $data = array();
        $mail = $_REQUEST['Email_cu'];
        $data['MatKhau'] = md5($_REQUEST['new_pass']);
        DB::table('accountlogin')->where('Email',$mail)->update($data);
       return view('Login');
    }


    public function reset(Request $request){
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');//format ngay hien tai
        $title_mail = "Lấy Lại Mật Khẩu :". ' '. $now;//tiêu đề mail + ngày hienj tại
        $meil_reset = DB::table('accountlogin')->where('Email',$data['email_re'])->first(); //lấy email từ input so sánh với email trog database 
        if (!$meil_reset){//nếu ko tồn tại
                Session::put('erro_mail','Email chưa đăng ký!');//xuất thông báo và trả về chính page đó
                return view('ForgotPassword');
            }else{
                $meil_reset = DB::table('accountlogin')->find($meil_reset->id);//còn tồn tại lấy ra id tương ứng với email
                $to_mail = $data['email_re'];
                $link_reset_pass = url('/update-new-pass?email='.$to_mail);//gán url với tên là email

                 $data = array("name"=>$title_mail,"body"=>$link_reset_pass,'email'=>$data['email_re']);//tạo mảng chứa tiêu đề, thân là link(url), và tên email(1)


                Mail::send('mail',['data'=>$data] ,function($message) use ($title_mail,$data){//dùng mail::send với cái file đc gửi là mail.blade.php với nội dung lưu trên (1)
                    $message->to($data['email'])->subject($title_mail);//gửi đến data[email] = email đã nhập ở input
                    $message->from($data['email'],$title_mail);
                    Session::put('sussec_mail','Đã Reset thành công vui lòng vào hòm thư để xác nhận!');
                });
                return view('ForgotPassword');
            }
        
    }

}
