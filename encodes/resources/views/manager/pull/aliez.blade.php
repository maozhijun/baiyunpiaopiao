@extends('layouts.resources')
@section('content')
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>频道</td>
                <td>截图</td>
                <td>线路</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives as $live)
                <tr>
                    <td><a href="{{ $live['href'] }}" target="_blank">{{ $live['titleshort'] }}</a></td>
                    <td><img src="{{ $live['img'] }}"></td>
                    <td>{{ $live['line'] }}</td>
                    <td>
                        referer: http://emb.aliez.me/
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection