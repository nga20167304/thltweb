<!-- USING BOOTSTRAP 3.0.3 -->
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('trangchu')}}">Logo</a>
        </div>


        <div class="navbar-content">
            <form action="timkiem" method="post" class="navbar-form navbar-search-form search active" role="search">
                <div class="form-group">
                    <div class="input-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input name="tukhoa" type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                        </span>
                    </div>
                </div>
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
    </div>
</nav>
