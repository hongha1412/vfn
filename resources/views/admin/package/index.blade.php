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
    <div class="row" id="package">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Cài Đặt Package</b>
                </div>
                <div class="panel-body">
                    <form v-on:submit.prevent="submit(fillItem.id)">
                        <div class="form-group">
                            <label for="total">Tổng số</label> <input type="number"
                                class="form-control" name="total" v-model="fillItem.total">
                                <span v-if="formErrors['total']" class="error text-danger">@{{ formErrors['total'] }}</span>
                        </div>
                        <div class="form-group">
                            <label>Kiểu package:</label> <select class="form-control"
                                v-model="fillItem.type" name="type">
                                <option value="0" selected>LIKE</option>
                                <option value="1">COMMENT</option>
                                <option value="2">SHARE</option>
                                <option value="3">REACT</option>
                            </select>
                            <span v-if="formErrors['type']" class="error text-danger">@{{ formErrors['type'] }}</span>
                        </div>
                        <button type="submit" class="btn btn-danger">Lưu</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Quản Lý Package</b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Total</th>
                                    <th>Type</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items">
                                    <td>@{{ item.total }}</td>
                                    <td>@{{ item.type | formatType }}</td>
                                    <td>
                                        <a href="javascript:void(0);" @click.prevent="edit(item)" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
                                        <a href="javascript:void(0);" @click.prevent="showConfirmDelete(item.id)" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Xóa</a>
                                    </td>
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
        @component("admin.layouts._confirm")
        @endcomponent
    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/package.js') }}"></script>
@stop