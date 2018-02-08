@extends('pc.layout.base_new')
@section('content')
    <div id="Content" class="inner">
        <div id="Info">
            <div class="mes">
                <p>{{$match['lname']}}&nbsp;{{isset($match['round'])?'-&nbsp;第'.$match['round'].'轮':''}}</p>
                <?php
                $week = array('周日','周一','周二','周三','周四','周五','周六');
                ?>
                <p>比赛时间：{{ Carbon\Carbon::parse($match['time'])->format('Y-m-d') }}&nbsp;&nbsp;{{ Carbon\Carbon::parse($match['time'])->format('H:i') }}&nbsp;&nbsp;{{$week[date("w",strtotime($match['time']))]}}</p>
            </div>
            <div class="team host">
                <div class="icon">
                    <img src="{{strlen($match['hicon']) > 0 ? $match['hicon'] : (env('CDN_URL') . '/img/pc/icon_teamDefault.png')}}">
                </div>
                <p>
                    <span class="team">{{$match['hname']}}</span>
                    @if((isset($match['hrank']) && $match['hrank'] > 0))
                    <span class="league">【排名{{isset($hrank) ? $hrank : $match['hrank']}}】</span>
                    @endif
                </p>
            </div>
            @if($match['status'] > 0 || $match['status'] == -1)
                <div class="score">{{$match['hscore']}} - {{$match['ascore']}}</div>
            @else
                <div class="score">VS</div>
            @endif
            <div class="team away">
                <div class="icon">
                    <img src="{{strlen($match['aicon']) > 0 ? $match['aicon'] : (env('CDN_URL') . '/img/pc/icon_teamDefault.png')}}">
                </div>
                <p>
                    <span class="team">{{$match['aname']}}</span>
                    @if(isset($arank) || (isset($match['arank']) && $match['arank'] > 0))
                        <span class="league">【排名{{isset($arank)?$arank:$match['arank']}}】</span>
                    @endif
                </p>
            </div>
            <div class="clear"></div>
        </div>
        <div id="Tabbar">
            <a class="tab{{$type=='asia'?' on':''}}" onclick="showOdd('asia', this);">亚盘</a>
            <a class="tab{{$type=='goal'?' on':''}}" onclick="showOdd('goal', this);">大小球</a>
            <a class="tab{{$type=='ou'?' on':''}}" onclick="showOdd('ou', this);">欧盘</a>
            <a class="match" href="{{\App\Http\Controllers\CommonTool::matchPathWithId($match['id'],$match['time'])}}">[析]</a>
        </div>
        @component('pc.detail.football_odd_cell', ['type'=>'asia', 'odds'=>$odds, 'status'=>$match['status'], 'show'=>1])
        @endcomponent
        @component('pc.detail.football_odd_cell', ['type'=>'goal', 'odds'=>$odds, 'status'=>$match['status'], 'show'=>0])
        @endcomponent
        @component('pc.detail.football_odd_cell', ['type'=>'ou', 'odds'=>$odds, 'status'=>$match['status'], 'show'=>0])
        @endcomponent
        <div class="clear"></div>
    </div>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/odd.css">
@endsection
@section("js")
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/odd.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            setBG();
        }
        function showOdd(type, thisObj) {
            $("#Tabbar a.tab").removeClass('on');
            $(thisObj).addClass('on');
            $("#Odd.default").hide();
            $("#Odd[type=" + type + "]").show();
        }
        var position = location.href.split('#');
        if (position.length > 1) {
            var type = position[1];
            var odd = $("#Odd[type=" + type + "]");
            if (odd.length > 0) {
                var tab_array = {'asia': 0, 'goal': 1, 'ou': 2};
                var eq = tab_array[type];
                showOdd(type, $("#Tabbar a.tab:eq(" + eq + ")")[0]);
            }
        }
    </script>
@endsection