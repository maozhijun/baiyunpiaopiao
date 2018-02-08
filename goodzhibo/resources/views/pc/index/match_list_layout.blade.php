@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/immediate.css">
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
                <button name="filter" class="good on" id="first" onclick="matchFilter('first')">精简</button>
                <button name="filter" class="lottery" id="lottery" onclick="matchFilter('lottery')">竞彩</button>
                <button name="filter" class="all" id="all" onclick="matchFilter('all')">完整</button>
                <button class="show odd">选择盘路</button>
                <button class="show league">选择赛事</button>
                <p>
                    共有<b id="totalMatchCount">0</b>场&nbsp;&nbsp;隐藏<b id="hideMatchCount">0</b>场&nbsp;&nbsp;<span>[ 显示 ]</span>
                    <button class="on" id="Sound" onclick="SoundControl()">进球声</button>
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
                        @component("pc.index.cell.match_list_cell", ['match'=>$match])
                        @endcomponent
                    @endforeach
                @endif
                {{--<tr class="bannerAD"><td colspan="11"><p><a href="http://www.lg310.com" target="_blank">广告：&nbsp;&nbsp;专注小联赛直播，多场同屏看球模式！</a></p></td></tr>--}}
                {{--<tr class="bannerAD"><td colspan="11"><a href="http://91889188.87.cn" target="_blank"><img src="{{env('CDN_URL')}}/img/pc/ad_1.jpg"></td></a></tr>--}}
                </tbody>
                <tfoot>
                @foreach($exceptionMatches as $match)
                    @component("pc.index.cell.match_list_cell", ['match'=>$match])
                    @endcomponent
                @endforeach
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
                <td>-</td>
                <td>-</td>
                <td class="goal">-</td>
                <td><b class="goal">0</b> - <b>0</b></td>
                <td>-</td>
            </tr>
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td><b>0</b> - <b class="goal">0</b></td>
                <td class="goal">-</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="pop" id="LeagueFilter" style="display: none;">
        <div class="filter">
            <div class="title">
                选择赛事
                <button class="tab" onclick="leagueFilter('first')">一级联赛</button>
                <button class="tab" onclick="leagueFilter('five')">五大联赛</button>
                <button class="tab on" onclick="leagueFilter('all')">全部联赛</button>
                <button class="close"></button>
            </div>
            <div class="bottom">
                <button class="all">全部</button><button class="opposite">反选</button><button onclick="confirmFilter('league', false);" class="confirm">确认</button>
            </div>
            @if(isset($matches) && count($matches) > 0 && count($league_array) > 0)
            <ul>
                @foreach($league_array as $key=>$leagues)
                <li>
                    <b>{{$key}}</b>
                    @foreach($leagues as $league)
                        <?php $leagueClass = ($league["isFive"] ? "five " : "").($league["isFirst"] ? "first" : "") ?>
                        <button value="{{$league['id']}}" league="{{$leagueClass}}" class="item"><span></span>{{$league["name"]}}({{$league["count"]}})</button>
                    @endforeach
                </li>
                @endforeach
            </ul>
            @endif
        </div>
    </div>
    <div class="pop" id="OddFilter" style="display: none;">
        <div class="filter">
            <div class="title">选择盘路<button class="close"></button></div>
            <div class="bottom">
                <button class="all">全部</button><button class="opposite">反选</button><button class="confirm" onclick="confirmFilter('odd', false);">确认</button>
            </div>
            <div class="oddlist">
                <button class="asia on">让球</button>
                <button class="goal"><span></span>大小球</button>
                <div class="itembox asia show">
                    @if(isset($asiaOdds) && isset($asiaOdds["middle"]))
                        <p>
                            @foreach($asiaOdds["middle"] as $tempArray)
                                <button value="asiaMiddle_{{$tempArray['sort']}}" class="item"><span></span>{{$tempArray['typeCn']}} ({{$tempArray['count']}})</button>
                            @endforeach
                        </p>
                    @endif
                    @if(isset($asiaOdds) && isset($asiaOdds["up"]))
                        <p>
                            @foreach($asiaOdds["up"] as $tempArray)
                                <button value="asiaUp_{{$tempArray['sort']}}" class="item"><span></span>{{$tempArray['typeCn']}} ({{$tempArray['count']}})</button>
                            @endforeach
                        </p>
                    @endif
                    @if(isset($asiaOdds) && isset($asiaOdds["down"]))
                        <p>
                            @foreach($asiaOdds["down"] as $tempArray)
                                <button value="asiaDown_{{$tempArray['sort']}}" class="item"><span></span>{{$tempArray['typeCn']}} ({{$tempArray['count']}})</button>
                            @endforeach
                        </p>
                    @endif
                </div>
                <div class="itembox goal hide">
                    @if(isset($ouOdds))
                        <p>
                            @foreach($ouOdds as $tempArray)
                                <button value="ou_{{$tempArray['sort']}}" class="item"><span></span>{{$tempArray['typeCn']}} ({{$tempArray['count']}})</button>
                            @endforeach
                        </p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/immediate.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/util.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/football-list.js"></script>
    <script type="text/javascript">
        window.onload = function () {
            setTableCheck ();
            setFilter ();
            setBG();
            setMatchCount();
            @if (!isset($type) || $type != 'result')
            window.setInterval('refresh()',5000);
            window.setInterval('refreshRoll()',5000);
            @endif
            // $('#TableHead').width($('#Show').width());
        }
    </script>
@endsection
<!--[if lte IE 8]>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/jquery_191.js"></script>
<![endif]-->
