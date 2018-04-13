@extends('layouts.resources')
@section('content')
    <script>
        Date.prototype.format = function (fmt) {
            var o = {
                "M+": this.getMonth() + 1,
                "d+": this.getDate(),
                "H+": this.getHours(),
                "m+": this.getMinutes(),
                "s+": this.getSeconds(),
                "S+": this.getMilliseconds()
            };

            //因位date.getFullYear()出来的结果是number类型的,所以为了让结果变成字符串型，下面有两种方法：


            if (/(y+)/.test(fmt)) {
                //第一种：利用字符串连接符“+”给date.getFullYear()+""，加一个空字符串便可以将number类型转换成字符串。

                fmt = fmt.replace(RegExp.$1, (this.getFullYear() + "").substr(4 - RegExp.$1.length));
            }
            for (var k in o) {
                if (new RegExp("(" + k + ")").test(fmt)) {

                    //第二种：使用String()类型进行强制数据类型转换String(date.getFullYear())，这种更容易理解。

                    fmt = fmt.replace(RegExp.$1, (RegExp.$1.length == 1) ? (o[k]) : (("00" + o[k]).substr(String(o[k]).length)));
                }
            }
            return fmt;
        }
    </script>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <td>赛事</td>
                <td>时间</td>
                <td>比赛</td>
                <td>状态</td>
                <td>直播地址</td>
                <td>操作</td>
            </tr>
            </thead>
            <tbody>
            @foreach($lives['living'] as $live)
                <tr>
                    <td>{{ $live['leagueName'] }}</td>
                    <td>
                        <script>document.write({!! 'new '.str_replace('/','',$live['start']).'.format("yyyy-MM-dd HH:mm")' !!})</script>
                    </td>
                    <td>{!! $live['teamAName'].'&nbsp;VS&nbsp;'.$live['teamBName'] !!}</td>
                    <td>
                        <label class="label label-info">进行中</label>
                    </td>
                    <td>
                        <a href="/resources/longzhu/get_live_url/{{ $live['liveRoomId'] }}" target="_blank">
                            获取M3U8地址
                        </a>
                    </td>
                    <td>
                        {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                    </td>
                </tr>
            @endforeach
            @foreach($lives['soon'] as $live)
                <tr>
                    <td>{{ $live['leagueName'] }}</td>
                    <td>
                        <script>document.write({!! 'new '.str_replace('/','',$live['start']).'.format("yyyy-MM-dd HH:mm")' !!})</script>
                    </td>
                    <td>{!! $live['teamAName'].'&nbsp;VS&nbsp;'.$live['teamBName'] !!}</td>
                    <td>
                        <label class="label label-default">未开始</label>
                    </td>
                    <td>
                        <a href="/resources/longzhu/get_live_url/{{ $live['liveRoomId'] }}" target="_blank">
                            获取M3U8地址
                        </a>
                    </td>
                    <td>
                        {{--<a class="btn btn-xs btn-danger" href="/resources/ssports/created/">推流</a>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection