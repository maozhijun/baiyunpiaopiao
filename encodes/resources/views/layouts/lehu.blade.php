@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'lehu/stream')?'class=active':'' }}>
            <a href="/lehu/stream/">乐虎机器主播转推流</a>
        </li>
        <li role="presentation" {{ starts_with(request()->path(),'lehu/clean-stream')?'class=active':'' }}>
            <a href="/lehu/clean-stream/">鲨鱼清流</a>
        </li>
    </ul>
    <br>
@endsection