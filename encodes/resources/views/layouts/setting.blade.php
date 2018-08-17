@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'setting/video')?'class=active':'' }}>
            <a href="/setting/video/">视频设置</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'setting/anchor/channels')?'class=active':'' }}>
            <a href="/setting/anchor/channels/">主播推流地址测试</a>
        </li>
    </ul>
    <br>
@endsection