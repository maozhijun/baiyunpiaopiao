@extends('mobile.layout.base')
@section('title')
    <title>黑土体育</title>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/mobile/matchPhone_bk.css">
@endsection
@section('content')
<div id="Navigation">
    <div class="banner">
        <a href="/m/basketball/immediate.html" class="home"></a>
        <a class="team" href="" style="opacity: 0;"><!--有直播就用a标签，如果没有就用div-->
            <p class="host">{{$match['hname']}}</p>
            <p class="score">
                @if($match['status'] > 0 || $match['status'] == -1) {{$match['hscore']}} - {{$match['ascore']}} @else VS @endif
                @if(isset($match['wap_live']) && $match['wap_live'])<span>[直播]</span>@endif
            </p><!--有直播就用加span-->
            <p class="away">{{$match['aname']}}</p>
        </a>
        {{$match['lname']}}{{!empty($match['round']) ? '&nbsp;&nbsp;第' . $match['round'] . '轮' : ''}}
    </div>
</div>
<div id="Info">
    <div class="team">
        <p class="img"><img src="{{$match['hteam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
        <p class="name">{{$match['hname']}}</p>
    </div>
    <div class="info">
        <p class="minute">{{$match['current_time']}}</p>
        <p class="score">
            <span class="host">{{$match['hscore']}}</span>
            <span class="away">{{$match['ascore']}}</span>
        </p>
        @if($match['status'] > 0 && isset($match['wap_live']) && $match['wap_live']))<a href="/m/live/basketball/{{$match['mid']}}.html" class="live">正在直播</a>@endif
    </div>
    <div class="team">
        <p class="img"><img src="{{$match['ateam']['icon']}}" onerror="this.src='{{env('CDN_URL')}}/img/icon_teamDefault.png'"></p>
        <p class="name">{{$match['aname']}}</p>
    </div>
</div>
<div id="Tab" class="tab">
    <input type="radio" name="tab_type" id="Type_Match" value="Match" checked>
    <label for="Type_Match"><span>赛况</span></label>
    <input type="radio" name="tab_type" id="Type_Data" value="Data">
    <label for="Type_Data"><span>分析</span></label>
    <input type="radio" name="tab_type" id="Type_Odd" value="Odd">
    <label for="Type_Odd"><span>指数</span></label>
