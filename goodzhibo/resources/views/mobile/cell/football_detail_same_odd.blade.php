<?php

$sameOddData = $base['sameOdd'];
$sameOdd = null;
$sameOdd2 = null;
$sameOdd3 = null;
if (isset($sameOddData)) {
    $sameOdd = $sameOddData['asia'];
    $sameOdd2 = $sameOddData['goal'];
    $sameOdd3 = $sameOddData['ou'];
}

$oc = 'checked';
$twc = '';
$thc = '';
if (!empty($sameOdd)) {
    $oc = 'checked';
} else if (!empty($sameOdd2)) {
    $twc = 'checked';
} else if (!empty($sameOdd3)) {
    $thc = 'checked';
}
?>
@component("mobile.cell.football_detail_same_odd_item",
    ['id'=>'SameOdd_Asia', 'class'=>'sameOddAsia', 'sameOdd'=>$sameOdd, 'type'=>1, 'ch'=>$oc])
@endcomponent
@component("mobile.cell.football_detail_same_odd_item",
    ['id'=>'SameOdd_Europe', 'class'=>'sameOddEurope', 'sameOdd'=>$sameOdd3, 'type'=>3, 'ch'=>$thc])
@endcomponent
@component("mobile.cell.football_detail_same_odd_item",
    ['id'=>'SameOdd_Goal', 'class'=>'sameOddGoal', 'sameOdd'=>$sameOdd2, 'type'=>2, 'ch'=>$twc])
@endcomponent
<div class="bottom">
    <div class="btn">
        @if(isset($sameOdd))
            <input type="radio" name="SameOdd" id="SameOdd_Asia_Tab" value="SameOdd_Asia" {{$oc}}>
            <label for="SameOdd_Asia_Tab">亚盘</label>
        @endif
        @if(isset($sameOdd3))
            <input type="radio" name="SameOdd" id="SameOdd_Europe_Tab" value="SameOdd_Europe" {{$thc}}>
            <label for="SameOdd_Europe_Tab">欧赔</label>
        @endif
        @if(isset($sameOdd2))
            <input type="radio" name="SameOdd" id="SameOdd_Goal_Tab" value="SameOdd_Goal" {{$twc}}>
            <label for="SameOdd_Goal_Tab">大小球</label>
        @endif
    </div>
</div>