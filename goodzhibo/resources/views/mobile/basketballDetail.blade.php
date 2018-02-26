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
    <div id="Tab" class="tab">
        <input type="radio" name="tab_type" id="Type_Match" value="Match" checked>
        <label for="Type_Match"><span>赛况</span></label>
        <input type="radio" name="tab_type" id="Type_Data" value="Data">
        <label for="Type_Data"><span>分析</span></label>
        <input type="radio" name="tab_type" id="Type_Odd" value="Odd">
        <label for="Type_Odd"><span>指数</span></label>
    </div>
    <div id="Match" class="content" style="display: ;">
        @component("mobile.basketball_detail_cell.base_cell",['match'=>$match])
        @endcomponent
    </div>
    <div id="Data" class="content" style="display: none;">
        @if(!is_null($odd) && array_key_exists('bankers',$odd))
            <div class="odd default">
                @component('mobile.cell.football_detail_odd', ['bankers'=>$odd['bankers']])
                @endcomponent
            </div>
        @endif
        @component('mobile.basketball_detail_cell.analyse_battle_cell', ['base'=>$base['base'], 'match'=>$base['match']])
        @endcomponent
    </div>
    <div id="Odd" class="content" style="display: none;">
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
    window.cdn_url = '{{env('CDN_URL')}}';
    window.onload = function () {
        setPage()
    }
    window.onscroll = function () {
        setHead();
    }

    window.mid = '{{$id}}';
    window.startTime = '{{date('Ymd', strtotime($match['time']))}}';
    var indexOddUrl = getCdnUrl('/m/basketball/detail/odd/' + window.startTime + '/{{$id}}.html');
    indexOddUrl = '/m/basketball/detail/odd/' + window.startTime + '/{{$id}}.html';
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

    function getOddIndex(id) {
        Alert('loading', '加载中');
        var oddIndexUrl = getCdnUrl('/m/basketball/detail/odd_index/' + window.startTime + '/' + window.mid + '.html');
        oddIndexUrl = '/m/basketball/detail/odd_index/' + window.startTime + '/' + window.mid + '.html';
        $.ajax({
            'url': oddIndexUrl,
            'type': 'get',
            'dataType': 'html',
            'success': function (html) {
                window.oddIndexGet = true;
                $("#" + id).html(html);
                var BottomTab = $('#' + id + ' .bottom input');
                BottomTab.change(function(){
                    $(this).parents('.content').children('.childNode').css('display','none');
                    $('#' + this.value).css('display','');
                });
                closeLoading();
            },
            "error": function () {
                closeLoading();
            }
        });
    }
</script>
@endsection