<?php
$roleStr = request()->_roleStr;
$endStr = "";
if (request()->has('gid')) {
    $endStr = "?gid=".request()->input('gid');
}
?>
@extends('layouts.main')
@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),"$roleStr/member/create")?'class=active':'' }}>
            <a href="/{{$roleStr}}/member/create{{$endStr}}">添加成员</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),"$roleStr/members")?'class=active':'' }}>
            <a href="/{{$roleStr}}/members{{$endStr}}">成员列表</a>
        </li>
    </ul>
    <br>
@endsection