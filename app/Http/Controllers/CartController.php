<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use DB;

session_start();

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
        return view('Cart.Cart');
    }

    
}
