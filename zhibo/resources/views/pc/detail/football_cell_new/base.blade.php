<div id="Match" class="tabContent" style="display: none;">
    @component('pc.detail.football_cell_new.base_lineup', ['match'=>$match, 'lineup'=>$lineup]) @endcomponent
    @component('pc.detail.football_cell_new.base_tech', ['tech'=>$tech]) @endcomponent
    @component('pc.detail.football_cell_new.base_events', ['match'=>$match, 'tech'=>$tech]) @endcomponent
</div>