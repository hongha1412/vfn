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
    <div class="row" id="dashboard">
        <div class="col-md-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active">
                        <a href="#tab_1" data-toggle="tab">Account</a>
                    </li>
                    <li>
                        <a href="#tab_2" data-toggle="tab">VIP LIKE</a>
                    </li>
                    <li>
                        <a href="#tab_3" data-toggle="tab">VIP CMT</a>
                    </li>
                    <li>
                        <a href="#tab_4" data-toggle="tab">VIP SHARE</a>
                    </li>
                    <li>
                        <a href="#tab_5" data-toggle="tab">CẢM XÚC</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        @component("admin.dashboard._account")
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_2">
                        @component("admin.dashboard._vip")
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_3">
                        @component("admin.dashboard._vipcmt")
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_4">
                        @component("admin.dashboard._vipshare")
                        @endcomponent
                    </div>
                    <div class="tab-pane" id="tab_5">
                        @component("admin.dashboard._camxuc")
                        @endcomponent
                    </div>
                </div>
            </div>
        </div>

        @component("admin.dashboard._logcard")
        @endcomponent

        @component("admin.dashboard._statistic")
        @endcomponent
    </div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/dboard5.js') }}"></script>
@stop