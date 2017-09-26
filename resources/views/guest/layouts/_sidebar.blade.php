<section class="sidebar" id="sidebar-content">
    @if (!\Illuminate\Support\Facades\Auth::check())
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
                <span>Liên Hệ</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    @else
        <span data-bind="with: userInfo">
        <div class="user-panel">
            <div class="pull-left image">
                <img data-bind="attr: { src: avt }" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>
                   <span class="badge bg-teal" data-bind="text: fullname"></span></p>
                <p>
                    <i class="text-success">
                        <i class="fa fa-fw fa-money"></i> <span data-bind="text: vnd"></span> VNĐ
                    </i>
                </p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="active Home"><a href="/"><i class="fa fa-home" style="color: #00a65a;"></i> <span>TRANG CHỦ</span></a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Store VIP</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu" style="display: none;">
                    <li><a href="/viplike.php"><i class="fa fa-plus-square"></i> VIP LIKE</a></li>
                    <li><a href="/vipcmt.php"><i class="fa fa-plus-square"></i> VIP COMMENT</a></li>
                    <li><a href="/vipshare.php"><i class="fa fa-plus-square"></i> VIP SHARE</a></li>
                    <li><a href="/camxuc.php"><i class="fa fa-plus-square"></i> BOT CẢM XÚC</a></li>
                </ul>
            </li>
            <li><a href="/get_token.php"><i class="fa fa-support" aria-hidden="true"></i> <span>Get Token</span></a></li>
            <li><a href="/gift.php"><i class="fa fa-gift" aria-hidden="true"></i> <span>GIFT CODE</span></a></li>
            <li><a href="/napthe.php"><i class="fa fa-usd" aria-hidden="true"></i> <span>NẠP TIỀN</span></a></li>
            <li><a href="/banggia.php"><i class="fa fa-calculator" aria-hidden="true"></i> <span>BẢNG GIÁ</span></a></li>
            <li><a href="{{ route('guest.logout') }}"><i class="fa fa-share"></i> <span>Đăng Xuất</span></a></li>
        </ul>
        </span>
    @endif
</section>

<script src="{{ asset('assets/scripts/guest/home/_sidebar/index.js') }}" type="text/javascript"></script>