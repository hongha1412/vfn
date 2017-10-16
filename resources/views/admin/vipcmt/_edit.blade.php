<div id="editVipLikeModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><b><i class="fa fa-gears"></i>Chỉnh Sửa Thông Tin ID VIP</b></h4>
            </div>
            <div class="panel panel-default">
                <div class="panel-body">
                    <form v-on:submit.prevent="updateVipLike(fillItemVipLike.id)" method="POST">
                        <div class="form-group">
                            <label for="usr">ID Facebook:</label>
                            <input type="number" class="form-control" name="idfb" v-model="fillItemVipLike.idfb">
                            <span v-if="formErrors['idfb']" class="error text-danger">@{{ formErrors['idfb'] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="usr">Tên Hiển Thị:</label>
                            <input type="text" class="form-control" name="name" v-model="fillItemVipLike.fbname">
                            <span v-if="formErrors['fbname']" class="error text-danger">@{{ formErrors['fbname'] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="usr">Gói Like:</label>
                            <select name="goi" class="form-control" v-model="fillItemVipLike.package">
                                <option value="1">150 like</option>
                                <option value="2">300 like</option>
                                <option value="3">500 like</option>
                                <option value="4">700 like</option>
                                <option value="5">1.000 like</option>
                                <option value="6">1.500 like</option>
                                <option value="7">2.000 like</option>
                            </select>
                            <span v-if="formErrors['package']" class="error text-danger">@{{ formErrors['package'] }}</span>
                        </div>

                        <div class="form-group">
                            <?php
                            //$timevip = $tomdz['time'];
                            //$conlai = $timevip - time();
                            //$vip = round($conlai / (24 * 3600));
                            ?>
                            <label for="usr">Ngày sử dụng (Còn <b style="color:red"><i class="fa fa-history"
                                                                                       aria-hidden="true"></i> <?php //echo $vip . ' Ngày'; ?>
                                </b>):</label> <br/>

                            <input type="number" class="form-control" name="time" v-model="fillItemVipLike.time" value="<?php //echo $vip; ?>">
                        </div>
                        <button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button>
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#detailVipLikeModal">Thông
                            Tin
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>