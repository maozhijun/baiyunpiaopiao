<!DOCTYPE html>
<html lang="zh-cn">

<body>
<div id="playUrl" rows="3" style="width:100%;" readonly></div>
</body>
<script src="/js/jquery.js"></script>
{{--<script src="https://watch.b8b8.tv/newplayer/player/player.js?t=20181010"></script>--}}
<script src="https://watch.b8b8.tv/newplayer/player/decrypt.js"></script>
{{--<script src="https://watch.b8b8.tv/newplayer/player/cyberplayer.js?t=20181010"></script>--}}
@if(!empty($playUrl))
    <script>
        var b = new decrypt();
        function Postdata() {
            var playurl = b.decode(decodeURIComponent('{{$playUrl}}'));
            playurl = b.decode(playurl);
            $("#playUrl").html(playurl);
        }
        Postdata();
    </script>
@endif
</html>
