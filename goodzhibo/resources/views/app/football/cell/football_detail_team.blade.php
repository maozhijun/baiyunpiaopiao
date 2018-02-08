@if(isset($base['attribute']))
    <div class="strength default" ha="0" le="0">
        <div class="title">
            攻防能力<button class="close"></button>
            <div class="labelbox">
                <label for="Strength_HA"><input type="checkbox" name="battle" value="ha" id="Strength_HA"><span></span>同主客</label>
                <label for="Strength_LE"><input type="checkbox" name="battle" value="le" id="Strength_LE"><span></span>同赛事</label>
            </div>
        </div>
        @if(isset($base['attribute']))
            @component("mobile.cell.football_detail_attr",
                ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'0', 'key'=>'all'])
            @endcomponent
            @component("mobile.cell.football_detail_attr",
                ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'0', 'key'=>'host'])
            @endcomponent
            @component("mobile.cell.football_detail_attr",
                ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>0, 'le'=>'1', 'key'=>'league'])
            @endcomponent
            @component("mobile.cell.football_detail_attr",
                ['hname'=>$match['hname'], 'aname'=>$match['aname'], 'data'=>$base['attribute'], 'ha'=>1, 'le'=>'1', 'key'=>'both'])
            @endcomponent
        @endif
    </div>
@endif