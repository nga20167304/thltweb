<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tin tức | @yield('title')</title>

    <base href="{{asset('')}}">
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">
    <link href="css/my.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">

    @yield('css')

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    @include('layout.header')

    @yield('content')


    @include('layout.footer')
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my.js"></script>
    <script>
    $(document).ready(function () {
        if ($('#dataTables-example').length > 0) {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        }
    });
</script>
<script
    src="https://cdn.tiny.cloud/1/jdkm7gpmukpuubpq4gt7uf5bsusxk792qg6bs5a6sfu77dnr/tinymce/5/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#content_editor'
    });
</script>
    @yield('script')


</body>
</html>
