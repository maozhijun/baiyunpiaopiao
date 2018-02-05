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
            @foreach($matches as $match)
                @component("pc.index.basketball.cell.basket_list_cell", ['match'=>$match])
                @endcomponent
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
@endsection
@section('js')
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/immediate_bk.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/util.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/basketball-list.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            setTableCheck ();
            setFilter ();
            //setBackTop();
            window.setInterval('refresh()',5000);
            @if (!isset($type) || $type != 'result')
            //window.setInterval('refreshRoll()',5000);
            @endif
            // $('#TableHead').width($('#Show').width());
        }
        var divDate = $('#MatchList div.title div.date');

        if (divDate.length == 1) {
            divDate.find('button').click(function () {
                var d = divDate.find('input').val();
                location.href = '{{$_SERVER['PHP_SELF']}}?date=' + d;
            });
        }
    </script>
@endsection
<!--[if lte IE 8]>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/publics/pc/jquery_191.js"></script>
<![endif]-->
