<div id="Data" class="tabContent" style="display: block;">
        <?php $rank = isset($base['rank']) ? $base['rank'] : null; ?>
        @if(isset($base['attribute']))
                @component('pc.detail.football_cell_new.data_attribute',['match'=>$match,'data'=>$base['attribute']]) {{--攻防能力--}} @endcomponent
        @endif
        {{--<a href="https://www.liaogou168.com/merchant/detail/10008" target="_blank" class="bannerAD default"><img src="{{env('CDN_URL')}}/img/ad_t2_all.jpg"></a>--}}
        <div class="odd default" id="Data_Odd"></div>
        {{--联赛排名--}}
        @if(isset($base))
                @component('pc.detail.football_cell_new.data_league',['match'=>$match,'base'=>$base]) @endcomponent
        @endif
        @if(isset($base['historyBattle']))
                {{--对赛往绩--}}
                @component('pc.detail.football_cell_new.data_battle',['match'=>$match, 'base'=>$base['historyBattle']])
                @endcomponent
        @endif
        @if(isset($base))
                {{--近期战绩--}}
                @component('pc.detail.football_cell_new.data_history',['match'=>$match,'base'=>$base])
                @endcomponent
        @endif
        @if(isset($base['oddResult']) )
                {{--赛事盘路--}}
                @if(isset($base['oddResult']))
                @component('pc.detail.football_cell_new.data_trend',['match'=>$match,'base'=>$base, 'data'=>$base['oddResult'], 'rank'=>$rank ])
                @endcomponent
        @endif
        @if(isset($base['schedule']))
                {{--未来赛程--}}
                @component('pc.detail.football_cell_new.data_schedule',['schedule'=>$base['schedule'], 'match'=>$match, 'rank'=>$rank ])
                @endcomponent
        @endif
    @endif
</div>