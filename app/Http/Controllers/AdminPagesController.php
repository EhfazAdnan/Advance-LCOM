<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductImage;
use Image;

class AdminPagesController extends Controller
{
    public function index(){
        return view('admin.pages.index');
    }

}





























