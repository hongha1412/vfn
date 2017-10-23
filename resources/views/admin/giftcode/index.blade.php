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
                    <form v-on:submit.prevent="postGiftcode">
                        <div class="form-group">
                            <label for="quality">Số Lượng</label> <input type="number"
                                class="form-control" name="quality" v-model="fillItem.quality">
                                <span v-if="formErrors['quality']" class="error text-danger">@{{ formErrors['quality'] }}</span>
                        </div>
                        <div class="form-group">
                            <label for="amount1">Mệnh Giá:</label> <input type="text"
                                class="form-control" name="amount" v-model="fillItem.amount">
                            <span v-if="formErrors['amount']" class="error text-danger">@{{ formErrors['amount'] }}</span>
                        </div>
                        <div class="form-group">
                            <label>Thời Hạn:</label> <select class="form-control"
                                v-model="fillItem.time" name="time">
                                <option value="1" selected>1 Ngày</option>
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
                            <span v-if="formErrors['time']" class="error text-danger">@{{ formErrors['time'] }}</span>
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
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Mã Gift</th>
                                    <th>Mệnh Giá</th>
                                    <th>Thời Hạn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in itemsGiftcode">
                                    <td>@{{ item.giftcode }}</td>
                                    <td>@{{ item.amount | formatPrice }}</td>
                                    <td>@{{ item.expiretime | formatDate }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <nav class="pull-right">
                        <ul class="pagination">
                            <li v-if="pagination.current_page > 1">
                                <a href="#" aria-label="Previous"
                                @click.prevent="changePage(pagination.current_page - 1, pagination.per_page)">
                                    <span aria-hidden="true">«</span>
                                </a>
                            </li>
                            <li v-for="page in pagesNumber"
                                v-bind:class="[ page == isActived ? 'active' : '']">
                                <a href="#"
                                @click.prevent="changePage(page, pagination.per_page)">@{{ page }}</a>
                            </li>
                            <li v-if="pagination.current_page < pagination.last_page">
                                <a href="#" aria-label="Next"
                                @click.prevent="changePage(pagination.current_page + 1, pagination.per_page)">
                                    <span aria-hidden="true">»</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
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