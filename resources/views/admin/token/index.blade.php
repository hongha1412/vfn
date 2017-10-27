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
    <div class="row" id="fbtoken">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b><i class="fa fa-gears"></i> Quản Lý Token</b>
                </div>
                <div class="panel-body">
                    <div class="form-inline" style="padding-bottom: 10px">
                        <div class="form-group">
                            <select v-model="pagination.per_page" v-on:change="changePage(pagination.current_page - 1, pagination.per_page)" class="form-control" style="width: 80px">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="30">30</option>
                                <option value="40">40</option>
                                <option value="50">50</option>
                            </select>
                        </div>
                        <div class="form-group pull-right">
                            <label for="search">Tìm kiếm:</label>
                            <input type="search" class="form-control" id="search" v-model="pagination.search_key" v-on:change="changePage(pagination.current_page - 1, pagination.per_page)">
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><input type="checkbox"></th>
                                    <th>Facebook ID</th>
                                    <th>Tên</th>
                                    <th>Token</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in items">
                                    <td><input type="checkbox" v-bind:value="item.id"></td>
                                    <td>@{{ item.idfb }}</td>
                                    <td>@{{ item.ten }}</td>
                                    <td>@{{ item.token }}</td>
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
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/token.js') }}"></script>
@stop