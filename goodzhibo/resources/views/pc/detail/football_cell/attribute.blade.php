@if(isset($data))
    <div class="title">
        <p>攻防能力</p>
    </div>
    <table>
        <thead>
        <tr>
            <th rowspan="2" class="team">球队</th>
            <th rowspan="2" class="goal">场均进球</th>
            <th rowspan="2" class="miss">场均失球</th>
            <th rowspan="2" class="match">进球场次</th>
            <th rowspan="2" class="win">胜率</th>
            <th rowspan="2" class="draw">平率</th>
            <th rowspan="2" class="lose">负率</th>
            <th colspan="6">相同主客</th>
            <th colspan="6">相同赛事</th>
        </tr>
        <tr>
            <th class="goal">场均进球</th>
            <th class="miss">场均失球</th>
            <th class="match">进球场次</th>
            <th class="win">胜率</th>
            <th class="draw">平率</th>
            <th class="lose">负率</th>
            <th class="goal">场均进球</th>
            <th class="miss">场均失球</th>
            <th class="match">进球场次</th>
            <th class="win">胜率</th>
            <th class="draw">平率</th>
            <th class="lose">负率</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <?php
            $item = $data['home'];
            ?>
            <td class="team red">{{$match['hname']}}</td>
            <td>{{$item['all']['avgGoal']}}</td>
            <td>{{$item['all']['avgMiss']}}</td>
            <td>{{$item['all']['avgGoalMatch']}}</td>
            @if(isset($item['all']) && isset($item['all']['win']) && isset($item['all']['draw']) && isset($item['all']['lose']) && ($item['all']['draw']+$item['all']['win']+$item['all']['lose']) > 0)
                <td>{{round(100*$item['all']['win']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
                <td>{{round(100*$item['all']['draw']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
                <td>{{round(100*$item['all']['lose']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            <td>{{$item['host']['avgGoal']}}</td>
            <td>{{$item['host']['avgMiss']}}</td>
            <td>{{$item['host']['avgGoalMatch']}}</td>
            @if(isset($item['host']) &&isset($item['host']['win']) && isset($item['host']['draw']) && isset($item['host']['lose']) && ($item['host']['draw']+$item['host']['win']+$item['host']['lose']) > 0)
                <td>{{round(100*$item['host']['win']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
                <td>{{round(100*$item['host']['draw']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
                <td>{{round(100*$item['host']['lose']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            <td>{{$item['league']['avgGoal']}}</td>
            <td>{{$item['league']['avgMiss']}}</td>
            <td>{{$item['league']['avgGoalMatch']}}</td>
            @if(isset($item['league']) &&isset($item['league']['win']) && isset($item['league']['draw']) && isset($item['league']['lose']) && ($item['league']['draw']+$item['league']['win']+$item['league']['lose']) > 0)
                <td>{{round(100*$item['league']['win']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
                <td>{{round(100*$item['league']['draw']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
                <td>{{round(100*$item['league']['lose']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
        </tr>
        <tr>
            <?php
            $item = $data['away'];
            ?>
            <td class="team blue">{{$match['aname']}}</td>
            <td>{{$item['all']['avgGoal']}}</td>
            <td>{{$item['all']['avgMiss']}}</td>
            <td>{{$item['all']['avgGoalMatch']}}</td>
            @if(isset($item['all']) &&isset($item['all']['win']) && isset($item['all']['draw']) && isset($item['all']['lose']) && ($item['all']['draw']+$item['all']['win']+$item['all']['lose']) > 0)
                <td>{{round(100*$item['all']['win']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
                <td>{{round(100*$item['all']['draw']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
                <td>{{round(100*$item['all']['lose']/($item['all']['draw']+$item['all']['win']+$item['all']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            <td>{{$item['host']['avgGoal']}}</td>
            <td>{{$item['host']['avgMiss']}}</td>
            <td>{{$item['host']['avgGoalMatch']}}</td>
            @if(isset($item['host']) &&isset($item['host']['win']) && isset($item['host']['draw']) && isset($item['host']['lose']) && ($item['host']['draw']+$item['host']['win']+$item['host']['lose']) > 0)
                <td>{{round(100*$item['host']['win']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
                <td>{{round(100*$item['host']['draw']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
                <td>{{round(100*$item['host']['lose']/($item['host']['draw']+$item['host']['win']+$item['host']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            <td>{{$item['league']['avgGoal']}}</td>
            <td>{{$item['league']['avgMiss']}}</td>
            <td>{{$item['league']['avgGoalMatch']}}</td>
            @if(isset($item['league']) &&isset($item['league']['win']) && isset($item['league']['draw']) && isset($item['league']['lose']) && ($item['league']['draw']+$item['league']['win']+$item['league']['lose']) > 0)
                <td>{{round(100*$item['league']['win']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
                <td>{{round(100*$item['league']['draw']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
                <td>{{round(100*$item['league']['lose']/($item['league']['draw']+$item['league']['win']+$item['league']['lose']),0)}}%</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
        </tr>
        </tbody>
    </table>
@endif