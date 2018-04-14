<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>推流后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/toastr.js/latest/css/toastr.css" rel="stylesheet">
    <link href="//cdn.bootcss.com/bootstrap/3.3.7/fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
    <link href="{{ asset('/css/dashboard.css') }}" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
    </button>
    <div class="navbar-header">
        <a class="navbar-brand" href="/manager/">推流后台</a>
    </div>
</nav>

<div class="container-fluid">
    <h2>
        {{ $detail['matchInfo']['matchDesc'] }}-{{ $detail['matchInfo']['leftName'] }} VS {{ $detail['matchInfo']['rightName'] }}({{ $detail['matchInfo']['startTime'] }})
    </h2>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <h3>录像</h3>
                <table class="table table-condensed">
                    <thead>
                    <tr class="active">
                        <td>标题</td>
                        <td>描述</td>
                        <td>标签</td>
                        <td>时长</td>
                        <td>封面</td>
                        <td>地址</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($detail['afterRecord']['list']))
                        @foreach($detail['afterRecord']['list'] as $records)
                            <tr>
                                <td>{{ $records['title'] }}</td>
                                <td>{{ $records['cateDesc'] }}</td>
                                <td>{{ $records['tag'] }}</td>
                                <td>{{ $records['duration'] }}</td>
                                <td>
                                    <img width="150" src="{{ $records['pic'] }}">
                                    <br>
                                    <a href="{{ $records['pic'] }}" target="_blank">{{ $records['pic'] }}</a>
                                </td>
                                <td><a href="{{ $records['playUrl'] }}" target="_blank">{{ $records['playUrl'] }}</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <h3>集锦</h3>
                <table class="table table-condensed">
                    <thead>
                    <tr class="active">
                        <td>标题</td>
                        <td>描述</td>
                        <td>标签</td>
                        <td>时长</td>
                        <td>封面</td>
                        <td>地址</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($detail['afterVideos']['list']))
                        @foreach($detail['afterVideos']['list'] as $records)
                            <tr>
                                <td>{{ $records['title'] }}</td>
                                <td>{{ $records['cateDesc'] }}</td>
                                <td>{{ $records['tag'] }}</td>
                                <td>{{ $records['duration'] }}</td>
                                <td>
                                    <img width="150" src="{{ $records['pic'] }}">
                                    <br>
                                    <a href="{{ $records['pic'] }}" target="_blank">{{ $records['pic'] }}</a>
                                </td>
                                <td><a href="{{ $records['playUrl'] }}" target="_blank">{{ $records['playUrl'] }}</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
                <h3>文章</h3>
                <table class="table table-condensed">
                    <thead>
                    <tr class="active">
                        <td>标题</td>
                        <td>时间</td>
                        <td>描述</td>
                        <td>来源</td>
                        <td>封面</td>
                        <td>地址</td>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($detail['relatedNews']['items']))
                        @foreach($detail['relatedNews']['items'] as $records)
                            <tr>
                                <td>{{ $records['title'] }}</td>
                                <td>{{ $records['pub_time'] }}</td>
                                <td>{{ $records['abstract'] }}</td>
                                <td>{{ $records['source'] }}</td>
                                <td>
                                    <img width="150" src="{{ $records['imgurl2'] }}">
                                    <br>
                                    <a href="{{ $records['imgurl2'] }}" target="_blank">{{ $records['imgurl2'] }}</a>
                                </td>
                                <td><a href="{{ $records['url'] }}" target="_blank">{{ $records['url'] }}</a></td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</html>
