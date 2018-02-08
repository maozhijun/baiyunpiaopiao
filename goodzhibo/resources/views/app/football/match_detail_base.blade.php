@extends('app.layout.match_base')

@section('content')
    @if(isset($base))
        <div id="Match" class="content">
            @component("app.football.cell.football_detail_base",['lineup'=>$lineup,'match'=>$match,'events'=>$events])
            @endcomponent
        </div>
    @endif
@endsection