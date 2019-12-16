<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoaiTinController extends Controller
{
    //

    public function getDanhSach(){
    	$loaitin = LoaiTin::all();
    	return view('admin.loaitin.danhsach',['loaitin'=>$loaitin]);
    }
    public function getThem(){
    	return view('admin.loaitin.them');
    }
    public function postThem(Request $request){}
}
