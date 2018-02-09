<?php
$hLeagueName = $match['hLeagueName'];
$aLeagueName = $match['aLeagueName'];
$hLeagueRank = $match['hLeagueRank'];
$aLeagueRank = $match['aLeagueRank'];
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