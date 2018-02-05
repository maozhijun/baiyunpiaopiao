@if(isset($match) && isset($lineup))
    <?php
        $h_first_count = !empty($lineup['h_first']) ? count(explode(',', $lineup['h_first'])) : 0;
        $a_first_count = !empty($lineup['a_first']) ? count(explode(',', $lineup['a_first'])) : 0;
        $h_lineup_percent = isset($lineup['h_lineup_percent']) ? round($lineup['h_lineup_percent'], 2) : 0;
        $a_lineup_percent = isset($lineup['a_lineup_percent']) ? round($lineup['a_lineup_percent'], 2) : 0;
    ?>
    <div class="first">
        <ul>
            @if(!empty($lineup['h_lineup']))
            <li class="host">
                <p class="percen">{{$h_lineup_percent}}%</p>
                <p class="chart"><span style="width: {{$h_lineup_percent}}%;"></span></p>
                <p>{{$h_first_count}}&nbsp;<span>名主力首发</span></p>
                <p class="name">{{$match['hname']}}</p>
            </li>
            @endif
            @if(!empty($lineup['a_lineup']))
            <li class="away">
                <p class="percen">{{$a_lineup_percent}}%</p>
                <p class="chart"><span style="width: {{$a_lineup_percent}}%;"></span></p>
                <p>{{$a_first_count}}&nbsp;<span>名主力首发</span></p>
                <p class="name">{{$match['aname']}}</p>
            </li>
            @endif
        </ul>
    </div>
@endif