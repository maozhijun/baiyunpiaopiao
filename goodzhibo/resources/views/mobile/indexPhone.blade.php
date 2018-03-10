@extends('mobile.layout.base')
@section('title')
    <title>黑土直播</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/homePhone.css?time=201803030001">
@endsection
@section('content')
<body onscroll="ScrollBottom();" style="padding-top: {{$type == 'immediate' ? '178' : '259'}}px;"><!--无日期时178px，有日期时259px-->
    <div id="Navigation">
        <div class="banner">
            <div class="tabBox">
                <a class="football on">足球</a>
                <a class="basketball" href="javascript:location.replace('/m/basketball/{{$type}}.html')">篮球</a>
            </div>
            <button class="filter"></button>
        </div>
        <div class="tab">
            <a class="immediate {{$type == 'immediate' ? 'on' : ''}}" href="javascript:location.replace('/m/football/immediate.html')"><span>即时</span></a>
            <a class="result {{$type == 'result' ? 'on' : ''}}" href="javascript:location.replace('/m/football/result.html')"><span>赛果</span></a>
            <a class="schedule {{$type == 'schedule' ? 'on' : ''}}" href="javascript:location.replace('/m/football/schedule.html')"><span>赛程</span></a>
            <a class="att {{$type == 'lives' ? 'on' : ''}}" href="javascript:location.replace('/m/football/lives.html')"><span>直播</span></a>
        </div>
        @if($type != 'immediate')
        <div class="date"><!--即时和关注请去掉这个div，不能隐藏，一定要去掉-->
            <button class="left" onclick="location.replace('')"></button><!--有disabled状态，当点击后为选中“今天”时，则添加disabled，不允许其点击-->
            <span class="day">{{$date or ''}}</span><span class="week">{{$week or ''}}</span>
            <input value="2018-01-12" type="date" name="time" id="DateChoose" onchange=""><!--onchange处理修改日期时出现的函数-->
            <button class="calendar" onclick="$('#DateChoose').focus();$('#DateChoose').trigger('click');"></button>
            <button class="right"  onclick="location.replace('')" disabled></button><!--有disabled状态，当点击后为选中“今天”时，则添加disabled，不允许其点击-->
        </div>
        @endif
    </div>
    @if(isset($matches) && count($matches) > 0)
    <ul id="List" class="football" style="display: block;">
        <?php
            $a = array(2,4,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
            $ads = array('ad_center_8.gif','ad_center_2.png','ad_center_3.gif','ad_center_4.gif','ad_center_5.gif','ad_center_6.gif','ad_center_7.gif');
//            $ads = ['liuliang_lh.gif', 'liuliang_lh.gif', 'liuliang_lh.gif', 'liuliang_lh.gif', 'liuliang_lh.gif'];
            $random_ad_keys=array_rand($ads, 4);
            $random_keys=array_rand($a, 8);
            $bj = 0;
        ?>
        @foreach($matches as $match)
            @if($bj == ($random_keys[0]) && !$match['hide'])
                <a class="banner" href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[0]]}}"></a>
            @elseif($bj == ($random_keys[1]) && !$match['hide'])
                <a class="banner" href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[1]]}}"></a>
            @elseif($bj == ($random_keys[2]) && !$match['hide'])
                <a class="banner" href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[2]]}}"></a>
            @elseif($bj == ($random_keys[3]) && !$match['hide'])
                <a class="banner" href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[3]]}}"></a>
            @endif
            <?php
            if(!$match['hide'])
                $bj++;
            ?>
            <?php $isFirst = $type == 'lives' || (($match['genre'] >> 1 & 1) == 1); ?>
            <a @if(!$isFirst) style="display: none;" @endif class="li" href="/m/football/detail/{{date('Ymd', strtotime($match['time']))}}/{{$match['mid']}}.html" lid="{{$match['lid']}}">
                <div class="part">
                    <p class="time">{{date('H:i', strtotime($match['time']))}}</p>
                    <p class="league">{{$match['league_name']}}</p>
                </div>
                <div class="part">
                    <p class="team"><img src="{{$match['home_icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'">{{$match['hname']}}</p>
                    <p class="team"><img src="{{$match['away_icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'">{{$match['aname']}}</p>
                </div>
                <div class="part">
                    <p class="score">{{$match['hscore']}}</p>
                    <p class="score">{{$match['ascore']}}</p>
                </div>
                @if($match['wap_live'])
                    <div class="part" onclick="event.preventDefault();location.href='/m/live/football/{{$match['mid']}}.html'"><!--直播中的比赛，直接进入直播界面-->
                        @if($match['status'] > 0)
                        <p class="live"><span>直播中&nbsp;&nbsp;{{strip_tags($match['matchTime'])}}</span><img src="{{env('CDN_URL')}}/img/icon_video_live.png"></p>
                        @else
                            <p class="live"><img src="{{env('CDN_URL')}}/img/icon_video_live.png">{{$match['status'] == -1 ? '已结束' : ''}}</p>
                        @endif
                    </div>
                @else
                    <div class="part">
                        <p class="live"><em>暂无直播</em></p>
                    </div>
                @endif
            </a>
        @endforeach
    </ul>
    @endif
    <div class="separated nolist">暂时无直播比赛</div>
    <div id="Filter" style="display: none;">
        <div class="default">
            <div class="title">赛事筛选<button class="close"></button></div>
            <div class="league">
                <input type="radio" name="league_type" id="League_Type_All" checked>
                <label for="League_Type_All">全部</label>
                <input type="radio" name="league_type" id="League_Type_Lottery">
                <label for="League_Type_Lottery">五大联赛</label>
                <input type="radio" name="league_type" id="League_Type_One">
                <label for="League_Type_One">一级联赛</label>
                {{--<input type="radio" name="league_type" id="League_Type_Football">--}}
                {{--<label for="League_Type_Football">足彩</label>--}}
                {{--<input type="radio" name="league_type" id="League_Type_BJ">--}}
                {{--<label for="League_Type_BJ">北单</label>--}}
                @if(isset($league_array) && isset($matches) && count($matches) > 0)
                <ul id="League_All">
                    @foreach($league_array as $letter=>$leagues)
                        @foreach($leagues as $lid=>$league)
                            <li>
                                <input checked type="checkbox" name="league" id="League_ALL_{{$lid}}" value="{{$lid}}">
                                <label for="League_ALL_{{$lid}}">{{$league['name']}}</label>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
                <ul id="League_Lottery" style="display: none;">
                    @foreach($league_array as $letter=>$leagues)
                        @foreach($leagues as $lid=>$league)
                            @if($league['isFive'])
                            <li>
                                <input checked type="checkbox" name="league" id="League_Lottery_{{$lid}}" value="{{$lid}}">
                                <label for="League_Lottery_{{$lid}}">{{$league['name']}}</label>
                            </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                <ul id="League_One" style="display: none;">
                    @foreach($league_array as $letter=>$leagues)
                        @foreach($leagues as $lid=>$league)
                            @if($league['isFirst'])
                                <li>
                                    <input checked type="checkbox" name="league" id="League_One_{{$lid}}" value="{{$lid}}">
                                    <label for="League_One_{{$lid}}">{{$league['name']}}</label>
                                </li>
                            @endif
                        @endforeach
                    @endforeach
                </ul>
                @endif
            </div>
            <div class="btnline">
                <input type="checkbox" name="league" id="League_Choose_All">
                <label for="League_Choose_All">全选</label>
                <button class="reset" id="Reset">重置</button>
                <button class="comfirm" id="btn_confirm">确定</button><!--确认函数开发自己写，需要触发SetUserChoose()，保存用户选择-->
            </div>
        </div>
    </div>
</body>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/homePhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/publicPhone.js"></script>
<script type="text/javascript">
    window.onload = function () {
        SetFilter(); //这里是即时、赛程、赛果才有
        SetAtt();
        //SetFilter()初始化后会有UserChoose参数。可使用这个参数重新获取列表内容
        //SetAtt()会对每个比赛增加控制关注函数及判断是否已经关注，每次列表请求后都需要添加一下
    }
</script>
@endsection