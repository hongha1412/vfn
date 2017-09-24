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

        <!-- /dangky.php -->
        <li><a href="{{ route('guest.register.index') }}"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Đăng Ký</span></a>
        </li>
        <li><a data-toggle="modal" data-target="#modal-login"><i class="fa fa-user" aria-hidden="true"></i> <span>Đăng Nhập</span></a>
        </li>
        <!-- /get_token.php -->
        <li><a href="{{ route('guest.getToken') }}"><i class="fa fa-share" aria-hidden="true"></i> <span>Get Token</span></a>
        </li>
        <!-- /banggia.php -->
        <li><a href="{{ route('guest.price') }}"><i class="fa fa-calculator" aria-hidden="true"></i> <span>BẢNG GIÁ</span></a>
        </li>
        <li><a href="https://www.facebook.com/doduythinh18"><i class="fa fa-support" aria-hidden="true"></i>
                <span>Liên Hệ</span></a></li>


        </li>
    </ul><!-- /.sidebar-menu -->
</section>