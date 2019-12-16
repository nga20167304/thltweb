<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;

class TheLoaiController extends Controller
{
    //
    public function getDanhSach(){
    	$theloai = TheLoai::all();

    	return view('admin.theloai.danhsach',['theloai'=>$theloai]);

    }

     public function getThem(){
    	return view('admin.theloai.them');
    }

     public function getSua(){
    	return view('admin.theloai.sua');
    }
}
