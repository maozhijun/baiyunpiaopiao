@extends('pc.index.basketball.match_list_layout')
@section('match_title')
    <div class="date">
        <button class="sreach">搜索</button><input value="{{$date or ''}}" type="date" name="date" placeholder="请输入日期">
    </div>
    <a href="/basketball/immediate.html">即时比分</a><a href="/basketball/schedule.html">下日赛程</a><p>完场比分</p>
@endsection