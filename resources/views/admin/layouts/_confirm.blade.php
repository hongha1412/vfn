<div id="confirmDeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Xác Nhận Xóa</b>
                    </div>
                    <div class="panel-body">
                        <form method="POST" v-on:submit.prevent="submitDelete()">
                            <div class="form-group">
                                <label for="usr" style="color:red">Bạn Có Chắc Chắn Muốn Xóa?</label>
                            </div>
                            <button type="submit" name="submitDelete" class="btn btn-danger">Xóa</button>
                            <button type="button" name="deleteClose" class="btn btn-default" data-dismiss="modal">
                                Thoát
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>