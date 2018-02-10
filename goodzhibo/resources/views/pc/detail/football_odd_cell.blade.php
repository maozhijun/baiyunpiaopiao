<div class="default" id="Odd" type="{{$type}}" @if($show != 1) style="display: none;" @endif >
    <?php
    $textWin = '';
    $textDraw = '';
    $textLose = '';
    if($type == 'asia'){
        $textWin = '主队';
        $textDraw = '盘口';
        $textLose = '客队';
    } else if($type == 'goal'){
        $textWin = '大球';
        $textDraw = '盘口';
        $textLose = '小球';
    } else if($type == 'ou'){
        $textWin = '主胜';
        $textDraw = '平局';
        $textLose = '客胜';
    }
    ?>
    <table>
        <thead>
        <tr>
            <th rowspan="2" class="company">博彩公司</th>
            <th colspan="3">初盘</th>
            <th colspan="3">{{($status == -1 || $status > 0)?'终盘':'即时'}}</th>
            <th rowspan="2" class="sameOdd">历史同赔</th>
        </tr>
        <tr>
            <th class="red"> {{$textWin}}</th>
            <th class="aisaOdd">{{$textDraw}}</th>
            <th class="blue">{{$textLose}}</th>
            <th class="red">{{$textWin}}</th>
            <th class="aisaOdd">{{$textDraw}}</th>
            <th class="blue">{{$textLose}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($odds as $odd)
            @continue(!isset($odd[$type]))
            <tr>
                <td>{{$odd['name']}}</td>
                <td>{{$odd[$type]['up1']}}</td>
                @if($type == 'asia')
                    <td>{{\App\Models\Match\Odd::panKouText($odd[$type]['middle1'])}}</td>
                @elseif($type == 'goal')
                    <td>{{\App\Http\Controllers\CommonTool::getHandicapCn($odd[$type]['middle1'],'',\App\Models\Match\Odd::k_odd_type_ou,\App\Models\Shop\Business\GoodsArticles::kSportFootball,true).'球'}}</td>
                @else
                    <td>{{$odd[$type]['middle1']}}</td>
                @endif
                <td>{{$odd[$type]['down1']}}</td>
                <td>{{$odd[$type]['up2']}}</td>
                @if($type == 'asia')
                    <td>{{\App\Models\Match\Odd::panKouText($odd[$type]['middle2'])}}</td>
                @elseif($type == 'goal')
                    <td>{{\App\Http\Controllers\CommonTool::getHandicapCn($odd[$type]['middle2'],'',\App\Models\Match\Odd::k_odd_type_ou,\App\Models\Shop\Business\GoodsArticles::kSportFootball,true).'球'}}</td>
                @else
                    <td>{{$odd[$type]['middle2']}}</td>
                @endif
                <td>{{$odd[$type]['down2']}}</td>
                @if(isset($odd['same']))
                    @if($type == 'asia' && isset($odd['same']['asia_win']))
                        <td>
                                <span
                                        @if($odd['same']['asia_win'] != $odd['same']['asia_lose'] && $odd['same']['asia_win'] == max($odd['same']['asia_win'],$odd['same']['asia_lose']))
                                        class="red"
                                        @endif
                                >{{$odd['same']['asia_win']}}%赢</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span
                                    @if($odd['same']['asia_win'] != $odd['same']['asia_lose'] && $odd['same']['asia_lose'] == max($odd['same']['asia_win'],$odd['same']['asia_lose']))
                                    class="blue"
                                    @endif
                            >{{$odd['same']['asia_lose']}}%输</span>
                        </td>
                    @elseif($type == 'goal' && isset($odd['same']['goal_big']))
                        <td>
                                <span
                                        @if($odd['same']['goal_big'] != $odd['same']['goal_small'] && $odd['same']['goal_big'] == max($odd['same']['goal_big'],$odd['same']['goal_small']))
                                        class="red"
                                        @endif
                                >{{$odd['same']['goal_big']}}%大</span>&nbsp;&nbsp;&nbsp;&nbsp;
                            <span
                                    @if($odd['same']['goal_big'] != $odd['same']['goal_small'] && $odd['same']['goal_small'] == max($odd['same']['goal_big'],$odd['same']['goal_small']))
                                    class="blue"
                                    @endif
                            >{{$odd['same']['goal_small']}}%小</span>
                        </td>
                    @elseif(isset($odd['same']['match_win']))
                        <td>
                                <span
                                        @if($odd['same']['match_win'] == max($odd['same']['match_win'],$odd['same']['match_draw'],$odd['same']['match_lose']))
                                        class="red"
                                        @endif
                                >{{$odd['same']['match_win']}}%赢</span>
                            <span
                                    @if($odd['same']['match_draw'] == max($odd['same']['match_win'],$odd['same']['match_draw'],$odd['same']['match_lose']))
                                    class="green"
                                    @endif
                            >{{$odd['same']['match_draw']}}%平</span>
                            <span
                                    @if($odd['same']['match_lose'] == max($odd['same']['match_win'],$odd['same']['match_draw'],$odd['same']['match_lose']))
                                    class="blue"
                                    @endif
                            >{{$odd['same']['match_lose']}}%输</span>
                        </td>
                    @else
                        <td></td>
                    @endif
                @else
                    <td></td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>