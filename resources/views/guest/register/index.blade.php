@extends('guest.layouts.master')
@section('title', 'Đăng Ký')
@section('contents')
    <div class="col-lg-12">
        <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Đăng Ký Tài Khoản</h3>
            </div>
            <div class="panel-body">
                <div class="input-group">
                    <span class="input-group-addon">Tên Đầy Đủ</span>
                    <input type="text" class="form-control" id="fullname" name="fullname" data-bind="value: fullname" placeholder="Họ Và Tên">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Email</span>
                    <input type="email" class="form-control" id="mail" name="mail" data-bind="value: email"
                           placeholder="Nhập Email Thật Để Xác Minh">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Tài Khoản</span>
                    <input type="text" class="form-control" id="username" data-bind="value: username" name="username" placeholder="Nhập Tài Khoản">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Mật Khẩu</span>
                    <input type="password" class="form-control" id="password" name="password" data-bind="value: password"
                           placeholder="Nhập Mật Khẩu">
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon">Nhập Lại Mật Khẩu</span>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" data-bind="value: password_confirmation"
                           placeholder="Nhập Lại Mật Khẩu">
                </div>
                <br>


                <center>
                    <div class="g-recaptcha" data-sitekey="6Lf--C8UAAAAAEZVx8v_6zB6VJzXUKf4EcuJN_X9"></div>
                    <br>
                    <center>
                        <button id="postdata" class="btn btn-danger btn-fill btn-wd" name="dangky" data-bind="click: register, enable: isEnable">
                            Đăng Ký
                        </button>
                    </center>
                </center>

            </div>

            <div id="result" data-bind="text: registerResult"></div>

        </div>
    </div>

    <!-- Store register controller URL -->
    <input type="text" id="registerURL" value="{{ route('guest.register') }}" data-bind="visible: false" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/register/index.js') }}" type="text/javascript"></script>
@endsection