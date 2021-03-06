@extends('admin.layout.index')

@section('content')

    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>sửa</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
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

                    <form action="/admin/slide/sua/{{$slide->id}}" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group">
                            <label>Tên</label>
                            <input class="form-control" id="Ten" name="Ten" value="{{$slide->Ten}}"/>
                        </div>
                        <div class="form-group">
                            <label>Nội dung</label>
                            <textarea name="NoiDung" id="content_editor" class="form-control"
                                      rows="3">{{$slide->NoiDung}}</textarea>
                        </div>
                        <div class="form-group">
                            <label>Link</label>
                            <input class="form-control" id="link" name="link" value="{{$slide->link}}"/>
                        </div>
                        <div class="form-group">
                            <label>Hình ảnh</label><br>
                            <img id="slide_img" width="500" class="img-fluid" src="upload/slide/{{$slide->Hinh}}"/>
                            <input type="file" class="form-control" name="Hinh"/>
                        </div>
                        <button type="submit" class="btn btn-default">Xác nhận</button>
                        <button type="reset" class="btn btn-default" id="bt-reset">Đặt lại</button>
                    </form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $('#bt-reset').click(function () {
                location.reload();
            });    // Reload page on button click.
        });
    </script>
@endsection
