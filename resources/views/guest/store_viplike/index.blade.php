@extends('guest.layouts.master')
@section('title', 'Register Page')
@section('contents')
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><i class="fa fa-gears"></i> Panel Cài Đặt VIP Like</b>
        </div>
        <div class="panel-body">
            <form action="" method="POST">
                <div class="form-group">
                    <label>Facebook Profile URL (Đường dẫn facebook cá nhân / page / nhóm công khai):</label>
                    <input type="text" class="form-control" name="id" data-bind="value: fbURL, enable: isEnable" required="" autofocus="">
                </div>
                <div class="form-group">
                    <label>Facebook ID: </label> <label data-bind="text: fbId, enable: isEnable"></label>
                </div>
                <div class="form-group">
                    <label>Tên Facebook: </label> <label data-bind="text: fbName, enable: isEnable"></label>
                </div>
                <div class="form-group"><label>Số Status/1 Ngày:</label> <label>Unlimited</label></div>
                <div class="form-group">
                    <label>Số Lượng Like:</label>

                    <select name="goi" id="goi" class="form-control" data-bind="value: package, enable: isEnable">
                        <option value="1">150 like</option>
                        <option value="2">300 like</option>
                        <option value="3">500 like</option>
                        <option value="4">700 like</option>
                        <option value="5">1.000 like</option>
                        <option value="6">1.500 like</option>
                        <option value="7">2.000 like</option>
                    </select></div>
                <div class="form-group">
                    <label>Tốc Độ Like/5 Phút:</label>

                    <select name="solike" class="form-control" data-bind="value: likeSpeed, enable: isEnable">

                        <option value="5">5 Like</option>
                        <option value="10">10 Like</option>
                        <option value="20">20 Like</option>
                        <option value="30">30 Like</option>
                        <option value="40">40 Like</option>
                        <option value="50">50 Like</option>
                        <option value="100">100 Like</option>

                    </select></div>
                <div class="form-group">
                    <label>Thời Hạn:</label>
                    <select name="time" id="time" class="form-control" data-bind="value: expireTime, enable: isEnable">
                        <option value="30">1 Tháng</option>
                        <option value="60">2 Tháng</option>
                        <option value="90">3 Tháng</option>
                        <option value="120">4 Tháng</option>
                        <option value="150">5 Tháng</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Nội dung ghi chú</label>
                    <textarea class="form-control" data-bind="value: note, enable: isEnable" rows="3" name="chuthich" placeholder="Ghi chú để nhận biết"></textarea>
                </div>
                Thành Tiền:

                <div class="form-control">
                    <label id="dola" for="dola">Số Tiền Cần Thanh Toán Là: </label>
                </div>
                </br>

                <button type="submit" name="submit" class="btn btn-danger" data-bind="enable: isEnable">Cài VIP Like</button>
                <button name="tinhtien" type="button" class="btn btn-danger" data-bind="enable: isEnable">Tính Tiền</button>
            </form>

        </div>
    </div>
</div>
<div class="col-lg-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <b><i class="fa fa-gears"></i> Danh Sách ID VIP
                <span data-toggle="tooltip" title="" class="pull-right badge bg-yellow"
                      data-bind="text: totalID() + ' ID VIP', attr: { 'data-original-title': totalID() + ' ID VIP' }"></span>
            </b>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID VIP</th>
                        <th>Họ Tên</th>
                        <th>Gói Like</th>
                        <th>Chú Thích</th>
                        <th>Hạn Sử Dụng</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/store_viplike/index.js') }}" type="text/javascript"></script>
@endsection