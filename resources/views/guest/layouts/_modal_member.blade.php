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
                <!-- /canhan/doimk.php -->
                <li class="list-group-item"><a href="{{ route('guest.changePassword') }}"><b style="color:red"><i
                                    class="fa fa-file-text" aria-hidden="true"></i> Đổi Mật Khẩu</b></a></li>
                </p>
            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
    </div>
</div>