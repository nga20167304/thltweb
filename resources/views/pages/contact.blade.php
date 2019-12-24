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
	            	<div class="panel-heading" style="background-color:#337AB7; color:white;" >
	            		<h2 style="margin-top:0px; margin-bottom:0px;">Liên hệ</h2>
	            	</div>

	            	<div class="panel-body">
	            		<!-- item -->
                        <h3><span class="glyphicon glyphicon-align-left"></span> Thông tin liên hệ</h3>
					    
                        <div class="break"></div>
					   	<h4><span class= "glyphicon glyphicon-home "></span> Địa chỉ : </h4>
                        <p>Trường Đại học Bách Khoa Hà Nội </p>

                        <h4><span class= "glyphicon glyphicon-home "></span> Website : </h4>
                        <p>hust.edu.vn </p>

                        <h4><span class= "glyphicon glyphicon-home "></span> SĐT : </h4>
                        <p>+84 24 3623 1732 </p>



                      <!--   <br><br>
                        <h3><span class="glyphicon glyphicon-globe"></span> Bản đồ</h3>
                        <div class="break"></div><br>
                        <iframe src="https://goo.gl/maps/bHEQSHtcqphuVPtt5" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe> -->

					</div>
	            </div>
        	</div>
        </div>
        <!-- /.row -->
    </div>
    <!-- end Page Content -->
@endsection