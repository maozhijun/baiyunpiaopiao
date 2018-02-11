@extends('pc.layout.base_new')
@section('content')
    <?php
    $hLeagueName = $match['hLeagueName'];
    $aLeagueName = $match['aLeagueName'];
    $hLeagueRank = $match['hLeagueRank'];
    $aLeagueRank = $match['aLeagueRank'];
    $isLive = false;//\App\Models\Match\MatchLive::isLive($match->id);
    $startTime = date('Ymd', strtotime($match['time']));
    ?>
    <div id="Content" class="inner">
        <div class="leftBar" id="LeftBar">
            <p class="Match" style="display: none;">
                <a name="first" class="hide" href="#Match_First">首发阵容</a>
                <a name="technology" class="hide" href="#Match_Technology">技术统计</a>
                <a name="event" class="hide" href="#Match_Event">赛事事件</a>
                <a href="#Navigation">返回顶部</a>
            </p>
            <p class="Characteristic" style="display: none;">
                <a name="strength" class="hide" href="#Characteristic_Strength">球队风格</a>
                <a name="prediction" class="hide" href="#Characteristic_Prediction">场面预测</a>
                <a name="referee" class="hide" href="#Characteristic_Referee">裁判信息</a>
                <a name="sameOdd" class="hide" href="#Characteristic_SameOdd">历史同赔</a>
                <a href="#Navigation">返回顶部</a>
            </p>
            <p class="Data" style="display: block;">
                <a name="strength" class="hide" href="#Data_Strength">攻防能力</a>
                <a name="odd" class="hide" href="#Data_Odd">赔率指数</a>
                <a name="league" class="hide" href="#Data_League">联赛积分</a>
                <a name="battle" class="hide" href="#Data_Battle">对赛往绩</a>
                <a name="history" class="hide" href="#Data_History">近期战绩</a>
                <a name="track" class="hide" href="#Data_Track">赛事盘路</a>
                <a name="future" class="hide" href="#Data_Future">未来赛程</a>
                <a href="#Navigation">返回顶部</a>
            </p>
            <p class="Corner" style="display: none;">
                <a name="odd" class="hide" href="#Corner_Odd">角球指数</a>
                <a name="data" class="hide" href="#Corner_Data">数据统计</a>
                <a name="battle" class="hide" href="#Corner_Battle">对赛往绩</a>
                <a name="history" class="hide" href="#Corner_History">近期战绩</a>
                <a href="#Navigation">返回顶部</a>
            </p>
            <p class="Talent" style="display: none;"></p>
        </div>
        <div id="Info">
            <div class="mes">
                <p>{{isset($match['lname']) ? $match['lname'] : $match['win_lname']}}&nbsp;{{isset($match['round'])?'-&nbsp;第'.$match['round'].'轮':''}}</p>
                <?php
                $week = array('周日','周一','周二','周三','周四','周五','周六');
                ?>
                <p>比赛时间：{{ Carbon\Carbon::parse($match['time'])->format('Y-m-d') }}&nbsp;&nbsp;{{ Carbon\Carbon::parse($match['time'])->format('H:i') }}&nbsp;&nbsp;{{$week[date("w",strtotime($match['time']))]}}</p>
            </div>
            <div class="team host">
                <div class="icon">
                    <img src="{{strlen($match['hteam']['icon']) > 0 ? $match['hteam']['icon'] : (env('CDN_URL') . '/img/icon_teamDefault.png') }}">
                </div>
                <p>
                    <span class="team">{{$match['hname']}}</span>
                    @if($hLeagueRank > 0)<span class="league">【 {{$hLeagueName}}{{$hLeagueRank}} 】</span>@endif
                </p>
            </div>
            @if($match['status'] > 0 || $match['status'] == -1)
                <div class="score">{{$match['hscore']}} - {{$match['ascore']}}</div>
            @else
                <div class="score">VS</div>
            @endif
            <div class="team away">
                <div class="icon">
                    <img src="{{strlen($match['ateam']['icon']) > 0 ? $match['ateam']['icon'] : (env('CDN_URL') . '/img/icon_teamDefault.png') }}">
                </div>
                <p>
                    <span class="team">{{$match['aname']}}</span>
                    @if($aLeagueRank > 0)
                        <span class="league">【 {{$aLeagueName}}{{$aLeagueRank}} 】</span>
                    @endif
                </p>
            </div>
            <div class="odd">
                @if(isset($asiaOdd))
                    <p>亚：{{\App\Http\Controllers\CommonTool::float2Decimal($asiaOdd['up2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($asiaOdd['middle2'], true)}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($asiaOdd['down2'])}}</p>
                @else
                    <p>亚：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
                @endif
                @if(isset($europeOdd))
                    <p>欧：{{\App\Http\Controllers\CommonTool::float2Decimal($europeOdd['up2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($europeOdd['middle2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($europeOdd['down2'])}}</p>
                @else
                    <p>欧：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
                @endif
                @if(isset($ouOdd))
                    <p>大：{{\App\Http\Controllers\CommonTool::float2Decimal($ouOdd['up2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::getHandicapCn($ouOdd['middle2'], '', \App\Models\Match\Odd::k_odd_type_ou)}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($ouOdd['down2'])}}</p>
                @else
                    <p>大：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
                @endif
            </div>
            <div class="clear"></div>
            <div class="analysis"
                 @if($base['matches'] && $base['matches']['status'] > 0 && $isLive)
                 style="display: none"
                 @else
                 style="display: block"
                    @endif
            >
                <?php
                if (isset($base['odd'])){
                    $odd = $base['odd'];
                    if(isset($odd['up1']) && isset($odd['middle1']) && isset($odd['down1'])){
                        $up = $odd['up1'] > 0 ? round(90/$odd['up1'],0) : 0;
                        $middle = $odd['middle1'] > 0 ? round(90/$odd['middle1'],0) : 0;
                    }
                }
                //                $down = $odd['down1'] > 0 ? round(90/$odd['down1'],2) : 0;
                ?>
                <canvas class="host" width="130px" height="130px" value="{{isset($middle) ? $middle + $up : 0}}" color="#bc1c25"></canvas>
                <canvas class="away" width="130px" height="130px" value="{{isset($middle) ? 100 - $middle - $up : 0}}" color="#58A1F6"></canvas>
                <div class="cover host">
                    <p><b>
                            @if(isset($middle))
                                {{$middle + $up}}%
                            @else
                                -%
                            @endif
                        </b></p>
                    <p>不败</p>
                </div>
                <div class="cover away">
                    <p><b>
                            @if(isset($middle))
                                {{100 - $middle - $up}}%
                            @else
                                -%
                            @endif
                        </b></p>
                    <p>获胜</p>
                </div>
                <p class="title">赛果概率</p>
                <dl>
                    <?php
                    $winh = 0;
                    $drawh = 0;
                    $loseh = 0;
                    $wina = 0;
                    $drawa = 0;
                    $losea = 0;
                    $hid = $base['matches']['hid'];
                    $aid = $base['matches']['aid'];
                    if (isset($base['historyBattle']['nhnl'])){
                        foreach($base['historyBattle']['nhnl'] as $match){
                            if($match['hscore'] > $match['ascore'])
                                if($match['hid'] == $hid)
                                    $winh++;
                                else
                                    $loseh++;
                            elseif($match['hscore'] < $match['ascore'])
                                if($match['hid'] == $hid)
                                    $loseh++;
                                else
                                    $winh++;
                            else
                                $drawh++;
                        }

                        foreach($base['historyBattle']['nhnl'] as $match){
                            if($match['hscore'] > $match['ascore'])
                                if($match['hid'] == $aid)
                                    $wina++;
                                else
                                    $losea++;
                            elseif($match['hscore'] < $match['ascore'])
                                if($match['hid'] == $aid)
                                    $losea++;
                                else
                                    $wina++;
                            else
                                $drawa++;
                        }
                    }


                    $homePer = ($winh + $drawa + $wina) > 0 ? round(100*($winh/($winh+$drawa+$wina)),0) : 0;
                    $awayPer = ($winh + $drawa + $wina) > 0 ? round(100*($wina/($winh+$drawa+$wina)),0) : 0;

                    ?>
                    <dt>
                        <p class="host"><b>{{$winh}}</b>&nbsp;胜&nbsp;<b>{{$drawh}}</b>&nbsp;平&nbsp;<b>{{$loseh}}</b>&nbsp;负</p>
                        <p class="away"><b>{{$wina}}</b>&nbsp;胜&nbsp;<b>{{$drawa}}</b>&nbsp;平&nbsp;<b>{{$losea}}</b>&nbsp;负</p>
                        <p>历史交锋</p>
                    </dt>
                    <dd>
                        <p class="host" style="width: {{($homePer+$awayPer) > 0 ? 100*$homePer/($homePer+$awayPer) : 0}}%;"></p><span class="host">主胜&nbsp;{{$homePer}}%</span>
                        <p class="away" style="width: {{($homePer+$awayPer) > 0 ? 100*$awayPer/($homePer+$awayPer) : 0}}%;"></p><span class="away">{{$awayPer}}%&nbsp;客胜</span>
                    </dd>
                    <?php
                    $winh = 0;
                    $drawh = 0;
                    $loseh = 0;
                    $wina = 0;
                    $drawa = 0;
                    $losea = 0;
                    $hid = $base['matches']['hid'];
                    //                            dump($base['recentBattle']['home']);
                    if (isset($base['recentBattle']['home'])){
                        foreach($base['recentBattle']['home']['all'] as $match){
                            if($match['hscore'] > $match['ascore'])
                                if($match['hid'] == $hid)
                                    $winh++;
                                else
                                    $loseh++;
                            elseif($match['hscore'] < $match['ascore'])
                                if($match['hid'] == $hid)
                                    $loseh++;
                                else
                                    $winh++;
                            else
                                $drawh++;
                        }
                    }
                    if (isset($base['recentBattle']['away'])){
                        foreach($base['recentBattle']['away']['all'] as $match){
                            if($match['hscore'] > $match['ascore'])
                                if($match['hid'] == $aid)
                                    $wina++;
                                else
                                    $losea++;
                            elseif($match['hscore'] < $match['ascore'])
                                if($match['hid'] == $aid)
                                    $losea++;
                                else
                                    $wina++;
                            else
                                $drawa++;
                        }
                    }

                    $homePer = ($winh +$drawh + $loseh) > 0 ? round(100*($winh/($winh+$loseh+$drawh)),0) : 0;
                    $awayPer = ($wina + $drawa + $losea) > 0 ? round(100*($wina/($wina+$drawa+$losea)),0) : 0;

                    ?>
                    <dt>
                        <p class="host"><b>{{$winh}}</b>&nbsp;胜&nbsp;<b>{{$drawh}}</b>&nbsp;平&nbsp;<b>{{$loseh}}</b>&nbsp;负</p>
                        <p class="away"><b>{{$wina}}</b>&nbsp;胜&nbsp;<b>{{$drawa}}</b>&nbsp;平&nbsp;<b>{{$losea}}</b>&nbsp;负</p>
                        <p>近期战绩</p>
                    </dt>
                    <dd>
                        <p class="host" style="width: {{($homePer+$awayPer) == 0 ? 0 : (100*$homePer/($homePer+$awayPer))}}%;"></p><span class="host">主胜&nbsp;{{$homePer}}%</span>
                        <p class="away" style="width: {{($homePer+$awayPer) == 0 ? 0 : (100*$awayPer/($homePer+$awayPer))}}%;"></p><span class="away">{{$awayPer}}%&nbsp;客胜</span>
                    </dd>
                </dl>
            </div>
            @if(isset($sameOdd) && isset($sameOdd['match_win']) && (strlen($sameOdd['match_win']) > 0))
                <div class="sameOdd"
                     @if($base['matches'] && $base['matches']['status'] > 0 && $isLive)
                     style="display: none"
                     @else
                     style="display: block"
                        @endif
                >
                    <p class="name">统计共<b>10</b>场相同赔率比赛</p>
                    <p class="win">主胜<b>{{$sameOdd['match_win']}}%</b></p>
                    <p class="draw">平局<b>{{$sameOdd['match_draw']}}%</b></p>
                    <p class="lose">客胜<b>{{$sameOdd['match_lose']}}%</b></p>
                    <a onclick="SameOdd()">详细历史同赔数据</a>
                </div>
            @endif
            @if(isset($base['matches']))
                <div class="video"
                     @if($base['matches'] && $base['matches']['status'] > 0 && $isLive)
                     style="display: block"
                     @else
                     style="display: none"
                        @endif
                >
                    <a target="_blank" href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($id)}}" class="goVideo">正在直播</a>
                    <a target="_blank" href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($id)}}"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a>
                </div>
            @endif
        </div>
        <div id="Tabbar">
            <button id="Tab_Match" onclick="clickMatchBase()">比赛赛况</button><button id="Tab_Characteristic" onclick="clickCharacteristic(0)">特色数据</button><button id="Tab_Data" onclick="onChangeTab('Data')" class="on">数据分析</button><button id="Tab_Corner" onclick="clickCorner()">角球数据</button>
        </div>
        <div id="Match" class="tabContent" style="display: none;">
        </div>
        <div id="Characteristic" class="tabContent" style="display: none;">
        </div>
        <div id="Data" class="tabContent" style="display: block;">
            @if(isset($base['attribute']))
                <div class="strength default" id="Data_Strength">
                    @component("pc.detail.football_cell.attribute",['data'=>$base['attribute'],'match'=>$base['matches']])
                    @endcomponent
                </div>
            @endif
            {{--<a href="https://www.liaogou168.com/merchant/detail/10008" target="_blank" class="bannerAD default"><img src="{{env('CDN_URL')}}/img/ad_t2_all.jpg"></a>--}}
            <div class="odd default" id="Data_Odd"></div>
            @if(isset($base['rank']) && (count($base['rank']['host']) > 1 || count($base['rank']['away']) > 1))
                <div class="league default" id="Data_League">
                    @component("pc.detail.football_cell.league",['data'=>$base['rank'],'match'=>$base['matches']])
                    @endcomponent
                </div>
            @endif
            @if(isset($base['historyBattle']))
                <div class="battle default" id="Data_Battle" league="0" ha="0">
                    @component("pc.detail.football_cell.battle",['data'=>$base['historyBattle'],'analyse'=>$base['historyBattleResult'],'hid'=>$base['matches']['hid']])
                    @endcomponent
                </div>
            @endif
            @if(isset($base['recentBattle']))
                <div class="history default" id="Data_History">
                    @component("pc.detail.football_cell.history",['data'=>$base['recentBattle'],'match'=>$base['matches']])
                    @endcomponent
                </div>
            @endif
            @if(isset($base['oddResult']))
                @component("pc.detail.football_cell.odd_result",['data'=>$base['oddResult'],'match'=>$base['matches']])
                @endcomponent
            @endif
            @if(isset($base['schedule']))
                @component("pc.detail.football_cell.schedule",['data'=>$base['schedule'],'match'=>$base['matches']])
                @endcomponent
            @endif
        </div>
        <div id="Corner" class="tabContent" style="display: none;"></div>
        <div id="Talent" class="tabContent" style="display: none;"></div>
        <div class="clear"></div>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/public.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/match.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/football-detail.js"></script>
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/self/football-detail-util.js"></script>
    <script type="text/javascript">
        //setCurr(2);
        window.onload = function () {
            setInfoCanvas();
            //setOnChangeTab();
            setDataCanvas();
            setBG();

            if(location.href.indexOf('#Characteristic')!=-1) {
                var Oddtype = GetQueryString('type',location.href);
                if (Oddtype > 0) {
                    clickCharacteristic(Oddtype);
                }
                else{
                    clickCharacteristic(0);
                }
            } else if(location.href.indexOf('#Corner')!=-1) {
                clickCorner();
            } else if(location.href.indexOf('#Match')!=-1) {
                clickMatchBase();
            }

            $('#Info .sameOdd a').click(function(){
                $('#Tab_Characteristic').trigger('click');
                location.href = '#Characteristic_SameOdd';
            })
        }
    </script>
    <script type="text/javascript">
        var BaseData = $.parseJSON('{!!json_encode($base)!!}');
        var BaseResultData = [];
        sortData(BaseData, BaseResultData);
        getOddHtml();{{-- 获取数据分析 赔率指数 单元 --}}

        function getOddHtml() {
            $.ajax({
                url:'/football/detail_cell/odd/{{$id}}.html',
                success:function (html) {
                    if (html == '') {
                        $('#Data_Odd')[0].style.display = 'none';
                    } else {
                        $('#Data_Odd')[0].style.display = 'block';
                        $('#Data_Odd').html(html);
                    }
                }, error:function() {
                    $('#Data_Odd')[0].style.display = 'none';
                }
            });
        }
        //处理数据
        function sortData(BaseData, BaseResultData) {
            var historyBattle = BaseData['historyBattle'];
            BaseResultData['historyBattle'] = [];
            BaseResultData['historyBattle']['nhnl'] = [];
            BaseResultData['historyBattle']['nhsl'] = [];
            BaseResultData['historyBattle']['shnl'] = [];
            BaseResultData['historyBattle']['shsl'] = [];

            //交锋往绩
            if (historyBattle) {
                var tmps = historyBattle['nhnl'];
                var result = sortDataItem(tmps, 10);
                BaseResultData['historyBattle']['nhnl']['10'] = result;
                result = sortDataItem(tmps, 20);
                BaseResultData['historyBattle']['nhnl']['20'] = result;
                tmps = historyBattle['nhsl'];
                result = sortDataItem(tmps, 10);
                BaseResultData['historyBattle']['nhsl']['10'] = result;
                result = sortDataItem(tmps, 20);
                BaseResultData['historyBattle']['nhsl']['20'] = result;
                tmps = historyBattle['shsl'];
                result = sortDataItem(tmps, 10);
                BaseResultData['historyBattle']['shsl']['10'] = result;
                result = sortDataItem(tmps, 20);
                BaseResultData['historyBattle']['shsl']['20'] = result;
                tmps = historyBattle['shnl'];
                result = sortDataItem(tmps, 10);
                BaseResultData['historyBattle']['shnl']['10'] = result;
                result = sortDataItem(tmps, 20);
                BaseResultData['historyBattle']['shnl']['20'] = result;
            }

            //最近对阵
            BaseResultData['recentBattle'] = [];
            if (BaseData['recentBattle']) {
                result = sortDataTeamRecent(BaseData['recentBattle']['home']);
                BaseResultData['recentBattle']['home'] = result;
                result = sortDataTeamRecent(BaseData['recentBattle']['away']);
                BaseResultData['recentBattle']['away'] = result;
            }
        }
        function sortDataTeamRecent(team) {
            var result = [];
            result['nhnl'] = [];
            result['shnl'] = [];
            result['nhsl'] = [];
            result['shsl'] = [];

            if (team == null)
                return result;

            if(team['all'] != null) {
                result['nhnl']['10'] = sortDataItem2(team['all'], 10);
                result['nhnl']['20'] = sortDataItem2(team['all'], 20);
            }
            if(team['sameHA'] != null) {
                result['shnl']['10'] = sortDataItem2(team['sameHA'], 10);
                result['shnl']['20'] = sortDataItem2(team['sameHA'], 20);
            }
            if(team['sameL'] != null) {
                result['nhsl']['10'] = sortDataItem2(team['sameL'], 10);
                result['nhsl']['20'] = sortDataItem2(team['sameL'], 20);
            }
            if(team['sameHAL'] != null) {
                result['shsl']['10'] = sortDataItem2(team['sameHAL'], 10);
                result['shsl']['20'] = sortDataItem2(team['sameHAL'], 20);
            }
            return result;
        }
        function sortDataItem2(tmps,count) {
            var europe = [];
            var asia1 = [];
            var asia2 = [];
            var goal1 = [];
            var goal2 = [];

            for (var i = 0 ; i < Math.min(tmps.length,count) ; i++){
                var tmp = tmps[i];
                var hscore = tmp["hscore"];
                var ascore = tmp["ascore"];
                var isHost = (tmp["hid"] == '{{$base['matches']['hid']}}');
                var result = getMatchResult(hscore,ascore,isHost);
                switch (result){
                    case 3:
                        europe.push(3);
                        break;
                    case 1:
                        europe.push(1);
                        break;
                    case 0:
                        europe.push(0);
                        break;
                }
                var result = getMatchAsiaOddResult(hscore,ascore,tmp['middle1'],isHost);
                switch (result){
                    case 3:
                        asia1.push(3);
                        break;
                    case 1:
                        asia1.push(1);
                        break;
                    case 0:
                        asia1.push(0);
                        break;
                }
                var result = getMatchAsiaOddResult(hscore,ascore,tmp['middle2'],isHost);
                switch (result){
                    case 3:
                        asia2.push(3);
                        break;
                    case 1:
                        asia2.push(1);
                        break;
                    case 0:
                        asia2.push(0);
                        break;
                }

                var result = getMatchSizeOddResult(hscore,ascore,tmp['goalMiddle1']);
                switch (result){
                    case 3:
                        goal1.push(3);
                        break;
                    case 1:
                        goal1.push(1);
                        break;
                    case 0:
                        goal1.push(0);
                        break;
                }

                var result = getMatchSizeOddResult(hscore,ascore,tmp['goalMiddle2']);
                switch (result){
                    case 3:
                        goal2.push(3);
                        break;
                    case 1:
                        goal2.push(1);
                        break;
                    case 0:
                        goal2.push(0);
                        break;
                }
            }
            return {
                'europe': europe,
                'asia1':asia1,
                'asia2':asia2,
                'goal1':goal1,
                'goal2':goal2
            };
        }
        function sortDataItem(tmps,count) {
            var ouWin = 0;
            var ouDraw = 0;
            var ouLose = 0;
            var asiaWin1 = 0;
            var asiaDraw1 = 0;
            var asiaLose1 = 0;
            var asiaWin2 = 0;
            var asiaDraw2 = 0;
            var asiaLose2 = 0;
            var goalWin1 = 0;
            var goalDraw1 = 0;
            var goalLose1 = 0;
            var goalWin2 = 0;
            var goalDraw2 = 0;
            var goalLose2 = 0;
            for (var i = 0 ; i < Math.min(tmps.length,count) ; i++){
                var tmp = tmps[i];
                var hscore = tmp["hscore"];
                var ascore = tmp["ascore"];
                var isHost = (tmp["hid"] == '{{$base['matches']['hid']}}');
                var result = getMatchResult(hscore,ascore,isHost);
                switch (result){
                    case 3:
                        ouWin++;
                        break;
                    case 1:
                        ouDraw++;
                        break;
                    case 0:
                        ouLose++;
                        break;
                }
                var result = getMatchAsiaOddResult(hscore,ascore,tmp['middle1'],isHost);
                switch (result){
                    case 3:
                        asiaWin1++;
                        break;
                    case 1:
                        asiaDraw1++;
                        break;
                    case 0:
                        asiaLose1++;
                        break;
                }
                var result = getMatchAsiaOddResult(hscore,ascore,tmp['middle2'],isHost);
                switch (result){
                    case 3:
                        asiaWin2++;
                        break;
                    case 1:
                        asiaDraw2++;
                        break;
                    case 0:
                        asiaLose2++;
                        break;
                }

                var result = getMatchSizeOddResult(hscore,ascore,tmp['goalMiddle1']);
                switch (result){
                    case 3:
                        goalWin1++;
                        break;
                    case 1:
                        goalDraw1++;
                        break;
                    case 0:
                        goalLose1++;
                        break;
                }

                var result = getMatchSizeOddResult(hscore,ascore,tmp['goalMiddle2']);
                switch (result){
                    case 3:
                        goalWin2++;
                        break;
                    case 1:
                        goalDraw2++;
                        break;
                    case 0:
                        goalLose2++;
                        break;
                }
            }
            return {'europe':
                    {'win':ouWin,'draw':ouDraw,'lose':ouLose},
                'asia1':
                    {'win':asiaWin1,'draw':asiaDraw1,'lose':asiaLose1},
                'asia2':
                    {'win':asiaWin2,'draw':asiaDraw2,'lose':asiaLose2},
                'goal1':
                    {'win':goalWin1,'draw':goalDraw1,'lose':goalLose1},
                'goal2':
                    {'win':goalWin2,'draw':goalDraw2,'lose':goalLose2}
            };
        }
    </script>
    <script type="text/javascript">
        function getCdnUrl(url) {
            var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';
            var url = http + '{{env('CDN_URL')}}' + url;
            return url;
        }
        var clickSameOdd = false;
        function SameOdd () {
            clickSameOdd = true;
            document.getElementById('Tab_characteristic').checked = true;
            for (var i = 0; i < $('.tabContent').length; i++) {
                if ($('.tabContent')[i].id != 'Characteristic') {
                    $('.tabContent')[i].style.display = 'none';
                }else{
                    $('.tabContent')[i].style.display = 'block';
                }
            }

            var LeftBar = $('.leftBar')[0].getElementsByTagName('p');
            for (var i = 0; i < LeftBar.length; i++) {
                if (LeftBar[i].className == 'Characteristic') {
                    LeftBar[i].style.display = 'block';
                }else{
                    LeftBar[i].style.display = 'none';
                }
            }

            location.href = '#Characteristic_SameOdd';
        }

        function changeCheckBox(Obj) {
            if (Obj.className.indexOf('on') == -1) {
                Obj.className += ' on';
            } else {
                Obj.className = Obj.className.replace(' on', '');
            }
        }

        function ChangeInput (Obj, Class) {
            var Box = document.getElementById('Data_' + Class);

            changeCheckBox(Obj);

            var league = document.getElementById(Class + '_League').className.indexOf('on') != -1;
            var ha = document.getElementById(Class + '_HA').className.indexOf('on') != -1;
            Box.setAttribute('league', league ? '1' : '0');
            Box.setAttribute('ha', ha ? '1' : '0');
        }

        //最近比赛特殊处理
        function ChangeInput2 (Obj, Class) {
            var Box = document.getElementById(Class);

            changeCheckBox(Obj);

            var league = document.getElementById(Class + '_League').className.indexOf('on') != -1;
            var ha = document.getElementById(Class + '_HA').className.indexOf('on') != -1;
            Box.setAttribute('league', league ? '1' : '0');
            Box.setAttribute('ha', ha ? '1' : '0');
        }

        function changeNum(select,Class) {
            var Boxs = $('.'+Class+'_item');
            for (var i = 0 ; i < Boxs.length ; i++) {
                Boxs[i].setAttribute('num', select.value);
            }

            Box = document.getElementById(Class);
            Box.setAttribute('num', select.value);

            if (Class.indexOf('History_') != -1) {
                var Boxs = $('div#'+Class+' table.commonTable');
                for (var i = 0 ; i < Boxs.length ; i++){
                    var Box = Boxs[i];
                    Box.setAttribute('num',select.value);
                }
            }
        }

        function changeNum2(select,Class) {
            var Boxs = $('div#'+Class+' table.commonTable');
            for (var i = 0 ; i < Boxs.length ; i++){
                var Box = Boxs[i];
                Box.setAttribute('num',select.value);
            }

            if(Class == 'Data_Battle'){
                updateBattleCanvas(['europe','asia','goal'],select.value);
            }
        }

        function onChangeTab(ID) {
            var tabButtons = $('#Tabbar button');
            for (var j = 0; j < tabButtons.length; j++) {
                if (tabButtons[j].id == 'Tab_' + ID) {
                    tabButtons[j].className = 'on';
                } else {
                    tabButtons[j].className = '';
                }
            }

            var tabContents = $('.tabContent');
            for (var i = 0; i < tabContents.length; i++) {
                if (tabContents[i].id == ID) {
                    tabContents[i].style.display = "block";
                } else {
                    tabContents[i].style.display = "none";
                }
            }

            var LeftBar = $('.leftBar p');
            for (var i = 0; i < LeftBar.length; i++) {
                if (LeftBar[i].className == ID) {
                    LeftBar[i].style.display = 'block';
                }else{
                    LeftBar[i].style.display = 'none';
                }
            }
            setTimeout('ResetView ()',200);
        }

        var hLeagueRank = '{{$hLeagueRank}}';
        var aLeagueRank = '{{$aLeagueRank}}';
        var hLeagueName = '{{$hLeagueName}}';
        var aLeagueName = '{{$aLeagueName}}';
        function clickCorner() {
            onChangeTab('Corner');
            if (0 == $('#Corner div').length){
                var url = getCdnUrl('/football/detail_cell/corner/{{$startTime}}/{{$id}}.html');
                $.ajax({
                    url: url,
                    success:function (html) {
                        $('#Corner').html(html);
                        if(hLeagueRank > 0) {
                            $('span.leagueRankH').html('[' + hLeagueName + hLeagueRank + ']');
                        }
                        if(aLeagueRank > 0) {
                            $('span.leagueRankA').html('[' + aLeagueName + aLeagueRank + ']');
                        }
                        if ($('#Corner div#Corner_Odd').length > 0){
                            $('div.leftBar p.Corner a[name=odd]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Corner a[name=odd]')[0].className = 'hide';
                        }
                        if ($('#Corner div#Corner_Data').length > 0){
                            $('div.leftBar p.Corner a[name=data]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Corner a[name=data]')[0].className = 'hide';
                        }
                        if ($('#Corner div#Corner_Battle').length > 0){
                            $('div.leftBar p.Corner a[name=battle]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Corner a[name=battle]')[0].className = 'hide';
                        }
                        if ($('#Corner div#Corner_History').length > 0){
                            $('div.leftBar p.Corner a[name=history]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Corner a[name=history]')[0].className = 'hide';
                        }
                    }
                })
            }
        }

        function clickMatchBase() {
            onChangeTab('Match');
            if (0 == $('#Match div').length){
                Alert('loading');
                var url = getCdnUrl('/football/detail_cell/base/{{$startTime}}/{{$id}}.html');
                $.ajax({
                    "url": url,
                    "success":function (html) {
                        $('#Match').html(html);
                        if(hLeagueRank > 0) {
                            $('span.leagueRankH').html('[' + hLeagueName + hLeagueRank + ']');
                        }
                        if(aLeagueRank > 0) {
                            $('span.leagueRankA').html('[' + aLeagueName + aLeagueRank + ']');
                        }
                        if ($('#Match div#Match_First').length > 0){
                            $('div.leftBar p.Match a[name=first]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Match a[name=first]')[0].className = 'hide';
                        }
                        if ($('#Match div#Match_Technology').length > 0){
                            $('div.leftBar p.Match a[name=technology]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Match a[name=technology]')[0].className = 'hide';
                        }
                        if ($('#Match div#Match_Event').length > 0){
                            $('div.leftBar p.Match a[name=event]')[0].className = 'show';
                            if ($('#Match div.host_event div').length == 0 && $('#Match div.away_event div').length == 0) {
                                getMatchData();
                            }
                        }
                        else{
                            $('div.leftBar p.Match a[name=event]')[0].className = 'hide';
                        }
                        closeLoading();
                    },
                    "error": function () {
                        closeLoading();
                    }
                })
            }
        }

        function clickCharacteristic(type) {
            onChangeTab('Characteristic');
            if (0 == $('#Characteristic div').length){
                Alert('loading');
                var url = getCdnUrl("/football/detail_cell/chara/{{$startTime}}/{{$id}}.html");
                $.ajax({
                    "url": url,
                    "success": function (html) {
                        $('#Characteristic').html(html);
                        setBG();
                        if(hLeagueRank > 0) {
                            $('span.leagueRankH').html('[' + hLeagueName + hLeagueRank + ']');
                        }
                        if(aLeagueRank > 0) {
                            $('span.leagueRankA').html('[' + aLeagueName + aLeagueRank + ']');
                        }
                        if (type > 0 || clickSameOdd) {
                            if (clickSameOdd){
                                type = 3;
                            }
                            changeSameOdd(type);
                            $('div#Characteristic_SameOdd')[0].type = type;
                        }
                        if ($('#Characteristic div#Characteristic_Prediction').length > 0){
                            $('div.leftBar p.Characteristic a[name=prediction]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Characteristic a[name=prediction]')[0].className = 'hide';
                        }
                        if ($('#Characteristic div#Characteristic_Referee').length > 0){
                            $('div.leftBar p.Characteristic a[name=referee]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Characteristic a[name=referee]')[0].className = 'hide';
                        }
                        if ($('#Characteristic div#Characteristic_Strength').length > 0){
                            $('div.leftBar p.Characteristic a[name=strength]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Characteristic a[name=strength]')[0].className = 'hide';
                        }
                        if ($('#Characteristic div#Characteristic_SameOdd').length > 0){
                            $('div.leftBar p.Characteristic a[name=sameOdd]')[0].className = 'show';
                        }
                        else{
                            $('div.leftBar p.Characteristic a[name=sameOdd]')[0].className = 'hide';
                        }
                        closeLoading();
                    },
                    "error": function () {
                        closeLoading();
                    }
                })
            }
        }

        function changeSameOdd(type) {
            var buttons = $('div#Characteristic_SameOdd div.control button');
            for (var i = 0; i < buttons.length; i++) {
                if (i == type - 1) {
                    if (buttons[i].className.indexOf('on') == -1)
                        buttons[i].className += ' on';
                } else {
                    buttons[i].className = buttons[i].className.replace(' on', '');
                }
            }

            var Box = document.getElementById('Characteristic_SameOdd');
            Box.setAttribute('type', type);

            var box_count = Box.getAttribute('count');
            var box_type = Box.getAttribute('type');
        }

        function changeCornerData(select) {
            var Box = document.getElementById('Corner_Data');
            Box.setAttribute('count', select.value);
        }

        function changeCornerRecentHL() {
            var Box = document.getElementById(id);
            Box.setAttribute('count', select.value);
        }

        function changeCornerHistory(Obj, key) {
            var Box = document.getElementById('Corner_Data_'+ key +'_Content');

            changeCheckBox(Obj);

            var ha = document.getElementById('History_'+key+'HA').className.indexOf('on') != -1;
            var league = document.getElementById('History_'+key+'League').className.indexOf('on') != -1;
            Box.setAttribute('league',league?'1':'0');
            Box.setAttribute('ha',ha?'1':'0');
        }

        function changeCornerBattle(Obj, key) {
            var Box = document.getElementById('Corner_Battle');

            changeCheckBox(Obj);

            var ha = document.getElementById('Battle_Corner_HA').className.indexOf('on') != -1;
            var league = document.getElementById('Battle_Corner_League').className.indexOf('on') != -1;
            Box.setAttribute('league',league?'1':'0');
            Box.setAttribute('ha',ha?'1':'0');
        }

        //初终盘
        function oddChange(divClass,tableClass,typeClass,select) {
            var tables = $('div' + '.' + divClass);
            for (var i = 0 ; i < tables.length; i++){
                var table = tables[i];
                table.setAttribute(typeClass,select.value);
            }

            var tmps = $('table.' + tableClass+ ' select.' + typeClass);
            for (var i = 0 ; i < tmps.length; i++){
                var tmp = tmps[i];
                tmp.value = select.value;
            }

            //历史对阵刷新饼图
            if (divClass == 'battle_content'){
                updateBattleCanvas([typeClass],select.value);
            }
            //近期战绩刷新折线图
            if (divClass == 'history_H_content'){
                updateRecentCanvas(divClass,[typeClass],'home');
            }
            if (divClass == 'history_A_content'){
                updateRecentCanvas(divClass,[typeClass],'away');
            }
        }

        function updateRecentCanvas(divClass,typeClasses,haKey) {
            for(var i = 0 ; i < typeClasses.length; i++) {
                var typeClass = typeClasses[i];
                //多少场
                var num = $('div.' + divClass).parent()[0].getAttribute('num');
                //初盘即时
                var countText = '';
                if (typeClass == 'europe'){
                    countText = '';
                }
                else if (typeClass == 'asia'){
                    countText = $('div.'+divClass)[0].getAttribute('asia');
                }
                else if (typeClass == 'goal'){
                    countText = $('div.'+divClass)[0].getAttribute('goal');
                }

                var dls = $('div.' + divClass +' div.svgbox[num='+num+'] dl.'+typeClass);
                for (var j = 0 ; j < 4 ; j++){
                    var dl = dls[j];
//                    console.log(dl);
                    var dds = $(dl).find('dd');
                    var datas;
//                    console.log(haKey + ' ' + num + ' ' + typeClass+countText);
                    switch (j){
                        case 0:
                            datas = BaseResultData['recentBattle'][haKey]['nhnl'][num][typeClass + countText];
                            break;
                        case 1:
                            datas = BaseResultData['recentBattle'][haKey]['shnl'][num][typeClass + countText];
                            break;
                        case 2:
                            datas = BaseResultData['recentBattle'][haKey]['nhsl'][num][typeClass + countText];
                            break;
                        case 3:
                            datas = BaseResultData['recentBattle'][haKey]['shsl'][num][typeClass + countText];
                            break;
                    }
//                    console.log(datas);
                    var lines = $(dl).find('svg.' + (num == 10 ? 'ten': 'twenty') + ' line');
//                    console.log(lines);
                    for (var k = 0 ; k < dds.length ; k++){
                        var dd = dds[k];
                        var data = null;
//                        console.log(dds);
                        var y1 = '';
                        if (datas.length > k){
                            data = datas[k];
                            switch(data){
                                case 3:
                                    dd.className = 'win';
                                    y1 = '0%';
                                    break;
                                case 1:
                                    dd.className = 'draw';
                                    y1 = '50%';
                                    break;
                                case 0:
                                    dd.className = 'lose';
                                    y1 = '100%';
                                    break;
                            }
                        }
                        else{
                            dd.className = '';
                        }

                        //线
                        if(lines.length > k){
                            var line = lines[k];
                            line.setAttribute('y1',y1);
                        }
                        //线
                        if(k > 0 && lines.length > (k - 1)){
                            var line = lines[k - 1];
                            if (y1 == ''){
                                line.setAttribute('display', 'none');
//                                console.log(line);
                            }
                            else {
                                line.setAttribute('y2', y1);
                                line.setAttribute('display','');
                            }
//                                console.log(line);
                        }
                    }
                }
            }
        }

        function updateBattleCanvas(typeClasses) {
            for(var i = 0 ; i < typeClasses.length; i++) {
                var typeClass = typeClasses[i];
                var countText = '';
                if (typeClass == 'europe'){
                    countText = '';
                }
                else if (typeClass == 'asia'){
                    countText = $('div.battle_content')[0].getAttribute('asia');
                }
                else if (typeClass == 'goal'){
                    countText = $('div.battle_content')[0].getAttribute('goal');
                }

                var num = $('table.Battle_item')[0].getAttribute('num');
                //重新写入饼图
                var canvas = $('#Data_Battle div.battle_content[league=0][ha=0] canvas.' + typeClass)[0];
//                console.log(typeClass + ' ' + countText);
                var tmpData = BaseResultData['historyBattle']['nhnl'][num][typeClass + '' + countText];
                changeCanvas(canvas, tmpData['win'], tmpData['draw'], tmpData['lose'], typeClass);

                var canvas = $('#Data_Battle div.battle_content[league=1][ha=0] canvas.' + typeClass)[0];
                var tmpData = BaseResultData['historyBattle']['nhsl'][num][typeClass + '' + countText];
                changeCanvas(canvas, tmpData['win'], tmpData['draw'], tmpData['lose'], typeClass);

                var canvas = $('#Data_Battle div.battle_content[league=0][ha=1] canvas.' + typeClass)[0];
                var tmpData = BaseResultData['historyBattle']['shnl'][num][typeClass + '' + countText];
                changeCanvas(canvas, tmpData['win'], tmpData['draw'], tmpData['lose'], typeClass);

                var canvas = $('#Data_Battle div.battle_content[league=1][ha=1] canvas.' + typeClass)[0];
                var tmpData = BaseResultData['historyBattle']['shsl'][num][typeClass + '' + countText];
                changeCanvas(canvas, tmpData['win'], tmpData['draw'], tmpData['lose'], typeClass);
            }
        }

        //修改饼图
        function changeCanvas(canvas,win,draw,lose,typeClass) {
            var total = win + draw + lose;
            canvas.setAttribute('win',win);
            canvas.setAttribute('draw',draw);
            canvas.setAttribute('lose',lose);
            var text = typeClass == 'asia' ? '主赢':'大球';
            var text2 = '走水';
            var text3 = typeClass == 'asia' ? '主输':'小球';

            $(canvas.parentElement).find('p.'+ canvas.className +' span.win').html(text + '：'+(total > 0 ? Math.floor(100*win/total) : 0)+'%')
            $(canvas.parentElement).find('p.'+ canvas.className +' span.draw').html(text2 + '：'+(total > 0 ? Math.floor(100*draw/total) : 0)+'%')
            $(canvas.parentElement).find('p.'+ canvas.className +' span.lose').html(text3 + '：'+(total > 0 ? Math.floor(100*lose/total) : 0)+'%')
            setDataCanvas();
        }

        //右侧导航栏隐藏
        if ($('#Data div#Data_Strength').length > 0){
            $('div.leftBar p.Data a[name=strength]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=strength]')[0].className = 'hide';
        }
        if ($('#Data div#Data_Odd').length > 0){
            $('div.leftBar p.Data a[name=odd]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=odd]')[0].className = 'hide';
        }
        if ($('#Data div#Data_League').length > 0){
            $('div.leftBar p.Data a[name=league]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=league]')[0].className = 'hide';
        }
        if ($('#Data div#Data_Battle').length > 0){
            $('div.leftBar p.Data a[name=battle]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=battle]')[0].className = 'hide';
        }
        if ($('#Data div#Data_History').length > 0){
            $('div.leftBar p.Data a[name=history]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=history]')[0].className = 'hide';
        }
        if ($('#Data div#Data_Track').length > 0){
            $('div.leftBar p.Data a[name=track]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=track]')[0].className = 'hide';
        }
        if ($('#Data div#Data_Future').length > 0){
            $('div.leftBar p.Data a[name=future]')[0].className = 'show';
        }
        else{
            $('div.leftBar p.Data a[name=future]')[0].className = 'hide';
        }

        @if(isset($id) && $base['matches']['status'] > 0 && $base['matches']['status'] < 4)
        function refresh() {
            refreshMatch();
            hasLive();
        }
        setInterval(refresh, 5000);
        @endif
        function refreshMatch() {
            //刷新比赛信息
            var url = getCdnUrl("/football/change/live.json");
            $.ajax({
                "url": url + "?rd=" + (new Date()).getTime(),
                "dataType": "json",
                "success": function (json) {
                    var dataItem = json["{{$id}}"];
                    var scoreItem = $($('div#Info div.score')[0]);
                    if (scoreItem && dataItem) {
                        var currentScore = dataItem.score;
                        scoreItem.html(currentScore);
                    }
                    var time = dataItem.time;
                    var px = 0;
                    if (time == '中场') {
                        px = 45 * (780 / 90);
                    } else if (time == "已结束") {
                        px = 780;
                    } else if (time == ""){
                        px = 0;
                    } else {
                        time = time.replace('/[^\d]+/', '');
                        time = parseInt(time);
                        px = time * (780 / 90);
                    }
                    var fill = $("#Match_Event div.timeline div.fill");
                    fill.css('width', px + 'px');
                },
                "error": function () {

                }
            });
        }
        function hasLive() {
            //直播刷新
            var url = getCdnUrl('/football/has_live/{{$id}}.json');
            $.ajax({
                "url": url,
                "dataType": "json",
                "success": function (json) {
                    if ($('div.video').length > 0) {
                        $('div.video')[0].style.display = json['live'] == 0 ? 'none' : '';
                    }
                    if ($('div.analysis').length > 0) {
                        $('div.analysis')[0].style.display = json['live'] == 0 ? '' : 'none';
                    }
                    if ($('#Info div.sameOdd').length > 0) {
                        if (json['live'] == 0) {
                            $('#Info div.sameOdd').show();
                        } else {
                            $('#Info div.sameOdd').hide();
                        }
                    }
                },
                "error": function () {

                }
            });
        }
        hasLive();//执行一次.
        $("a[href=#Navigation]").click(function () {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        });
    </script>
    <script type="text/javascript">
        @if(isset($id))
        function getMatchData() {
            if (0 == $('#Match div').length) return;
            var url = getCdnUrl("/football/events/{{$id}}.json");
            $.ajax({
                "url": url + "?date=" + {{date('Ymd', strtotime($match['time']))}} + "&time=" + (new Date().getTime()),
                "dataType": "json",
                "success": function (json) {
                    if (json && json.code) {
                        //无滚球数据
                    } else if (json) {
                        if (json.event) {//比赛事件
                            eventConvert(json);
                        }
                    }
                }
            });
        }
        @endif
        @if(isset($base['matches']['status']) && $base['matches']['status'] > 0 && $base['matches']['status'] < 4)
        setInterval(getMatchData, 5000);
        @endif
    </script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/match.css">
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/pc/self/match.css">
@endsection