<a href="/" class="logo">
    <span class="logo-mini"><!--img src="" alt="" /--><b>FB+</b></span>
    <span class="logo-lg"><!--img src="" alt="" /--><b><i class="fa fa-angellist"></i> VIPFBNOW.COM</b></span>
</a>
<nav class="navbar navbar-static-top" role="navigation" id="header-content">
    <a class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation </span>
    </a>

    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->
            @if (!\Illuminate\Support\Facades\Auth::check())
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img src="https://i.imgur.com/8AFtXT4.png" class="user-image" alt="User Image">
                        <span class="hidden-xs">Chào Khách</span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header" style="background: url('https://i.imgur.com/lE5vELZ.png') center center;">
                            <img src="https://i.imgur.com/oLlDtlx.jpg" class="img-circle" alt="User Image">
                            <p><b>Đỗ Duy Thịnh</b>
                                <small><b><font color="red">(Administration)</font></b></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body" style="height: 40px">
                            <center>
                                <p><b>MỌI THẮC MẮC LIÊN HỆ ADMIN</b></p>
                            </center>
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
            @else
                <li class="dropdown user user-menu" data-bind="with: userInfo">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <img data-bind="attr: { src: avt }" class="user-image" alt="User Image">
                        <span class="hidden-xs" data-bind="text: fullname"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img data-bind="attr: { src: avt }" class="img-circle" alt="User Image">

                            <p>
                                <span data-bind="text: fullname"></span>
                                <small data-bind="text: username"></small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="{{ route('guest.userIndex') }}" class="btn btn-default btn-flat"><i class="fa fa-fw fa-user"></i> Cá Nhân</a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('guest.changePassword') }}" class="btn btn-default btn-flat"><i class="fa fa-fw fa-lock"></i>
                                    Đổi Pass</a>
                            </div>
                        </li>
                    </ul>
                </li>
            @endif
            <li>
                <a data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>
    <input type="text" style="display: none" value="{{ route('guest.getLoggedInUserInfo') }}" id="get-logged-in-user-info-URL" />
</nav>

<script src="{{ asset('assets/scripts/guest/layout/_header/index.js') }}" type="text/javascript"></script>