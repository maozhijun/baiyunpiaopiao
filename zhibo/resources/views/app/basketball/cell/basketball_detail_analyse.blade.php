@if(isset($base['rank']['host']['all']) || isset($base['rank']['away']['all']))
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
@endif
@if(isset($base['historyBattle']))
    <div class="battle matchTable default" ha="0" le="0">
        <div class="title">
            交锋往绩<button class="close"></button>
            <div class="labelbox">
                <label for="Battle_HA"><input type="checkbox" name="battle" value="ha" id="Battle_HA"><span></span>同主客</label>
                <label for="Battle_LE"><input type="checkbox" name="battle" value="le" id="Battle_LE"><span></span>同赛事</label>
            </div>
        </div>
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$base,'data'=>$base['historyBattle']['nhnl'],'league'=>0,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$base,'data'=>$base['historyBattle']['shnl'],'league'=>0,'ha'=>1,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$base,'data'=>$base['historyBattle']['nhsl'],'league'=>1,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$base,'data'=>$base['historyBattle']['shsl'],'league'=>1,'ha'=>1,'hid'=>$match['hid']])
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
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['home']['all'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['home']['sameHA'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['home']['sameL'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['home']['sameHAL'], 'hid'=>$match['hid']])
            @endcomponent
        @endif
        @if(isset($recent['away']))
            <p class="teamName"><span>{{$match['aname']}}</span></p>
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['away']['all'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['away']['sameHA'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['away']['sameL'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['away']['sameHAL'], 'hid'=>$match['aid']])
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
@if(isset($base['schedule']) &&
(count($base['schedule']['home']) > 0 || count($base['schedule']['away']) > 0))
    <div class="future matchTable default">
        <div class="title">
            未来赛程<button class="close"></button>
        </div>
        @if(count($base['schedule']['home']) > 0)
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['hname'], 'data'=>$base['schedule']['home'], 'tid'=>$match['hid']])
            @endcomponent
        @endif
        @if(count($base['schedule']['away']) > 0)
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['aname'], 'data'=>$base['schedule']['away'], 'tid'=>$match['aid']])
            @endcomponent
        @endif
    </div>
@endif