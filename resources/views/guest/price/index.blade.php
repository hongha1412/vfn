@extends('guest.layouts.master')
@section('title', 'Bảng Giá')
@section('contents')
    <div class="col-lg-12">
        <div class="alert alert-danger">
            <strong>
                <marquee>BẢNG GIÁ HỆ THỐNG VIP TẠI VIPFBNOW.COM - ĐẠI LÝ + CTV VUI LÒNG INBOX ADMIN ĐỂ NHẬN ĐƯỢC ƯU ĐÃI
                    HẤP DẪN
                </marquee>
            </strong>
        </div>


        <button type="button" class="close" data-dismiss="modal">×</button>
    </div>
    <div class="modal-body">
        <ul class="nav nav-tabs">
            <li class="active">
                <a href="#like" data-toggle="tab">VIP LIKE</a>
            </li>
            <li><a href="#cmt" data-toggle="tab">VIP CMT</a>
            </li>
            <li><a href="#reaction" data-toggle="tab">VIP REACTION</a>
            </li>
            <li><a href="#share" data-toggle="tab">VIP Share</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="like">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="color:red">
                            <th>ID</th>
                            <th>Max Like</th>
                            <th>Limit Post</th>
                            <th>Thời Hạn</th>
                            <th>Giá Tiền</th>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 1</td>
                            <td>150 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>30,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 2</td>
                            <td>300 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>50,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 3</td>
                            <td>500 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>80,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 4</td>
                            <td>700 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>120,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 5</td>
                            <td>1000 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>170,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 6</td>
                            <td>1500 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>250,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Like 7</td>
                            <td>2000 Likes/Post</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>340,000 VNĐ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="cmt">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="color:red">
                            <th>ID</th>
                            <th>Max CMT</th>
                            <th>Limit Post</th>
                            <th>Thời Hạn</th>
                            <th>Giá Tiền</th>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 1</td>
                            <td>20 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>30,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 2</td>
                            <td>40 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>60,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 3</td>
                            <td>80 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>120,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 4</td>
                            <td>120 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>180,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 5</td>
                            <td>180 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>270,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 6</td>
                            <td>240 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>360,000 VNĐ</td>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 7</td>
                            <td>320 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>480,000 VNĐ</td>
                        </tr>

                        </tr>
                        <tr style="font-weight: bold">
                            <td>CMT 8</td>
                            <td>500 CMT</td>
                            <td>50 Bài/Ngày</td>
                            <td>1 Tháng</td>
                            <td>750,000 VNĐ</td>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="tab-pane" id="reaction">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="color:red">
                            <th>ID</th>
                            <th>Số Cảm Xúc</th>
                            <th>Limit Post</th>
                            <th>Thời Hạn</th>
                            <th>Giá Tiền</th>
                        </tr>
                        <tr style="font-weight: bold">
                            <td>Bot CX 1</td>
                            <td>Không Giới Hạn</td>
                            <td>Không Giới Hạn</td>
                            <td>1 Tháng</td>
                            <td>20,000 VNĐ</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane" id="share">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                        <tr style="color:red">
                            <th>ID</th>
                            <th>Max Share</th>
                            <th>Limit Post</th>
                            <th>Thời Hạn</th>
                            <th>Giá Tiền</th>
                        </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div></div>

    </div>
    </div> </div>
    <div id="fb-root"></div>
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/price/index.js') }}" type="text/javascript"></script>
@endsection