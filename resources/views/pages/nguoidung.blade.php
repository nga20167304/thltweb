@extends('layout.index')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <div class="panel panel-heading">Thông tin tài khoản</div>

                    @if(count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif

                    @if(session('thongbao'))
                        <div class="alert alert-success">
                            {{session('thongbao')}}
                        </div>
                    @endif

                    <div class="panel panel-body">
                        <form method="POST" action="nguoidung">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Tên</label>
                                <input class="form-control" name="name" value="{{$nguoidung->name}}"/>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input name="email" class="form-control" value="{{$nguoidung->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="changePassword" id="changePassword" value="on">
                                <label>Đổi mật khẩu</label>
                                <input type="password" class="password form-control" name="password" disabled/>
                            </div>
                            <div class="form-group">
                                <label>Nhập lại mật khẩu</label>
                                <input type="password" class="password form-control" name="passwordAgain" disabled/>
                            </div>
                            <button type="submit" class="btn btn-default">Lưu</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $("#changePassword").change(function () {
                if ($(this).is(":checked")) {
                    $(".password").removeAttr("disabled");
                } else {
                    $(".password").attr("disabled", '');
                }
            });

        })
    </script>
@endsection
