<?php
    $techs = isset($tech['tech']) ? $tech['tech'] : [];
    $hasTech = count($techs) > 0;
?>
@if($hasTech)
<div class="technology default" id="Match_Technology">
    <div class="title">
        <p>技术统计</p>
    </div>
    @foreach($techs as $t)
        <?php
            $home = $t['h'];
            $away = $t['a'];
            $h_p = '0%'; $a_p = '0%';
            if (is_numeric($t['h_p'])) {
                $h_p = $t['h_p'] * 100;
            }
            if (is_numeric($t['a_p'])) {
                $a_p = $t['a_p'] * 100;
            }
        ?>
        <div class="tecBox">
            <dl>
                <dt>{{$t['name']}}</dt>
                <dt class="host">{{$home}}</dt>
                <dt class="away">{{$away}}</dt>
                <dd class="host"><p style="width: {{$h_p}}%;"></p></dd>
                <dd class="away"><p style="width: {{$a_p}}%;"></p></dd>
            </dl>
        </div>
    @endforeach
    <div class="clear"></div>
</div>
@endif