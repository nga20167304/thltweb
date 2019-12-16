<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TinTuc extends Model
{
    //
    protected $table="TinTuc";

    public funtion loaitin(){
    	return $this->belongsTo('App\LoaiTin','idLoaiTin','id');
    }

    public funtion comment(){
    	return  $this->hasMany('App\Comment','idTinTuc','id');
    }
}
