<div id="Characteristic" class="tabContent" style="display: none;">
<?php
    $ws = isset($base['ws']) ? $base['ws'] : [];
    $referee = isset($base['referee']) ? $base['referee'] : [];
    $sameOdd = isset($base['sameOdd']) ? $base['sameOdd'] : ['asia'=>[], 'ou'=>[], 'goal'=>[]];
?>
@if(isset($ws) && (isset($ws['home']) || isset($ws['away'])))
    <div class="strength default" id="Characteristic_Strength">
        <div class="title">
            <p>球队风格</p>
        </div>
        <div class="host">
            <div class="name">{{$match['hname']}}<span class="leagueRankH"></span></div>
            <table>
                <thead>
                <tr>
                    <th>强/弱 项</th>
                    <th>风格</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($ws['home']))
                    <?php
                    $items = $ws['home'];
                    $strengthCount = isset($items['strengths']) ? count($items['strengths']) : 0;
                    $weaknessCount = isset($items['weaknesses']) ? count($items['weaknesses']) : 0;
                    $stylesCount = isset($items['styles']) ? count($items['styles']) : 0;
                    ?>
                    @for($i = 0 ; $i < max($strengthCount + $weaknessCount,$stylesCount); $i++)
                        <?php
                        $item = null;
                        $style = null;
                        if ($strengthCount > $i)
                            $item = $items['strengths'][$i];
                        else if ($weaknessCount > ($i - $strengthCount))
                            $item = $items['weaknesses'][$i - $strengthCount];
                        if ($stylesCount > $i){
                            $style = $items['styles'][$i];
                        }
                        ?>
                        <tr>
                            @if(!is_null($item))
                                <td class="item">
                                    @if($item['isOffensive'])
                                        <img src={{env('CDN_URL') . '/img/pc/icon_sword.png'}}>
                                    @else
                                        <img src={{env('CDN_URL') . '/img/pc/icon_shield.png'}}>
                                    @endif
                                    {{$item['name']}}
                                    @if(5 == $item['level'])
                                        <span class="mostStrong">非常强</span>
                                    @elseif(4 == $item['level'])
                                        <span class="moreStrong">很强</span>
                                    @elseif(3 == $item['level'])
                                        <span class="strong">强</span>
                                    @elseif(2 == $item['level'])
                                        <span class="moreWeak">弱</span>
                                    @elseif(1 == $item['level'])
                                        <span class="weak">很弱</span>
                                    @endif
                                </td>
                            @else
                                <td></td>
                            @endif
                            @if(!is_null($style['name']))
                                <td>{{$style['name']}}</td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                @endif
                </tbody>
            </table>
        </div>
        <div class="away">
            <div class="name"><span class="leagueRankA"></span>{{$match['aname']}}</div>
            <table>
                <thead>
                <tr>
                    <th>强/弱 项</th>
                    <th>风格</th>
                </tr>
                </thead>
                <tbody>
                @if(isset($ws['away']))
                    <?php
                    $items = $ws['away'];
                    $strengthCount = isset($items['strengths']) ? count($items['strengths']) : 0;
                    $weaknessCount = isset($items['weaknesses']) ? count($items['weaknesses']) : 0;
                    $stylesCount = isset($items['styles']) ? count($items['styles']) : 0;
                    ?>
                    @for($i = 0 ; $i < max($strengthCount + $weaknessCount,$stylesCount); $i++)
                        <?php
                        $item = null;
                        $style = null;
                        if ($strengthCount > $i)
                            $item = $items['strengths'][$i];
                        else if ($weaknessCount > ($i - $strengthCount)){
                            $item = $items['weaknesses'][$i - $strengthCount];
                        }
                        if ($stylesCount > $i){
                            $style = $items['styles'][$i];
                        }
                        ?>
                        <tr>
                            @if(!is_null($item))
                                <td class="item">
                                    @if($item['isOffensive'])
                                        <img src={{env('CDN_URL') . '/img/pc/icon_sword.png'}}>
                                    @else
                                        <img src={{env('CDN_URL') . '/img/pc/icon_shield.png'}}>
                                    @endif
                                    {{$item['name']}}
                                    @if(5 == $item['level'])
                                        <span class="mostStrong">非常强</span>
                                    @elseif(4 == $item['level'])
                                        <span class="moreStrong">很强</span>
                                    @elseif(3 == $item['level'])
                                        <span class="strong">强</span>
                                    @elseif(2 == $item['level'])
                                        <span class="moreWeak">弱</span>
                                    @elseif(1 == $item['level'])
                                        <span class="weak">很弱</span>
                                    @endif
                                </td>
                            @else
                                <td></td>
                            @endif
                            @if(!is_null($style['name']))
                                <td>{{$style['name']}}</td>
                            @else
                                <td></td>
                            @endif
                        </tr>
                    @endfor
                @endif
                </tbody>
            </table>
        </div>
        <div class="clear"></div>
    </div>
