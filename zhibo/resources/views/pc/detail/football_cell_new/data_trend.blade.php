@if(isset($data))
    @component("pc.detail.football_cell_new.odd_result",['data'=>$data, 'match'=>$match, 'rank'=>$rank])
    @endcomponent
@endif