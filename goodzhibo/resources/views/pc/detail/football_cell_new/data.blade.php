<div id="Data" class="tabContent" style="display: block;">
    @component('pc.detail.football_cell_new.data_attribute',['match'=>$match,'data'=>$base['attribute']]) {{--攻防能力--}} @endcomponent
    {{--<a href="https://www.liaogou168.com/merchant/detail/10008" target="_blank" class="bannerAD default"><img src="{{env('CDN_URL')}}/img/ad_t2_all.jpg"></a>--}}
    <div class="odd default" id="Data_Odd"></div>
    {{--联赛排名--}}
    @component('pc.detail.football_cell_new.data_league',['match'=>$match,'base'=>$base]) @endcomponent
    {{--对赛往绩--}}
    @component('pc.detail.football_cell_new.data_battle',['match'=>$match, 'base'=>$base['historyBattle']])
    @endcomponent
    {{--近期战绩--}}
    @component('pc.detail.football_cell_new.data_history',['match'=>$match,'base'=>$base])
    @endcomponent
    {{--赛事盘路--}}
    @component('pc.detail.football_cell_new.data_trend',['match'=>$match,'base'=>$base, 'data'=>$base['oddResult'], 'rank'=>$base['rank'] ])
    @endcomponent
    {{--未来赛程--}}
    @component('pc.detail.football_cell_new.data_schedule',['schedule'=>$base['schedule'], 'match'=>$match, 'rank'=>$base['rank']])
    @endcomponent
</div>