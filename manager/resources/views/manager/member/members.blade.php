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
    <form role="form" method="get">
        <div class="form-inline form-group">
            <input type="hidden" name="gid" value="{{$gid}}">
            <label for="label-name">成员名：</label>
            <input name="name" type="text" value="" class="form-control" id="label-name" size="20">
            <button type="submit" class="btn btn-primary">搜索成员</button>
        </div>
    </form>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                @if($isAdmin)
                    <td>小组</td>
                    <td>角色</td>
                @endif
                <td>成员名</td>
                <td>登录账号</td>
                <td>登录密码</td>
                <td>用户量</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($members as $member)
                <form action="/{{$roleStr}}/member/edit" method="post" onsubmit="return verifyForm(this)">
                    <tr>
                        @if($isAdmin)
                            <td>
                                <select name="gid" class="form-control">
                                    @foreach($groups as $group)
                                        <option value="{{$group->id}}" @if($gid == $group->id)selected @endif>{{$group->name}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select name="role" class="form-control" id="label-role" @if($member->role <= $role) disabled @endif>
                                    @foreach(\App\Models\Account::MANAGER_ROLES as $index=>$roleItem)
                                        @if($index > $role)
                                            <option value="{{$index}}" @if($index == $member->role)selected @endif>{{$roleItem['ch']}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </td>
                        @endif
                        <td width="8%">
                            <input type="text" name="name" value="{{ $member->name }}">
                        </td>
                        <td>
                            <input type="text" name="account" value="{{ $member->account }}">
                        </td>
                        <td>
                            <input type="text" name="password" value="">
                        </td>
                        <td>
                            <a href="/{{$roleStr}}/customers?mid={{$member->id}}&gid={{$gid}}">{{ $member->customersCount() }}</a>
                        </td>
                        <td width="10%">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="{{$member->id}}">
                            <button class="btn btn-xs btn-danger" type="submit">保存</button>
                        </td>
                    </tr>
                </form>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('js')
    <script src="/js/sha1.js"></script>
    <script>
        function verifyForm(form) {
            if (form.password.value != '') {
                form.password.value = sha1(form.password.value);
            }
            return true;
        }
    </script>
@endsection