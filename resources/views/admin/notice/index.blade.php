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
    <div class="row" id="notice">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <b>Thay Đổi Thống Báo</b>
                </div>
                <div class="panel-body">
                    <form method="POST" v-on:submit.prevent="submitNotice(itemNotice.id)">
                        <div class="form-group">
                            <textarea type="text" class="form-control" name="text" id="text" v-model="itemNotice.text"></textarea>
                        </div>
                        <button type="submit" name="thongbao" class="btn btn-danger">Đăng
                            Thông Báo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/notice.js') }}"></script>
@stop