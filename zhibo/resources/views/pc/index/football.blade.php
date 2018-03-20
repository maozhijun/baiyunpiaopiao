@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/immediate.css">
@endsection
<body>
@section('content')
<div id="Content" class="inner">
    <div id="MatchList" class="default">
        <div class="title">
            <p>即时比分</p><a href="schedule.html">下日赛程</a><a href="result.html">完场比分</a>
        </div>
        <div class="control">
            <button class="save">保留</button>
            <button class="del">删除</button>
            <button class="good on">精简</button>
            <button class="lottery">竞彩</button>
            <button class="all">完整</button>
            <button class="show odd">选择盘路</button>
            <button class="show league">选择赛事</button>
            <p>
                共有<b>212</b>场&nbsp;&nbsp;隐藏<b>212</b>场&nbsp;&nbsp;<span>[ 显示 ]</span>
                <button id="Sound" onclick="SoundControl()">进球声</button>
                <audio id="GoalAudio">
                    <source src="{{env('CDN_URL')}}/song/song.wav" type="audio/wav">
                    <source src="{{env('CDN_URL')}}/song/song.mp3" type="audio/mpeg">
                </audio>
            </p>
        </div>
        <table class="contentTable">
            <colgroup>
                <col num="1" width="34px" />
                <col num="2" max-width="100px" width="7.6%" />
                <col num="3" max-width="70px" width="6%" />
                <col num="4" min-width="60px" width="5%" />
                <col num="5" />
                <col num="6" width="80px" />
                <col num="7" />
                <col num="8" width="5%" />
                <col num="9" width="5%" />
                <col num="10"/>
                <col num="11" min-width="120px" width="10%"/>
            </colgroup>
            <thead id="TableHead">
            <tr>
                <th></th>
                <th>赛事</th>
                <th>时间</th>
                <th>状态</th>
                <th colspan="3">对阵</th>
                <th>角球</th>
                <th>直播</th>
                <th>指数</th>
                <th>分析</th>
            </tr>
            </thead>
            <thead id="Show">
            <tr>
                <th><!-- <input type="checkbox" name="choose" id="Match_all"><label for="Match_all"></label> --></th>
                <th>赛事</th>
                <th>时间</th>
                <th>状态</th>
                <th colspan="3">对阵</th>
                <th>角球</th>
                <th>直播</th>
                <th>指数</th>
                <th>分析</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($matches))
            @foreach($matches as $match)
                <tr>
                    <td><button name="choose" id="Match_{{$match['mid']}}"></button></td>
                    <td><p style="background: rgb(102, 0, 51)">{{!empty($match['league_name'] ? empty($match['league_name'] : '')}}</p></td>
                    <td>17:00<p>周一 001</p></td>
                    <td class="red">79<span class="minute">'</span></td>
                    <td><a href="match.html" target="_blank">
                            <img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png"><span class="redCard">1</span>&nbsp;<span class="yellowCard">2</span>&nbsp;波特兰伐木者
                        </a></td>
                    <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                            <p>0 - 0</p>
                            <p class="half">（0 - 0）</p>
                            <div class="even">
                                <div class="head">
                                    <p class="time">时间</p>
                                    <p class="team">波特兰伐木者</p>
                                    <p class="team">皇家盐湖城</p>
                                </div>
                                <ul>
                                    <li>
                                        <p class="time">15'</p>
                                        <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗洛戴罗洛戴罗洛戴罗洛戴罗洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_assists.png"></p>
                                    </li>
                                    <li>
                                        <p class="time">25'</p>
                                        <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_penalties.png"></p>
                                    </li>
                                    <li>
                                        <p class="time">35'</p>
                                        <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>艾治保亞</span><img src="{{env('CDN_URL')}}/img/pc/float_Oolong.png">
                                    </li>
                                    <li>
                                        <p class="time">45'</p>
                                        <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_exchange.png"><span>A.戴维斯</span><img src="{{env('CDN_URL')}}/img/pc/float_up.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_down.png"></p>
                                    </li>
                                    <li>
                                        <p class="time">55'</p>
                                        <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_yellow.png"><span>洛戴罗</span></p>
                                    </li>
                                    <li>
                                        <p class="time">65'</p>
                                        <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_red.png"><span>艾治保亞</span></p>
                                    </li>
                                    <li>
                                        <p class="time">75'</p>
                                        <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_twoyellow.png"><span>洛戴罗</span></p>
                                    </li>
                                </ul>
                            </div>
                        </a></td>
                    <td><a href="match.html" target="_blank">
                            <img class="icon" src="{{env('CDN_URL')}}/img/pc/icon_teamDefault.png">皇家盐湖城&nbsp;<span class="yellowCard">2</span>&nbsp;<span class="redCard">1</span>
                        </a></td>
                    <td>6 - 8</td>
                    <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a></td>
                    <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                    <td>
                        <a href="match.html" target="_blank">析</a>&nbsp;
                        <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                        <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                        <a href="oddEurope.html" target="_blank">欧</a>
                    </td>
                </tr>
            @endforeach
            @endif
            <tr>
                <td><button name="choose" id="Match_111111"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00<p>周一 001</p></td>
                <td class="red">79<span class="minute">'</span></td>
                <td><a href="match.html" target="_blank">
                        <img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png"><span class="redCard">1</span>&nbsp;<span class="yellowCard">2</span>&nbsp;波特兰伐木者
                    </a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>0 - 0</p>
                        <p class="half">（0 - 0）</p>
                        <div class="even">
                            <div class="head">
                                <p class="time">时间</p>
                                <p class="team">波特兰伐木者</p>
                                <p class="team">皇家盐湖城</p>
                            </div>
                            <ul>
                                <li>
                                    <p class="time">15'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗洛戴罗洛戴罗洛戴罗洛戴罗洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_assists.png"></p>
                                </li>
                                <li>
                                    <p class="time">25'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_penalties.png"></p>
                                </li>
                                <li>
                                    <p class="time">35'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>艾治保亞</span><img src="{{env('CDN_URL')}}/img/pc/float_Oolong.png">
                                </li>
                                <li>
                                    <p class="time">45'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_exchange.png"><span>A.戴维斯</span><img src="{{env('CDN_URL')}}/img/pc/float_up.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_down.png"></p>
                                </li>
                                <li>
                                    <p class="time">55'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_yellow.png"><span>洛戴罗</span></p>
                                </li>
                                <li>
                                    <p class="time">65'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_red.png"><span>艾治保亞</span></p>
                                </li>
                                <li>
                                    <p class="time">75'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_twoyellow.png"><span>洛戴罗</span></p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank">
                        <img class="icon" src="{{env('CDN_URL')}}/img/pc/icon_teamDefault.png">皇家盐湖城&nbsp;<span class="yellowCard">2</span>&nbsp;<span class="redCard">1</span>
                    </a></td>
                <td>6 - 8</td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_222222"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00<p>周一 002</p></td>
                <td class="red">半场</td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>0 - 0</p>
                        <p class="half">（0 - 0）</p>
                        <div class="even">
                            <div class="head">
                                <p class="time">时间</p>
                                <p class="team">波特兰伐木者</p>
                                <p class="team">皇家盐湖城</p>
                            </div>
                            <ul>
                                <li>
                                    <p class="time">15'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_assists.png"></p>
                                </li>
                                <li>
                                    <p class="time">25'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_penalties.png"></p>
                                </li>
                                <li>
                                    <p class="time">35'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>艾治保亞</span><img src="{{env('CDN_URL')}}/img/pc/float_Oolong.png">
                                </li>
                                <li>
                                    <p class="time">45'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_exchange.png"><span>A.戴维斯</span><img src="{{env('CDN_URL')}}/img/pc/float_up.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_down.png"></p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td>6 - 8</td>
                <td>暂无</td>
                <td><p class="asia"><span class="up">0.80</span><span class="down">两/两球半</span><span class="down">1.00</span></p><p><span class="down">0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_333333"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00<p>周一 003</p></td>
                <td class="red">32<span class="minute">'</span></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>1 - 1</p>
                        <p class="half">（1 - 1）</p>
                        <div class="even">
                            <div class="head">
                                <p class="time">时间</p>
                                <p class="team">波特兰伐木者</p>
                                <p class="team">皇家盐湖城</p>
                            </div>
                            <ul>
                                <li>
                                    <p class="time">15'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_assists.png"></p>
                                </li>
                                <li>
                                    <p class="time">25'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_penalties.png"></p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td>6 - 8</td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a></td>
                <td><p class="asia"><span>0.80</span><span>受让一球/球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_333333"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00</td>
                <td class="red">32<span class="minute">'</span></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>1 - 1</p>
                        <p class="half">（1 - 1）</p>
                        <div class="even">
                            <div class="head">
                                <p class="time">时间</p>
                                <p class="team">波特兰伐木者</p>
                                <p class="team">皇家盐湖城</p>
                            </div>
                            <ul>
                                <li>
                                    <p class="time">15'</p>
                                    <p class="host"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"><span>C.拉斐尔</span><img src="{{env('CDN_URL')}}/img/pc/float_assists.png"></p>
                                </li>
                                <li>
                                    <p class="time">25'</p>
                                    <p class="away"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>洛戴罗</span><img src="{{env('CDN_URL')}}/img/pc/float_penalties.png"></p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td>6 - 8</td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a></td>
                <td><p class="asia"><span>0.80</span><span>受让一球/球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            {{--<tr class="bannerAD"><td colspan="11"><p><a href="http://www.lg310.com" target="_blank">广告：&nbsp;&nbsp;专注小联赛直播，多场同屏看球模式！</a></p></td></tr>--}}
            <tr>
                <td><button name="choose" id="Match_444444"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p style="font-size: 13px;">[首发]</p>
                        <div class="first">
                            <ul>
                                <li class="host">
                                    <p class="percen">81.82%</p>
                                    <p class="chart"><span style="width: 81.82%;"></span></p>
                                    <p>10&nbsp;<span>名主力首发</span></p>
                                    <p class="name">波特兰伐木者</p>
                                </li>
                                <li class="away">
                                    <p class="percen">100.00%</p>
                                    <p class="chart"><span style="width: 100%;"></span></p>
                                    <p>11&nbsp;<span>名主力首发</span></p>
                                    <p class="name">皇家盐湖城</p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_555555"></button></td>
                <td><p style="background: rgb(83, 195, 196)">女波罗杯</p></td>
                <td>10:30</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p style="font-size: 13px;">[首发]</p>
                        <div class="first">
                            <ul>
                                <li class="host">
                                    <p class="percen">81.82%</p>
                                    <p class="chart"><span style="width: 81.82%;"></span></p>
                                    <p>10&nbsp;<span>名主力首发</span></p>
                                    <p class="name">波特兰伐木者</p>
                                </li>
                                <li class="away">
                                    <p class="percen">100.00%</p>
                                    <p class="chart"><span style="width: 100%;"></span></p>
                                    <p>11&nbsp;<span>名主力首发</span></p>
                                    <p class="name">皇家盐湖城</p>
                                </li>
                            </ul>
                        </div>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span></span><span></span><span></span></p><p><span></span><span></span><span></span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_666666"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_777777"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_888888"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr class="bannerAD"><td colspan="11"><a href="http://91889188.87.cn" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/ad_1.jpg"></td></a></tr>
            <tr>
                <td><button name="choose" id="Match_999999"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_000000"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_121212"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_232323"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_343434"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_454545"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_444444"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_555555"></button></td>
                <td><p style="background: rgb(83, 195, 196)">女波罗杯</p></td>
                <td>10:30</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span></span><span></span><span></span></p><p><span></span><span></span><span></span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_666666"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_777777"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_888888"></button></td>
                <td><p style="background: rgb(0, 168, 168)">球会友谊</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_999999"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_000000"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_121212"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_232323"></button></td>
                <td><p style="background: rgb(102, 0, 51)">美职业</p></td>
                <td>17:00</td>
                <td></td>
                <td><href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_343434"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td><a href="video.html" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/icon_home_live.png" height="16"></a></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            <tr>
                <td><button name="choose" id="Match_454545"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank" onmouseover="getMousePos(this)">
                        <p>VS</p>
                    </a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            </tbody>
            <tfoot>
            <tr>
                <td><button name="choose" id="Match_565656"></button></td>
                <td><p style="background: rgb(23, 177, 221)">东南亚U16</p></td>
                <td>17:00</td>
                <td>推迟</td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/20160122173710.png">波特兰伐木者</a></td>
                <td><a href="match.html" target="_blank">推迟</a></td>
                <td><a href="match.html" target="_blank"><img class="icon" src="http://info.win007.com/image/team/images/2013323200453.png">皇家盐湖城</a></td>
                <td></td>
                <td></td>
                <td><p class="asia"><span>0.80</span><span>两/两球半</span><span>1.00</span></p><p><span>0.80</span><span>3/3.5</span><span>1.00</span></p></td>
                <td>
                    <a href="match.html" target="_blank">析</a>&nbsp;
                    <a href="oddAsia.html" target="_blank">亚</a>&nbsp;
                    <a href="oddGoal.html" target="_blank">大</a>&nbsp;
                    <a href="oddEurope.html" target="_blank">欧</a>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
    <div class="clear"></div>
    <a href="#Navigation" id="BackTop"></a>
</div>
@endsection
@section('bottom')
<div id="Goal" class="default">
    <div class="title">
        <p>进球啦</p>
    </div>
    <table>
        <tbody>
        <tr>
            <td>亚青U19</td>
            <td>42'</td>
            <td class="goal">马尔代夫U19（中）</td>
            <td><b class="goal">1</b> - <b>1</b></td>
            <td>斯里兰卡U19</td>
        </tr>
        <tr>
            <td>亚青U19</td>
            <td>42'</td>
            <td>马尔代夫U19（中）</td>
            <td><b>1</b> - <b class="goal">1</b></td>
            <td class="goal">斯里兰卡U19</td>
        </tr>
        </tbody>
    </table>
</div>
<div class="pop" id="LeagueFilter" style="display: none;">
    <div class="filter">
        <div class="title">
            选择赛事
            <button class="tab">一级联赛</button><button class="tab">五大联赛</button><button class="tab on">全部联赛</button>
            <button class="close"></button>
        </div>
        <div class="bottom">
            <button class="all">全部</button><button class="opposite">反选</button><button class="confirm">确认</button>
        </div>
        <ul>
            <li>
                <b>A</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
            <li>
                <b>B</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
            <li>
                <b>C</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
            <li>
                <b>D</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
            <li>
                <b>E</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
            <li>
                <b>F</b>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
                <button class="item"><span></span>奥乙(4)</button>
                <button class="item on"><span></span>奥乙(4)</button>
            </li>
        </ul>
    </div>
</div>
<div class="pop" id="OddFilter" style="display: none;">
    <div class="filter">
        <div class="title">
            选择盘路
            <button class="close"></button>
        </div>
        <div class="bottom">
            <button class="all">全部</button><button class="opposite">反选</button><button class="confirm">确认</button>
        </div>
        <div class="oddlist">
            <button class="asia on">让球</button>
            <button class="goal"><span></span>大小球</button>
            <div class="itembox asia" style="display: block;">
                <p>
                    <button class="item"><span></span>未开盘 (127)</button>
                    <button class="item"><span></span>平手 (15)</button>
                </p>
                <p>
                    <button class="item"><span></span>让平手/半球 (25)</button>
                    <button class="item"><span></span>让半球 (21)</button>
                    <button class="item"><span></span>让半/一 (10)</button>
                    <button class="item"><span></span>让一球 (12)</button>
                    <button class="item"><span></span>让一球/球半 (2)</button>
                    <button class="item"><span></span>让一球半 (17)</button>
                    <button class="item"><span></span>让球半/两 (17)</button>
                    <button class="item"><span></span>让两球 (17)</button>
                    <button class="item"><span></span>让两球/半 (17)</button>
                    <button class="item"><span></span>让两球半 (17)</button>
                    <button class="item"><span></span>让球半/三 (17)</button>
                    <button class="item"><span></span>让三球 (17)</button>
                    <button class="item"><span></span>让三球以上 (17)</button>
                </p>
                <p>
                    <button class="item"><span></span>受让平手/半球 (25)</button>
                    <button class="item"><span></span>受让半球 (21)</button>
                    <button class="item"><span></span>受让半/一 (10)</button>
                    <button class="item"><span></span>受让一球 (12)</button>
                    <button class="item"><span></span>受让一球/球半 (2)</button>
                    <button class="item"><span></span>受让一球半 (17)</button>
                    <button class="item"><span></span>受让球半/两 (17)</button>
                    <button class="item"><span></span>受让两球 (17)</button>
                    <button class="item"><span></span>受让两球/半 (17)</button>
                    <button class="item"><span></span>受让两球半 (17)</button>
                    <button class="item"><span></span>受让球半/三 (17)</button>
                    <button class="item"><span></span>受让三球 (17)</button>
                    <button class="item"><span></span>受让三球以上 (17)</button>
                </p>
            </div>
            <div class="itembox goal" style="display: none;">
                <p>
                    <button class="item"><span></span>未开盘 (127)</button>
                    <button class="item"><span></span>2球以下 (25)</button>
                    <button class="item"><span></span>2球 (21)</button>
                    <button class="item"><span></span>2/2.5球 (10)</button>
                    <button class="item"><span></span>2.5球 (12)</button>
                    <button class="item"><span></span>2.5/3球 (2)</button>
                    <button class="item"><span></span>3球 (17)</button>
                    <button class="item"><span></span>3/3.5球 (17)</button>
                    <button class="item"><span></span>3.5球 (17)</button>
                    <button class="item"><span></span>3.5/4球 (17)</button>
                    <button class="item"><span></span>4球 (17)</button>
                    <button class="item"><span></span>4球以上 (17)</button>
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
</body>
@section('js')
{{--<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/jquery.js"></script>--}}
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/immediate.js"></script>
<script type="text/javascript">
    window.onload = function () {
        setTableCheck ();
        setFilter ();
        setBG();
        // $('#TableHead').width($('#Show').width());
    }
</script>
@endsection
<!--[if lte IE 8]>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/publics/pc/jquery_191.js"></script>
<![endif]-->