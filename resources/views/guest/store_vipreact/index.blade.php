@extends('guest.layouts.master')
@section('title', 'Store Vip React Page')
@section('contents')
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b><i class="fa fa-gears"></i> CÀI ĐẶT VIP COMMENT</b>
            </div>
            <div class="panel-body">
                <form data-bind="submit: buyVipReact">
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
                        <label>Số Lượng React</label>
                        <select class="form-control"
                                data-bind="enable: isEnable, options: lsReactPackage, value: reactPackage, optionsText: 'value', optionsValue: 'id'"></select>
                    </div>
                    <div class="form-group">
                        <label>Tốc độ react/1 Phút</label>
                        <select class="form-control"
                                data-bind="enable: isEnable, options: lsReactSpeed, value: reactSpeed, optionsText: 'value', optionsValue: 'id'"></select>
                    </div>
                    <div class="form-group">
                        <label>Loại Cảm Xúc:</label>
                        <select name="camxuc" class="form-control" data-bind="enable: isEnable, value: reactType">
                            <option value="LIKE">LIKE</option>
                            <option value="LOVE"> LOVE - Yêu Thích</option>
                            <option value="WOW">  WOW - Ấn Tượng</option>
                            <option value="HAHA"> HAHA - Cười Lớn</option>
                            <option value="SAD">  SAD - Buồn Bã</option>
                            <option value="ANGRY"> ANGRY - Giận Dữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thời Hạn</label>
                        <select class="form-control"
                                data-bind="enable: isEnable, options: lsDayPackage, value: dayPackage, optionsText: 'value', optionsValue: 'id'"></select>
                    </div>
                    <div class="form-group">
                        <label>Ghi Chú</label>
                        <textarea class="form-control" data-bind="value: note" id="noidung" name="noidung" rows="5" placeholder="Ghi chú để nhận biết" autofocus=""></textarea>
                    </div>
                    Thành Tiền:
                    <div class="form-control">
                        <label id="dola" for="dola">Số Tiền Cần Thanh Toán Là: <span data-bind="text: price"></span></label>
                    </div>
                    </br>
                    <button type="submit" name="submit" data-bind="enable: isEnable" class="btn btn-danger">Cài VIP React</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b><i class="fa fa-gears"></i> Danh Sách ID VIP REACT
                    <span data-toggle="tooltip" title="" class="pull-right badge bg-yellow"
                          data-bind="text: totalID() + ' ID VIP', attr: { 'data-original-title': totalID() + ' ID VIP' }"></span>
                </b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID VIP</th>
                            <th>Facebook</th>
                            <th>Gói React</th>
                            <th>Hạn Sử Dụng</th>
                            <th>Chú Thích</th>
                            <th>Hành động</th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach: lsVipReact">
                            <tr>
                                <td>
                                    <b>#<span data-bind="text: ($index() + 1)"></span></b>
                                </td>
                                <td data-bind="text: fbName"></td>
                                <td data-bind="text: package"></td>
                                <td data-bind="text: expireDate"></td>
                                <td data-bind="text: note"></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <input type="text" style="display: none;" value="{{ route('common.calculate') }}" id="calculateURL" />
    <input type="text" style="display: none;" value="{{ route('common.getPackage') }}" id="packageURL" />
    <input type="text" style="display: none;" value="{{ route('common.getSpeed') }}" id="speedURL" />
    <input type="text" style="display: none;" value="{{ route('common.listVip') }}" id="listVIPURL" />
    <input type="text" style="display: none;" value="{{ route('guest.buyVipReact') }}" id="buyVipReactURL" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/store_vipreact/index.js') }}" type="text/javascript"></script>
@endsection