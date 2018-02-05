@if(isset($events) && count($events) > 0)
    @foreach($events as $event)
        <?php
        $kind = $event['kind'];
        $teamCss = $event['is_home'] ? 'host' : 'away';
        $content = isset($event['text'])?$event['text']:'';
        $time = $event['happen_time'];
        ?>
        <li>
            <p class="time">{{$time}}'</p>
            @if($kind == 1 || $kind == 7)
                <p class="{{$teamCss}}"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>{{$content}}</span><img src="{{env('CDN_URL')}}/img/pc/float_goal.png"></p>
            @elseif($kind == 2)
                <p class="{{$teamCss}}"><img src="{{env('CDN_URL')}}/img/pc/icon_red.png"><span>{{$content}}</span></p>
            @elseif($kind == 3)
                <p class="{{$teamCss}}"><img src="{{env('CDN_URL')}}/img/pc/icon_yellow.png"><span>{{$content}}</span></p>
            @elseif($kind == 8)
                <p class="{{$teamCss}}"><img src="{{env('CDN_URL')}}/img/pc/icon_goal.png"><span>{{$content}}</span><img src="{{env('CDN_URL')}}/img/pc/float_Oolong.png"></p>
            @elseif($kind == 11)
                <p class="{{$teamCss}}"><img src="{{env('CDN_URL')}}/img/pc/icon_exchange.png"><span>{{$event['text1']}}</span><img src="{{env('CDN_URL')}}/img/pc/float_up.png"><span>{{$event['text2']}}</span><img src="{{env('CDN_URL')}}/img/pc/float_down.png"></p>
            @endif
        </li>
    @endforeach
@endif