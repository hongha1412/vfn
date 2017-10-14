<div class="modal fade" id="detailVipLikeModal" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Thông Tin Thành Viên</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <p>
                        <li class="list-group-item">ID Facebook : <b style="color:red">@{{ fillItemVipLike.idfb }}</b>
                        </li>
                    </p>
                    <p>
                        <li class="list-group-item">Tên Hiển Thị : <b
                                    style="color:red">@{{ fillItemVipLike.name }}</b>
                        </li>
                    </p>
                    <p>
                        <li class="list-group-item">Gói Like : <b style="color:red">@{{ fillItemVipLike.goi }}
                                Like</b></li>
                    </p>
                    <p>
                        <li class="list-group-item">Thời Gian : <b
                                    style="color:red">@{{ fillItemVipLike.time }}</b></li>
                    </p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>