<?php
    if (isset($rank)) {
        $hLeagueName = $rank['leagueRank']['hLeagueName'];
        $aLeagueName = $rank['leagueRank']['aLeagueName'];
    } else {
        $hLeagueName = '';
        $aLeagueName = '';
    }
    $hLeagueRank = $match['hrank'];
    $aLeagueRank = $match['arank'];
?>
@if(count($data['home']) > 0 || count($data['away']) > 0)
    <div class="future default" id="Data_Future">
        <div class="title">
            <p>未来赛程</p>
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
                    <th class="league">赛事</th>
                    <th class="date">日期</th>
                    <th>对阵</th>
                    <th class="separated">相隔</th>
                </tr>
                </thead>
                @component("pc.detail.football_cell_new.schedule_item",['teamId'=>$match['hid'],'teamName'=>$match['hname'],'matches'=>$data['home']])
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
                    <th class="league">赛事</th>
                    <th class="date">日期</th>
                    <th>对阵</th>
                    <th class="separated">相隔</th>
                </tr>
                </thead>
                @component("pc.detail.football_cell_new.schedule_item",['teamId'=>$match['aid'],'teamName'=>$match['aname'],'matches'=>$data['away']])
                @endcomponent
            </table>
        </div>
        <div class="clear"></div>
    </div>
@endif