@extends('guest.layouts.master')
@section('title', 'Store Vip Comment Page')
@section('contents')
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b><i class="fa fa-gears"></i> CÀI ĐẶT VIP COMMENT</b>
            </div>
            <div class="panel-body">
                <form data-bind="submit: buyVipCmt">
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
                        <label>Số CMT Mua</label>
                        <select name="goi" id="goi" class="form-control">
                            <option value="1">15 Bình Luận</option>
                            <option value="2">20 Bình Luận</option>
                            <option value="3">25 Bình Luận</option>
                            <option value="4">30 Bình Luận</option>
                            <option value="5">35 Bình Luận</option>
                            <option value="6">40 Bình Luận</option>
                            <option value="7">45 Bình Luận</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Số CMT/1 Phút</label>
                        <select name="socmt" class="form-control">
                            <option value="1">1 CMT</option>
                            <option value="2">2 CMT</option>
                            <option value="3">3 CMT</option>
                            <option value="4">4 CMT</option>
                            <option value="5">5 CMT</option>
                            <option value="10">10 CMT</option>
                            <option value="20">20 CMT</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Thời Hạn</label>
                        <select name="time" id="time" class="form-control">
                            <option value="30">1 Tháng</option>
                            <option value="60">2 Tháng</option>
                            <option value="90">3 Tháng</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nội Dung CMT</label>
                        <textarea class="form-control" id="noidung" name="noidung" rows="5" placeholder="Nhập nội dung comment" required="" autofocus=""></textarea>
                    </div>
                    <b>Thành Tiền</b></td>
                    <td>
                        <div class="form-control">
                            <label id="dola" for="dola">Giá tiền: 270,000 VNĐ</label>
                        </div>
                        </br>
                        <button type="submit" name="submit" class="btn btn-danger">Cài VIP CMT</button>
                    </td>
                    </tr>
                    </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <b><i class="fa fa-gears"></i> Danh Sách ID VIP CMT
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
                            <th>Gói CMT</th>
                            <th>Số Stt/Ngày</th>
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
    <input type="text" style="display: none;" value="{{ route('guest.calculateVipLike') }}" id="calculateURL" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/store_vipcmt/index.js') }}" type="text/javascript"></script>
@endsection