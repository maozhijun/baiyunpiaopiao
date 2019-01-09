<?php
$roleStr = request()->_roleStr;
$role = request()->_role;
$isAdmin = $role > 0 && $role <= \App\Models\Account::K_ROLE_MANAGER;
if ($isAdmin) {
    $groups = \App\Models\Group::allGroups();
}
?>
@extends('layouts.member')
@section('content')
    <form method="post" onsubmit="return verifyForm(this)">
        {{ csrf_field() }}
        <div class="form-inline form-group">
            <input type="hidden" name="gid" value="{{$gid}}">
            <label for="label-name">成员名：</label>
            <input name="name" type="text" value="" class="form-control" id="label-name" size="20">
            <label for="label-role">角色：</label>
            <select name="role" class="form-control" id="label-role">
                @foreach(\App\Models\Account::MANAGER_ROLES as $index=>$roleItem)
                    @if($index > $role)
                        <option value="{{$index}}" @if($index == \App\Models\Account::K_ROLE_MEMBER)selected @endif>{{$roleItem['ch']}}</option>
                    @endif
                @endforeach
            </select>
            <br><br>
            <label for="label-account">登录账号：</label>
            <input name="account" type="text" value="" class="form-control" id="label-account" size="15">
            <label for="label-password">登录密码：</label>
            <input name="password" type="text" value="" class="form-control" id="label-password" size="15">
            <br><br>
            <button type="submit" class="btn btn-primary">创建小组成员</button>
        </div>
    </form>
@endsection

@section('js')
    <script src="/js/sha1.js"></script>
    <script>
        function verifyForm(form) {
            if (form.account.value === '' || form.password.value === '') {
                toastr.error('用户名或者密码不能为空');
                return false;
            }
            form.password.value = sha1(form.password.value);
            return true;
        }
    </script>
@endsection