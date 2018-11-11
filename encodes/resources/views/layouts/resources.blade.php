<?php
use App\Http\Controllers\AuthController;

$black = request()->black;
$qqAccess = !AuthController::isAccess($black, AuthController::BLACK_INDEX_RESOURCE_QQ);
$pptvAccess = !AuthController::isAccess($black, AuthController::BLACK_INDEX_RESOURCE_PPTV);
?>
@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'resources/kball')?'class=active':'' }}>
            <a href="/resources/kball/">K球</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'resources/leisu')?'class=active':'' }}>
            <a href="/resources/leisu/">雷速</a>
        </li>
        @if(env('APP_NAME')=='aikq' || env('APP_NAME')=='aikq1')
            <li role="presentation" {{ starts_with(request()->path(),'resources/ballbar')?'class=active':'' }}>
                <a href="/resources/ballbar/">播吧</a>
            </li>
            {{--<li role="presentation" {{ starts_with(request()->path(),'resources/xbet')?'class=active':'' }}>--}}
                {{--<a href="/resources/xbet/">1XBet</a>--}}
            {{--</li>--}}
        @endif
        <li role="presentation" {{ starts_with(request()->path(),'resources/ssports')?'class=active':'' }}>
            <a href="/resources/ssports/">新英</a>
        </li>
        @if($qqAccess)
        <li role="presentation" {{ starts_with(request()->path(),'resources/qq')?'class=active':'' }}>
            <a href="/resources/qq/">QQ</a>
        </li>
        @endif
        @if($pptvAccess)
        <li role="presentation" {{ starts_with(request()->path(),'resources/pptv')?'class=active':'' }}>
            <a href="/resources/pptv/">PPTV</a>
        </li>
        @endif
        <li role="presentation" {{ starts_with(request()->path(),'resources/longzhu')?'class=active':'' }}>
            <a href="/resources/longzhu/">龙珠</a>
        </li>
        {{--<li role="presentation" {{ starts_with(request()->path(),'resources/cntv')?'class=active':'' }}>--}}
            {{--<a href="/resources/cntv/">电视台</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" {{ starts_with(request()->path(),'resources/baitv')?'class=active':'' }}>--}}
            {{--<a href="/resources/baitv/">BaiTV</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" {{ starts_with(request()->path(),'resources/cctv5')?'class=active':'' }}>--}}
            {{--<a href="/resources/cctv5/">CCTV5</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" {{ starts_with(request()->path(),'resources/sportlive')?'class=active':'' }}>--}}
            {{--<a href="/resources/sportlive/">SportLive(德国)</a>--}}
        {{--</li>--}}
        {{--<li role="presentation" {{ starts_with(request()->path(),'resources/aliez')?'class=active':'' }}>--}}
            {{--<a href="/resources/aliez/">Aliez(老毛子)</a>--}}
        {{--</li>--}}
    </ul>
    <br>
@endsection