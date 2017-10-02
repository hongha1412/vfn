@extends('guest.layouts.master')
@section('title', 'Get Token')
@section('contents')
    <div class="row">
        <div class="container">
            <h2>Get Token iPhone Full Quyền</h2>
            <div class="panel-group">
                <div class="panel panel-primary">
                    <div class="panel-heading">Không Bị Checkpoint 100%</div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="usr">ID Facebook:</label>
                            <input type="text" class="form-control" id="user" data-bind="value: user, enable: isEnable" />
                        </div>
                        <div class="form-group">
                            <label for="pwd">Pass Facebook:</label>
                            <input type="text" class="form-control" id="pass" data-bind="value: pass, enable: isEnable" />
                        </div>
                        <button type="button" class="btn btn-danger" data-bind="click: getToken, enable: isEnable" >Lấy Token</button>
                        <p>
                            {{--<li id="trave" class="list-group-item"><img src="https://i.imgur.com/4xwpZzp.png"> </li>--}}
                            <li id="trave" class="list-group-item"><textarea class="form-control" data-bind="value: accessCode, enable: isEnable"></textarea></li>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="text" style="display: none;" value="{{ route('guest.getTokenProcess') }}" id="getTokenProcessURL" />
@endsection

@section('page_js')
    <script src="{{ asset('assets/scripts/guest/get_token/index.js') }}" type="text/javascript"></script>
@endsection