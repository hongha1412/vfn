<?php
/**
 * Dashboard
 * Date: 10/10/2017
 * Time: 10:23 PM
 */
?>
@extends('admin.layouts.master')

@section('link-head')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="row" id="giftcode">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Cài Đặt Mã Gift Hệ Thống</b>
                </div>
                <div class="panel-body">
                    <form method="POST" v-on:submit.prevent="submitGiftCode()">
                        <div class="form-group">
                            <label for="usr">Số Lượng</label> <input type="text"
                                class="form-control" name="soluong" v-model="itemGiftCode.soluong">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Mệnh Giá:</label> <input type="text"
                                class="form-control" name="menhgia" v-model="itemGiftCode.amount">
                        </div>
                        <div class="form-group">
                            <label>Thời Hạn:</label> <select class="form-control"
                                v-model="itemGiftCode.time" name="thoihan">
                                <option value="1">1 Ngày</option>
                                <option value="3">3 Ngày</option>
                                <option value="5">5 Ngày</option>
                                <option value="7">7 Ngày</option>
                                <option value="10">10 Ngày</option>
                                <option value="15">15 Ngày</option>
                                <option value="30">1 Tháng</option>
                                <option value="60">2 Tháng</option>
                                <option value="90">3 Tháng</option>
                                <option value="120">4 Tháng</option>
                                <option value="150">5 Tháng</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-danger">Lấy Thẻ</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Quản Lý Gift Hệ Thống</b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã Gift</th>
                                    <th>Mệnh Giá</th>
                                    <th>Thời Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in itemsGiftCode">
                                    <td>@{{ item.giftcode }}</td>
                                    <td>@{{ item.amount }}</td>
                                    <td>@{{ item.expiretime }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/giftcode.js') }}"></script>
@stop