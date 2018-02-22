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