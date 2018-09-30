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
                        @foreach($lines as $anchor=>$innerLines)
                            <thead>
                            <tr class="active">
                                <td>频道：{{$anchor}}</td>
                            </tr>
                            </thead>
                            <tbody></tbody>
                            <thead>
                            <tr class="active">
                                <td style="width: 10%">清晰度</td>
                                <td>流地址</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($innerLines as $name=>$items)
                                <?php $count = count($items); ?>
                                <tr>
                                    <td rowspan="{{$count}}">{{$name}}</td>
                                    <td>
                                        <textarea rows="3" style="width:100%;" readonly>{{ $items[0] }}</textarea>
                                    </td>
                                </tr>
                                @if($count > 0)
                                    <tr>
                                        @foreach($items as $index=>$item)
                                            @if($index > 0)
                                                <td>
                                                    <textarea rows="3" style="width:100%;" readonly>{{ $item }}</textarea>
                                                </td>
                                            @endif
                                        @endforeach
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
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
<script src="/js/pptv/player-test.js"></script>
@if(!empty($key))
    <script>
        function videoData() {
            var test = initTest(65);

            console.log(test);
            var key = '{{$key}}';
            var n, i, a, o = key;
            try {
                if (o) {
                    var r = o.split("|");
                    r.length > 0 && 0 == r[0] && (a = r[1], n = r[2], i = test.H5Crypto.secure_key_decrypt(test.H5Crypto.SC_KEY, n, a))
                }
            } catch (e) {
                console.log(e);
            }
            return i;
        };

        var cKey = videoData();
        location.href = '?cKey=' + cKey;
    </script>
@endif
</html>
