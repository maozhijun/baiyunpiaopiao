@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/immediate.css">
@endsection
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
                        @component("pc.index.cell.match_list_cell", ['match'=>$match,'articlesCount'=>$articlesCount])
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
