<div id="Data" class="content">
    @if(isset($odds) && count($odds) > 0)
    <div class="odd default">
        @component('mobile.cell.football_detail_odd', ['bankers'=>$odds])
        @endcomponent
    </div>
    @endif
    @component('mobile.basketball_detail_cell.analyse_battle_cell', ['base'=>$base, 'match'=>$match])
    @endcomponent
</div>