<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\LoaiTin;
use App\TheLoai;
use App\TinTuc;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TinTucController extends Controller
{

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
    	$this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
            'TomTat'=>'required',
            'NoiDung'=>'required'
        ],[
            'LoaiTin.required'=>'Chưa chọn loại tin',
            'TieuDe.required'=>'Chưa chọn tiêu đề',
            'TieuDe.min'=>'Tiêu đề phải chứa ít nhất 3 ký tự',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại',
            'TomTat.required'=>'Chưa điền tóm tắt',
            'NoiDung.required'=>'Chưa điền nội dung'
        ]);
        $tintuc = new TinTuc;
        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->SoLuotXem=0;

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect('admin/tintuc/them')->with('error','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/" .$Hinh))
            {
                $Hinh = Str::random(4)."_".$name;
            }
            $file->move("upload/tintuc",$Hinh);
            $tintuc->Hinh=$Hinh;
        }
        else
        {
            $tintuc->Hinh="";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Thêm tin thành công');

    }

    public function getSua($id){
        $theloai = TheLoai::all();
        $loaitin = LoaiTin::all();
        $tintuc = Tintuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,
            'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id){
        $tintuc=TinTuc::find($id);
        $this->validate($request,[
            'LoaiTin'=>'required',
            'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe,'.$id,
            'TomTat'=>'required',
            'NoiDung'=>'required'
        ],[
            'LoaiTin.required'=>'Chưa chọn loại tin',
            'TieuDe.required'=>'Chưa chọn tiêu đề',
            'TieuDe.min'=>'Tiêu đề phải chứa ít nhất 3 ký tự',
            'TieuDe.unique'=>'Tiêu đề đã tồn tại',
            'TomTat.required'=>'Chưa điền tóm tắt',
            'NoiDung.required'=>'Chưa điền nội dung'
        ]);

        $tintuc->TieuDe=$request->TieuDe;
        $tintuc->TieuDeKhongDau=changeTitle($request->TieuDe);
        $tintuc->idLoaiTin=$request->LoaiTin;
        $tintuc->TomTat=$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;

        if($request->hasFile('Hinh'))
        {
            $file=$request->file('Hinh');
            $duoi=$file->getClientOriginalExtension();
            if($duoi !='jpg' && $duoi !='png' && $duoi !='jpeg'){
                return redirect('admin/tintuc/them')->with('error','Chỉ được thêm ảnh dưới dạng đuôi jpg,png hoặc jpeg');
            }
            $name=$file->getClientOriginalName();
            $Hinh = Str::random(4)."_".$name;
            while(file_exists("upload/tintuc/" .$Hinh))
            {
                $Hinh = Str::random(4)."_".$name;
            }

            $file->move("upload/tintuc",$Hinh);
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh=$Hinh;
        }
        $tintuc->save();

        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sửa tin thành công');


    }

    public function getXoa($id){
        $tintuc=TinTuc::find($id);
        DB::table('comment')->where('idTinTuc',$id)->delete();
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Bạn đã xóa thành công');
    }

    public function getXoaComment($id,$idTinTuc){
        $comment=Comment::find($id);
        $comment->delete();

        return redirect('admin/tintuc/sua/'.$idTinTuc)->with('thongbao','Xóa comment thành công');
    }
}
