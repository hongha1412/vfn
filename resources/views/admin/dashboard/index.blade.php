<?php
/**
 * Dashboard
 * Date: 10/10/2017
 * Time: 10:23 PM
 */
?>
@extends('admin.layouts.master')

@section('link-header')
    <meta id="token" name="token" value="{{ csrf_token() }}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Account</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Tài Khoản</th>
                                        <th>Tên Hiển Thị</th>
                                        <th>Trạng Thái</th>
                                        <th>Tiền + ID</th>
                                        <th>Email</th>
                                        <th>Hành Động</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-for="item in items">
                                            <td>@{{ item.id }}</td>
                                            <td>@{{ item.username }}</td>
                                            <td>@{{ item.fullname }}</td>
                                            <td>@{{ item.kichhoat }}</td>
                                            <td>@{{ item.vnd }}</td>
                                            <td>@{{ item.mail }}</td>
                                            <td>    
                                                <button class="btn btn-primary" @click.prevent="editItem(item)">Edit</button>
                                                <button class="btn btn-danger" @click.prevent="deleteItem(item)">Delete</button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="" src="{{ url('assets/scripts/admin/dashboard.js') }}"></script>
@stop