<div class="name">
    {{$name}}
    <span class="league {{$key == 'H'?'leagueRankH':'leagueRankA'}}"></span>
    <div class="control">
        <button id="History_{{$key}}HA" onclick="changeCornerHistory(this, '{{$key}}')" class="checkbox"></button>相同主客
        <button id="History_{{$key}}League" onclick="changeCornerHistory(this, '{{$key}}')" class="checkbox"></button>相同赛事
        <div class="selectParent">
            <select onchange="changeNum(this,'corner_{{$key}}')">
                <option value="10">近 10 场</option>
                <option value="20">近 20 场</option>
            </select>
        </div>
    </div>
</div>
<div class="Border" id="Corner_Data_{{$key}}_Content" league="0" ha="0">
    @component('pc.detail.football_cell.corner_recent_item_content',['teamId'=>('H' == $key ? $match['hid'] : $match['aid']),'teamName'=>$name,'key'=>$key,'data'=>$data['all'],'league'=>0,'ha'=>0,'analyse'=>$data['statistic']['all']])
    @endcomponent
    @component('pc.detail.football_cell.corner_recent_item_content',['teamId'=>('H' == $key ? $match['hid'] : $match['aid']),'teamName'=>$name,'key'=>$key,'data'=>$data['sameHA'],'league'=>0,'ha'=>1,'analyse'=>$data['statistic']['sameHA']])
    @endcomponent
    @component('pc.detail.football_cell.corner_recent_item_content',['teamId'=>('H' == $key ? $match['hid'] : $match['aid']),'teamName'=>$name,'key'=>$key,'data'=>$data['sameL'],'league'=>1,'ha'=>0,'analyse'=>$data['statistic']['sameL']])
    @endcomponent
    @component('pc.detail.football_cell.corner_recent_item_content',['teamId'=>('H' == $key ? $match['hid'] : $match['aid']),'teamName'=>$name,'key'=>$key,'data'=>$data['sameHAL'],'league'=>1,'ha'=>1,'analyse'=>$data['statistic']['sameHAL']])
    @endcomponent
</div>