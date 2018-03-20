<?php
    $week = array('周日','周一','周二','周三','周四','周五','周六');
    $hLeagueRank = $match['hrank'];
    $aLeagueRank = $match['arank'];
    if (isset($analyse['rank'])) {
        $rank = $analyse['rank'];
        $hLeagueName = $rank['leagueRank']['hLeagueName'];
        $aLeagueName = $rank['leagueRank']['aLeagueName'];
    } else {
        $hLeagueName = '';
        $aLeagueName = '';
    }
?>
<div id="Info">
    <div class="mes">
        <p>{{isset($match['league']) ? $match['league'] : ''}}&nbsp;{{isset($match['round'])?'-&nbsp;第'.$match['round'].'轮':''}}</p>
        <p>比赛时间：{{ date('Y-m-d', $match['time']) }}&nbsp;&nbsp;{{ date('H:i', $match['time']) }}&nbsp;&nbsp;{{$week[date("w", $match['time'])]}}</p>
    </div>
    <div class="team host">
        <div class="icon">
            <img src="{{strlen($match['hicon']) > 0 ? $match['hicon'] : (env('CDN_URL') . '/img/icon_teamDefault.png') }}">
        </div>
        <p>
            <span class="team">{{$match['hname']}}</span>
            @if($hLeagueRank > 0)<span class="league">【 {{$hLeagueName}}{{$hLeagueRank}} 】</span>@endif
        </p>
    </div>
    @if($match['status'] > 0 || $match['status'] == -1)
        <div class="score">{{$match['hscore']}} - {{$match['ascore']}}</div>
    @else
        <div class="score">VS</div>
    @endif
    <div class="team away">
        <div class="icon">
            <img src="{{strlen($match['aicon']) > 0 ? $match['aicon'] : (env('CDN_URL') . '/img/icon_teamDefault.png') }}">
        </div>
        <p>
            <span class="team">{{$match['aname']}}</span>
            @if($aLeagueRank > 0)
                <span class="league">【 {{$aLeagueName}}{{$aLeagueRank}} 】</span>
            @endif
        </p>
    </div>
    <div class="odd">
        @if(isset($match['asiamiddle2']))
            <p>亚：{{\App\Http\Controllers\CommonTool::float2Decimal($match['asiaup2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($match['asiamiddle2'], true)}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($match['asiadown2'])}}</p>
        @else
            <p>亚：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
        @endif
        @if(isset($match['oumiddle2']))
            <p>欧：{{\App\Http\Controllers\CommonTool::float2Decimal($match['ouup2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($match['oumiddle2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($match['oudown2'])}}</p>
        @else
            <p>欧：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
        @endif
        @if(isset($match['goalmiddle2']))
            <p>大：{{\App\Http\Controllers\CommonTool::float2Decimal($match['goalup2'])}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::getHandicapCn($match['goalmiddle2'], '', \App\Models\Match\Odd::k_odd_type_ou)}}&nbsp;&nbsp;{{\App\Http\Controllers\CommonTool::float2Decimal($match['goaldown2'])}}</p>
        @else
            <p>大：-&nbsp;&nbsp;-&nbsp;&nbsp;-</p>
        @endif
    </div>
    <div class="clear"></div>
    <div class="analysis" @if($match['status'] > 0 && isset($match['pc_live']) && $match['pc_live'] > 0) style="display: none" @else style="display: block" @endif >
        <?php
        if (isset($match['oumiddle1'])){
            if(isset($match['ouup1']) && isset($match['oumiddle1']) && isset($match['oudown1'])){
                $up = $match['ouup1'] > 0 ? round(90/$match['ouup1'],0) : 0;
                $middle = $match['oumiddle1'] > 0 ? round(90/$match['oumiddle1'],0) : 0;
            }
        }
        ?>
        <canvas class="host" width="130px" height="130px" value="{{isset($middle) ? $middle + $up : 0}}" color="#bc1c25"></canvas>
        <canvas class="away" width="130px" height="130px" value="{{isset($middle) ? 100 - $middle - $up : 0}}" color="#58A1F6"></canvas>
        <div class="cover host">
            <p><b> @if(isset($middle)) {{$middle + $up}}% @else -% @endif </b></p>
            <p>不败</p>
        </div>
        <div class="cover away">
            <p><b> @if(isset($middle)) {{100 - $middle - $up}}% @else -% @endif </b></p>
            <p>获胜</p>
        </div>
        <p class="title">赛果概率</p>
        <dl>
            <?php
            $winh = 0;
            $drawh = 0;
            $loseh = 0;
            $wina = 0;
            $drawa = 0;
            $losea = 0;
            $hid = $match['hid'];
            $aid = $match['aid'];
            if (isset($analyse['historyBattle']['historyBattle']['nhnl'])){
                $matches = $analyse['historyBattle']['historyBattle']['nhnl'];
                foreach($matches as $match){
                    if($match['hscore'] > $match['ascore'])
                        if($match['hid'] == $hid)
                            $winh++;
                        else
                            $loseh++;
                    elseif($match['hscore'] < $match['ascore'])
                        if($match['hid'] == $hid)
                            $loseh++;
                        else
                            $winh++;
                    else
                        $drawh++;
                }

                foreach($matches as $match){
                    if($match['hscore'] > $match['ascore'])
                        if($match['hid'] == $aid)
                            $wina++;
                        else
                            $losea++;
                    elseif($match['hscore'] < $match['ascore'])
                        if($match['hid'] == $aid)
                            $losea++;
                        else
                            $wina++;
                    else
                        $drawa++;
                }
            }


            $homePer = ($winh + $drawa + $wina) > 0 ? round(100*($winh/($winh+$drawa+$wina)),0) : 0;
            $awayPer = ($winh + $drawa + $wina) > 0 ? round(100*($wina/($winh+$drawa+$wina)),0) : 0;

            ?>
            <dt>
                <p class="host"><b>{{$winh}}</b>&nbsp;胜&nbsp;<b>{{$drawh}}</b>&nbsp;平&nbsp;<b>{{$loseh}}</b>&nbsp;负</p>
                <p class="away"><b>{{$wina}}</b>&nbsp;胜&nbsp;<b>{{$drawa}}</b>&nbsp;平&nbsp;<b>{{$losea}}</b>&nbsp;负</p>
                <p>历史交锋</p>
            </dt>
            <dd>
                <p class="host" style="width: {{($homePer+$awayPer) > 0 ? 100*$homePer/($homePer+$awayPer) : 0}}%;"></p><span class="host">主胜&nbsp;{{$homePer}}%</span>
                <p class="away" style="width: {{($homePer+$awayPer) > 0 ? 100*$awayPer/($homePer+$awayPer) : 0}}%;"></p><span class="away">{{$awayPer}}%&nbsp;客胜</span>
            </dd>
            <?php
            $winh = 0;
            $drawh = 0;
            $loseh = 0;
            $wina = 0;
            $drawa = 0;
            $losea = 0;
            $hid = $match['hid'];
            if (isset($analyse['recentBattle']['home'])){
                foreach($analyse['recentBattle']['home']['all'] as $match){
                    if($match['hscore'] > $match['ascore'])
                        if($match['hid'] == $hid)
                            $winh++;
                        else
                            $loseh++;
                    elseif($match['hscore'] < $match['ascore'])
                        if($match['hid'] == $hid)
                            $loseh++;
                        else
                            $winh++;
                    else
                        $drawh++;
                }
            }
            if (isset($analyse['recentBattle']['away'])){
                foreach($analyse['recentBattle']['away']['all'] as $match){
                    if($match['hscore'] > $match['ascore'])
                        if($match['hid'] == $aid)
                            $wina++;
                        else
                            $losea++;
                    elseif($match['hscore'] < $match['ascore'])
                        if($match['hid'] == $aid)
                            $losea++;
                        else
                            $wina++;
                    else
                        $drawa++;
                }
            }

            $homePer = ($winh +$drawh + $loseh) > 0 ? round(100*($winh/($winh+$loseh+$drawh)),0) : 0;
            $awayPer = ($wina + $drawa + $losea) > 0 ? round(100*($wina/($wina+$drawa+$losea)),0) : 0;

            ?>
            <dt>
                <p class="host"><b>{{$winh}}</b>&nbsp;胜&nbsp;<b>{{$drawh}}</b>&nbsp;平&nbsp;<b>{{$loseh}}</b>&nbsp;负</p>
                <p class="away"><b>{{$wina}}</b>&nbsp;胜&nbsp;<b>{{$drawa}}</b>&nbsp;平&nbsp;<b>{{$losea}}</b>&nbsp;负</p>
                <p>近期战绩</p>
            </dt>
            <dd>
                <p class="host" style="width: {{($homePer+$awayPer) == 0 ? 0 : (100*$homePer/($homePer+$awayPer))}}%;"></p><span class="host">主胜&nbsp;{{$homePer}}%</span>
                <p class="away" style="width: {{($homePer+$awayPer) == 0 ? 0 : (100*$awayPer/($homePer+$awayPer))}}%;"></p><span class="away">{{$awayPer}}%&nbsp;客胜</span>
            </dd>
        </dl>
    </div>

    <div class="sameOdd" @if($match['status'] > 0 && isset($match['pc_live']) && $match['pc_live'] > 0) style="display: none" @else style="display: block" @endif >
        <p class="name">统计共<b>10</b>场相同赔率比赛</p>
        <p class="win">主胜<b>{{$analyse['sameOdd']['asia']['win']}}%</b></p>
        <p class="draw">平局<b>{{$analyse['sameOdd']['asia']['draw']}}%</b></p>
        <p class="lose">客胜<b>{{$analyse['sameOdd']['asia']['lose']}}%</b></p>
        <a onclick="SameOdd()">详细历史同赔数据</a>
    </div>

    <div class="video" @if($match['status'] > 0 && isset($match['pc_live']) && $match['pc_live'] > 0) style="display: block" @else style="display: none" @endif >
        <a target="_blank" href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($match['mid'])}}" class="goVideo">正在直播</a>
        <a target="_blank" href="{{\App\Http\Controllers\CommonTool::matchLiveFullPathWithId($match['mid'])}}"><img src="{{env('CDN_URL')}}/img/pc/icon_home_video_live.gif"></a>
    </div>
</div>