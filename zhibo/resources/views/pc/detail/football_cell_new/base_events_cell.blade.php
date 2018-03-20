<div class="inner">
    <?php
    $px = 0;
    $c_time = preg_replace('/[^\d]+/', '', $curTime);
    if (!is_numeric($c_time)) {
        if ($curTime == "中场") {
            $c_time = 45;
        }  else if ($curTime == "已结束") {
            $c_time = 90;
        }
    }
    $status = $match['status'];
    if ($status == -1) {
        $px = 780;
    } else if ($status > 0 && $status < 5) {
        $px = round($c_time * (780 / 90), 1);
    }
    $eventClass = isset($eventClass) ? $eventClass : 'event';
    $host_events = [];
    $away_events = [];
    foreach ($events as $event) {
        $happen_time = $event['happen_time'];
        $text1 = isset($event['text1']) ? $event['text1'] : (isset($event['text']) ? $event['text'] : '');
        $text2 = isset($event['text2']) ? $event['text2'] : '';
        $event['img'] = \App\Models\Match\MatchEvent::kindImg($event['kind']);
        $event['cn'] = \App\Models\Match\MatchEvent::kindCn($event['kind'], $text1, $text2);
        if ($event['is_home'] == 1) {
            $host_events[$happen_time][] = $event;
        } else {
            $away_events[$happen_time][] = $event;
        }
    }
    ?>
    <div class="timeline" lastTime="{{$last_event_time}}">
        <div class="fill" style="width: {{$px}}px;">@if($status > 0 && $status < 5)<p></p>@endif</div>
        <div class="line"></div>
        <div class="minute" style="left: 130px;"><p>15'</p></div>
        <div class="minute" style="left: 260px;"><p>30'</p></div>
        <div class="minute" style="left: 390px;"><p>45'</p></div>
        <div class="minute" style="left: 520px;"><p>60'</p></div>
        <div class="minute" style="left: 650px;"><p>75'</p></div>
        @if(is_numeric($match['current_time']) && $match['current_time'] > 90)
            <div overtime class="minute" style="left: 780px;"><p>90'</p></div><!--加时状态下增加90分钟标签-->
            <div overtime class="minute future" style="left: 910px;"><p>105'</p></div><!--加时状态下增加105分钟标签-->
        @endif
    </div>
    <div class="{{$eventClass}} host_event">
        <?php $temp_time = 0; ?>
        @foreach($host_events as $time=>$events)
            <div class="item" style="left: {{$time * 130 / 15}}px; @if($temp_time != 0 && $time - $temp_time == 1)margin-left: 1px;@endif">{{$time}}'
                @foreach($events as $event)
                    <div><img src="{{$event['img']}}"><p><span>{{$event['cn']}}</span></p></div>
                @endforeach
            </div>
            <?php $temp_time = $time; ?>
        @endforeach
    </div>
    <div class="{{$eventClass}} away_event">
        <?php $temp_time = 0; ?>
        @foreach($away_events as $time=>$events)
            <div class="item" style="left: {{$time * 130 / 15}}px;@if($temp_time != 0 && $time - $temp_time == 1)margin-left: 1px;@endif">{{$time}}'
                @foreach($events as $event)
                    <div><img src="{{$event['img']}}"><p><span>{{$event['cn']}}</span></p></div>
                @endforeach
            </div>
            <?php $temp_time = $time; ?>
        @endforeach
    </div>
</div>