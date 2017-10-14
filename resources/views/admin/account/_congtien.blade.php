<div id="congtienModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <b>Công Tiền Cho CTV</b>
                    </div>
                    <div class="panel-body">
                        <form method="POST" enctype="multipart/form-data"
                              v-on:submit.prevent="updateCongTien(fillItemAccount.id)">
                            <div class="form-group">
                                <label for="usr">Số tiền muốn cộng:</label>
                                <input type="number" class="form-control" name="vnd" v-model="fillItemAccount.vnd">
                                <span v-if="formErrors['vnd']" class="error text-danger">@{{ formErrors['vnd'] }}</span>
                            </div>
                            <button type="submit" name="congtien" class="btn btn-danger">Cộng tiền</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>