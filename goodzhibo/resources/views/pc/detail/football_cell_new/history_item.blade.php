<div class="Border History_{{$key}}" id="History_{{$key}}" league="0" ha="0" num="10">
    <div class="name">
        {{$name}}
        @if($rank > 0)
        <span class="league">[{{$league.$rank}}]</span>
        @endif
        <div class="control">
            <button id="History_{{$key}}_HA" onclick="ChangeInput2(this, 'History_{{$key}}')" class="checkbox"></button>相同主客
            <button id="History_{{$key}}_League" onclick="ChangeInput2(this, 'History_{{$key}}')" class="checkbox"></button>相同赛事
            <div class="selectParent">
                <select onchange="changeNum(this,'History_{{$key}}')">
                    <option value="10">近 10 场</option>
                    <option value="20">近 20 场</option>
                </select>
            </div>
        </div>
    </div>
    @component("pc.detail.football_cell_new.history_item_content",['data'=>$data['all'],'league'=>0,'ha'=>0,'hid'=>$hid,'key'=>$key,'teamName'=>$name])
    @endcomponent
    @component("pc.detail.football_cell_new.history_item_content",['data'=>$data['sameHA'],'league'=>0,'ha'=>1,'hid'=>$hid,'key'=>$key,'teamName'=>$name])
    @endcomponent
    @component("pc.detail.football_cell_new.history_item_content",['data'=>$data['sameL'],'league'=>1,'ha'=>0,'hid'=>$hid,'key'=>$key,'teamName'=>$name])
    @endcomponent
    @component("pc.detail.football_cell_new.history_item_content",['data'=>$data['sameHAL'],'league'=>1,'ha'=>1,'hid'=>$hid,'key'=>$key,'teamName'=>$name])
    @endcomponent
</div>