@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>时间</td>
                <td>比赛</td>
                <td>状态</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($matchesInfo as $match)
                <?php
                    $sid = $match['mid'];
                    $liveUrl = isset($livesInfo[$sid]) ? $livesInfo[$sid] : "";
                    if (isset($liveUrl) && !str_contains($liveUrl, "heibaizhibo.com")) {
                        $liveUrl = "http://www.gunqiu.com/match_live/".$sid;
                    }
                ?>
                <tr>
                    <td>
                        <label class="label label-primary">{{ $match['league']}}</label>
                    </td>
                    <td>{{$match['matchtime']}}</td>
                    <td>{{$match['hometeam'].' vs '.$match['guestteam']}}</td>
                    <td>
                        @if($match['matchstate'] == 1)
                            <label class="label label-info">上半场</label>
                        @elseif($match['matchstate'] == 2)
                            <label class="label label-warning">中场</label>
                        @elseif($match['matchstate'] == 3)
                            <label class="label label-success">下半场</label>
                        @else
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        @if(strlen($liveUrl) > 0)
                            <a href="/resources/gunqiu/get_live_url?url={{urlencode($liveUrl)}}" target="_blank">获取流地址</a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection