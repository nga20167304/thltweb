@extends('layout.index')
@section('content')
    <!-- Page Content -->
    <div class="container">

        @include('layout.slide')

        <div class="space20"></div>


        <div class="row main-left">
            @include('layout.menu')
            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h2 style="margin-top:0px; margin-bottom:0px;">Laravel Tin Tức</h2>
                    </div>

                    <div class="panel-body">
                    @foreach($theloai as $tl)
                        @if(count($tl->loaitin)>0)
                            <!-- item -->
                                <div class="row-item row">
                                    <h3>
                                        <span href="">{{$tl->Ten}}</span> |
                                        @foreach($tl->loaitin as $lt)
                                            <small><a class="home-loaitin-small"
                                                      href="loaitin/{{$lt->id}}/{{$lt->TenKhongDau}}.html"><i>{{$lt->Ten}}</i></a>/</small>
                                        @endforeach
                                    </h3>

                                    <?php
                                    $data = $tl->tintuc->where('NoiBat', 1)->sortByDesc('created_at')->take(4);
                                    $tin1 = $data->shift();
                                    ?>
                                    <div class="col-md-12">
                                        @foreach($data as $d)
                                            <div class="col-md-4" style="padding: 0; margin: 0;">
                                                <a href="tintuc/{{$d->id}}/{{$d->TieuDeKhongDau}}.html">
                                                    <img style="height: 150px; object-fit: cover; object-position: bottom;"
                                                         class="img-responsive" src="upload/tintuc/{{$d->Hinh}}"
                                                         width="100%" alt="">
                                                </a>
                                            </div>
                                            <div class="col-md-7">
                                                <h3 style="margin-top: 0;">{{$d['TieuDe']}}</h3>
                                                <p>
                                                    {{$tin1['TomTat']}}
                                                    <a style="color: #337AB7"
                                                       href="tintuc/{{$d->id}}/{{$d->TieuDeKhongDau}}.html">Đọc
                                                        tiếp...</a>
                                                </p>
                                            </div>
                                            <div class="break tintuc-break"></div>
                                        @endforeach
                                    </div>

                                </div>
                                <!-- end item -->
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection
