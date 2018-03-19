@if(isset($base['historyBattle']))
    <div class="battle default" id="Data_Battle" league="0" ha="0">
    @component("pc.detail.football_cell_new.battle",['data'=>$base['historyBattle'],'analyse'=>$base['historyBattleResult'],'hid'=>$match['hid']])
    @endcomponent
    </div>
@endif