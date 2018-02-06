<?php
$hLeagueName = $match['hLeagueName'];
$aLeagueName = $match['aLeagueName'];
$hLeagueRank = $match['hLeagueRank'];
$aLeagueRank = $match['aLeagueRank'];
?>
<div class="track default" id="Data_Track">
    <div class="title">
        <p>赛事盘路</p>
    </div>
    <div class="host">
        <p class="name">{{$match['hname']}}
            @if($hLeagueRank > 0)
                <span>[{{$hLeagueName . '' . $hLeagueRank}}]</span>
            @endif
        </p>
        <table>
            <thead>
            <tr>
                <th></th>
                <th class="normal">赛</th>
                <th class="normal">赢</th>
                <th class="normal">走</th>
                <th class="normal">输</th>
                <th class="most">赢盘率</th>
                <th class="more">大球</th>
                <th class="most">大球率</th>
                <th class="more">小球</th>
                <th class="most">小球率</th>
            </tr>
            </thead>
            @component("pc.detail.football_cell.odd_result_item",['data'=>$data['home']])
            @endcomponent
        </table>
    </div>
    <div class="away">
        <p class="name">{{$match['aname']}}
            @if($aLeagueRank > 0)
                <span>[{{$aLeagueName . '' . $aLeagueRank}}]</span>
            @endif
        </p>
        <table>
            <thead>
            <tr>
                <th></th>
                <th class="normal">赛</th>
                <th class="normal">赢</th>
                <th class="normal">走</th>
                <th class="normal">输</th>
                <th class="most">赢盘率</th>
                <th class="more">大球</th>
                <th class="most">大球率</th>
                <th class="more">小球</th>
                <th class="most">小球率</th>
            </tr>
            </thead>
            @component("pc.detail.football_cell.odd_result_item",['data'=>$data['away']])
            @endcomponent
        </table>
    </div>
    <div class="clear"></div>
</div>