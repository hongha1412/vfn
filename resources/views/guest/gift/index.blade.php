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
                            <th>Mã Dự Thưởng <star>*</star></th>
                            <th>Tên</th>
                            <th>Mã Gift</th>
                            <th>Nhận Lúc</th>
                            <th>Mệnh Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                                <td>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="category"><star>*</star> Là mã dự thưởng khi có event.</div>
            </div>
        </div>
    </div>
    <input type="text" style="display: none" value="{{ route('guest.giftProcess') }}" id="giftProcessURL" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/gift/index.js') }}" type="text/javascript"></script>
@endsection