</div>
<div id="Match" class="content" style="display: ;">
    <div id="Event" class="childNode" style="display: ;">
        <div class="score default">
            <div class="title">比分统计<button class="close"></button></div>
            <table>
                <thead>
                <tr>
                    <th>球队</th>
                    <th>1st</th>
                    <th>2nd</th>
                    <th>3rd</th>
                    <th>4th</th>
                    @if((array_key_exists('h_ot',$match) && strlen($match['h_ot']) > 0)||(array_key_exists('a_ot',$match) && strlen($match['a_ot']) > 0))
                        <th>OT</th>
                    @endif
                    <th>总分</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><img src="{{strlen($match['hteam']['icon']) > 0 ? $match['hteam']['icon'] : '/img/icon_teamDefault.png'}}"></td>
                    <td
                            @if($match['status'] == 1)
                            class="now"
                            @endif
                    >{{$match['hscore_1st'] or '/'}}</td>
                    <td
                            @if($match['status'] == 2)
                            class="now"
                            @endif
                    >{{$match['hscore_2nd'] or '/'}}</td>
                    <td
                            @if($match['status'] == 3)
                            class="now"
                            @endif
                    >{{$match['hscore_3rd'] or '/'}}</td>
                    <td
                            @if($match['status'] == 4)
                            class="now"
                            @endif
                    >{{$match['hscore_4th'] or '/'}}</td>
                    @if((array_key_exists('h_ot',$match) && strlen($match['h_ot']) > 0)||(array_key_exists('a_ot',$match) && strlen($match['a_ot']) > 0))
                        <td>{{$match['h_ot'] or '/'}}</td>
                    @endif
                    <td>{{$match['hscore'] or '/'}}</td>
                </tr>
                <tr>
                    <td><img src="{{strlen($match['ateam']['icon']) > 0 ? $match['ateam']['icon'] : '/img/icon_teamDefault.png'}}"></td>
                    <td
                            @if($match['status'] == 1)
                            class="now"
                            @endif
                    >{{$match['ascore_1st'] or '/'}}</td>
                    <td
                            @if($match['status'] == 2)
                            class="now"
                            @endif
                    >{{$match['ascore_2nd'] or '/'}}</td>
                    <td
                            @if($match['status'] == 3)
                            class="now"
                            @endif
                    >{{$match['ascore_3rd'] or '/'}}</td>
                    <td
                            @if($match['status'] == 4)
                            class="now"
                            @endif
                    >{{$match['ascore_4th'] or '/'}}</td>
                    @if((array_key_exists('h_ot',$match) && strlen($match['h_ot']) > 0)||(array_key_exists('a_ot',$match) && strlen($match['a_ot']) > 0))
                        <td>{{$match['a_ot'] or '/'}}</td>
                    @endif
                    <td>{{$match['ascore'] or '/'}}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="Data" class="content" style="display: none;">
    <div class="odd default"></div>
    @if(isset($base['historyBattle']))
    <div class="battle matchTable default" ha="0" le="0">
        <div class="title">
            交锋往绩<button class="close"></button>
            <div class="labelbox">
                <label for="Battle_HA"><input type="checkbox" name="battle" value="ha" id="Battle_HA"><span></span>同主客</label>
                <label for="Battle_LE"><input type="checkbox" name="battle" value="le" id="Battle_LE"><span></span>同赛事</label>
            </div>
        </div>
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$match,'data'=>$base['historyBattle']['nhnl'],'league'=>0,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$match,'data'=>$base['historyBattle']['shnl'],'league'=>0,'ha'=>1,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$match,'data'=>$base['historyBattle']['nhsl'],'league'=>1,'ha'=>0,'hid'=>$match['hid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_hbattle",['base'=>$match,'data'=>$base['historyBattle']['shsl'],'league'=>1,'ha'=>1,'hid'=>$match['hid']])
        @endcomponent
    </div>
    @endif
    @if(isset($base['recentBattle']))
    <?php $recent = $base['recentBattle']; ?>
    <div class="history matchTable default" ha="0" le="0">
        <div class="title">
            近期战绩<button class="close"></button>
            <div class="labelbox">
                <label for="History_HA"><input type="checkbox" name="history" value="ha" id="History_HA"><span></span>同主客</label>
                <label for="History_LE"><input type="checkbox" name="history" value="le" id="History_LE"><span></span>同赛事</label>
            </div>
        </div>

        @component("mobile.basketball_detail_cell.cell.basketball_detail_recenet_battle_head", ['base'=>$match,'ha'=>0, 'le'=>0, 'hmatch'=>$recent['home']['all'], 'hid'=>$match['hid'],'amatch'=>$recent['away']['all'], 'aid'=>$match['aid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_recenet_battle_head", ['base'=>$match,'ha'=>1, 'le'=>0, 'hmatch'=>$recent['home']['sameHA'], 'hid'=>$match['hid'],'amatch'=>$recent['away']['sameHA'], 'aid'=>$match['aid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_recenet_battle_head", ['base'=>$match,'ha'=>0, 'le'=>1, 'hmatch'=>$recent['home']['sameL'], 'hid'=>$match['hid'],'amatch'=>$recent['away']['sameL'], 'aid'=>$match['aid']])
        @endcomponent
        @component("mobile.basketball_detail_cell.cell.basketball_detail_recenet_battle_head", ['base'=>$match,'ha'=>1, 'le'=>1, 'hmatch'=>$recent['home']['sameHAL'], 'hid'=>$match['hid'],'amatch'=>$recent['away']['sameHAL'], 'aid'=>$match['aid']])
        @endcomponent

        @if(isset($recent['home']))
            <p class="teamName"><span>{{$match['hname']}}</span></p>
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['home']['all'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['home']['sameHA'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['home']['sameL'], 'hid'=>$match['hid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['home']['sameHAL'], 'hid'=>$match['hid']])
            @endcomponent
        @endif
        @if(isset($recent['away']))
            <p class="teamName"><span>{{$match['aname']}}</span></p>
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>0, 'data'=>$recent['away']['all'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>0, 'data'=>$recent['away']['sameHA'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>0, 'le'=>1, 'data'=>$recent['away']['sameL'], 'hid'=>$match['aid']])
            @endcomponent
            @component("mobile.basketball_detail_cell.cell.basketball_detail_recent_battle", ['ha'=>1, 'le'=>1, 'data'=>$recent['away']['sameHAL'], 'hid'=>$match['aid']])
            @endcomponent
        @endif
    </div>
    @endif
    @if(isset($base['oddResult']))
    <div class="track default">
        <div class="title">
            赛事盘路<button class="close"></button>
        </div>
        @if(isset($base['oddResult']['home']))
        @component("mobile.cell.football_detail_track",['tname'=>$match['hname'], 'data'=>$base['oddResult']['home']])
        @endcomponent
        @endif
        @if(isset($base['oddResult']['away']))
        @component("mobile.cell.football_detail_track",['tname'=>$match['aname'], 'data'=>$base['oddResult']['away']])
        @endcomponent
        @endif
    </div>
    @endif
    @if(isset($base['schedule']))
    <div class="future matchTable default">
        <div class="title">
            未来赛程<button class="close"></button>
        </div>
        @if(isset($base['schedule']['home']))
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['hname'], 'data'=>$base['schedule']['home'], 'tid'=>$match['hid']])
            @endcomponent
        @endif
        @if(isset($base['schedule']['away']))
            @component("mobile.cell.football_detail_schedule",['tname'=>$match['aname'], 'data'=>$base['schedule']['away'], 'tid'=>$match['aid']])
            @endcomponent
        @endif
    </div>
    @endif
</div>
<div id="Odd" class="content" style="display: none;">
    <div id="Asia" class="asia default childNode" style="display: ;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>主队</th>
                <th>让球</th>
                <th>客队</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="Europe" class="europe default childNode" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>主胜</th>
                <th>平局</th>
                <th>主负</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="Goal" class="goal default childNode" style="display: none;">
        <table>
            <thead>
            <tr>
                <th>公司</th>
                <th></th>
                <th>大球</th>
                <th>盘口</th>
                <th>小球</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>-</td>
                <td>
                    <p class="gray">初</p>
                    <p class="gray">即</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
                <td>
                    <p>-</p>
                    <p>-</p>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
    <div class="bottom">
        <div class="btn">
            <input type="radio" name="Odd" id="Odd_Asia" value="Asia" checked>
            <label for="Odd_Asia">亚盘</label>
            <input type="radio" name="Odd" id="Odd_Europe" value="Europe">
            <label for="Odd_Europe">欧赔</label>
            <input type="radio" name="Odd" id="Odd_Goal" value="Goal">
            <label for="Odd_Goal">大小球</label>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/jquery.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/publicPhone.js"></script>
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/mobile/matchPhone.js"></script>
<script type="text/javascript">
    {{--function getCdnUrl(url) {--}}
        {{--var http = location.href.indexOf('https://') != -1 ? 'https:' : 'http:';--}}
        {{--var url = http + '{{env('CDN_URL')}}' + url;--}}
        {{--return url;--}}
    {{--}--}}
    window.cdn_url = '{{env('CDN_URL')}}';
    window.onload = function () {
        setPage();
        setCanvas();
    }
    window.onscroll = function () {
        setHead();
    }
    window.mid = '{{$id}}';
    window.startTime = '{{date('Ymd', strtotime($match['time']))}}';
    var indexOddUrl = getCdnUrl('/m/basketball/detail/odd/' + window.startTime + '/{{$id}}.html');
    indexOddUrl = '/m/basketball/detail/odd/' + window.startTime + '/{{$id}}.html';
    $.ajax({
        url: indexOddUrl,
        success:function (html) {
            if (html == "") {
                $('#Data div.odd').hide();
            } else {
                $('#Data div.odd').show();
                $('#Data div.odd').html(html);
            }
            //$('#Data_Odd').html(html);
        },
        error:function() {
            //$('#Data_Odd')[0].style.display = 'none';
        }
    });

    function getOddIndex(id) {
        Alert('loading', '加载中');
        var oddIndexUrl = getCdnUrl('/m/basketball/detail/odd_index/' + window.startTime + '/' + window.mid + '.html');
        oddIndexUrl = '/m/basketball/detail/odd_index/' + window.startTime + '/' + window.mid + '.html';
        $.ajax({
            'url': oddIndexUrl,
            'type': 'get',
            'dataType': 'html',
            'success': function (html) {
                window.oddIndexGet = true;
                $("#" + id).html(html);
                var BottomTab = $('#' + id + ' .bottom input');
                BottomTab.change(function(){
                    $(this).parents('.content').children('.childNode').css('display','none');
                    $('#' + this.value).css('display','');
                });
                closeLoading();
            },
            "error": function () {
                closeLoading();
            }
        });
    }
</script>
@endsection