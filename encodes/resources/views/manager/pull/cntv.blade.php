@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>频道</td>
                <td>来源</td>
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                <tr>
                    <td>{{ $live['name'] }}</td>
                    <td>{{ $live['desc'] }}</td>
                    <td>
                        <a href="/resources/cntv/get_live_url/{{ $live['channel'] }}" target="_blank">
                            获取M3U8地址
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