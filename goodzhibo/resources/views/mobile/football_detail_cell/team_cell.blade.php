<div id="Trait" class="childNode" style="">
    @if(isset($base) && isset($base['attribute']))
        <div class="strength default" ha="0" le="0">
            <div class="title">
                攻防能力<button class="close"></button>
                <div class="labelbox">
                    <label for="Strength_HA"><input type="checkbox" name="battle" value="ha" id="Strength_HA"><span></span>同主客</label>
                    <label for="Strength_LE"><input type="checkbox" name="battle" value="le" id="Strength_LE"><span></span>同赛事</label>
                </div>
            </div>
            @if(isset($base['attribute']))
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'0', 'key'=>'all'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'0', 'key'=>'host'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'1', 'key'=>'league'])
                @endcomponent
                @component("mobile.cell.football_detail_attr",
                    ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'1', 'key'=>'both'])
                @endcomponent
            @endif
        </div>
    @endif
    @if(isset($style) && isset($style['match']))
    <?php $ws = isset($style['ws']) ? $style['ws'] : []; ?>
    @component('mobile.cell.football_detail_style', ['ws'=>$ws, 'match'=>$style['match']])
    @endcomponent
    @endif
</div>
<div id="Corner" class="childNode" style="display: none;">
    @if(isset($corner))
    @component('mobile.cell.football_detail_corner', ['hid'=>$corner['hid'], 'hname'=>$corner['hname'], 'aname'=>$corner['aname']
        ,'aid'=>$corner['aid'] ,'odd'=>$corner['odd'], 'anaylse'=>$corner['anaylse']
        , 'historyBattle'=>$corner['historyBattle'] , 'recentBattle'=>$corner['recentBattle']
        , 'historyBattleResult'=>$corner['historyBattleResult']])
    @endcomponent
    @endif
</div>
<div class="bottom">
    <div class="btn">
        <input type="radio" name="Team" id="Team_Trait" value="Trait" checked="">
        <label for="Team_Trait">特点</label>
        <input type="radio" name="Team" id="Team_Corner" value="Corner">
        <label for="Team_Corner">角球</label>
    </div>
</div>