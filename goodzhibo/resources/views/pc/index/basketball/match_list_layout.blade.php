@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/immediate_bk.css">
    <style>
        .show {

        }
        .hide {
            display: none;
        }
    </style>
@endsection
@section('content')
    <div id="Content" class="inner">
        <div id="MatchList" class="default">
            <div class="title">@yield('match_title')</div>
            <div class="control">
                <button name="filter" class="save" onclick="confirmFilter('match', false)">保留</button>
                <button name="filter" class="del" onclick="confirmFilter('match', true)">删除</button>
                <button name="filter" id="nba" class="nba" onclick="matchFilter('nba')">NBA版</button>
                <button name="filter" id="live" class="video" onclick="matchFilter('live')">直播</button>
                <button name="filter" id="all" class="all on" onclick="matchFilter('all')">完整</button>
                <button class="show league">选择赛事</button>
                <p>
                    共<b id="totalMatchCount">{{$matchCount}}</b>场&nbsp;&nbsp;
                    隐藏<b id="hideMatchCount">{{$hideMatchCount}}</b>场&nbsp;&nbsp;<span onclick="matchFilter('all')">[ 显示 ]</span>
                </p>
            </div>
            <?php
                $ad_1 = random_int(0, min(count($matches), 13));
                $ad_2 = random_int(0, min(count($matches), 15));
            ?>
            @foreach($matches as $index=>$match)
                @component("pc.index.basketball.cell.basket_list_cell", ['match'=>$match])
                @endcomponent
                @if($ad_1 == $index)
                    <div class="adbanner default"><a target="_blank"><img src="{{env('CDN_URL')}}/img/ad_center_1.gif"><button class="close"></button></a></div>
                @endif
                @if($ad_2 == $index)
                    <div class="adbanner default"><a target="_blank"><img src="{{env('CDN_URL')}}/img/ad_center_2.gif"><button class="close"></button></a></div>
                @endif
            @endforeach
            @foreach($exceptionMatches as $match)
                @component("pc.index.basketball.cell.basket_list_cell", ['match'=>$match])
                @endcomponent
            @endforeach
        </div>
        <div class="clear"></div>
        <a href="#Navigation" id="BackTop"></a>
    </div>
@endsection
@section('bottom')
    <div class="pop" id="LeagueFilter" style="display: none;">
        <div class="filter">
            <div class="title">
                选择赛事
                <button class="close"></button>
            </div>
            <div class="bottom">
                <button class="all">全部</button><button class="opposite">反选</button><button onclick="confirmFilter('league', false)" class="confirm">确认</button>
            </div>
            <ul>
                @foreach($league_array as $key=>$leagues)
                    <li>
                        <b>{{$key}}</b>
                        @foreach($leagues as $league)
                            <button value="{{$league['id']}}" class="item"><span></span>{{$league["name"]}}({{$league["count"]}})</button>
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="adflag left">
        <button class="close" onclick="this.parentNode.parentNode.removeChild(this.parentNode)"></button>
        <a target="_blank"><img src="{{env('CDN_URL')}}/img/ad_left.gif"></a>
    </div>
    <div class="adflag right">
        <button class="close" onclick="this.parentNode.parentNode.removeChild(this.parentNode)"></button>
        <a target="_blank"><img src="{{env('CDN_URL')}}/img/ad_right.gif"></a>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/immediate_bk.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/util.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/basketball-list.js"></script>
    <script type="text/javascript">
        function getCdnUrl(url) {
            var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';
            var url = http + '{{env('CDN_URL')}}' + url;
            return url;
        }
        window.onload = function () {
            setTableCheck ();
            setFilter ();
            //setBackTop();
            window.setInterval('refresh()',5000);
            window.setInterval('refreshRoll()',5000);
            refreshRoll();
            @if (!isset($type) || $type != 'result')
            //window.setInterval('refreshRoll()',5000);
            @endif
            // $('#TableHead').width($('#Show').width());
        }
        var divDate = $('#MatchList div.title div.date');

        if (divDate.length == 1) {
            divDate.find('button').click(function () {
                var d = divDate.find('input').val();
                var url = location.href;
                var type = url.match(/\/(\w+)\.html/)[1];
                d = d.replace(/[-|/]/g, '');
                location.href = '/basketball/' + d + '/' + type + '.html';
            });
        }

        $("#BackTop").click(function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>
@endsection
<!--[if lte IE 8]>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/publics/pc/jquery_191.js"></script>
<![endif]-->
