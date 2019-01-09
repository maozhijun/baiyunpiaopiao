<?php
    $roleStr = request()->_roleStr;
    $role = request()->_role;
    $isAdmin = $role > 0 && $role <= \App\Models\Account::K_ROLE_MANAGER;
    if ($isAdmin) {
        $members = \App\Models\Account::allMembers($role);
    }
?>
@extends('layouts.customer')
@section('css')
    <link href="/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
@endsection
@section('js')
    <script type="text/javascript" src="/js/bootstrap-datetimepicker.min.js" charset="UTF-8"></script>
    <script type="text/javascript" src="/js/locales/bootstrap-datetimepicker.zh-CN.js" charset="UTF-8"></script>
    <script>
        $(".form_datetime").datetimepicker({
            language: 'zh-CN',
            format: 'yyyy-mm-dd hh:ii:ss',
            weekStart: 1,
            todayBtn: 1,
            autoclose: 1,
            todayHighlight: 1,
            startView: 2,
            minView: 0,
            minuteStep:1,
            forceParse: 0
        });
    </script>
@endsection
@section('content')
    <form method="post">
        {{ csrf_field() }}
        <div class="form-inline form-group">
            <input type="hidden" name="mid" value="{{$mid}}">
            <label for="label-account">注册账号：</label>
            <input name="account" type="text" value="" class="form-control" id="label-account" size="15">
            <label for="label-wechat">微信号：</label>
            <input name="wechat" type="text" value="" class="form-control" id="label-wechat" size="15">
            <br><br>
            <label for="label-register">注册时间：</label>
            <input id="label-register" name="register" type="text" value=""
                   class="form_datetime" size="16">
            <label for="label-first">首存金：</label>
            <input name="first" type="number" value="" class="form-control" id="label-first" size="15">
            <br><br>
            <button type="submit" class="btn btn-primary">创建用户</button>
        </div>
    </form>
@endsection