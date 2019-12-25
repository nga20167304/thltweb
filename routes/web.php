<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\TheLoai;
Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postDangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){

		Route::get('danhsach','TheLoaiController@getDanhSach');

		Route::get('sua/{id}','TheLoaiController@getSua');

		Route::post('sua/{id}','TheLoaiController@postSua');

		Route::get('xoa/{id}','TheLoaiController@getXoa');

		Route::post('them','TheLoaiController@postThem');

		Route::get('them','TheLoaiController@getThem');
	});

	Route::group(['prefix'=>'loaitin'],function(){

		Route::get('danhsach','LoaiTinController@getDanhSach');

		Route::get('sua/{id}','LoaiTinController@getSua');

		Route::post('sua/{id}','LoaiTinController@postSua');

		Route::get('them','LoaiTinController@getThem');

		Route::post('them','LoaiTinController@postThem');

		Route::get('xoa/{id}','LoaiTinController@getXoa');
	});

	Route::group(['prefix'=>'slide'],function(){

		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua','SlideController@getSua');
		Route::post('sua', 'SlideController@postSua');

		Route::get('them','SlideController@getThem');

		Route::get('xoa', 'SlideController@getXoa');
	});

	Route::group(['prefix'=>'tintuc'],function(){

		Route::get('danhsach','TinTucController@getDanhSach');

		Route::get('sua/{id}','TinTucController@getSua');

		Route::post('sua/{id}','TinTucController@postSua');

		Route::get('them','TinTucController@getThem');

		Route::post('them','TinTucController@postThem');

		Route::get('xoa/{id}','TinTucController@getXoa');
	});

	Route::group(['prefix'=>'comment'],function(){

		Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');
	});

	Route::group(['prefix'=>'user'],function(){

		Route::get('danhsach','UserController@getDanhSach');

		Route::get('sua/{id}','UserController@getSua');
		Route::post('sua/{id}','UserController@postSua');

		Route::post('them','UserController@postThem');
		Route::get('them','UserController@getThem');

		Route::get('xoa/{id}','UserController@getXoa');
	});


	Route::group(['prefix'=>'slide'],function(){
		Route::get('danhsach','SlideController@getDanhSach');

		Route::get('sua/{id}','SlideController@getSua');
		Route::post('sua/{id}','SlideController@postSua');

		Route::get('them','SlideController@getThem');
		Route::post('them','SlideController@postThem');

		Route::get('xoa/{id}','SlideController@getXoa');
	});

	Route::group(['prefix'=>'ajax'],function(){
		Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
	});
});

Route::get('/dangnhap', 'PagesController@getDangNhap');
Route::post('/dangnhap', 'PagesController@postDangNhap');
Route::get('/dangky', 'PagesController@getDangKy');
Route::post('/dangky', 'PagesController@postDangKy');
Route::get('/dangxuat', 'PagesController@getDangXuat');
Route::get('/nguoidung', 'PagesController@getNguoiDung');
Route::post('/nguoidung', 'PagesController@postNguoiDung');

Route::get('home','PagesController@home');

Route::get('contact','PagesController@contact');

Route::get('loaitin/{id}/{TenKhongDau}.html','PagesController@loaitin');

// Route::get('/trangchu', 'PagesController@getTrangChu');

Route::post('/timkiem','PagesController@timkiem');

Route::get('/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/password/reset', 'Auth\ResetPasswordController@reset');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
