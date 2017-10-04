@extends('guest.layouts.master')
@section('title', 'Nạp Thẻ')
@section('contents')
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading"><i class="fa fa-cogs"></i><b> NẠP TIỀN ACCOUNT</b>
            </div>
            <div class="panel-body">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-shield"></i> Tài Khoản</span>
                    <b>
                        <input type="text" class="form-control" id="txtuser" name="txtuser" data-bind="value: userInfo().username, enable: false">
                    </b>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-dashboard"></i> Chọn Mạng</span>
                    <select name="chonmang" id="chonmang" class="form-control" data-toggle="tooltip"
                            data-title="Nhà Mạng"/>
                    <option value="VIETEL">Viettel</option>
                    <option value="MOBI">Mobifone</option>
                    <option value="VINA">Vinaphone</option>
                    <option value="GATE">Gate</option>
                    <option value="VTC">VTC</option>
                    </select>
                </div>
                <br>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i> Mã Serial</span>
                    <input type="text" class="form-control" name="txtseri" id="txtseri"
                           placeholder="Nhập mã serial nằm sau thẻ" value="" data-toggle="tooltip"
                           data-title="Mã seri nằm sau thẻ" required="" autofocus="">
                </div>
                <br/>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i> Mã Thẻ</span>
                    <input type="text" class="form-control" name="txtpin" id="txtpin"
                           placeholder="Nhập mã số sau lớp bạc mỏng" value="" data-toggle="tooltip"
                           data-title="Mã số sau lớp bạc mỏng" required="" autofocus="">
                </div>
                <br/></div>
            <div class="modal-footer">
                <center>
                    <button id="postdata" class="btn btn-danger" name="napthe" onclick="napthe()"><i
                                class="fa fa-fw fa-cart-plus"></i> Nạp Ngay
                    </button>
                </center>
            </div><!--end .form_row_right-->

            <div id="ketqua"></div>


        </div>
    </div>
    <div class="col-sm-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs"></i> <b>Nạp Tiền Qua Ví Và Banking</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr class="active">
                            <th>
                                <center>Ngân hàng</center>
                            </th>
                            <th>
                                <center><font color="red">Thông tin chuyển khoản</font></center>
                            </th>
                        </tr>
                        </thead>
                        <tbody>

                        <tr>
                            <td>
                                <center><b>VIETCOMBANK</b><br><img src="https://i.imgur.com/TyrUYHN.jpg" width="200"
                                                                   height="65"></center>
                            </td>
                            <td><b>- Số tài khoản: <font color="blue">0141000176722</font></b><br>
                                - Tên : <b><font color="blue">DO DUY THINH</font></b><br>
                                - Chi nhánh: <font color="blue">Chi Nhánh Quảng Ninh</font><br>
                                - Nội Dung Chuyển Khoản: <font color="blue"><b>(TK của bạn) Nap Tien</b></font><br>
                            </td>
                        </tr>


                        <tr>
                            <td>
                                <center><b>MEGACARD</b><br><img src="https://megacard.vn/images/logo.png"></center>
                            </td>
                            <td><b>- Tài khoản: <font color="red">jinjinn07@gmail.com</font></b><br>
                                - Tên : <b><font color="red">Đỗ Duy Thịnh</font></b><br>
                                - Nội Dung Chuyển Khoản: <font color="red"><b>(TK của bạn) Nap Tien</b></font><br>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <center><b>BANTHE247</b><br><img src="https://banthe247.com/images/logo.png"
                                                                 height="35px" weight="32px"></center>
                            </td>
                            <td><b>- Tài khoản: <font color="red">jinjinn07@gmail.com</font></b><br>
                                - Tên : <b><font color="red">Đỗ Duy Thịnh</font></b><br>
                                - Nội Dung Chuyển Khoản: <font color="red"><b>(TK của bạn) Nap Tien</b></font><br>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-cogs"></i><b> LỊCH SỬ NẠP</b>
            </div>
            <div class="panel-body">

                <div class="table-responsive">
                    <table id="example10" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tài Khoản</th>
                            <th>Loại Thẻ</th>
                            <th>Mã Thẻ</th>
                            <th>Mã Seri</th>
                            <th>Nạp Lúc</th>
                            <th>Mệnh Giá</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <!-- id -->
                                <b>#</b>
                            </td>
                            <td>
                                <!-- nguoi nhan -->
                            </td>
                            <td>
                                <!-- loai the -->
                            </td>
                            <td>
                                <!-- ma the -->
                            </td>
                            <td>
                                <!-- seri -->
                            </td>
                            <td>
                                <!-- time -->
                            </td>
                            <td>
                                <!-- number_format($res['menhgia'], 0, ',', ','); -->
                                 VNĐ
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/recharge/index.js') }}" type="text/javascript"></script>
@endsection