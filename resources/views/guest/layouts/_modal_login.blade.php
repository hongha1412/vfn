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
                    // ../like_modun/xuly_dangnhap.php
                    url: "{{ route('guest.login') }}",
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