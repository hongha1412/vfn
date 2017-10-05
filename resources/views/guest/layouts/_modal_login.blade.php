<div class="modal-dialog modal-col-sm-4" id="modal-login-content">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Đăng Nhập Hệ Thống</h4>
        </div>
        <div class="modal-body">
            <form data-bind="submit: login">
                <div class="form-group">
                    <div class="form-group">
                        <label for="usr">Tên tài khoản:</label>
                        <star>*</star>
                        <input type="text" class="form-control" data-bind="value: username" id="username" name="username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Mật khẩu:</label>
                        <star>*</star>
                        <input type="password" class="form-control" data-bind="value: password" id="password" name="password">
                    </div>
                    <div class="footer text-center">

                        <button id="postdata2" type="submit" class="btn btn-rounded btn-primary" name="login"
                            data-bind="enable: isEnable"><i class="fa fa-sign-in"></i> Đăng Nhập
                        </button>

                    </div>
                </div>
            </form>
        </div>

        <div id="result" data-bind="text: loginResult"></div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
    </div>

    <!-- Store login url -->
    <input type="text" style="display: none" id="loginURL" value="{{ route('guest.login') }}" />
</div>

<script src="{{ asset('assets/scripts/guest/layout/_modal_login/index.js') }}" type="text/javascript"></script>