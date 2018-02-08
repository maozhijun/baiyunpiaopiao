@extends('app.layout.match_base')

@section('content')
    @if(isset($base))
        <div id="Team" class="content">
            <div id="Trait" class="childNode" style="display: ;">
                @component("app.football.cell.football_detail_team",['base'=>$base, 'match'=>$match])
                @endcomponent
                @if(isset($ws))
                    @component("mobile.cell.football_detail_style",['ws'=>$ws, 'match'=>$match])
                    @endcomponent
                @endif
            </div>
            <div id="Corner" class="childNode" style="display: none;">
                @component("mobile.cell.football_detail_corner",['base'=>$base, 'odd'=>$odd,
                'hname'=>$hname, 'aname'=>$aname, 'hid'=>$hid, 'aid'=>$aid,
                'anaylse'=>$anaylse, 'historyBattle'=>$historyBattle, 'historyBattleResult'=>$historyBattleResult, 'recentBattle'=>$recentBattle])
                @endcomponent
            </div>
            <div class="bottom">
                <div class="btn">
                    <input type="radio" name="Team" id="Team_Trait" value="Trait" checked>
                    <label for="Team_Trait">特点</label>
                    <input type="radio" name="Team" id="Team_Corner" value="Corner">
                    <label for="Team_Corner">角球</label>
                </div>
            </div>
        </div>
    @endif
@endsection