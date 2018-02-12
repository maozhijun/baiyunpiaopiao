@if(array_key_exists('h_lineup_per',$lineup) || array_key_exists('a_lineup_per',$lineup))
<div class="first default" id="Match_First">
    <div class="title">
        <p>首发阵容</p>
    </div>
    <div class="host">
        <div class="name">
            @if(array_key_exists('h_lineup_per',$lineup) && is_numeric($lineup['h_lineup_per']))
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
            <p><span class="leagueRankA"></span>{{$aname}}</p>
            @if(array_key_exists('a_lineup_per',$lineup))
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
<?php
$hasTech = false;
foreach($tech as $t)
    if($t['home'] > 0 || $t['away'] > 0)
        $hasTech = true;
?>
@if($hasTech)
<div class="technology default" id="Match_Technology">
    <div class="title">
        <p>技术统计</p>
    </div>
    @foreach($tech as $t)
        <?php
            $home = $t['home']; $away = $t['away'];
            $h_p = '0%'; $a_p = '0%';
            if (!is_numeric($home) || !is_numeric($away)) {
                $h_p = $home;
                $a_p = $away;
            } else {
                if ($home > 0 || $away > 0) {
                    $h_p = ((100 * $home) / ($home + $away)) . '%';
                    $a_p = ((100 * $away) / ($home + $away)) . '%';
                }
            }
        ?>
        <div class="tecBox">
            <dl>
                <dt>{{$t['name']}}</dt>
                <dt class="host">{{$home}}</dt>
                <dt class="away">{{$away}}</dt>
                <dd class="host"><p style="width: {{$h_p}};"></p></dd>
                <dd class="away"><p style="width: {{$a_p}};"></p></dd>
            </dl>
        </div>
    @endforeach
    <div class="clear"></div>
</div>
@endif
<div class="event default" id="Match_Event">
    <div class="title">
        <p>赛事事件</p>
    </div>
    @component('pc.detail.football_cell.match_event_cell', ['match'=>$match, 'curTime'=>$curTime, 'last_event_time'=>$last_event_time,
    'events'=>$events, 'eventClass'=>'eventList'])
    @endcomponent
</div>