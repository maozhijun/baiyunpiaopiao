@extends('layouts.main')

@section('navTabs')
    <ul class="nav nav-tabs">
        <li role="presentation" {{ starts_with(request()->path(),'records/qq')?'class=active':'' }}>
            <a href="/records/qq/">QQ</a>
        </li>
    </ul>
    <br>
@endsection