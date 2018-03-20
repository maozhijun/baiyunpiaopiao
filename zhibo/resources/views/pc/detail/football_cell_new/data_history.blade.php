@if(isset($base['recentBattle']))
    <div class="history default" id="Data_History">
        @component("pc.detail.football_cell_new.history",['data'=>$base['recentBattle'],  'match'=>$match, 'rank'=>$base['rank']])
        @endcomponent
    </div>
@endif