@extends('guest.layouts.master')
@section('title', 'Home Page')
@section('contents')
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
                            <!-- dangky.php -->
                            <p><a class="btn btn-rounded btn-warning btn-fill btn-wd btn-lg"
                                  href="{{ route('guest.register') }}"><i class="fa fa-fw fa-paper-plane-o"></i> ĐĂNG KÝ NGAY</a>
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
                                                                 src="{{ asset('assets/images/performance-icon-256.png') }}"
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
                                                                 src="{{ asset('assets/images/icon-document.png') }}" alt=""
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
                                                                 src="{{ asset('assets/images/vps-security-icon.png') }}" alt=""
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

    <!-- Store login url -->
    <input type="text" data-bind="visible: false" id="loginURL" value="{{ route('guest.login') }}" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/home/index.js') }}" type="text/javascript"></script>
@endsection