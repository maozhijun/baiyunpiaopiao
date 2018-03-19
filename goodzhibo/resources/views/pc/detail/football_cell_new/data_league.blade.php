@if(isset($base['rank']['rank']) && (count($base['rank']['rank']['host']) > 1 || count($base['rank']['rank']['away']) > 1))
    <div class="league default" id="Data_League">
        <?php
        $rank = $base['rank'];
        $data = $base['rank']['rank'];
        $hLeagueName = $rank['leagueRank']['hLeagueName'];
        $aLeagueName = $rank['leagueRank']['aLeagueName'];
        $hLeagueRank = $rank['leagueRank']['hLeagueRank'];
        $aLeagueRank = $rank['leagueRank']['aLeagueRank'];
        ?>
        @if(count($data['host']) > 1 || count($data['away']) > 1)
            <div class="title">
                <p>联赛积分排名</p>
            </div>
            @component("pc.detail.football_cell.league_item",
            [
            'data'=>$data['host'],
            'class'=>'host',
            'name'=>$match['hname'],
            'lname'=>$hLeagueName,
            'rank'=>$hLeagueRank])
            @endcomponent
            @component("pc.detail.football_cell.league_item",
            [
            'data'=>$data['away'],
            'class'=>'away',
            'name'=>$match['aname'],
            'lname'=>$aLeagueName,
            'rank'=>$aLeagueRank])
            @endcomponent
            <div class="clear"></div>
        @endif
    </div>
@endif