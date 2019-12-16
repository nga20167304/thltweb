<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table="TheLoai";

    //Liên kết theLoai với LoaiTin
    public function loaitin(){
    	return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    //Liên kết TheLoai với TinTuc
    public function tintuc(){
    	return $this->hasManyThrough(
    		'App\TinTuc','App\LoaiTin','idTheLoai','idLoaiTin','id');
    }
}
