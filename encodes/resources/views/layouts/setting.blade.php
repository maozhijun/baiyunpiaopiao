@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'setting/video')?'class=active':'' }}>
            <a href="/setting/video/">视频设置</a>
        </li>
    </ul>
    <br>
@endsection