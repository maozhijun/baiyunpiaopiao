@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'manager/other')?'class=active':'' }}>
            <a href="/obs/stream/">获取推流码</a>
        </li>
    </ul>
    <br>
@endsection