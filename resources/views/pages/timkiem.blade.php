@extends('layout/index')
@section('content')
    <div class="container">
        <div class="row">

            <?php
            function doimau($str, $tukhoa) {
                str_replace($tukhoa, "<span style='color: red'>$tukhoa</span>", $str);
            }
            ?>

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color: #0d6aad; color: white;">
                        <h4><b>Tìm kiếm: {{$tukhoa}}</b></h4>
                    </div>

                    @foreach($tintuc as $tt)
                        <div class="row-item row">
                            <div class="col-md-3">
                                <a>
                                    <br>
                                    <img src="upload/tintuc/{{$tt->Hinh}}" width="200px" height="200px" class="img-responsive">
                                </a>
                            </div>

                            <div class="col-md-9">
                                <h3>{{$tt->TieuDe}}</h3>
                                <p>{{$tt->TomTat}}</p>
                                <a class="btn btn-primary" href="tintuc/{{$tt->id}}/{{$tt->TieuDeKhongDau}}.html">Xem thêm
                                <span class="glyphicon glyphicon-chevron-right"></span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div style="text-align: center;">
                        {{$tintuc->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
