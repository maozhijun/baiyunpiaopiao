<?php
$roleStr = request()->_roleStr;
$endStr = "";
if (request()->has('mid')) {
    $endStr = "?mid=".request()->input('mid');
    if (request()->has('gid')) {
        $endStr .= "&gid=".request()->input('gid');
    }
}
?>
@extends('layouts.main')
@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),"$roleStr/customer/create")?'class=active':'' }}>
            <a href="/{{$roleStr}}/customer/create{{$endStr}}">添加客户</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),"$roleStr/customers")?'class=active':'' }}>
            <a href="/{{$roleStr}}/customers{{$endStr}}">客户列表</a>
        </li>
    </ul>
    <br>
@endsection