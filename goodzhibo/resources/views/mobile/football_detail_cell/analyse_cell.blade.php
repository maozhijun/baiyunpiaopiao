<div id="Data" class="content">
    <div class="odd default">
        @component('mobile.cell.football_detail_odd', ['bankers'=>$odd['bankers']])
        @endcomponent
    </div>
    @component('mobile.football_detail_cell.analyse_battle_cell', ['base'=>$base['base'], 'match'=>$base['match']])
    @endcomponent
</div>