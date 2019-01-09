<?php
if (!isset($roleStr)) {
    $roleStr = request()->_roleStr;
}
?>
@extends('layouts.main')
@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),"$roleStr/groups")?'class=active':'' }}>
            <a href="/{{$roleStr}}/groups">小组列表</a>
        </li>
        <li role="presentation">
            <a href="/{{$roleStr}}/excel/export/all">导出excel</a>
        </li>
    </ul>
    <br>
@endsection
@section('content')
    <form action="/{{$roleStr}}/group/create" method="post">
        {{ csrf_field() }}
        <div class="form-inline form-group">
            <label for="label-name">小组名称</label>
            <input name="name" type="text" value="" class="form-control" id="label-name" size="40">
            <button type="submit" class="btn btn-primary">创建小组</button>
        </div>
    </form>
    <form action="/{{$roleStr}}/group/edit" method="post">
        {{ csrf_field() }}
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <td>名称</td>
                    <td>成员数</td>
                    <td>用户量</td>
                    <td>操作</td>
                </tr>
                </thead>
                <tbody>
                @foreach($groups as $group)
                    <tr>
                        <td width="8%">
                            <input type="text" name="name" value="{{ $group->name }}">
                        </td>
                        <td>{{ $group->membersCount() }}</td>
                        <td>{{ $group->customersCount() }}</td>
                        <td width="10%">
                            <input type="hidden" name="id" value="{{$group->id}}">
                            <button class="btn btn-xs btn-danger" type="submit">保存</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </form>
@endsection