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
                    @if(isset($match['live2']) && $match['live2'])<span>[直播]</span>@endif
                </p><!--有直播就用加span-->
                <p class="away">{{$match['aname']}}</p>
            </a>
            {{$match['league']}}
        </div>
    </div>
    <div id="Info">
        <div class="team">
            <p class="img"><img src="{{$match['hicon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
            <p class="name">{{$match['hname']}}</p>
        </div>
        <div class="info">
            <p class="minute">{{$match['live_time_str']}}</p>
            <p class="score">
                <span class="host">{{$match['hscore']}}</span>
                <span class="away">{{$match['ascore']}}</span>
            </p>
            @if($match['status'] > 0)
                <a href="/m/live/basketball/{{$match['mid']}}.html" @if(!isset($match['live2']) || !$match['live2']) style="display: none;" @endif class="live">正在直播</a>
            @endif
        </div>
        <div class="team">
            <p class="img"><img src="{{$match['aicon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
            <p class="name">{{$match['aname']}}</p>
        </div>
    </div>
    <div id="Tab" class="tab">
        <input type="radio" name="tab_type" id="Type_Match" value="Match" checked>
        <label for="Type_Match"><span>赛况</span></label>
        <input type="radio" name="tab_type" id="Type_Data" value="Data">
        <label for="Type_Data"><span>分析</span></label>
        <input type="radio" name="tab_type" id="Type_Odd" value="Odd">
        <label for="Type_Odd"><span>指数</span></label>
    </div>
    <div id="Match" class="content" style="display: ;">
        @component("mobile.basketball_detail_cell.base_cell",['match'=>$match,'tech'=>$tech,'players'=>$players])
        @endcomponent
    </div>
    <div id="Data" class="content" style="display: none;">
        @if(isset($odds) && count($odds) > 0)
            <div class="odd default">
                @component('mobile.cell.football_detail_odd', ['bankers'=>$odds])
                @endcomponent
            </div>
        @endif
        @component('mobile.basketball_detail_cell.analyse_battle_cell', ['base'=>$base, 'match'=>$match])
        @endcomponent
    </div>
    <div id="Odd" class="content" style="display: none;">
        @component('mobile.cell.football_detail_odd_index', ['odds'=>$odds, 'isBasket'=>true])
        @endcomponent
    </div>
    @endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/jquery.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/publicPhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/matchPhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/match_bk.js"></script>
<script type="text/javascript">
    {{--function getCdnUrl(url) {--}}
        {{--var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';--}}
        {{--var url = http + '{{env('CDN_URL')}}' + url;--}}
        {{--return url;--}}
    {{--}--}}
    {{--window.cdn_url = '{{env('CDN_URL')}}';--}}
    window.onload = function () {
        setPage()
    }
    window.onscroll = function () {
        setHead();
    }
</script>
@endsection