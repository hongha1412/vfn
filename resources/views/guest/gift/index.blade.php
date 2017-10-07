@extends('guest.layouts.master')
@section('title', 'Quà Tặng')
@section('contents')
    <div class="col-md-6">
        <div class="panel panel-default">
            <form data-bind="submit: gift">
                <div class="panel-heading">
                    <i class="fa fa-cogs"></i> MÃ QUÀ TẶNG
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="control-label">Tài khoản <star>*</star></label>
                        <input class="form-control error" id="txtuser" type="text" data-bind="value: userInfo().username, enable: false">
                    </div>

                    <div class="form-group">
                        <label class="control-label">Mã Gift <star>*</star></label>
                        <input class="form-control" data-bind="value: giftCode, enable: isEnable" id="txtgif" placeholder="Mã Gift Admin Tặng"/>
                    </div>
                    <div class="footer text-center">
                        <button id="postdata" type="submit" data-bind="enable: isEnable" class="btn btn-info btn-fill btn-wd" name="napthe">Nhập Quà</button>
                    </div>
                    <div id="ketqua"></div>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs"></i> LỊCH SỬ
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>STT <star>*</star></th>
                            <th>Tên</th>
                            <th>Mã Gift</th>
                            <th>Mệnh Giá</th>
                            <th>Thời Gian Nạp</th>
                        </tr>
                        </thead>
                        <tbody data-bind="foreach: lsLog, visible: lsLog().length > 0">
                            <tr>
                                <td>
                                    <b>#<span data-bind="text: ($index() + 1)"></span></b>
                                </td>
                                <td data-bind="text: username"></td>
                                <td data-bind="text: giftCode"></td>
                                <td data-bind="text: amount"></td>
                                <td data-bind="text: usedtime"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="category"><star>*</star> Là mã dự thưởng khi có event.</div>
            </div>
        </div>
    </div>
    <input type="text" style="display: none" value="{{ route('guest.giftProcess') }}" id="giftProcessURL" />
    <input type="text" style="display: none" value="{{ route('guest.giftLog') }}" id="giftLogURL" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/gift/index.js') }}" type="text/javascript"></script>
@endsection