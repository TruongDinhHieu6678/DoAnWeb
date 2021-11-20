<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class AdminController extends Controller
{
    public function index(){
        return view('Admin');//view/Admin.blade.php
    }
     public function dasboard_admin(){
        return view('Admin.dasboard_Admin');
    }
    
}
