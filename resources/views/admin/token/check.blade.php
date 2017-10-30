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
<div class="row" id="token-check">
    <div class="panel-body">
        <center>Tổng Token : <span id="checking" style="font-weight: bold; color: blue"><span>0</span></span></center>
        
        <form method="POST" v-on:submit.prevent="checktoken()">

            <textarea id="listToken" :disabled="loading" v-model="fillItem.tokens" class="form-control" rows="7" placeholder="Vui lòng nhập Token vào đây. Mỗi token một dòng." style="text-align: center;"></textarea>
            <span v-if="formErrors['tokens']" class="error text-danger">@{{ formErrors['tokens'] }}</span>
            </br>

            <div class="row">
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-warning " id="submit">Kiểm Tra <i v-show="loading" class="fa fa-spinner" aria-hidden="true"></i></button>
                </div>
            </div>
        </form>

        <div class="row">
            <div class="col-sm-6 text-center">
                <button  class="btn btn-success" type="button">  Token sống <span class="badge live">@{{ totalTokenLive }}</span></button>
                <textarea disabled id="liveaccount" v-model="fillItem.token_live" class="form-control" rows="7" style="border-color: #285e8e; margin-top: 10px; text-align: center;"></textarea>
            </div>
            <div class="col-sm-6 text-center">
                <button class="btn btn-danger" type="button">
                Token chết <span class="badge die">@{{ totalTokenDie }}</span>
                </button>
                <textarea disabled id="dieaccount" v-model="fillItem.token_die" class="form-control" rows="7" style="border-color: #ac2925; margin-top: 10px; text-align: center;"></textarea>
            </div>    
        </div>
    </div>
</div>
@stop

@section('js')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.26/vue.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/vue.resource/0.9.3/vue-resource.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/scripts/admin/token-check.js') }}"></script>
@stop