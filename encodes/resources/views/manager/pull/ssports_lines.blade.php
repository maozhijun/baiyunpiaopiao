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
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="table-responsive">
                <table class="table table-condensed">
                    <thead>
                    <tr class="active">
                        <td colspan="3">信号列表</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($lines as $room)
                        <tr class="success" style="text-align: center;vertical-align: middle;">
                            <td colspan="3">{{ $room['language'].'-('.$room['commentary'].')' }}</td>
                        </tr>
                        @if(isset($room['line_1']))
                            @foreach($room['line_1'] as $key=>$value)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $loop->count }}" style="text-align: center;vertical-align: middle;">线路1</td>
                                    @endif
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        @endif
                        @if(isset($room['line_2']))
                            @foreach($room['line_2'] as $key=>$value)
                                <tr>
                                    @if ($loop->first)
                                        <td rowspan="{{ $loop->count }}" style="text-align: center;vertical-align: middle;">线路2</td>
                                    @endif
                                    <td>{{ $key }}</td>
                                    <td>{{ $value }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</body>
<script src="//cdn.bootcss.com/jquery/2.1.4/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.js"></script>
<script src="//cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
</html>
