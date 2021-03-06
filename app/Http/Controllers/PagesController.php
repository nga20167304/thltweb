<?php

namespace App\Http\Controllers;

use App\Comment;
use App\LoaiTin;
use App\TinTuc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slide;
use App\TheLoai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{

    function __construct()
    {
        $slides = Slide::all();
        $loaitin = LoaiTin::all();
        View::share('loaitin', $loaitin);
        View::share('slides', $slides);
    }

    public function home(){
        $theloai=TheLoai::all();
        return view('pages.home',['theloai'=>$theloai]);
    }

    public function contact(){
        $theloai=TheLoai::all();
        return view('pages.contact',['theloai'=>$theloai]);
    }
    public function gioithieu(){
        $theloai = TheLoai::all();
       return view('pages.gioithieu',['theloai'=>$theloai]);
    }

    public function loaitin($id){
        $theloai=TheLoai::all();
        $loaitin=LoaiTin::find($id);
        $tintuc=TinTuc::where('idLoaiTin',$id)->paginate(5);
        return view('pages.loaitin',['loaitin'=>$loaitin,'tintuc'=>$tintuc,'theloai'=>$theloai]);
    }

    public function tintuc($id){
        $tintuc = TinTuc::find($id);
        $tinnoibat=TinTuc::where('NoiBat',1)->take(4)->get();
        $tinlienquan=TinTuc::where('idLoaiTin',$tintuc->idLoaiTin)->take(4)->get();
        return view('pages.tintuc',['tintuc'=>$tintuc,'tinnoibat'=>$tinnoibat,
            'tinlienquan'=>$tinlienquan]);
    }

    public function getDangNhap()
    {
        return view('pages.dangnhap');
    }

    public function postDangNhap(Request $request)
    {
        $this->validate($request, [
            'email' => 'required',
            'password' => 'required|min:6|max:32'
        ], [
            'email.required' => 'Bạn chưa nhập Email',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự và không chứa khoảng trắng',
            'password.max' => 'Mật khẩu tối đa 32 ký tự'
        ]);
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('home');
        } else {
            return redirect('dangnhap')->with('thongbao', 'Email hoặc mật khẩu không đúng');
        }
    }

    public function getDangKy()
    {
        return view('pages.dangky');
    }

    public function postDangKy(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password' => 'required| min:6|max:32',
                'passwordAgain' => 'required|same:password'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'tên người dùng phải ít nhất 3 kí tự',
                'email.required'=> 'Bạn chưa nhập email',
                'email.email'=>'bạn chhuwa nhập đúng định dạng email',
                'email.unique'=>'Email đã tồn tại',
                'password.required'=>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu có nhiều nhất 32 kí tự',
                'passwordAgain.required'=>'Bạn chưa nhập lại mật khẩu',
                'passwordAgain.same'=>'Mật khẩu chưa khớp'

            ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $isSuccess = $user->save();
        if ($isSuccess) {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('home');
            } else {
                return redirect('dangnhap');
            }
        } else {
            return redirect('dangky')->with('thongbao', 'Đăng ký thất bại');
        }
    }

    function getDangXuat()
    {
        Auth::logout();
        return redirect('home');
    }

    function getNguoiDung()
    {
        $nguoidung = Auth::user();
        return view('pages.nguoidung', ['nguoidung' => $nguoidung]);
    }

    function postNguoiDung(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required|min:3'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'tên người dùng phải ít nhất 3 kí tự',

            ]);
        $user = Auth::user();
        $user->name = $request->name;
        print_r($request->changePassword);
        if ($request->changePassword == "on") {
            $this->validate($request,
                [
                    'password' => 'required| min:6|max:32',
                    'passwordAgain' => 'required|same:password'
                ],
                [

                    'password.required' => 'Bạn chưa nhập mật khẩu',
                    'password.min' => 'Mật khẩu phải có ít nhất 6 kí tự',
                    'password.max' => 'Mật khẩu có nhiều nhất 32 kí tự',
                    'passwordAgain.required' => 'Bạn chưa nhập lại mật khẩu',
                    'passwordAgain.same' => 'Mật khẩu chưa khớp'

                ]);
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect('nguoidung')->with('thongbao', 'Thay đổi thành công');
    }

    public function timkiem(Request $request)
    {
        $tukhoa = $request->tukhoa;
        $tintuc = TinTuc::where('TieuDe', 'like', "%$tukhoa%")
            ->orWhere('TomTat', 'like', "%$tukhoa%")
            ->orWhere('NoiDung', 'like', "%$tukhoa%")
            ->take(30)->paginate(5);
        return view('pages.timkiem', ['tintuc' => $tintuc, 'tukhoa' => $tukhoa]);
    }

    public function postComment(Request $request, $id) {
        $comment = new Comment();
        $comment->idUser = Auth::user()->id;
        $comment->idTinTuc = $id;
        $comment->NoiDung = $request->comment;
        $comment->save();
        return redirect("tintuc/$id/$request->TieuDeKhongDau.html");
    }
}

