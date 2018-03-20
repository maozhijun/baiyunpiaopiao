<div class="Same_Odd_Content" type="{{$type}}" count="{{$count}}" id="Same_Odd_Content_{{$type}}_{{$count}}">
    @component('pc.detail.football_cell.characteristic_odd_item',['result'=>isset($result)?$result:null,'data'=>isset($data)?$data:null,'type'=>$type,'count'=>$count])
    @endcomponent
</div>