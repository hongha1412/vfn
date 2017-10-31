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
<div class="row" id="token-report">
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa  fa-paper-plane-o"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">TỔNG TOKEN</span>
                <span class="info-box-number">+ @{{ totalTokenLive }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: 70%"></div>
                    </div>
                        <span class="progress-description">
                            Đang Hoạt Động
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/token-report.js') }}"></script>
@stop