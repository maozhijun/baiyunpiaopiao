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
        {{$match['lname']}}{{!empty($match['round']) ? '&nbsp;&nbsp;第' . $match['round'] . '轮' : ''}}
    </div>
</div>
<div id="Info">
    <div class="team">
        <p class="img"><img src="{{$match['hteam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
        <p class="name">{{$match['hname']}}</p>
        <p class="rank">排名：{{$match['hLeagueRank']}}</p>
    </div>
    <div class="info">
        <p class="minute">{{$match['current_time']}}</p>
        <p class="score">
            <span class="host">{{$match['hscore']}}</span>
            <span class="away">{{$match['ascore']}}</span>
        </p>
        @if($match['status'] > 0 && isset($match['wap_live']) && $match['wap_live']))<a href="videoPhone.html" class="live">正在直播</a>@endif
    </div>
    <div class="team">
        <p class="img"><img src="{{$match['ateam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
        <p class="name">{{$match['aname']}}</p>
        <p class="rank">排名：{{$match['aLeagueRank']}}</p>
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
    <div id="First" class="childNode" style="display: ;">
        <div class="team host">
            @if(isset($lineup['h_lineup_per']))
            <p class="number">本场比赛有<b>{{isset($lineup['home']['h_first']) ? count($lineup['home']['h_first']) : 0}}</b>名主力首发</p>
            <p class="percent">{{$lineup['h_lineup_per']}}%<span style="width: {{$lineup['h_lineup_per'] / 100 * 160}}px"></span></p><!--span的值为160*百分比-->
            @else
            <p class="number">本场比赛尚未有首发数据</p>
            @endif
            <ul>
                @foreach($lineup['home']['first'] as $f_lineup)
                <li>
                    <p class="name">{{$f_lineup['name']}}</p>
                    @if($f_lineup['first'] == 1)<p class="main">【 主 】</p>@endif
                    <p class="jerseys">{{$f_lineup['num']}}</p>
                </li>
                @endforeach
                @foreach($lineup['home']['back'] as $b_lineup)
                    <li>
                        <p class="name">{{$b_lineup['name']}}</p>
                        <p class="jerseys reserve">{{$b_lineup['num']}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="team away">
            @if(isset($lineup['a_lineup_per']))
                <p class="number">本场比赛有<b>{{isset($lineup['away']['h_first']) ? count($lineup['away']['h_first']) : 0}}</b>名主力首发</p>
                <p class="percent">{{$lineup['a_lineup_per']}}%<span style="width: {{$lineup['a_lineup_per'] / 100 * 160}}px"></span></p><!--span的值为160*百分比-->
            @else
                <p class="number">本场比赛尚未有首发数据</p>
            @endif
            <ul>
                @foreach($lineup['away']['first'] as $f_lineup)
                    <li>
                        <p class="name">{{$f_lineup['name']}}</p>
                        @if($f_lineup['first'] == 1)<p class="main">【 主 】</p>@endif
                        <p class="jerseys">{{$f_lineup['num']}}</p>
                    </li>
                @endforeach
                @foreach($lineup['away']['back'] as $b_lineup)
                    <li>
                        <p class="name">{{$b_lineup['name']}}</p>
                        <p class="jerseys reserve">{{$b_lineup['num']}}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div id="Event" class="childNode" style="display: none;">
        <div class="technology default">
            <div class="title">技术统计<button class="close"></button></div>
            <ul>
                <li>
                    <dl class="team">
                        <dd class="host"><p class="img"><img src="{{$match['hteam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p></dd>
                        <dt>VS</dt>
                        <dd class="away"><p class="img"><img src="{{$match['ateam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{$match['h_yellow']}}</p><span style="width: {{108 * $match['h_y_p']}}px;"></span></dd><!--span的值为108*百分比-->
                        <dt>黄牌</dt>
                        <dd class="away"><p>{{$match['a_yellow']}}</p><span style="width: {{108 * $match['a_y_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{$match['h_red']}}</p><span style="width: {{108 * $match['h_r_p']}}px;"></span></dd>
                        <dt>红牌</dt>
                        <dd class="away"><p>{{$match['a_red']}}</p><span style="width: {{108 * $match['a_r_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{empty($match['h_corner']) ? 0 : $match['h_corner']}}</p><span style="width: {{108 * $match['h_cor_p']}}px;"></span></dd>
                        <dt>角球</dt>
                        <dd class="away"><p>{{empty($match['a_corner']) ? 0 : $match['a_corner']}}</p><span style="width: {{108 * $match['a_cor_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{empty($match['h_shoot']) ? 0 : $match['h_shoot']}}</p><span style="width: {{108 * $match['h_sh_p']}}px;"></span></dd>
                        <dt>射门</dt>
                        <dd class="away"><p>{{empty($match['a_shoot']) ? 0 : $match['a_shoot']}}</p><span style="width: {{108 * $match['a_sh_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{empty($match['h_shoot_target']) ? 0 : $match['h_shoot_target']}}</p><span style="width: {{108 * $match['h_sht_p']}}px;"></span></dd>
                        <dt>射正</dt>
                        <dd class="away"><p>{{empty($match['a_shoot_target']) ? 0 : $match['a_shoot_target']}}</p><span style="width: {{108 * $match['a_sht_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{empty($match['h_control']) ? 0 :$match['h_control'] }}%</p><span style="width: {{108 * $match['h_con_p']}}px;"></span></dd>
                        <dt>控球率</dt>
                        <dd class="away"><p>{{empty($match['a_control']) ? 0 : $match['a_control']}}%</p><span style="width: {{108 * $match['a_con_p']}}px;"></span></dd>
                    </dl>
                    <dl>
                        <dd class="host"><p>{{empty($match['h_half_control']) ? 0 : $match['h_half_control']}}%</p><span style="width: {{108 * $match['h_hcon_p']}}px;"></span></dd>
                        <dt>半场控球率</dt>
                        <dd class="away"><p>{{empty($match['a_half_control']) ? 0 : $match['a_half_control']}}%</p><span style="width: {{108 * $match['a_hcon_p']}}px;"></span></dd>
                    </dl>
                </li>
            </ul>
        </div>
        <div class="event default">
            <div class="title">比赛事件<button class="close"></button></div>
            <dl style="margin-top: 100px;">
                <dt class="end">比赛结束</dt>
                @if(isset($events))
                @foreach($events as $event)
                    <dd class="{{$event['is_home'] == 1 ? 'host' : 'away'}}">
                        <p class="minute">{{$event['happen_time']}}<span>'</span></p>
                        @if($event['kind'] == 11)
                        <ul>
                            <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_up.png">{{$event['player_name_j']}}</li>
                            <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_down.png">{{$event['player_name_j2']}}</li>
                        </ul>
                        @elseif ($event['kind'] == 2)
                            <ul>
                                <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_red.png">{{$event['player_name_j']}}</li>
                            </ul>
                        @elseif ($event['kind'] == 3)
                        <ul>
                            <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_yellow.png">{{$event['player_name_j']}}</li>
                        </ul>
                        @elseif ($event['kind'] == 9)
                            <ul>
                                <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_red.png">{{$event['player_name_j']}}（两黄一红）</li>
                            </ul>
                        @elseif ($event['kind'] == 1)
                            <ul>
                                <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_goal.png">{{$event['player_name_j']}}</li>
                            </ul>
                        @elseif ($event['kind'] == 7)
                            <ul>
                                <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_goal.png">{{$event['player_name_j']}}（点球）</li>
                            </ul>
                        @elseif ($event['kind'] == 8)
                            <ul>
                                <li><img src="{{env('CDN_URL')}}/img/pc/icon_video_own.png">{{$event['player_name_j']}}（乌龙）</li>
                            </ul>
                        @endif
                    </dd>
                @endforeach
                @endif
                <dt>比赛开始</dt>
            </dl>
        </div>
    </div>
    <div class="bottom">
        <div class="btn">
            <input type="radio" name="Match" id="Match_First" value="First" checked>
            <label for="Match_First">首发对比</label>
            <input type="radio" name="Match" id="Match_Event" value="Event">
            <label for="Match_Event">比赛事件</label>
        </div>
    </div>
</div>
<div id="Data" class="content" style="display: none;">
    <div class="odd default"></div>
    <div class="rank default">
        <div class="title">积分排名<button class="close"></button></div>
        <table>
            <thead>
            <tr>
                <th>排名</th>
                <th>球队</th>
                <th>赛</th>
                <th>胜/平/负</th>
                <th>进/失</th>
                <th>净</th>
                <th>积分</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($base['rank']['host']['all']))
            <?php $host_rank = $base['rank']['host']['all']; ?>
            <tr>
                <td class="red">{{$host_rank['rank']}}</td>
                <td>{{$match['hname']}}</td>
                <td>{{$host_rank['count']}}</td>
                <td>{{$host_rank['win']}}/{{$host_rank['draw']}}/{{$host_rank['lose']}}</td>
                <td>{{$host_rank['goal']}}/{{$host_rank['fumble']}}</td>
                <td>{{$host_rank['goal'] - $host_rank['fumble']}}</td>
                <td>{{$host_rank['score']}}</td>
            </tr>
            @endif
            @if(isset($base['rank']['away']['all']))
            <?php $away_rank = $base['rank']['away']['all']; ?>
            <tr>
                <td class="red">{{$away_rank['rank']}}</td>
                <td>{{$match['aname']}}</td>
                <td>{{$away_rank['count']}}</td>
                <td>{{$away_rank['win']}}/{{$away_rank['draw']}}/{{$away_rank['lose']}}</td>
                <td>{{$away_rank['goal']}}/{{$away_rank['fumble']}}</td>
                <td>{{$away_rank['goal'] - $away_rank['fumble']}}</td>
                <td>{{$away_rank['score']}}</td>
            </tr>
            @endif
            </tbody>
        </table>
    </div>
    @if(isset($base['historyBattle']))
    <div class="battle matchTable default" ha="0" le="0">
        <div class="title">
            交锋往绩<button class="close"></button>
            <div class="labelbox">
                <label for="Battle_HA"><input type="checkbox" name="battle" value="ha" id="Battle_HA"><span></span>同主客</label>
                <label for="Battle_LE"><input type="checkbox" name="battle" value="le" id="Battle_LE"><span></span>同赛事</label>
            </div>
        </div>
        @component("mobile.cell.football_detail_hbattle",['data'=>$base['historyBattle']['nhnl'],'league'=>0,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.cell.football_detail_hbattle",['data'=>$base['historyBattle']['shnl'],'league'=>0,'ha'=>1,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.cell.football_detail_hbattle",['data'=>$base['historyBattle']['nhsl'],'league'=>1,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.cell.football_detail_hbattle",['data'=>$base['historyBattle']['shsl'],'league'=>1,'ha'=>1,'hid'=>$match['hid']])
        @endcomponent
    </div>
    @endif
    @if(isset($base['recentBattle']))
    <?php $recent = $base['recentBattle']; ?>
    <div class="history matchTable default" ha="0" le="0">
        <div class="title">
            近期战绩<button class="close"></button>
            <div class="labelbox">
                <label for="History_HA"><input type="checkbox" name="history" value="ha" id="History_HA"><span></span>同主客</label>
                <label for="History_LE"><input type="checkbox" name="history" value="le" id="History_LE"><span></span>同赛事</label>
            </div>
        </div>
        @if(isset($recent['home']))
            <p class="teamName"><span>{{$match['hname']}}</span></p>
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['home']['all'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['home']['sameHA'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['home']['sameL'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['home']['sameHAL'], 'hid'=>$match['hid']])
            @endcomponent
        @endif
        @if(isset($recent['away']))
            <p class="teamName"><span>{{$match['aname']}}</span></p>
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['away']['all'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['away']['sameHA'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['away']['sameL'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.cell.football_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['away']['sameHAL'], 'hid'=>$match['aid']])
            @endcomponent
        @endif
    </div>
    @endif
    @if(isset($base['oddResult']))
    <div class="track default">
        <div class="title">
            赛事盘路<button class="close"></button>
        </div>
        @if(isset($base['oddResult']['home']))
        @component("mobile.cell.football_detail_track",['tname'=>$match['hname'], 'data'=>$base['oddResult']['home']])
        @endcomponent
        @endif
        @if(isset($base['oddResult']['away']))
        @component("mobile.cell.football_detail_track",['tname'=>$match['aname'], 'data'=>$base['oddResult']['away']])
        @endcomponent
        @endif
    </div>
    @endif
    @if(isset($base['schedule']))
    <div class="future matchTable default">
        <div class="title">
            未来赛程<button class="close"></button>
        </div>
        @if(isset($base['schedule']['home']))
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['hname'], 'data'=>$base['schedule']['home'], 'tid'=>$match['hid']])
            @endcomponent
        @endif
        @if(isset($base['schedule']['away']))
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['aname'], 'data'=>$base['schedule']['away'], 'tid'=>$match['aid']])
            @endcomponent
        @endif
    </div>
    @endif
</div>
<div id="Team" class="content" style="display: none;">
    <div id="Trait" class="childNode" style="display: ;">
        @if(isset($base['attribute']))
        <div class="strength default" ha="0" le="0">
            <div class="title">
                攻防能力<button class="close"></button>
                <div class="labelbox">
                    <label for="Strength_HA"><input type="checkbox" name="battle" value="ha" id="Strength_HA"><span></span>同主客</label>
                    <label for="Strength_LE"><input type="checkbox" name="battle" value="le" id="Strength_LE"><span></span>同赛事</label>
                </div>
            </div>
            @if(isset($base['attribute']))
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'0', 'key'=>'all'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'0', 'key'=>'host'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'1', 'key'=>'league'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'1', 'key'=>'both'])
                @endcomponent
            @endif
        </div>
        @endif
    </div>
    <div id="Corner" class="childNode" style="display: none;"></div>
    <div class="bottom">
        <div class="btn">
            <input type="radio" name="Team" id="Team_Trait" value="Trait" checked>
            <label for="Team_Trait">特点</label>
            <input type="radio" name="Team" id="Team_Corner" value="Corner">
            <label for="Team_Corner">角球</label>
        </div>
    </div>
