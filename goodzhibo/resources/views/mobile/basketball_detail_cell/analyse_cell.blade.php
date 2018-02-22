<div id="Data" class="content">
    @if(!is_null($odd) && array_key_exists('bankers',$odd))
    <div class="odd default">
        @component('mobile.cell.football_detail_odd', ['bankers'=>$odd['bankers']])
        @endcomponent
    </div>
    @endif
    @component('mobile.basketball_detail_cell.analyse_battle_cell', ['base'=>$base['base'], 'match'=>$base['match']])
    @endcomponent
</div>