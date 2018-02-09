@extends('pc.index.match_list_layout')
@section('match_title')
    <div class="date">
        <button class="sreach">搜索</button><input value="{{$date or ''}}" type="date" name="date" placeholder="请输入日期">
    </div>
    <a href="/football/immediate.html">即时比分</a><p>下日赛程</p><a href="/football/result.html">完场比分</a>
@endsection