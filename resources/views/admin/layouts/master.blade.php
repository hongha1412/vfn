<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>Đăng Nhập Quản Lý - VIPFBNOW.COM</title>
    <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
    <meta property="og:image" content="http://i.imgur.com/JA3DwPC.jpg"/>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("assets/css")}}/toastr.css">
    <link rel="stylesheet" href="{{asset("assets/css")}}/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="{{asset("assets/css")}}/stuly.css">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css")}}/sweetalert.css">
    <link rel="stylesheet" href="{{asset("assets/css")}}/lol.css" property="stylesheet">

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
</head>
<body class="skin-red sidebar-mini">
<div class="wrapper">
    <header class="main-header">

        <a class="logo" href="/">
            <span class="logo-mini"><!--img src="" alt="" /--><b>FB+</b></span>
            <span class="logo-lg"><!--img src="" alt="" /--><b><i class="fa fa-angellist"></i> VIPFBNOW.COM</b></span>
        </a>

        @component('admin.layouts._nav')
        @endcomponent

    </header>
    <aside class="main-sidebar">
        @component("admin.layouts._sidebar")
        @endcomponent
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <section class="content">
            @yield("content")
        </section>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript"src="{{asset("assets/scripts")}}/toastr.min.js"></script>
<script type="text/javascript"src="{{asset("assets/scripts")}}/app.js"></script>
<script type="text/javascript"src="{{asset("assets/scripts")}}/jquery.dataTables.min.js"></script>
<script type="text/javascript"src="{{asset("assets/scripts")}}/dataTables.bootstrap.min.js"></script>
<script src="{{asset("assets/scripts")}}/sweetalert.min.js"></script>
<script type="text/javascript"src="{{asset("assets/scripts")}}/table.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    });
</script>
</body>
</html>