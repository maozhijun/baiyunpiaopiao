@extends('app.layout.match_base')

@section('content')
    <!--
    @if(isset($base))
        <div id="Match" class="content">
            @component("app.football.cell.football_detail_base",['lineup'=>$lineup,'match'=>$match,'events'=>$events])
            @endcomponent
        </div>
    @endif
    -->
    @if(isset($html))
        <div id="Match" class="content">{!! $html !!}</div>
    @endif
    <div class="nolist">暂无数据</div>
@endsection