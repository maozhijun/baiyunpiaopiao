<div class="odd default">
    <div class="title">角球指数<button class="close"></button></div>
    <table>
        <thead>
        <tr>
            <th></th>
            <th>大球</th>
            <th>盘口</th>
            <th>小球</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($odd))
        <tr>
            <td>初盘</td>
            <td>{{number_format($odd['up1'], 2)}}</td>
            <td>{{number_format($odd['middle1'], 2)}}球</td>
            <td>{{number_format($odd['down1'], 2)}}</td>
        </tr>
        <tr>
            <td>即时</td>
            <td>{{number_format($odd['up2'], 2)}}</td>
            <td>{{number_format($odd['middle2'], 2)}}球</td>
            <td>{{number_format($odd['down2'], 2)}}</td>
        </tr>
        @else
            <tr>
                <td>初盘</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            <tr>
                <td>即时</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
        @endif
        </tbody>
    </table>
</div>
@if(isset($anaylse) && (
(isset($anaylse['home']) && isset($anaylse['home']['10'])) ||
(isset($anaylse['away']) && isset($anaylse['away']['10']))
))
<div class="total default" ha="0" le="0">
    <div class="title">
        数据统计<button class="close"></button>
    </div>
    <table ha="0" le="0">
        <thead>
        <tr>
            <th>球队</th>
            <th>得球</th>
            <th>失球</th>
            <th>净胜</th>
            <th>总数</th>
            <th>大球率</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($anaylse['home']) && isset($anaylse['home']['10']))
            <tr>
                <td>{{$hname}}</td>
                <td>{{round($anaylse['home']['10']['get'],0)}}</td>
                <td>{{round($anaylse['home']['10']['lose'],0)}}</td>
                <td>{{round($anaylse['home']['10']['leave'],0)}}</td>
                <td>{{$anaylse['home']['10']['lose'] + $anaylse['home']['10']['get']}}</td>
                <td>{{round($anaylse['home']['10']['big'],0)}}%</td>
            </tr>
        @endif
        @if(isset($anaylse['away']) && isset($anaylse['away']['10']))
            <tr>
                <td>{{$aname}}</td>
                <td>{{round($anaylse['away']['10']['get'],0)}}</td>
                <td>{{round($anaylse['away']['10']['lose'],0)}}</td>
                <td>{{round($anaylse['away']['10']['leave'],0)}}</td>
                <td>{{$anaylse['away']['10']['lose'] + $anaylse['away']['10']['get']}}</td>
                <td>{{round($anaylse['away']['10']['big'],0)}}%</td>
            </tr>
        @endif
        <tr>
            <td colspan="6">* 备注：数值为角球场均值</td>
        </tr>
        </tbody>
    </table>
</div>
@endif
@if((count($historyBattle['nhnl']) + count($historyBattle['shnl']) + count($historyBattle['nhsl']) + count($historyBattle['shsl'])) > 0)
<div class="battle matchTable default" ha="0" le="0">
    <div class="title">
        交锋往绩<button class="close"></button>
        <div class="labelbox">
            <label for="Corner_Battle_HA"><input type="checkbox" name="corner_battle" value="ha" id="Corner_Battle_HA"><span></span>同主客</label>
            <label for="Corner_Battle_LE"><input type="checkbox" name="corner_battle" value="le" id="Corner_Battle_LE"><span></span>同赛事</label>
        </div>
    </div>
    @component("mobile.cell.football_detail_corner_h_item",
        ['data'=>$historyBattle['nhnl'], 'analyse'=>$historyBattleResult['all'], 'ha'=>0,'le'=>0,'hid'=>$hid, 'hname'=>$hname])
    @endcomponent
    @component("mobile.cell.football_detail_corner_h_item",
        ['data'=>$historyBattle['nhsl'], 'analyse'=>$historyBattleResult['league'], 'ha'=>1,'le'=>0,'hid'=>$hid, 'hname'=>$hname])
    @endcomponent
    @component("mobile.cell.football_detail_corner_h_item",
        ['data'=>$historyBattle['shnl'], 'analyse'=>$historyBattleResult['team'], 'ha'=>0,'le'=>1,'hid'=>$hid, 'hname'=>$hname])
    @endcomponent
    @component("mobile.cell.football_detail_corner_h_item",
        ['data'=>$historyBattle['shsl'], 'analyse'=>$historyBattleResult['both'], 'ha'=>1,'le'=>1,'hid'=>$hid, 'hname'=>$hname])
    @endcomponent
</div>
@endif
@if(isset($recentBattle) && isset($recentBattle['home']) && isset($recentBattle['away']))
<div class="history matchTable default" ha="0" le="0">
    <?php
        $home = $recentBattle['home'];
        $away = $recentBattle['away'];
    ?>
    <div class="title">
        近期战绩<button class="close"></button>
        <div class="labelbox">
            <label for="Corner_History_HA"><input type="checkbox" name="corner_history" value="ha" id="Corner_History_HA"><span></span>同主客</label>
            <label for="Corner_History_LE"><input type="checkbox" name="corner_history" value="le" id="Corner_History_LE"><span></span>同赛事</label>
        </div>
    </div>
    <p class="teamName"><span>{{$hname}}</span></p>
    @component("mobile.cell.football_detail_corner_n_item",
        ['data'=>$home['all'], 'analyse'=>$home['statistic']['all'], 'ha'=>0,'le'=>0,'tid'=>$hid])
    @endcomponent
    @component("mobile.cell.football_detail_corner_n_item",
        ['data'=>$home['sameHA'], 'analyse'=>$home['statistic']['sameHA'], 'ha'=>1, 'le'=>0,'tid'=>$hid])
    @endcomponent
    @component("mobile.cell.football_detail_corner_n_item",
        ['data'=>$home['sameL'], 'analyse'=>$home['statistic']['sameL'], 'ha'=>0, 'le'=>1,'tid'=>$hid])
    @endcomponent
    @component("mobile.cell.football_detail_corner_n_item",
        ['data'=>$home['sameHAL'], 'analyse'=>$home['statistic']['sameHAL'], 'ha'=>1, 'le'=>1,'tid'=>$hid])
    @endcomponent
    <p class="teamName"><span>{{$aname}}</span></p>
        @component("mobile.cell.football_detail_corner_n_item",
            ['data'=>$away['all'], 'analyse'=>$away['statistic']['all'], 'ha'=>0,'le'=>0,'tid'=>$aid])
        @endcomponent
        @component("mobile.cell.football_detail_corner_n_item",
            ['data'=>$away['sameHA'], 'analyse'=>$away['statistic']['sameHA'], 'ha'=>1, 'le'=>0,'tid'=>$aid])
        @endcomponent
        @component("mobile.cell.football_detail_corner_n_item",
            ['data'=>$away['sameL'], 'analyse'=>$away['statistic']['sameL'], 'ha'=>0, 'le'=>1,'tid'=>$aid])
        @endcomponent
        @component("mobile.cell.football_detail_corner_n_item",
            ['data'=>$away['sameHAL'], 'analyse'=>$away['statistic']['sameHAL'], 'ha'=>1, 'le'=>1,'tid'=>$aid])
        @endcomponent
</div>
@endif