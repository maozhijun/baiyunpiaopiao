@if(isset($match))
    <div id="Data" class="content">
        @if(isset($bankers) && count($bankers) > 0)
            <div class="odd default">
                @component('mobile.cell.football_detail_odd', ['bankers'=>$bankers])
                @endcomponent
            </div>
        @endif
        @component('mobile.football_detail_cell.analyse_battle_cell', ['base'=>$base, 'match'=>$match])
        @endcomponent
    </div>
@endif