<div id="confirmDeleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form method="POST" v-on:submit.prevent="submitDelete()">
                <div class="modal-header">
                    <h4 class="modal-title"><b>Xác Nhận Xóa</b></h4>
                </div>
                <div class="modal-body">
                    <label for="usr" style="color:red">Bạn Có Chắc Chắn Muốn Xóa?</label>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="submitDelete" class="btn btn-danger">Xóa</button>
                    <button type="button" name="deleteClose" class="btn btn-default" data-dismiss="modal">Thoát</button>
                </div>
            </form>
        </div>
    </div>
</div>