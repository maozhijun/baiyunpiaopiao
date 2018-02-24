@extends('mobile.layout.base')
@section('title')
    <title>黑土体育</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/matchPhone_bk.css">
@endsection
@section('content')
    <div id="Navigation">
        <div class="banner">
            <a href="/m/basketball/immediate.html" class="home"></a>
            <a class="team" href="" style="opacity: 0;"><!--有直播就用a标签，如果没有就用div-->
                <p class="host">{{$match['hname']}}</p>
                <p class="score">
                    @if($match['status'] > 0 || $match['status'] == -1) {{$match['hscore']}} - {{$match['ascore']}} @else VS @endif
                    @if(isset($match['wap_live']) && $match['wap_live'])<span>[直播]</span>@endif
                </p><!--有直播就用加span-->
                <p class="away">{{$match['aname']}}</p>
            </a>
            {{$match['league']}}{{!empty($match['round']) ? '&nbsp;&nbsp;第' . $match['round'] . '轮' : ''}}
        </div>
    </div>
    <div id="Info">
        <div class="team">
            <p class="img"><img src="{{$match['hicon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
            <p class="name">{{$match['hname']}}</p>
            @if(isset($match['hrank']))<p class="rank">排名：{{$match['hrank']}}</p>@endif
        </div>
        <div class="info">
            <p class="minute">{{$match['live_time_str']}}</p>
            <p class="score">
                <span class="host">{{$match['hscore']}}</span>
                <span class="away">{{$match['ascore']}}</span>
            </p>
            <a href="videoPhone.html" @if(!isset($match['live2']) || !$match['live2']) style="display: none;" @endif class="live">正在直播</a>
        </div>
        <div class="team">
            <p class="img"><img src="{{$match['aicon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
            <p class="name">{{$match['aname']}}</p>
            @if(isset($match['arank']))<p class="rank">排名：{{$match['arank']}}</p>@endif
        </div>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/jquery.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/match_bk.js"></script>
<script type="text/javascript">
    {{--function getCdnUrl(url) {--}}
        {{--var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';--}}
        {{--var url = http + '{{env('CDN_URL')}}' + url;--}}
        {{--return url;--}}
    {{--}--}}
    window.cdn_url = '{{env('CDN_URL')}}';
    window.onload = function () {
        //setPage()
    }
    window.onscroll = function () {
        setHead();
    }
</script>
@endsection