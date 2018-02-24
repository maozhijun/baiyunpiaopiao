@extends('app.layout.bk_match_base')

@section('content')
    @if(isset($html))
        <div id="Match" class="content" style="display: ;">{!! $html !!}</div>
    @endif
    <div class="nolist">暂无数据</div>
@endsection