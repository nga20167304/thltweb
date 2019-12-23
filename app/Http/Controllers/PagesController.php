<?php

namespace App\Http\Controllers;

use App\LoaiTin;
use App\TinTuc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Slide;
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

    public function getTrangChu()
    {
        return view('pages.trangchu');
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
            return redirect('trangchu');
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
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required|min:6|max:32'
        ], [
            'email.required' => 'Bạn chưa nhập Email',
            'name.required' => 'Bạn chưa nhập Tên',
            'password.required' => 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự và không chứa khoảng trắng',
            'password.max' => 'Mật khẩu tối đa 32 ký tự'
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->quyen = 0;
        $isSuccess = $user->save();
        if ($isSuccess) {
            return redirect('trangchu');
        } else {
            return redirect('dangky')->with('thongbao', 'Đăng ký thất bại');
        }
    }

    function getDangXuat()
    {
        Auth::logout();
        return redirect('trangchu');
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
}
