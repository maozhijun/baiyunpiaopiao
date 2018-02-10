<div id="Trait" class="childNode" style="">
    @if(isset($style))
    @component('mobile.cell.football_detail_style', ['ws'=>$style['ws'], 'match'=>$style['match']])
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