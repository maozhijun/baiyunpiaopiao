@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'resources/kball')?'class=active':'' }}>
            <a href="/resources/kball/">K球</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'resources/leisu')?'class=active':'' }}>
            <a href="/resources/leisu/">雷速</a>
        </li>
    </ul>
    <br>
@endsection