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
            @foreach($lives['matches'] as $key=>$live)
                <?php
                    $matchInfo = isset($lives['matchInfos'][$live['sid']]) ? $lives['matchInfos'][$live['sid']] : null;
                    if (!$live['isOut']) {
                        $live['heibaiUrl'] = "http://www.gunqiu.com/match_live/".$live['sid'];
                    }
                ?>
                @if(!isset($matchInfo)) @continue @endif
                <tr>
                    <td>
                        <label class="label label-primary">{{ isset($matchInfo) ? $matchInfo['leagueName'] : "其他"}}</label>
                    </td>
                    <td>{{isset($matchInfo) ? $matchInfo['time'] : "-"}}</td>
                    <td>{{isset($matchInfo) ? $matchInfo['hname'].' vs '.$matchInfo['aname'] : "-"}}</td>
                    <td>
                        @if($matchInfo['status'] == 1)
                            <label class="label label-info">上半场</label>
                        @elseif($matchInfo['status'] == 2)
                            <label class="label label-warning">中场</label>
                        @elseif($matchInfo['status'] == 3)
                            <label class="label label-success">下半场</label>
                        @else
                            <label class="label label-default">未开始</label>
                        @endif
                    </td>
                    <td>
                        <a href="/resources/gunqiu/get_live_url?url={{urlencode($live['heibaiUrl'])}}" target="_blank">获取流地址</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection