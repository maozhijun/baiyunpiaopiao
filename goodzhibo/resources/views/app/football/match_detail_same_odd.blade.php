@extends('app.layout.match_base')

@section('content')
    <!--
    @if(isset($sameOdd) || isset($sameOdd2) || isset($sameOdd3))
        <div id="SameOdd" class="content">
            @component("mobile.cell.football_detail_same_odd",['sameOdd'=>$sameOdd, 'sameOdd2'=>$sameOdd2, 'sameOdd3'=>$sameOdd3])
            @endcomponent
        </div>
    @endif
    -->
    @if(isset($html))
        <div id="SameOdd" class="content">{!! $html !!}</div>
    @endif
    <div class="nolist">暂无数据</div>
@endsection