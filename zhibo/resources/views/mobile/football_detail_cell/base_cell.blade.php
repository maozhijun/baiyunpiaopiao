@if(isset($lineup))
    <div id="First" class="childNode" style="display: ;">
        <div class="team host">
            @if(isset($lineup['h_lineup_per']))
                <p class="number">本场比赛有<b>{{isset($lineup['home']['h_first']) ? count($lineup['home']['h_first']) : 0}}</b>名主力首发</p>
                <p class="percent">{{round($lineup['h_lineup_per'], 2)}}%<span style="width: {{$lineup['h_lineup_per'] / 100 * 160}}px"></span></p><!--span的值为160*百分比-->
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
            @else
                <p class="number">本场比赛尚未有首发数据</p>
            @endif
        </div>
        <div class="team away">
            @if(isset($lineup['a_lineup_per']))
                <p class="number">本场比赛有<b>{{isset($lineup['away']['h_first']) ? count($lineup['away']['h_first']) : 0}}</b>名主力首发</p>
                <p class="percent">{{round($lineup['a_lineup_per'], 2)}}%<span style="width: {{$lineup['a_lineup_per'] / 100 * 160}}px"></span></p><!--span的值为160*百分比-->
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
            @else
                <p class="number">本场比赛尚未有首发数据</p>
            @endif
        </div>
        <div class="nolist">暂无首发数据</div>
    </div>
@endif
@if(isset($match))
    <div id="Event" class="childNode" style="display: none;">
        <div class="technology default">
            <div class="title">技术统计<button class="close"></button></div>
            <ul>
                <li>
                    <dl class="team">
                        <dd class="host"><p class="img"><img src="{{(isset($match['hicon']) && strlen($match['hicon']) > 0) ? $match['hicon'] : asset('img/customer3/icon_team_default.png')}}"></p></dd>
                        <dt>VS</dt>
                        <dd class="away"><p class="img"><img src="{{(isset($match['aicon']) && strlen($match['aicon']) > 0) ? $match['aicon'] : asset('img/customer3/icon_team_default.png')}}"></p></dd>
                    </dl>
                    @if(isset($tech))
                        @foreach($tech as $item)
                            @if($item['h_p'] != 0 || $item['a_p'] != 0)
                                <dl>
                                    <dd class="host"><p>{{empty($item['h']) ? 0 : $item['h']}}</p><span style="width: {{108 * $item['h_p']}}px;"></span></dd><!--span的值为108*百分比-->
                                    <dt>{{$item['name']}}</dt>
                                    <dd class="away"><p>{{empty($item['a']) ? 0 : $item['a']}}</p><span style="width: {{108 * $item['a_p']}}px;"></span></dd>
                                </dl>
                            @endif
                        @endforeach
                    @endif
                </li>
            </ul>
        </div>
        <div class="event default">
            <div class="title">比赛事件<button class="close"></button></div>
            <dl style="margin-top: 100px;">
                <dt class="end">比赛开始</dt>
                @if(isset($events))
                    @foreach($events as $event)
                        <dd class="{{$event['is_home'] == 1 ? 'host' : 'away'}}">
                            <p class="minute">{{$event['happen_time']}}<span>'</span></p>
                            @if($event['kind'] == 11)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_up.png')}}">{{$event['player_name_j']}}</li>
                                    @if(isset($event['player_name_j2']))
                                        <li><img src="{{asset('img/pc/icon_video_down.png')}}">{{$event['player_name_j2']}}</li>
                                    @endif
                                </ul>
                            @elseif ($event['kind'] == 2)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_red.png')}}">{{$event['player_name_j']}}</li>
                                </ul>
                            @elseif ($event['kind'] == 3)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_yellow.png')}}">{{$event['player_name_j']}}</li>
                                </ul>
                            @elseif ($event['kind'] == 9)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_red.png')}}">{{$event['player_name_j']}}（两黄一红）</li>
                                </ul>
                            @elseif ($event['kind'] == 1)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_goal.png')}}">{{$event['player_name_j']}}</li>
                                </ul>
                            @elseif ($event['kind'] == 7)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_goal.png')}}">{{$event['player_name_j']}}（点球）</li>
                                </ul>
                            @elseif ($event['kind'] == 8)
                                <ul>
                                    <li><img src="{{asset('img/pc/icon_video_own.png')}}">{{$event['player_name_j']}}（乌龙）</li>
                                </ul>
                            @endif
                        </dd>
                    @endforeach
                @endif
                <dt class="start">比赛结束</dt>
            </dl>
        </div>
        <div class="nolist">暂无比赛事件</div>
    </div>
@endif
<div class="bottom">
    <div class="btn">
        <input type="radio" name="Match" id="Match_First" value="First" checked>
        <label for="Match_First">首发对比</label>
        <input type="radio" name="Match" id="Match_Event" value="Event">
        <label for="Match_Event">比赛事件</label>
    </div>
</div>