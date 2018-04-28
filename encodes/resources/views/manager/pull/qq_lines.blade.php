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
                            <td>流地址</td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lines as $line)
                            <tr>
                                <td>
                                    <textarea rows="6" style="width:100%;" readonly>{{ str_replace('.m3u8','.flv',$line).'&guid=01B04F70C9653127B9CD81E588AF70CBBCAFD98C&refer=http%3A%2F%2Fsports.qq.com%2Fkbsweb%2Fgame.htm%3Fmid%3D822%3A965018&encrypt=0&apptype=live' }}</textarea>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
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
@if(!empty($liveId))
    <script>
        $.ha = function (a) {
            function b(a, b) {
                return ((a >> 1) + (b >> 1) << 1) + (1 & a) + (1 & b)
            }

            for (var c = [], d = 0; d < 64;) c[d] = 0 | 4294967296 * Math.abs(Math.sin(++d));
            var e = function (d) {
                for (var e, f, g, h, i = [], j = unescape(encodeURI(d)), k = j.length, l = [e = 1732584193, f = -271733879, ~e, ~f], m = 0; m <= k;) i[m >> 2] |= (j.charCodeAt(m) || 128) << 8 * (m++ % 4);
                for (i[d = (k + 8 >> 6) * a + 14] = 8 * k, m = 0; m < d; m += a) {
                    for (k = l, h = 0; h < 64;) k = [g = k[3], b(e = k[1], (g = b(b(k[0], [e & (f = k[2]) | ~e & g, g & e | ~g & f, e ^ f ^ g, f ^ (e | ~g)][k = h >> 4]), b(c[h], i[[h, 5 * h + 1, 3 * h + 5, 7 * h][k] % a + m]))) << (k = [7, 12, 17, 22, 5, 9, 14, 20, 4, 11, a, 23, 6, 10, 15, 21][4 * k + h++ % 4]) | g >>> 32 - k), e, f];
                    for (h = 4; h;) l[--h] = b(l[h], k[h])
                }
                for (d = ""; h < 32;) d += (l[h >> 3] >> 4 * (1 ^ 7 & h++) & 15).toString(a);
                return d
            };
            return e
        }(16);
        $.$xx = function (a, b, d, e, f, g) {
            magic = "123456";
            if (g.length < 3) return "err";
            if ("7." != g.substr(0, 2)) return "err";
            subver = g.substr(2);
            "1" == subver && (magic = "06fc1464");
            "2" == subver && (magic = "4244ce1b");
            "3" == subver && (magic = "77de31c5");
            "4" == subver && (magic = "e0149fa2");
            "5" == subver && (magic = "60394ced");
            "6" == subver && (magic = "2da639f0");
            "7" == subver && (magic = "c2f0cf9f");
            var f = f || parseInt(+new Date / 1e3);
            var e = ("" + e).charAt(0);
            var h = $.ha(magic + b + f + "*#06#" + a);
            return h
        };
        var d = {
            vid: '{{ $liveId }}',
            platform: '40403',
            sdtfrom: 'v3030',
            tm: {{ time() }},
            encryptVer: '7.5'
        };
        var i = $.$xx(d.platform, d.vid, d.sdtfrom, 1, d.tm, d.encryptVer);
        location.href = '?cKey=' + i + '&tm=' + d.tm + '&sdtfrom=' + d.sdtfrom + '&platform=' + d.platform + '&encryptVer=' + d.encryptVer;
    </script>
@endif
</html>
