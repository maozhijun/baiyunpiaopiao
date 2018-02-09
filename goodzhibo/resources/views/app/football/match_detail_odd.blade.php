@extends('app.layout.match_base')

@section('content')
    @if(isset($bankers) && count($bankers) > 0)
        <div id="Odd" class="content">
            @component("app.football.cell.football_detail_odd_index",['bankers'=>$bankers, 'odds'=>$odds])
            @endcomponent
        </div>
    @endif
    <div class="nolist">暂无数据</div>
@endsection