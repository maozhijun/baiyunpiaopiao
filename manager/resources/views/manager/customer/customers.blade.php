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
    <form role="form" method="get">
        <div class="form-inline form-group">
            <input type="hidden" name="mid" value="{{$mid}}">
            <label for="label-account">账号：</label>
            <input name="account" type="text" value="" class="form-control" id="label-account" size="20">
            <button type="submit" class="btn btn-primary">搜索客户</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                @if($isAdmin)
                    <td>管理员</td>
                @endif
                <td>用户账号</td>
                <td>微信号</td>
                <td>首存金</td>
                <td>注册时间</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($customers as $customer)
                <form action="/{{$roleStr}}/customer/edit" method="post">
                <tr>
                    @if($isAdmin)
                        <td>
                            <select name="mid" class="form-control">
                                @foreach($members as $member)
                                    <option value="{{$member->id}}" @if($mid == $member->id)selected @endif>{{$member->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    @endif
                    <td>
                        <input type="text" name="account" value="{{ $customer->account }}">
                    </td>
                    <td>
                        <input type="text" name="wechat" value="{{ $customer->wechat }}">
                    </td>
                    <td>
                        <input type="number" name="first" value="{{ $customer->first_money }}">
                    </td>
                    <td>
                        <input id="label-register" name="register" type="text" value="{{ $customer->registed_at }}"
                               class="form_datetime" size="16">
                    </td>
                    <td width="10%">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{$customer->id}}">
                        <button class="btn btn-xs btn-danger" type="submit">保存</button>
                    </td>
                </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection