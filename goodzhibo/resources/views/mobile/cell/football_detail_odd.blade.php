<div class="title">
    <select>
        @foreach($bankers as $banker)
            <option value="Data_Odd_{{$banker['id']}}">{{$banker['name']}}</option>
        @endforeach
    </select>
    <button class="close"></button>
</div>
<?php $index = 0;?>
@foreach($bankers as $banker)
    <table id="Data_Odd_{{$banker['id']}}" style="display: {{$index > 0 ? 'none' : ''}};">
        <thead>
        <tr>
            <th></th>
            <th>初赔</th>
            <th>即赔</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>亚盘</td>
            @if(isset($banker['asia']['middle1']))
                <td><p>{{$banker['asia']['up1']}}</p><p>{{$banker['asia']['middle1']}}</p><p>{{$banker['asia']['down1']}}</p></td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
            @if(isset($banker['asia']['middle2']))
                <td>
                    <p @if($banker['asia']['up2'] > $banker['asia']['up1']) class="red" @elseif($banker['asia']['up2'] < $banker['asia']['up1']) class="green" @endif>{{$banker['asia']['up2']}}</p>
                    <p @if($banker['asia']['middle2'] > $banker['asia']['middle1']) class="red" @elseif($banker['asia']['middle2'] < $banker['asia']['middle1']) class="green" @endif>{{$banker['asia']['middle2']}}</p>
                    <p @if($banker['asia']['down2'] > $banker['asia']['down1']) class="red" @elseif($banker['asia']['down2'] < $banker['asia']['down1']) class="green" @endif>{{$banker['asia']['down2']}}</p>
                </td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
        </tr>
        <tr>
            <td>欧赔</td>
            @if(isset($banker['ou']['middle1']))
                <td><p>{{$banker['ou']['up1']}}</p><p>{{number_format($banker['ou']['middle1'],2)}}</p><p>{{$banker['ou']['down1']}}</p></td>
            @elseif(isset($banker['ou']['up1']))
                <td><p>{{$banker['ou']['up1']}}</p><p>-</p><p>{{$banker['ou']['down1']}}</p></td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
            @if(isset($banker['ou']['middle2']))
                <td>
                    <p @if($banker['ou']['up2'] > $banker['ou']['up1']) class="red" @elseif($banker['ou']['up2'] < $banker['ou']['up1']) class="green" @endif>{{$banker['ou']['up2']}}</p>
                    <p @if($banker['ou']['middle2'] > $banker['ou']['middle1']) class="red" @elseif($banker['ou']['middle2'] < $banker['ou']['middle1']) class="green" @endif>{{number_format($banker['ou']['middle2'],2)}}</p>
                    <p @if($banker['ou']['down2'] > $banker['ou']['down1']) class="red" @elseif($banker['ou']['down2'] < $banker['ou']['down1']) class="green" @endif>{{$banker['ou']['down2']}}</p>
                </td>
            @elseif(isset($banker['ou']['up2']))
                <td>
                    <p @if($banker['ou']['up2'] > $banker['ou']['up1']) class="red" @elseif($banker['ou']['up2'] < $banker['ou']['up1']) class="green" @endif>{{$banker['ou']['up2']}}</p>
                    <p>-</p>
                    <p @if($banker['ou']['down2'] > $banker['ou']['down1']) class="red" @elseif($banker['ou']['down2'] < $banker['ou']['down1']) class="green" @endif>{{$banker['ou']['down2']}}</p>
                </td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
        </tr>
        <tr>
            <td>大小球</td>
            @if(isset($banker['goal']['middle1']))
                <td><p>{{$banker['goal']['up1']}}</p><p>{{\App\Models\Match\Odd::getOddMiddleString($banker['goal']['middle1'])}}</p><p>{{$banker['goal']['down1']}}</p></td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
            @if(isset($banker['goal']['middle2']))
                <td>
                    <p @if($banker['goal']['up2'] > $banker['goal']['up1']) class="red" @elseif($banker['goal']['up2'] < $banker['goal']['up1']) class="green" @endif>{{$banker['goal']['up2']}}</p>
                    <p @if($banker['goal']['middle2'] > $banker['goal']['middle1']) class="red" @elseif($banker['goal']['middle2'] < $banker['goal']['middle1']) class="green" @endif>{{\App\Models\Match\Odd::getOddMiddleString($banker['goal']['middle2'])}}</p>
                    <p @if($banker['goal']['down2'] > $banker['goal']['down1']) class="red" @elseif($banker['goal']['down2'] < $banker['goal']['down1']) class="green" @endif>{{$banker['goal']['down2']}}</p>
                </td>
            @else
                <td><p>-</p><p>-</p><p>-</p></td>
            @endif
        </tr>
        </tbody>
    </table>
    <?php $index++; ?>
@endforeach