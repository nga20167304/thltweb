<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;

class TinTucController extends Controller
{
    //

    public function getDanhSach(){
    	$tintuc = TinTuc::orderBy('id','DESC')->get();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
        }
    public function getThem(){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
       return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }
    public function postThem(Request $request){
    	

    }

    public function getSua($id){
    
    }

    public function postSua(Request $request,$id){
    }
    public function getXoa($id){
        $tintuc=TinTuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }
}
