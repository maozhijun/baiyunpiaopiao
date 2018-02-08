@extends('app.layout.match_base')

@section('content')
    @if(isset($base))
        <div id="Data" class="content">
            @if(isset($bankers) && count($bankers) > 0)
                <div class="odd default">
                    @component("mobile.cell.football_detail_odd",['bankers'=>$bankers])
                    @endcomponent
                </div>
            @endif
            @component("app.football.cell.football_detail_analyse",['base'=>$base, 'match'=>$match])
            @endcomponent
        </div>
    @endif
@endsection