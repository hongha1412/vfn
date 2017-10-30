<div id="editTokenModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b><i class="fa fa-gears"></i>Chỉnh Sửa Thông Tin Token</b></h4>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form v-on:submit.prevent="update(fillItem.id)" method="POST">
                        <div class="form-group">
                            <label for="usr">ID Facebook:</label>
                            <input type="number" class="form-control" name="idfb" v-model="fillItem.idfb">
                            <span v-if="formErrors['idfb']" class="error text-danger">@{{ formErrors['idfb'] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="ten">Tên:</label>
                            <input type="text" class="form-control" name="ten" v-model="fillItem.ten">
                            <span v-if="formErrors['ten']" class="error text-danger">@{{ formErrors['ten'] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="token">Token:</label>
                            <input type="text" class="form-control" name="token" v-model="fillItem.token">
                            <span v-if="formErrors['token']" class="error text-danger">@{{ formErrors['token'] }}</span>
                        </div>

                        <button type="submit" name="edit" class="btn btn-danger">Lưu</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Đóng
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>