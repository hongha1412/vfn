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
                    <input type="text" class="form-control" data-bind="value: username" id="username" name="username">
                </div>
                <div class="form-group">
                    <label for="pwd">Mật khẩu:</label>
                    <star>*</star>
                    <input type="password" class="form-control" data-bind="value: password" id="password" name="password">
                </div>
                <div class="footer text-center">

                    <button id="postdata2" class="btn btn-rounded btn-primary" name="login"
                        data-bind="click: login"><i class="fa fa-sign-in"></i> Đăng Nhập
                    </button>

                </div>
            </div>
        </div>

        <div id="result" data-bind="text: loginResult"></div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
    </div>
</div>