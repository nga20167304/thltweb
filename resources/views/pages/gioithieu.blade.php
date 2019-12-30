@extends('layout.index')
@section('content')
    <div class="container">

        @include('layout.slide')
        <div class="space20"></div>

        <div class="row main-left">
            @include('layout.menu')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;" >
                        <h2 style="margin-top:0px; margin-bottom:0px;">Giới thiệu</h2>
                    </div>
                    <div class="panel-body">
                        <h3><span class="glyphicon glyphicon-calendar"></span> Thành viên nhóm</h3>

                        <div class="break"></div>
                        <span class= "glyphicon glyphicon-user"></span>
                        <h4>Đỗ Thúy Nga - 20167304</h4>

                        <span class= "glyphicon glyphicon-user"></span>
                        <h4>Nguyễn Thị Hồng Hạnh - 20166061</h4>

                        <span class= "glyphicon glyphicon-user"></span>
                        <h4>Đặng Thị Hoa - 20166000</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
