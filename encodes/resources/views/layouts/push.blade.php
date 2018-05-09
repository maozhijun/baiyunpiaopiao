@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        @if(env('APP_NAME')=='good')
            {{--<li role="presentation" {{ starts_with(request()->path(),'manager/hei')?'class=active':'' }}>--}}
            {{--<a href="/manager/hei/">黑土转码</a>--}}
            {{--</li>--}}
        @elseif(env('APP_NAME')=='aikq')
            {{--<li role="presentation" {{ starts_with(request()->path(),'manager/qq')?'class=active':'' }}>--}}
            {{--<a href="/manager/qq/">爱看球转码</a>--}}
            {{--</li>--}}
        @endif
        <li role="presentation" {{ starts_with(request()->path(),'manager/other')?'class=active':'' }}>
            <a href="/manager/other/">自定义转码</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/longzhu')?'class=active':'' }}>
            <a href="/manager/longzhu/">龙珠直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/weibo')?'class=active':'' }}>
            <a href="/manager/weibo/">微博直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/huajiao')?'class=active':'' }}>
            <a href="/manager/huajiao/">花椒直播</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'manager/mi')?'class=active':'' }}>
            <a href="/manager/mi/">小米直播</a>
        </li>
        @if(env('APP_NAME')=='aikq' || env('APP_NAME')=='aikq1')
            <li role="presentation" {{ starts_with(request()->path(),'manager/inke')?'class=active':'' }}>
                <a href="/manager/inke/">映客直播</a>
            </li>
            {{--<li role="presentation" {{ starts_with(request()->path(),'manager/netease')?'class=active':'' }}>--}}
            {{--<a href="/manager/netease/">黄易直播</a>--}}
            {{--</li>--}}
        @endif
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