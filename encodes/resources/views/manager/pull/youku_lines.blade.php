<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <title>推流后台</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!-- Bootstrap -->
    <link href="/css/bootstrap-theme.css" rel="stylesheet">
    <link href="/css/bootstrap.css" rel="stylesheet">
    <link href="/css/toastr.css" rel="stylesheet">
    <link href="/css/glyphicons-halflings-regular.svg" rel="stylesheet">
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
@if(!empty($lines))
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive">
                    <table class="table table-condensed">
                        <thead>
                        <tr class="active">
                            <td style="width: 10%">清晰度</td>
                            <td>流地址</td>
                        </tr>
                        </thead>
                        @foreach($lines as $data)
                            @if(isset($data['playUrl']))
                                <tr>
                                    <td>{{$data['name']}}</td>
                                    <td>
                                        <textarea rows="3" style="width:100%;" readonly>{{ $data['playUrl'] }}</textarea>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
</body>
<script src="/js/jquery.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/toastr.min.js"></script>
</html>
