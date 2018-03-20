@if(isset($base))
    <div id="Trait" class="childNode" style="">
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
        @if(isset($base['ws']))
            @component('mobile.cell.football_detail_style', ['ws'=>$base['ws'], 'match'=>$match])
            @endcomponent
        @endif
    </div>
    <div id="Corner" class="childNode" style="display: none;">
        <?php
        $odd = null;
        if (isset($match['goalmiddle1'])){
            $odd['up1'] = $match['goalup1'];
            $odd['middle1'] = $match['goalmiddle1'];
            $odd['down1'] = $match['goaldown1'];
            $odd['up2'] = $match['goalup2'];
            $odd['middle2'] = $match['goalmiddle2'];
            $odd['down2'] = $match['goaldown2'];
        }
        ?>
            @component("mobile.cell.football_detail_corner",['base'=>$base, 'odd'=>$odd,
                    'hname'=>$match['hname'], 'aname'=>$match['aname'], 'hid'=>$match['hid'], 'aid'=>$match['aid'],
                    'anaylse'=>$base['cornerAnalyse'], 'historyBattle'=>$base['cornerHistoryBattle']['historyBattle'], 'historyBattleResult'=>$base['cornerHistoryBattle']['historyBattleResult'], 'recentBattle'=>$base['cornerRecentBattle']])
            @endcomponent
    </div>
    <div class="bottom">
        <div class="btn">
            <input type="radio" name="Team" id="Team_Trait" value="Trait" checked>
            <label for="Team_Trait">特点</label>
            <input type="radio" name="Team" id="Team_Corner" value="Corner">
            <label for="Team_Corner">角球</label>
        </div>
    </div>
@endif