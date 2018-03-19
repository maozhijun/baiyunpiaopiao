@if(isset($schedule))
    @component("pc.detail.football_cell_new.schedule",['data'=>$schedule, 'match'=>$match, 'rank'=>$rank])
    @endcomponent
@endif