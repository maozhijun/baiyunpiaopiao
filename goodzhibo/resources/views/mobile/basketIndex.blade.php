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
                <a class="football" href="javascript:location.replace('/m/football/{{$type}}.html')">足球</a>
                <a class="basketball on">篮球</a>
            </div>
            <button class="filter"></button>
        </div>
        <div class="tab">
            <a class="immediate {{$type == 'immediate' ? 'on' : ''}}" href="javascript:location.replace('/m/basketball/immediate.html')"><span>即时</span></a>
            <a class="result {{$type == 'result' ? 'on' : ''}}" href="javascript:location.replace('/m/basketball/result.html')"><span>赛果</span></a>
            <a class="schedule {{$type == 'schedule' ? 'on' : ''}}" href="javascript:location.replace('/m/basketball/schedule.html')"><span>赛程</span></a>
            <a class="att {{$type == 'lives' ? 'on' : ''}}" href="javascript:location.replace('/m/basketball/lives.html')"><span>直播</span></a>
        </div>
        @if($type != 'immediate')
        <div class="date"><!--即时和关注请去掉这个div，不能隐藏，一定要去掉-->
            <button class="left" onclick="location.replace('')"></button><!--有disabled状态，当点击后为选中“今天”时，则添加disabled，不允许其点击-->
            <span class="day">{{$date or ''}}</span><span class="week">{{$week or ''}}</span>
            <input value="{{$date or ''}}" type="date" name="time" id="DateChoose" onchange=""><!--onchange处理修改日期时出现的函数-->
            <button class="calendar" onclick="$('#DateChoose').focus();$('#DateChoose').trigger('click');"></button>
            <button class="right"  onclick="location.replace('')" disabled></button><!--有disabled状态，当点击后为选中“今天”时，则添加disabled，不允许其点击-->
        </div>
        @endif
    </div>
    @if(isset($matches) && count($matches) > 0)
    <ul id="List" class="basketball" style="display: block;">
        <?php
        $a = array(2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20);
//        $ads = array('ad_center_8.gif','ad_center_2.png','ad_center_3.gif','ad_center_4.gif','ad_center_5.gif','ad_center_6.gif','ad_center_7.gif');
        $ads = ['mobile/dd/hg_1.gif', 'mobile/dd/hg_2.gif', 'mobile/dd/hg_3.gif', 'mobile/dd/hg_4.gif'];
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
            <?php $live_str = \App\Models\Match\BasketMatch::getBasketCurrentTime($match['status'], $match['live_time_str'], $match['system'] == 1) ?>
            <a class="li" lid="{{$match['lid']}}">
                <div class="part">
                    <p class="team"><img src="http://nba.win007.com{{$match['home_icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'">{{$match['hname']}}</p>
                    <p class="team"><img src="http://nba.win007.com{{$match['away_icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'">{{$match['aname']}}</p>
                </div>
                <div class="part">
                    <p class="score">{{$match['hscore_1st'] or '-'}}</p>
                    <p class="score">{{$match['ascore_1st'] or '-'}}</p>
                </div>
                <div class="part">
                    <p class="score">@if($match['system'] != 1){{$match['hscore_2nd'] or '-'}}@endif</p>
                    <p class="score">@if($match['system'] != 1){{$match['ascore_2nd'] or '-'}}@endif</p>
                </div>
                <div class="part">
                    <p class="score">{{$match['hscore_3rd'] or '-'}}</p>
                    <p class="score">{{$match['ascore_3rd'] or '-'}}</p>
                </div>
                <div class="part">
                    <p class="score run">@if($match['system'] != 1){{$match['hscore_4th'] or '-'}}@endif</p>
                    <p class="score run">@if($match['system'] != 1){{$match['ascore_4th'] or '-'}}@endif</p>
                </div>
                <div class="part">
                    <p class="total">{{$match['h_ot'] or '-'}}</p>
                    <p class="total">{{$match['a_ot'] or '-'}}</p>
                </div>
                <div class="part" onclick="event.preventDefault();location.href='/m/live/basketball/{{$match['id']}}.html'"><!--直播中的比赛，直接进入直播界面-->
                    <p class="live">
                        @if($match['status'] == -1)
                        <em>已结束</em>
                        @elseif ($match['status'] == 0 && $match['wap_live'])
                        <p class="live"><img src="{{env('CDN_URL')}}/img/pc/icon_video_live.png"></p>
                        @elseif ($match['status'] > 0 && $match['wap_live'])
                        <p class="live"><img src="{{env('CDN_URL')}}/img/pc/icon_video_live.png">直播中</p>
                        @elseif (!$match['wap_live'])
                        <em>暂无直播</em>
                        @endif
                    </p>

                </div>
                <div class="info">
                    @if(isset($match['betting_num']))<p class="number">{{$match['betting_num']}}</p>@endif
                    <p class="league">{{isset($match['league_name']) ? $match['league_name'] : $match['win_lname']}}</p>
                    <p class="time">{{date('H:i', strtotime($match['time']))}}</p>
                    <p class="period">{{$live_str}}</p>
                    @if($match['status'] >=5 && $match['status'] <= 8)<p class="ot">OT</p>@endif
                </div>
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
                @if(isset($league_array) && isset($matches) && count($matches) > 0)
                <ul id="League_All">
                    @foreach($league_array as $letter=>$leagues)
                        @foreach($leagues as $lid=>$league)
                            <li>
                                <input type="checkbox" name="league" id="League_ALL_{{$lid}}" value="{{$lid}}">
                                <label for="League_ALL_{{$lid}}">{{$league['name']}}</label>
                            </li>
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