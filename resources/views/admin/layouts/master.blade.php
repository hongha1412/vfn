<!doctype html>
<html lang="vi">
<head>
    <title>HỆ THỐNG VIP LIKE | VIP COMMENT | VIP SHARE | BOT CẢM XÚC - VIPFBNOW.COM</title>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="theme-color" content="pink"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"/>
    <meta name="author" content="Đỗ Duy Thịnh"/>
    <meta name="copyright" content="Đỗ Duy Thịnh"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:url" content="http://vipfbnow.com"/>
    <meta property="og:type" content="website"/>
    <link rel="shortcut icon" href="https://i.imgur.com/iTC7RKm.png">
    <meta property="og:image" content="https://i.imgur.com/hx1OsvK.jpg"/>
    <meta name="description" content="VipFbnow.Com Hệ thống Vip Like giá rẻ được ưa chuông nhất hiện nay."/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:author" content="100006670751625"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://vipfbnow.com/theme/toastr.css">
    <link rel="stylesheet" href="http://vipfbnow.com/theme/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="http://vipfbnow.com/theme/stuly.css">
    <link rel="stylesheet" href="http://vipfbnow.com/theme/pace.min.css">
    <link rel="stylesheet" type="text/css" href="http://vipfbnow.com/theme/dist/sweetalert.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <style>
        ::-webkit-scrollbar {
            width: 8px;
            background-color: #F5F5F5;
        }

        ::-webkit-scrollbar-thumb {
            width: 8px;
            background: #EBEEF1;
            border-radius: 15px;
        }

        ::selection {
            color: #23282B;
            background-color: #7db95c;
        }

        body {
            cursor: url("{{ asset('assets/arrow.cur') }}"), auto;
        }

        a:hover, input:hover, select:hover, button:hover {
            cursor: url("{{ asset('assets/hover.cur') }}"), auto;
        }

        input[type="button"] {
            width: 120px;
            margin-left: 35px;
            display: block;
        }
    </style>
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="/" class="logo">
            <span class="logo-mini"><!--img src="" alt="" /--><b>FB+</b></span>
            <span class="logo-lg"><!--img src="" alt="" /--><b><i class="fa fa-angellist"></i> VIPFBNOW.COM</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
            <a class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation </span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <img src="https://i.imgur.com/8AFtXT4.png" class="user-image" alt="User Image">
                            <span class="hidden-xs">Chào Khách</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- User image -->
                            <li class="user-header"
                                style="background: url('https://i.imgur.com/lE5vELZ.png') center center;">
                                <img src="https://i.imgur.com/oLlDtlx.jpg" class="img-circle" alt="User Image">
                                <p><b>Đỗ Duy Thịnh</b>
                                    <small><b><font color="red">(Administration)</font></b></small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body" style="height: 40px">
                                <center>
                                    <p><b>MỌI THẮC MẮC LIÊN HỆ ADMIN</b></p></center>

                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="https://www.facebook.com/doduythinh18" class="btn btn-default btn-flat">Liên
                                        Hệ</a>
                                </div>
                                <div class="pull-right">
                                    <a href="https://www.facebook.com/doduythinh18" class="btn btn-default btn-flat">Hỗ
                                        Trợ</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img class="img-circle"
                         src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/e4299734559659.56d57de04bda4.gif"
                         alt="Avatar" width="100" height="100">
                </div>
                <div class="pull-left info">
                    <p>
                        Chào Khách
                    </p>
                    <p>
                        <i class="text-success">
                            Bạn Chưa Đăng Nhập
                        </i>
                    </p>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="active Home"><a href="/"><i class="fa fa-home" style="color: #00a65a;"></i>
                        <span>TRANG CHỦ</span></a></li>

                <li><a href="/dangky.php"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Đăng Ký</span></a>
                </li>
                <li><a data-toggle="modal" data-target="#DANGNHAP"><i class="fa fa-user" aria-hidden="true"></i> <span>Đăng Nhập</span></a>
                </li>
                <li><a href="/get_token.php"><i class="fa fa-share" aria-hidden="true"></i> <span>Get Token</span></a>
                </li>
                <li><a href="/banggia.php"><i class="fa fa-calculator" aria-hidden="true"></i> <span>BẢNG GIÁ</span></a>
                </li>
                <li><a href="https://www.facebook.com/doduythinh18"><i class="fa fa-support" aria-hidden="true"></i>
                        <span>Liên Hệ</span></a></li>


                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">

                <!-- Bảng thống kê -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">GÓI VIP LIKE</span>
                            <span class="info-box-number">+11<strong>15</strong></span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Hoạt Động
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-red">
                        <span class="info-box-icon"><i class="fa fa-heartbeat"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">GÓI BOT CẢM XÚC</span>
                            <span class="info-box-number">+114</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Hoạt Động
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="fa fa-share-square"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">GÓI VIP SHARE</span>
                            <span class="info-box-number">+116</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 70%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Hoạt Động
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Gói VIP COMMENT</span>
                            <span class="info-box-number">+114</span>

                            <div class="progress">
                                <div class="progress-bar" style="width: 20%"></div>
                            </div>
                            <span class="progress-description">
                    Đang Hoạt Động
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>


            <div class="col-lg-12">
                <div class="alert alert-danger">
                    <strong>
                        <marquee>Server Vip Like Hoạt Động Ổn Định Nhất Hiện Nay</marquee>
                    </strong>
                </div>


                <div id="myCarousel" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="item active">
                            <img src="https://i.imgur.com/6rlyMWp.jpg" class="img-responsive">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1><b class="red">VIPFBNOW.COM VIP LIKE GIÁ RẺ NHẤT VN</b></h1>
                                    <p><b class="xanh">UY TÍN - CHẤT LƯỢNG - BẢO HÀNH</b></p>
                                    <p>
                                        <button type="button" class="btn btn-rounded btn-danger btn-fill btn-wd btn-lg"
                                                data-toggle="modal" data-target="#DANGNHAP"><i
                                                    class="fa fa-fw fa-rocket"></i> ĐĂNG NHẬP NGAY
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://i.imgur.com/LtBuURm.jpg" class="img-responsive">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1><b class="xanh">GIÁ THÀNH RẺ - CHỨC NĂNG ĐA DẠNG</b></h1>
                                    <p><b class="red">VIP LIKE - VIP COMMENT - VIP SHARE - BOT REACTION</b></p>
                                    <p>
                                        <button type="button" class="btn btn-rounded btn-success btn-fill btn-wd btn-lg"
                                                data-toggle="modal" data-target="#DANGNHAP"><i
                                                    class="fa fa-fw fa-shopping-cart"></i> MUA NGAY
                                        </button>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <img src="https://i.imgur.com/mXXXfuQ.jpg" class="img-responsive">
                            <div class="container">
                                <div class="carousel-caption">
                                    <h1><b class="green">TĂNG TƯƠNG TÁC FACEBOOK</b></h1>
                                    <p><b class="xanh">THANH TOÁN ĐƠN GIẢN NHANH CHÓNG VỚI CHỨC NĂNG NẠP THẺ</b></p>
                                    <p><a class="btn btn-rounded btn-warning btn-fill btn-wd btn-lg"
                                          href="dangky.php"><i class="fa fa-fw fa-paper-plane-o"></i> ĐĂNG KÝ NGAY</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>


                <div class="row">
                    <div class="col-sm-4">
                        <div class="box box-solid">
                            <div class="card panel-body text-center">
                                <div class="et_pb_main_blurb_image"><img width="100px"
                                                                         src="/theme/img/performance-icon-256.png"
                                                                         alt=""
                                                                         class="et-waypoint et_pb_animation_off et-animated">
                                </div>
                                <div class="et_pb_blurb_container">
                                    <h4>Công nghệ mới</h4>

                                    <p>Tăng Like tự động không bị tụt. Không cần phải online cũng tăng được , giúp giảm
                                        thời gian của bạn hiệu quả hơn.</p>

                                </div>
                            </div>
                            <!-- .et_pb_blurb_content -->
                        </div>
                        <!-- .et_pb_blurb -->
                    </div>

                    <div class="col-sm-4">
                        <div class="box box-solid">
                            <div class="card panel-body text-center">
                                <div class="et_pb_main_blurb_image"><img width="100px"
                                                                         src="/theme/img/icon-document.png" alt=""
                                                                         class="et-waypoint et_pb_animation_off et-animated">
                                </div>
                                <div class="et_pb_blurb_container">
                                    <h4>Chi phí thấp</h4>

                                    <p>Giá hầu như rất vừa với túi tiền của các bạn nên rất được ưa chuông dịch vụ này
                                        và được duy trì lâu dài và hiệu quả.</p>

                                </div>
                            </div>
                            <!-- .et_pb_blurb_content -->
                        </div>
                        <!-- .et_pb_blurb -->
                    </div>
                    <div class="col-sm-4">
                        <div class="box box-solid">
                            <div class="card panel-body text-center">
                                <div class="et_pb_main_blurb_image"><img width="100px"
                                                                         src="/theme/img/vps-security-icon.png" alt=""
                                                                         class="et-waypoint et_pb_animation_off et-animated">
                                </div>
                                <div class="et_pb_blurb_container">
                                    <h4>Bảo Vệ Nick An Toàn</h4>

                                    <p>Chúng tôi không yêu cầu token của bạn giúp bạn bảo mật và an toàn cho tài khoản
                                        Facebook của bạn.</p>

                                </div>
                            </div>
                            <!-- .et_pb_blurb_content -->
                        </div>
                    </div>


                </div>
            </div>


            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>VIP FACBOOK</b>
                </div>
                <strong>Copyright © 2017 <a href="https://www.facbook.com/doduythinh18">VipFbnow.Com</a>.</strong> All
                rights
                reserved.
            </footer>

            <aside class="control-sidebar control-sidebar-dark">
                <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
                    <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i
                                    class="fa fa-home bg-red"></i></a></li>
                    <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="control-sidebar-home-tab">
                        <ul class="control-sidebar-menu">
                            <li class="list-group-item">
                                <h4>
                                    <p class="text-danger">Welcome To VipFbnow.Com
                                    </p>
                                </h4>
                            </li>
                            <li class="list-group-item"><p class="text-info">Vui Lòng Đăng Nhập</p></li>
                        </ul>
                        <h3 class="control-sidebar-heading">Recent Updates</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#Modal" data-popup="Update">
                                    <i class="menu-icon fa fa-download bg-red"></i>
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Update Server</h4>
                                        <p>09 - 09 -2017</p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <h3 class="control-sidebar-heading">Hỗ Trợ & Quản Lý</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a href="https://www.facebook.com/doduythinh18" target="_blank">
                                    <img src="https://i.imgur.com/oLlDtlx.jpg" class="dev" alt="Duy Thịnh">
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Đỗ Duy Thịnh</h4>
                                        <p><font color="red">Administrator</font></p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.facebook.com/doduythinh18" target="_blank">
                                    <img src="https://i.imgur.com/oLlDtlx.jpg" class="dev" alt="Duy Thịnh">
                                    <div class="menu-info">
                                        <h4 class="control-sidebar-subheading">Đỗ Duy Thịnh</h4>
                                        <p><font color="red">Administrator</font></p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-pane" id="control-sidebar-settings-tab">
                        <h3 class="control-sidebar-heading">Languages</h3>
                        <ul class="control-sidebar-menu">
                            <li>
                                <a>
                                    <i class="menu-icon fa fa-language bg-red"></i>
                                    <div class="menu-info">
                                        <div id="google_translate_element"></div>
                                        <script type="text/javascript">
                                            function googleTranslateElementInit() {
                                                new google.translate.TranslateElement({
                                                    pageLanguage: 'vi',
                                                    layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
                                                    multilanguagePage: true
                                                }, 'google_translate_element');
                                            }
                                        </script>
                                        <script type="text/javascript"
                                                src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>

                                        <p>
                                        <div id="google_translate_element"></div>
                                        </p>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
        </section>
    </div><!-- END -->


    <!-- Mainly scripts -->
    <link rel="stylesheet" href="/theme/lol.css" property="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/theme/toastr.min.js"></script>
    <script type="text/javascript" src="/theme/app.js"></script>
    <script type="text/javascript" src="/theme/thang.php"></script>
    <script type="text/javascript" src="/theme/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="/theme/dataTables.bootstrap.min.js"></script>
    <script src="http://vipfbnow.com/theme/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="/theme/table.js"></script>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog modal-col-sm-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông Tin Thành Viên</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>
                        <li class="list-group-item">ID Thành Viên : <b style="color:red">#</b>
                        </li>
                        </p>
                        <p>
                        <li class="list-group-item">Tên Đầy Đủ : <b style="color:red"></b>
                        </li>
                        </p>
                        <p>
                        <li class="list-group-item">E-mail : <b style="color:red"></b>
                        </li>
                        </p>
                        <p>
                        <li class="list-group-item">Số Điện Thoại : <b style="color:red"></b>
                        </li>
                        </p>
                        <p>
                        <li class="list-group-item">Số Dư : <b style="color:red">0 VNĐ</b>
                        </li>
                        </p>
                        <p>
                        <li class="list-group-item">Tài Khoản : <b style="color:red"></b>
                        </li>
                        </p>
                    </div>
                    <div class="form-group">
                        <p>
                        <li class="list-group-item"><a href="/canhan/doimk.php"><b style="color:red"><i
                                            class="fa fa-file-text" aria-hidden="true"></i> Đổi Mật Khẩu</b></a></li>
                        </p>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="BangGia" role="dialog">
        <div class="modal-dialog modal-col-sm-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Nạp Tiền Ví Điện Tử & Banking</h4>
                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="active">
                            <th>
                                <center>Ngân hàng</center>
                            </th>
                            <th>
                                <center><font color="red">Thông tin chuyển khoản</font></center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>
                                <center><b>AGRIBANK</b><br><img src="https://i.imgur.com/z6ItYSP.jpg"></center>
                            </td>
                            <td><b>- Số tài khoản: <font color="blue">3712205097986</font></b><br>
                                - Tên : <font color="blue">LE TU ANH</font><br>
                                - Chi nhánh: <font color="blue">Chi Nhánh Hà Tĩnh</font><br>
                                - Nội Dung Chuyển Khoản: <font color="blue"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap
                                        Tien Mua Vip</b></font><br>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <center><b>MEGACARD</b><br><img src="https://megacard.vn/images/logo.png"></center>
                            </td>
                            <td><b>- Tài khoản: <font color="red">anhkey2299@gmail.com</font></b><br>
                                - Tên : <font color="red">LÊ DUY ÁNH</font><br>
                                - Nội Dung Chuyển Khoản: <font color="red"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap
                                        Tien Mua Vip</b></font><br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <center><b>THẺ CÀO SIÊU RẺ</b><br><img src="https://thecaosieure.com/images/logo.png"
                                                                       height="35px" weight="32px"></center>
                            </td>
                            <td><b>- Tài khoản: <font color="red">anhkey</font></b><br>
                                - Tên : <font color="red">LÊ DUY ÁNH</font><br>
                                - Nội Dung Chuyển Khoản: <font color="red"><b>[Taikhoancuaban] or [ID Cần Mua VIP] Nap
                                        Tien Mua Vip</b></font><br>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="DANGNHAP" role="dialog">
        <div class="modal-dialog modal-col-sm-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đăng Nhập Hệ Thống</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="usr">Tên tài khoản:</label>
                            <star>*</star>
                            <input type="text" class="form-control" id="username" name="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mật khẩu:</label>
                            <star>*</star>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="footer text-center">

                            <button id="postdata2" class="btn btn-rounded btn-primary" name="dangnhap"
                                    onclick="dangnhap()"><i class="fa fa-sign-in"></i> Đăng Nhập
                            </button>

                        </div>
                    </div>
                </div>

                <div id="ketqua"></div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
                <script>
                    function dangnhap() {
                        if (!$('#username').val()) {
                            toastr.error('Vui Lòng Nhập Tên Đăng Nhập', 'Thông báo lỗi');
                        } else if (!$('#password').val()) {
                            toastr.error('Vui Lòng Nhập Mật Khẩu', 'Thông báo lỗi');
                        } else {
                            xuly2();
                        }
                    }

                    function xuly2() {
                        $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                        $.ajax({
                            url: "../like_modun/xuly_dangnhap.php",
                            type: "post",
                            dateType: "text",
                            data: {
                                username: $('#username').val(),
                                password: $('#password').val()
                            },
                            success: function (result) {
                                $('#ketqua').html(result);
                                $('#postdata2').html('Đăng Nhập');
                            }
                        });
                    }

                </script>
            </div>
        </div>
    </div>

    <div class="modal fade" id="giacmt" role="dialog">
        <div class="modal-dialog modal-col-sm-4">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">BẢNG GIÁ COMMENT</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="active">
                            <th>
                                <center>Tên Gói Vip</center>
                            </th>
                            <th>
                                <center><font color="red">VNĐ / Tháng</font></center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <center>15 Comment</center>
                            </td>
                            <td>
                                <center>30,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>20 Comment</center>
                            </td>
                            <td>
                                <center>60,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>25 Comment</center>
                            </td>
                            <td>
                                <center>100,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>30 Comment</center>
                            </td>
                            <td>
                                <center>140,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>35 Comment</center>
                            </td>
                            <td>
                                <center>170,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>40 Comment</center>
                            </td>
                            <td>
                                <center>200,000 VNĐ</center>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <center>45 Comment</center>
                            </td>
                            <td>
                                <center>250,000 VNĐ</center>
                            </td>
                        </tr>
                        </tbody>
                    </table>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="gialike" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">BẢNG GIÁ VIP LIKE</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                    <tr class="active">
                        <th>
                            <center>Tên Gói Vip</center>
                        </th>
                        <th>
                            <center><font color="red">VNĐ / Tháng</font></center>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <center>150 Like</center>
                        </td>
                        <td>
                            <center>30,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>300 Like</center>
                        </td>
                        <td>
                            <center>50,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>500 Like</center>
                        </td>
                        <td>
                            <center>80,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>700 Like</center>
                        </td>
                        <td>
                            <center>120,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>1000 Like</center>
                        </td>
                        <td>
                            <center>170,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>1500 Like</center>
                        </td>
                        <td>
                            <center>250,000 VNĐ</center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <center>2000 Like</center>
                        </td>
                        <td>
                            <center>340,000 VNĐ</center>
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function () {
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
    <script type="text/javascript">
        //<![CDATA[
        //Aloha
        shortcut = {
            all_shortcuts: {}, add: function (a, b, c) {
                var d = {type: "keydown", propagate: !1, disable_in_input: !1, target: document, keycode: !1};
                if (c) for (var e in d) "undefined" == typeof c[e] && (c[e] = d[e]); else c = d;
                d = c.target, "string" == typeof c.target && (d = document.getElementById(c.target)), a = a.toLowerCase(), e = function (d) {
                    d = d || window.event;
                    if (c.disable_in_input) {
                        var e;
                        d.target ? e = d.target : d.srcElement && (e = d.srcElement), 3 == e.nodeType && (e = e.parentNode);
                        if ("INPUT" == e.tagName || "TEXTAREA" == e.tagName) return
                    }
                    d.keyCode ? code = d.keyCode : d.which && (code = d.which), e = String.fromCharCode(code).toLowerCase(), 188 == code && (e = ","), 190 == code && (e = ".");
                    var f = a.split("+"), g = 0, h = {
                        "`": "~",
                        1: "!",
                        2: "@",
                        3: "#",
                        4: "#",
                        5: "%",
                        6: "^",
                        7: "&",
                        8: "*",
                        9: "(",
                        0: ")",
                        "-": "_",
                        "=": "+",
                        ";": ":",
                        "'": '"',
                        ",": "<",
                        ".": ">",
                        "/": "?",
                        "\\": "|"
                    }, i = {
                        esc: 27,
                        escape: 27,
                        tab: 9,
                        space: 32,
                        "return": 13,
                        enter: 13,
                        backspace: 8,
                        scrolllock: 145,
                        scroll_lock: 145,
                        scroll: 145,
                        capslock: 20,
                        caps_lock: 20,
                        caps: 20,
                        numlock: 144,
                        num_lock: 144,
                        num: 144,
                        pause: 19,
                        "break": 19,
                        insert: 45,
                        home: 36,
                        "delete": 46,
                        end: 35,
                        pageup: 33,
                        page_up: 33,
                        pu: 33,
                        pagedown: 34,
                        page_down: 34,
                        pd: 34,
                        left: 37,
                        up: 38,
                        right: 39,
                        down: 40,
                        f1: 112,
                        f2: 113,
                        f3: 114,
                        f4: 115,
                        f5: 116,
                        f6: 117,
                        f7: 118,
                        f8: 119,
                        f9: 120,
                        f10: 121,
                        f11: 122,
                        f12: 123
                    }, j = !1, l = !1, m = !1, n = !1, o = !1, p = !1, q = !1, r = !1;
                    d.ctrlKey && (n = !0), d.shiftKey && (l = !0), d.altKey && (p = !0), d.metaKey && (r = !0);
                    for (var s = 0; k = f[s], s < f.length; s++) "ctrl" == k || "control" == k ? (g++, m = !0) : "shift" == k ? (g++, j = !0) : "alt" == k ? (g++, o = !0) : "meta" == k ? (g++, q = !0) : 1 < k.length ? i[k] == code && g++ : c.keycode ? c.keycode == code && g++ : e == k ? g++ : h[e] && d.shiftKey && (e = h[e], e == k && g++);
                    if (g == f.length && n == m && l == j && p == o && r == q && (b(d), !c.propagate)) return d.cancelBubble = !0, d.returnValue = !1, d.stopPropagation && (d.stopPropagation(), d.preventDefault()), !1
                }, this.all_shortcuts[a] = {
                    callback: e,
                    target: d,
                    event: c.type
                }, d.addEventListener ? d.addEventListener(c.type, e, !1) : d.attachEvent ? d.attachEvent("on" + c.type, e) : d["on" + c.type] = e
            }, remove: function (a) {
                var a = a.toLowerCase(), b = this.all_shortcuts[a];
                delete this.all_shortcuts[a];
                if (b) {
                    var a = b.event, c = b.target, b = b.callback;
                    c.detachEvent ? c.detachEvent("on" + a, b) : c.removeEventListener ? c.removeEventListener(a, b, !1) : c["on" + a] = !1
                }
            }
        }, shortcut.add("Ctrl+U", function () {
            top.location.href = "http://www.shafou.com"
        }), shortcut.add("F12", function () {
            top.location.href = "http://www.shafou.com"
        }), shortcut.add("Ctrl+Shift+I", function () {
            top.location.href = "http://www.shafou.com"
        }), shortcut.add("Ctrl+S", function () {
            top.location.href = "http://www.shafou.com"
        }), shortcut.add("Ctrl+Shift+C", function () {
            top.location.href = "http://www.shafou.com"
        });
        //]]>
    </script>
</div>
</body>
</html>