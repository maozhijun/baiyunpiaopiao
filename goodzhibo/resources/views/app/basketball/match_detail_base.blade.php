@extends('app.layout.match_base')

@section('content')
    @if(isset($match))
        <div id="Match" class="content">
            @component("mobile.basketball_detail_cell.base_cell",['match'=>$match])
        @endcomponent
                </div>
            @endif
    <div class="nolist">暂无数据</div>
@endsection