</div>
<div id="Odd" class="content" style="display: none;">
    <div id="Asia" class="asia default childNode" style="display: ;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>主队</th>
                <th>让球</th>
                <th>客队</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="Europe" class="europe default childNode" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>主胜</th>
                <th>平局</th>
                <th>主负</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="Goal" class="goal default childNode" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>大球</th>
                <th>盘口</th>
                <th>小球</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="bottom">
        <div class="btn">
            <input type="radio" name="Odd" id="Odd_Asia" value="Asia" checked>
            <label for="Odd_Asia">亚盘</label>
            <input type="radio" name="Odd" id="Odd_Europe" value="Europe">
            <label for="Odd_Europe">欧赔</label>
            <input type="radio" name="Odd" id="Odd_Goal" value="Goal">
            <label for="Odd_Goal">大小球</label>
        </div>
    </div>
</div>
<div id="SameOdd" class="content" style="display: none;"></div>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/jquery.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/publicPhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/matchPhone.js"></script>
<script type="text/javascript">
    function getCdnUrl(url) {
        var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';
        var url = http + '{{env('CDN_URL')}}' + url;
        return url;
    }
    window.onload = function () {
        setPage();
        setCanvas();
    }
    window.onscroll = function () {
        setHead();
    }
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
</script>
@endsection