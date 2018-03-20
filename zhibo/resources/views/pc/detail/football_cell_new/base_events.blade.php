@if(isset($tech['event']))
<?php
    $events = $tech['event']['events'];
    $last_event_time = $tech['event']['last_event_time'];
    $curTime = $match['current_time'];
?>
<div class="event default" id="Match_Event">
    <div class="title">
        <p>赛事事件</p>
    </div>
    @component('pc.detail.football_cell_new.base_events_cell', ['match'=>$match, 'curTime'=>$curTime, 'last_event_time'=>$last_event_time,
    'events'=>$events, 'eventClass'=>'eventList'])
    @endcomponent
</div>
@endif