<div class="{{$class}}">
    <p class="name">{{$name}}
        @if($rank > 0)
        <span>[{{$lname . '' . $rank}}]</span>
            @endif
    </p>
    <table>
        <thead>
        <tr>
            <th></th>
            <th class="normal">赛</th>
            <th class="normal">胜</th>
            <th class="normal">平</th>
            <th class="normal">负</th>
            <th class="normal">得</th>
            <th class="normal">失</th>
            <th class="normal">净</th>
            <th class="more">积分</th>
            <th class="more">排名</th>
            <th class="most">胜率</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $key=>$value)
            <?php
            $tmp = '';
            $color = "";
            switch ($key){
                case 'all':
                    $tmp = '总';
                    break;
                case 'home':
                    $tmp = '主';
                    $color = "color: #bc1c25;";
                    break;
                case 'guest':
                    $tmp = '客';
                    $color = "color: #58A1F6;";
                    break;
                case 'six':
                    $tmp = '近6';
                    break;
            }
            ?>
            <tr>
                <td style="{{$color}}">{{$tmp}}</td>
                <td>{{$value['count']}}</td>
                <td>{{$value['win']}}</td>
                <td>{{$value['draw']}}</td>
                <td>{{$value['lose']}}</td>
                <td>{{$value['goal']}}</td>
                <td>{{$value['fumble']}}</td>
                <td>{{$value['goal'] - $value['fumble']}}</td>
                <td>{{$value['score']}}</td>
                <td>{{isset($value['rank'])?$value['rank']:'-'}}</td>
                @if($value['count'] > 0)
                    <td>{{100*round($value['win']/$value['count'],2)}}%</td>
                @else
                    <td>-</td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>
</div>