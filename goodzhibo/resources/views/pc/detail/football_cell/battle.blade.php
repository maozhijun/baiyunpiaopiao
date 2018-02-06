@if(count($data['nhnl']) + count($data['shnl']) + count($data['nhsl']) + count($data['shsl']) > 0)
    <div class="title">
        <p>对赛往绩</p>
        <div class="control">
            <button id="Battle_HA" onclick="ChangeInput(this, 'Battle')" class="checkbox"></button>相同主客
            <button id="Battle_League" onclick="ChangeInput(this, 'Battle')" class="checkbox"></button>相同赛事
            <div class="selectParent">
                <select onchange="changeNum2(this,'Data_Battle')">
                    <option value="10">近 10 场</option>
                    <option value="20">近 20 场</option>
                </select>
            </div>
        </div>
    </div>
    @component("pc.detail.football_cell.battle_item",['data'=>$data['nhnl'],'league'=>0,'ha'=>0,'hid'=>$hid])
    @endcomponent
    @component("pc.detail.football_cell.battle_item",['data'=>$data['shnl'],'league'=>0,'ha'=>1,'hid'=>$hid])
    @endcomponent
    @component("pc.detail.football_cell.battle_item",['data'=>$data['nhsl'],'league'=>1,'ha'=>0,'hid'=>$hid])
    @endcomponent
    @component("pc.detail.football_cell.battle_item",['data'=>$data['shsl'],'league'=>1,'ha'=>1,'hid'=>$hid])
    @endcomponent
@endif