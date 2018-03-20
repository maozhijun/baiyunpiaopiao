@extends('mobile.layout.base')
@section('title')
    <title>黑土体育</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/matchPhone.css">
@endsection
@section('content')
<div id="Navigation">
    <div class="banner">
        <a href="/m/football/immediate.html" class="home"></a>
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
        @if(isset($base['rank']) && isset($base['rank']['leagueRank']))
            <p class="rank">排名：{{$base['rank']['leagueRank']['hLeagueName'].$base['rank']['leagueRank']['hLeagueRank']}}</p>
        @else
            <p class="rank">排名：{{$match['hrank']}}</p>
        @endif
    </div>
    <div class="info">
        <p class="minute">{{$match['current_time']}}</p>
        <p class="score">
            <span class="host">{{$match['hscore']}}</span>
            <span class="away">{{$match['ascore']}}</span>
        </p>
        @if($match['status'] > 0 && isset($match['live2']) && $match['live2']))
            <a href="/m/live/football/{{$id}}.html" class="live">正在直播</a>
        @else
            <a href="/m/live/football/{{$id}}.html" class="live" style="display: none">正在直播</a>
        @endif
    </div>
    <div class="team">
        <p class="img"><img src="{{$match['aicon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
        <p class="name">{{$match['aname']}}</p>
        @if(isset($base['rank']) && isset($base['rank']['leagueRank']))
            <p class="rank">排名：{{$base['rank']['leagueRank']['aLeagueName'].$base['rank']['leagueRank']['aLeagueRank']}}</p>
        @else
            <p class="rank">排名：{{$match['arank']}}</p>
        @endif
    </div>
</div>
<div id="Tab" class="tab">
    <input type="radio" name="tab_type" id="Type_Match" value="Match" checked>
    <label for="Type_Match"><span>赛况</span></label>
    <input type="radio" name="tab_type" id="Type_Data" value="Data">
    <label for="Type_Data"><span>分析</span></label>
    <input type="radio" name="tab_type" id="Type_Team" value="Team">
    <label for="Type_Team"><span>球队</span></label>
    <input type="radio" name="tab_type" id="Type_Odd" value="Odd">
    <label for="Type_Odd"><span>指数</span></label>
    <input type="radio" name="tab_type" id="Type_SameOdd" value="SameOdd">
    <label for="Type_SameOdd"><span>同赔</span></label>
</div>
<div id="Match" class="content" style="display: ;">
    @component("mobile.football_detail_cell.base_cell",['match'=>$match, 'tech'=>$tech, 'lineup'=>$lineup, 'events'=>$events])
    @endcomponent
</div>
<div id="Data" class="content" style="display: none;">
    @if(isset($odds) && count($odds) > 0)
        <div class="odd default">
            @component('mobile.cell.football_detail_odd', ['bankers'=>$odds])
            @endcomponent
        </div>
    @endif
    @component('mobile.football_detail_cell.analyse_battle_cell', ['base'=>$base, 'match'=>$match])
    @endcomponent
</div>
<div id="Team" class="content" style="display: none;">
    @component("mobile.football_detail_cell.team_cell",['match'=>$match, 'base'=>$base])
    @endcomponent
</div>
<div id="Odd" class="content" style="display: none;">
    @component("mobile.cell.football_detail_odd_index",['odds'=>$odds])
    @endcomponent
</div>
<div id="SameOdd" class="content" style="display: none;">
    @component("mobile.cell.football_detail_same_odd",['base'=>$base])
    @endcomponent
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/jquery.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/publicPhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/matchPhone.js"></script>
<script type="text/javascript">
    {{--function getCdnUrl(url) {--}}
        {{--var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';--}}
        {{--var url = http + '{{env('CDN_URL')}}' + url;--}}
        {{--return url;--}}
    {{--}--}}
    window.cdn_url = '{{env('CDN_URL')}}';
    window.onload = function () {
        setPage();
        setCanvas();
    }
    window.onscroll = function () {
        setHead();
    }
    @if(isset($aacc))
        window.mid = '{{$id}}';
        window.startTime = '{{date('Ymd', strtotime($match['time']))}}';
        var indexOddUrl = getCdnUrl('/m/football/detail/odd/' + window.startTime + '/{{$id}}.html');
        $.ajax({
            url: indexOddUrl,
            success:function (html) {
                if (html == "") {
                    $('#Data div.odd').hide();
                } else {
                    $('#Data div.odd').show();
                    $('#Data div.odd').html(html);
                }
                //$('#Data_Odd').html(html);
            },
            error:function() {
                //$('#Data_Odd')[0].style.display = 'none';
            }
        });
        @if($match['status'] > 0)
        setInterval("refreshMatch('{{$id}}')", 5000);
        setInterval("hasLive('{{$id}}')", 5000);
        @endif
    @endif
</script>
@endsection