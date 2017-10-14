<div id="themIdModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Thêm ID VIP Cho CTV</b>
                    </div>
                    <div class="panel-body">
                        <form method="POST" v-on:submit.prevent="updateToiDa(fillItemAccount.id)">
                            <div class="form-group">
                                <label for="usr">Số ID muốn cộng:</label>
                                <input type="number" class="form-control" name="toida" v-model="fillItemAccount.toida">
                                <span v-if="formErrors['toida']" class="error text-danger">@{{ formErrors['toida'] }}</span>
                            </div>
                            <button type="submit" name="submitThemId" class="btn btn-danger">Thêm ID</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>