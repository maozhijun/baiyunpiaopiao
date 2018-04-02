@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        @if(env('APP_NAME')=='good')
            <li role="presentation" {{ starts_with(request()->path(),'manager/hei')?'class=active':'' }}>
                <a href="/manager/hei/">黑土转码</a>
            </li>
        @elseif(env('APP_NAME')=='aikq')
            <li role="presentation" {{ starts_with(request()->path(),'manager/qq')?'class=active':'' }}>
                <a href="/manager/qq/">爱看球转码</a>
            </li>
        @endif
        <li role="presentation" {{ starts_with(request()->path(),'manager/other')?'class=active':'' }}>
            <a href="/manager/other/">自定义转码</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/longzhu')?'class=active':'' }}>
            <a href="/manager/longzhu/">龙珠直播</a>
        </li>
        {{--<li role="presentation" {{ starts_with(request()->path(),'manager/qie')?'class=active':'' }}><a href="/manager/qie/">企鹅直播</a></li>--}}
        {{--<li role="presentation" {{ starts_with(request()->path(),'manager/quanmin')?'class=active':'' }}><a href="/manager/quanmin/">全民直播</a></li>--}}
        <li role="presentation" {{ starts_with(request()->path(),'manager/weibo')?'class=active':'' }}>
            <a href="/manager/weibo/">微博直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/kuku')?'class=active':'' }}>
            <a href="/manager/kuku/">酷酷直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/zhibo')?'class=active':'' }}>
            <a href="/manager/zhibo/">中国直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/very')?'class=active':'' }}>
            <a href="/manager/very/">乐天堂CDN</a>
        </li>
    </ul>
    <br>
@endsection