@extends('layouts.records')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>时间</td>
                <td>比赛</td>
                <td>比分</td>
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($records as $live)
                <tr>
                    <td>
                        <label class="label {{ $live['isPay']==1?'label-danger':'label-primary' }}">{{ $live['matchInfo']['matchDesc'] }}</label>
                    </td>
                    <td>
                        {{ $live['matchInfo']['startTime'] }}
                    </td>
                    <td>
                        {!! $live['matchInfo']['leftName'].'&nbsp;VS&nbsp;'.$live['matchInfo']['rightName'] !!}
                    </td>
                    <td>
                        <label class="label label-warning">{!! $live['matchInfo']['leftGoal'].'&nbsp;-&nbsp;'.$live['matchInfo']['rightGoal'] !!}</label>
                    </td>
                    <td>
                        <a href="/records/qq/get_record_url/{{ $live['matchInfo']['mid'] }}" target="_blank">
                            获取播放地址
                        </a>
                    </td>
                    <td>
                        {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection