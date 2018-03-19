<div class="title">
    <p>赔率指数</p>
    <div class="abox">
        <a href="/football/detail_odd/{{$mid}}.html#ou">[欧]</a>
        <a href="/football/detail_odd/{{$mid}}.html#goal">[大]</a>
        <a href="/football/detail_odd/{{$mid}}.html#asia">[亚]</a>
    </div>
</div>
<table>
    <thead>
    <tr>
        <th rowspan="2" class="company">公司</th>
        <th rowspan="2" class="status"></th>
        <th colspan="3">欧洲指数</th>
        <th colspan="4">亚盘指数</th>
        <th colspan="4">大小球指数</th>
    </tr>
    <tr>
        <th class="europe red">主胜</th>
        <th class="europe">平手</th>
        <th class="europe blue">客胜</th>
        <th class="team red">主队</th>
        <th class="comity">让球</th>
        <th class="team blue">客队</th>
        <th class="team">总水位</th>
        <th class="team red">主队</th>
        <th class="team">盘口</th>
        <th class="team blue">客队</th>
        <th class="team">总水位</th>
    </tr>
    </thead>
    @foreach($bankers as $banker)
        <tbody>
        <tr>
            <td rowspan="3" class="company">{{$banker['name']}}</td>
            <td>初盘</td>
            @if(isset($banker['ou']['middle1']))
                <td>{{$banker['ou']['up1']}}</td>
                <td>{{\App\Models\Match\Odd::getOddMiddleString($banker['ou']['middle1'])}}</td>
                <td>{{$banker['ou']['down1']}}</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            @if(isset($banker['asia']['middle1']))
                <td>{{$banker['asia']['up1']}}</td>
                <td>{{\App\Models\Match\Odd::panKouText($banker['asia']['middle1'])}}</td>
                <td>{{$banker['asia']['down1']}}</td>
                <td>{{$banker['asia']['up1'] + $banker['asia']['down1']}}</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
            @if(isset($banker['goal']['middle1']))
                <td>{{$banker['goal']['up1']}}</td>
                <td>{{\App\Models\Match\Odd::getOddMiddleString($banker['goal']['middle1'])}}</td>
                <td>{{$banker['goal']['down1']}}</td>
                <td>{{$banker['goal']['up1'] + $banker['goal']['down1']}}</td>
            @else
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            @endif
        </tr>
        <tr>
            <td>终盘</td>
            @if(isset($banker['ou']) && isset($banker['ou']['middle1']))
                <td
                @if($banker['ou']['up2'] > $banker['ou']['up1'])
                    class="red"
                @elseif($banker['ou']['up2'] < $banker['ou']['up1'])
                    class="green"
                @endif
                >{{$banker['ou']['up2']}}</td>
                <td
                        @if($banker['ou']['middle2'] > $banker['ou']['middle1'])
                        class="red"
                        @elseif($banker['ou']['middle2'] < $banker['ou']['middle1'])
                        class="green"
                        @endif
                >{{$banker['ou']['middle2']}}</td>
                <td
                        @if($banker['ou']['down2'] > $banker['ou']['down1'])
                        class="red"
                        @elseif($banker['ou']['down2'] < $banker['ou']['down1'])
                        class="green"
                        @endif
                >{{$banker['ou']['down2']}}</td>
            @else
                <td>-</td><td>-</td><td>-</td>
            @endif
            @if(isset($banker['asia']['middle1']))
            <td
                    @if($banker['asia']['up2'] > $banker['asia']['up1'])
                    class="red"
                    @elseif($banker['asia']['up2'] < $banker['asia']['up1'])
                    class="green"
                    @endif
            >{{$banker['asia']['up2']}}</td>
            <td
                    @if($banker['asia']['middle2'] > $banker['asia']['middle1'])
                    class="red"
                    @elseif($banker['asia']['middle2'] < $banker['asia']['middle1'])
                    class="green"
                    @endif
            >{{\App\Models\Match\Odd::panKouText($banker['asia']['middle2'])}}</td>
            <td
                    @if($banker['asia']['down2'] > $banker['asia']['down1'])
                    class="red"
                    @elseif($banker['asia']['down2'] < $banker['asia']['down1'])
                    class="green"
                    @endif
            >{{$banker['asia']['down2']}}</td>
            <td>{{$banker['asia']['up2'] + $banker['asia']['down2']}}</td>
            @else
                <td>-</td><td>-</td><td>-</td>
            @endif
            @if(isset($banker['goal']['middle1']))
            <td
                    @if($banker['goal']['up2'] > $banker['goal']['up1'])
                    class="red"
                    @elseif($banker['goal']['up2'] < $banker['goal']['up1'])
                    class="green"
                    @endif
            >{{$banker['goal']['up2']}}</td>
            <td
                    @if($banker['goal']['middle2'] > $banker['goal']['middle1'])
                    class="red"
                    @elseif($banker['goal']['middle2'] < $banker['goal']['middle1'])
                    class="green"
                    @endif
            >{{\App\Models\Match\Odd::getOddMiddleString($banker['goal']['middle2'])}}</td>
            <td
                    @if($banker['goal']['down2'] > $banker['goal']['down1'])
                    class="red"
                    @elseif($banker['goal']['down2'] < $banker['goal']['down1'])
                    class="green"
                    @endif
            >{{$banker['goal']['down2']}}</td>
            <td>{{$banker['goal']['up2'] + $banker['goal']['down2']}}</td>
            @else
                <td>-</td><td>-</td><td>-</td><td>-</td>
            @endif
        </tr>
        </tbody>
    @endforeach
</table>