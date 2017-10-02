<!doctype html>
<html lang="vi">
    <head>
        @include('guest.layouts._page_head')
        @yield('css')
    </head>

    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini fixed">
        <div class="wrapper" style="display: none" data-bind="visible: true">

            <header class="main-header" data-bind="stopBinding: true">
                @include('guest.layouts._header')
            </header>

            <aside class="main-sidebar" data-bind="stopBinding: true">
                @include('guest.layouts._sidebar')
                <!-- /.sidebar -->
            </aside>
            <div class="content-wrapper">
                <section class="content">
                    @yield('contents')

                    <aside class="control-sidebar control-sidebar-dark" data-bind="stopBinding: true">
                        @include('guest.layouts._control_sidebar')
                    </aside>
                </section>
            </div><!-- END -->

            <!-- Mainly scripts -->
            @include('guest.layouts._js')
            @yield('page_js')

            <div class="modal fade" id="myModal" role="dialog">
                @include('guest.layouts._modal_member')
            </div>

            <div class="modal fade" id="BangGia" role="dialog">
                @include('guest.layouts._modal_price')
            </div>

            <div class="modal fade" id="modal-login" role="dialog" data-bind="stopBinding: true">
                @include('guest.layouts._modal_login')
            </div>

            <div class="modal fade" id="giacmt" role="dialog">
                @include('guest.layouts._modal_comment_price')
            </div>

            <div class="modal fade" id="gialike" role="dialog">
                @include('guest.layouts._modal_like_price')
            </div>
        </div>

        <footer class="main-footer">
            @include('guest.layouts._footer')
        </footer>

    </body>
</html>