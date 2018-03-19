<div id="Corner" class="tabContent" style="display: none;">
<?php $hname = $match['hname']; $aname = $match['aname']; ?>
@if((isset($match['cornermiddle1']) || isset($match['cornermiddle2'])))
    <div class="odd default" id="Corner_Odd">
        <div class="title">
            <p>角球指数</p>
        </div>
        <table>
            <thead>
            <tr>
                <th class="status"></th>
                <th>大球</th>
                <th>盘口</th>
                <th>小球</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>初盘</td>
                <td>{{$match['cornerup1']}}</td>
                <td>{{$match['cornermiddle1']}}</td>
                <td>{{$match['cornerdown1']}}</td>
            </tr>
            <tr>
                <td>即时</td>
                <td
                @if($match['cornerup2'] > $match['cornerup1'])
                    class="red"
                @elseif($match['cornerup2'] < $match['cornerup1'])
                    class="green"
                @endif
                >{{$match['cornerup2']}}</td>
                <td
                        @if($match['cornermiddle2'] > $match['cornermiddle1'])
                        class="red"
                        @elseif($match['cornermiddle2'] < $match['cornermiddle1'])
                        class="green"
                        @endif
                >{{$match['cornermiddle2']}}</td>
                <td
                        @if($match['cornerdown2'] > $match['cornerdown1'])
                        class="red"
                        @elseif($match['cornerdown2'] < $match['cornerdown1'])
                        class="green"
                        @endif
                >{{$match['cornerdown2']}}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
@if(isset($anaylse) && (
(isset($anaylse['home']) && isset($anaylse['home']['10'])) ||
(isset($anaylse['home']) && isset($anaylse['home']['20'])) ||
(isset($anaylse['away']) && isset($anaylse['away']['10'])) ||
(isset($anaylse['away']) && isset($anaylse['away']['20']))
))
    <div class="data default" id="Corner_Data" count="10">
        <div class="title">
            <p>数据统计</p>
            <div class="control">
                <div class="selectParent">
                    <select onchange="changeCornerData(this)">
                        <option value="10">近 10 场</option>
                        <option value="20">近 20 场</option>
                    </select>
                </div>
            </div>
        </div>
        <table class="Corner_Data_table" count="10">
            <?php
            if (isset($anaylse['home']) && isset($anaylse['home']['10'])){
                $item = $anaylse['home']['10'];
            }
            else{
                $item = null;
            }
            ?>
            <thead>
            <tr>
                <th class="team">球队</th>
                <th>得球</th>
                <th>失球</th>
                <th>净胜</th>
                <th>总数</th>
                <th>大球率</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($item))
                <tr>
                    <td class="red">{{$match['hname']}}</td>
                    <td>{{round($item['get'],0)}}</td>
                    <td>{{round($item['lose'],0)}}</td>
                    <td>{{round($item['leave'],0)}}</td>
                    <td>{{$item['lose'] + $item['get']}}</td>
                    <td>{{round($item['big'],0)}}%</td>
                </tr>
            @endif
            <?php
            if (isset($anaylse['away']) && isset($anaylse['away']['10'])){
                $item = $anaylse['away']['10'];
            }
            else{
                $item = null;
            }
            ?>
            @if(isset($item))
                <tr>
                    <td class="blue">{{$match['aname']}}</td>
                    <td>{{round($item['get'],0)}}</td>
                    <td>{{round($item['lose'],0)}}</td>
                    <td>{{round($item['leave'],0)}}</td>
                    <td>{{$item['lose'] + $item['get']}}</td>
                    <td>{{round($item['big'],0)}}%</td>
                </tr>
            @endif
            </tbody>
        </table>
        <table class="Corner_Data_table" count="20">
            <?php
            if (isset($anaylse['home']) && isset($anaylse['home']['20'])){
                $item = $anaylse['home']['20'];
            }
            else{
                $item = null;
            }
            ?>
            <thead>
            <tr>
                <th class="team">球队</th>
                <th>得球</th>
                <th>失球</th>
                <th>净胜</th>
                <th>总数</th>
                <th>大球率</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($item))
                <tr>
                    <td class="red">{{$hname}}</td>
                    <td>{{round($item['get'],0)}}</td>
                    <td>{{round($item['lose'],0)}}</td>
                    <td>{{round($item['leave'],0)}}</td>
                    <td>{{$item['lose'] + $item['get']}}</td>
                    <td>{{round($item['big'],0)}}%</td>
                </tr>
            @endif
            <?php
            if (isset($anaylse['away']) && isset($anaylse['away']['20'])){
                $item = $anaylse['away']['20'];
            }
            else{
                $item = null;
            }
            ?>
            @if(isset($item))
                <tr>
                    <td class="blue">{{$match['aname']}}</td>
                    <td>{{round($item['get'],0)}}</td>
                    <td>{{round($item['lose'],0)}}</td>
                    <td>{{round($item['leave'],0)}}</td>
                    <td>{{$item['lose'] + $item['get']}}</td>
                    <td>{{round($item['big'],0)}}%</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
@endif
@if((count($historyBattle['nhnl']) + count($historyBattle['shnl']) + count($historyBattle['nhsl']) + count($historyBattle['shsl'])) > 0)
    <div class="battle default" id="Corner_Battle" league="0" ha="0">
        <div class="title">
            <p>对赛往绩</p>
            <div class="control">
                <button id="Battle_Corner_HA" onclick="changeCornerBattle(this, 'Corner_Battle')" class="checkbox"></button>相同主客
                <button id="Battle_Corner_League" onclick="changeCornerBattle(this, 'Corner_Battle')" class="checkbox"></button>相同赛事
                <div class="selectParent">
                    <select>
                        <option>近 10 场</option>
                        <option>近 20 场</option>
                    </select>
                </div>
            </div>
        </div>
        @component('pc.detail.football_cell_new.corner_history_item',['hid'=>$match['hid'],'league'=>0,'ha'=>0,'hname'=>$hname,'aname'=>$aname,'data'=>$historyBattle['nhnl'],'analyse'=>$historyBattleResult['all']])
        @endcomponent
        @component('pc.detail.football_cell_new.corner_history_item',['hid'=>$match['hid'],'league'=>1,'ha'=>0,'hname'=>$hname,'aname'=>$aname,'data'=>$historyBattle['nhsl'],'analyse'=>$historyBattleResult['league']])
        @endcomponent
        @component('pc.detail.football_cell_new.corner_history_item',['hid'=>$match['hid'],'league'=>0,'ha'=>1,'hname'=>$hname,'aname'=>$aname,'data'=>$historyBattle['shnl'],'analyse'=>$historyBattleResult['team']])
        @endcomponent
        @component('pc.detail.football_cell_new.corner_history_item',['hid'=>$match['hid'],'league'=>1,'ha'=>1,'hname'=>$hname,'aname'=>$aname,'data'=>$historyBattle['shsl'],'analyse'=>$historyBattleResult['both']])
        @endcomponent
    </div>
@endif
@if(isset($recentBattle))
    <div class="history default" id="Corner_History">
        <div class="title">
            <p>近期战绩</p>
        </div>
        @if(isset($recentBattle['home']))
            @component('pc.detail.football_cell_new.corner_recent_item',['key'=>'H','name'=>$hname,'data'=>$recentBattle['home'],'match'=>$match])
            @endcomponent
        @endif
        @if(isset($recentBattle['away']))
            @component('pc.detail.football_cell_new.corner_recent_item',['key'=>'A','name'=>$aname,'data'=>$recentBattle['away'],'match'=>$match])
            @endcomponent
        @endif
    </div>
@endif
<div class="noList">暂无数据</div>
</div>