@endif
@if(isset($ws) && isset($ws['case']))
    <div class="prediction default" id="Characteristic_Prediction">
        <div class="title">
            <p>场面预测</p>
        </div>
        <table class="all">
            <thead>
            <tr>
                <th>预测项</th>
                <th>可能性</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($ws['case']))
                @foreach($ws['case'] as $item)
                    <tr>
                        <td class="all">{{$item['sentence']}}</td>
                        @if(3 <= $item['score'])
                            <td><span class="mostStrong">非常可能</span></td>
                        @elseif(2 == $item['score'])
                            <td><span class="moreStrong">很可能</span></td>
                        @elseif(1 >= $item['score'])
                            <td><span class="strong">可能</span></td>
                        @endif
                    </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div>
@endif
@if(isset($referee) && count($referee) > 0)
    <div class="referee default" id="Characteristic_Referee">
        <div class="title">
            <p>裁判信息</p>
        </div>
        <table>
            <thead>
            <tr>
                <th>姓名</th>
                <th class="normal">{{$referee['hname']}}</th>
                <th class="normal">{{$referee['aname']}}</th>
                <th class="normal">近10场执法赛事</th>
                <th class="normal">近10场均出示黄牌</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{$referee['name']}}</td>
                <td>{{$referee['h_wdl']}}</td>
                <td>{{$referee['a_wdl']}}</td>
                <td>上盘率 {{$referee['win_percent']}}%</td>
                <td>{{$referee['yellow_avg']}} 张</td>
            </tr>
            </tbody>
        </table>
    </div>
@endif
<?php $od_type = isset($sameOdd['asia']) ? 1 : ( isset($sameOdd['ou']) ? '2' : (isset($sameOdd['ou']) ? 3 : 1) ) ?>
<div class="sameOdd default" id="Characteristic_SameOdd" type="{{$od_type}}" count="10">
    <div class="title">
        <p>历史同赔</p>
        <div class="control">
            <button id="SameOdd_Asia" onclick="changeSameOdd(1)" class="radio {{$od_type == 1 ? 'on' : ''}}">亚盘</button><button id="SameOdd_Goal" onclick="changeSameOdd(2)" class="radio {{$od_type == 2 ? 'on' : ''}}">大小</button><button id="SameOdd_Europe" onclick="changeSameOdd(3)" class="radio {{$od_type == 3 ? 'on' : ''}}">欧赔</button>
            <div class="selectParent">
                <select onchange="changeSameOddCount(this)">
                    <option value="10">近 10 场</option>
                    <option value="20">近 20 场</option>
                </select>
            </div>
        </div>
    </div>
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>1,'count'=>10,'result'=>'1','data'=>$sameOdd['asia']])
    @endcomponent
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>1,'count'=>20,'result'=>'1','data'=>$sameOdd['asia']])
    @endcomponent
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>2,'count'=>10,'result'=>'2','data'=>$sameOdd['ou']])
    @endcomponent
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>2,'count'=>20,'result'=>'2','data'=>$sameOdd['ou']])
    @endcomponent
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>3,'count'=>10,'result'=>'3','data'=>$sameOdd['goal']])
    @endcomponent
    @component('pc.detail.football_cell_new.characteristic_odd',['type'=>3,'count'=>20,'result'=>'3','data'=>$sameOdd['goal']])
    @endcomponent
</div>
</div>