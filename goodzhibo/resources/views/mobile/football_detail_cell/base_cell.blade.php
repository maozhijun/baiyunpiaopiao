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
                    <dd class="host"><p class="img"><img src="{{$hicon or ''}}"></p></dd>
                    <dt>VS</dt>
                    <dd class="away"><p class="img"><img src="{{$aicon or ''}}"></p></dd>
                </dl>
                <dl>
                    <dd class="host"><p>{{isset($match['h_yellow']) ? $match['h_yellow'] : 0}}</p><span style="width: {{108 * $match['h_y_p']}}px;"></span></dd><!--span的值为108*百分比-->
                    <dt>黄牌</dt>
                    <dd class="away"><p>{{isset($match['a_yellow']) ? $match['a_yellow'] : 0}}</p><span style="width: {{108 * $match['a_y_p']}}px;"></span></dd>
                </dl>
                <dl>
                    <dd class="host"><p>{{isset($match['h_red']) ? $match['h_red'] : 0}}</p><span style="width: {{108 * $match['h_r_p']}}px;"></span></dd>
                    <dt>红牌</dt>
                    <dd class="away"><p>{{isset($match['a_red']) ? $match['a_red'] : 0}}</p><span style="width: {{108 * $match['a_r_p']}}px;"></span></dd>
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