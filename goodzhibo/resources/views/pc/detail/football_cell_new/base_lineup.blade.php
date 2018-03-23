@if(isset($lineup['h_lineup_per']) || isset($lineup['a_lineup_per']))
<div class="first default" id="Match_First">
    <div class="title">
        <p>首发阵容</p>
    </div>
    <div class="host">
        <div class="name">
            <p><span class="leagueRankA"></span>{{$match['hname']}}</p>
            @if(isset($lineup['h_lineup_per']) && is_numeric($lineup['h_lineup_per']))
                <p class="number">本场比赛有<b>{{number_format($lineup['h_lineup_per']*0.01*11,0)}}</b>名主力首发</p>
                <dl>
                    <dt>（{{round($lineup['h_lineup_per'],2)}}%）</dt>
                    <dd style="width: 90%;"></dd>
                </dl>
            @endif
        </div>
        <table>
            <thead>
            <tr>
                <th>首发</th>
                <th>后备</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0 ; $i < max(count($lineup['home']['back']),count($lineup['home']['first']));$i++)
                <?php
                $home = count($lineup['home']['first']) > $i ? $lineup['home']['first'][$i]:null;
                $back = count($lineup['home']['back']) > $i ? $lineup['home']['back'][$i]:null;
                ?>
                <tr>
                    @if(!is_null($home))
                        <td><p>{{$home['num']}}</p>{{$home['name'] . (in_array($home['num'], $lineup['home']['h_first']) ? '[主]' : '')}}</td>
                    @else
                        <td></td>
                    @endif
                    @if(!is_null($back))
                        <td><p>{{$back['num']}}</p>{{$back['name']}}</td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <div class="away">
        <div class="name">
            <p><span class="leagueRankA"></span>{{$match['aname']}}</p>
            @if(isset($lineup['a_lineup_per']))
                <p class="number">本场比赛有<b>{{number_format($lineup['a_lineup_per']*0.01*11,0)}}</b>名主力首发</p>
                <dl>
                    <dt>（{{round($lineup['a_lineup_per'],2)}}%）</dt>
                    <dd style="width: 67%;"></dd>
                </dl>
            @endif
        </div>
        <table>
            <thead>
            <tr>
                <th>首发</th>
                <th>后备</th>
            </tr>
            </thead>
            <tbody>
            @for($i = 0 ; $i < max(count($lineup['away']['back']),count($lineup['away']['first']));$i++)
                <?php
                $home = count($lineup['away']['first']) > $i ? $lineup['away']['first'][$i]:null;
                $back = count($lineup['away']['back']) > $i ? $lineup['away']['back'][$i]:null;
                ?>
                <tr>
                    @if(!is_null($home))
                        <td><p>{{$home['num']}}</p>{{$home['name'] . (in_array($home['num'], $lineup['away']['h_first']) ? '[主]' : '')}}</td>
                    @else
                        <td></td>
                    @endif
                    @if(!is_null($back))
                        <td><p>{{$back['num']}}</p>{{$back['name']}}</td>
                    @else
                        <td></td>
                    @endif
                </tr>
            @endfor
            </tbody>
        </table>
    </div>
    <div class="clear"></div>
</div>
@endif