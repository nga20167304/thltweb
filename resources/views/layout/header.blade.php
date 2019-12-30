<!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('home')}}">Tin Tức</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{url('gioithieu')}}">Giới thiệu</a>
                    </li>
                    <li>
                        <a href="{{url('contact')}}">Liên hệ</a>
                    </li>
                </ul>

                <form class="navbar-form navbar-left" role="search" action="{{url('timkiem')}}" method="get">
			        <div class="form-group">
			          <input type="text" name="tukhoa" class="form-control" placeholder="Từ khóa">
			        </div>
			        <button type="submit" class="btn btn-default">Tìm kiếm</button>
			    </form>

			    <ul class="nav navbar-nav navbar-right">
                <?php $nguoidung = \Illuminate\Support\Facades\Auth::user() ?>
                @if(!isset($nguoidung))
                    <li><a href="{{url('dangky')}}">Đăng ký</a></li>
                    <li><a href="{{url('dangnhap')}}">Đăng nhập</a></li>
                @else
                    <li><a href="{{url('nguoidung')}}">{{$nguoidung->name}}</a></li>
                    <li>
                        <a href="{{url('dangxuat')}}">Đăng xuất</a>
                    </li>
                @endif
            </ul>
            </div>



            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
