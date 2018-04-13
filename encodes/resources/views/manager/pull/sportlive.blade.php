@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>频道</td>
                <td>线路</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                <tr>
                    <td width="20%">{{ $live['channel_title'] }}</td>
                    <td><input value="{{ $live['channel_url'] }}" size="80" readonly></td>
                    <td>
                        @if(str_contains($live['channel_url'],'gmcllc.de'))
                            User-Agent: BLUEIOS
                        @endif
                        {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection