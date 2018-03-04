@extends('pc.layout.base_new')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/home.css">
@endsection
@section('content')
    <div id="Content">
        <div class="inner">
            @if(isset($tv) && count($tv) > 0)
            <div class="tv default">
                <div class="title">
                    <p>热门电视频道</p>
                </div>
                <a class="big" href="video.html"><img src="img/bg_tv_cctv5.png">CCTV5</a>
                <a class="big" href="video.html"><img src="img/bg_tv_cctv5.png">CCTV5</a>
                <a class="big" href="video.html"><img src="img/bg_tv_cctv5.png">CCTV5</a>
                <a class="big" href="video.html"><img src="img/bg_tv_cctv5.png">CCTV5</a>
                <div class="clear"></div>
                <p class="more" onclick="ChangeMoreTV()">更多电视频道<span>[点击展开]</span></p>
                <div class="small" id="MoreTV" style="display: none;">
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                    <a class="small" href="video.html">CCTV5</a>
                </div>
                <div class="clear"></div>
            </div>
            @endif
            @if(isset($play_matches) && count($play_matches) > 0)
            <div class="default">
                <div class="title">
                    <p>正在直播</p>
                </div>
                <table class="list" id="Show_1">
                    <col number="1" width="50px">
                    <col number="2" width="64px">
                    <col number="3" width="64px">
                    <col number="4" width="16%">
                    <col number="5" width="20px">
                    <col number="6" width="12px">
                    <col number="7" width="26px">
                    <col number="8" width="12px">
                    <col number="9" width="20px">
                    <col number="10" width="16%">
                    <col number="11" width="300px">
                    <thead>
                    <tr>
                        <th>项目</th>
                        <th>赛事</th>
                        <th>时间</th>
                        <th colspan="7">对阵</th>
                        <th>直播频道</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($play_matches as $p_match)
                        @component('pc.cell.home_match_cell',['match'=>$p_match])
                        @endcomponent
                    @endforeach
                    </tbody>
                </table>
            </div>
            @endif
                <?php
                $ads = array('ad_center_1.gif','ad_center_2.png','ad_center_3.gif','ad_center_4.gif','ad_center_5.gif','ad_center_6.gif','ad_center_7.gif');
                $random_ad_keys=array_rand($ads, 1);
                ?>
            <div class="adbanner default"><a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[0]]}}"><button class="close"></button></a></div>
            <div class="default">
                <div class="title">
                    <p>稍后直播</p>
                </div>
                <table class="list" id="Show_2">
                    <col number="1" width="50px">
                    <col number="2" width="64px">
                    <col number="3" width="64px">
                    <col number="4" width="16%">
                    <col number="5" width="20px">
                    <col number="6" width="12px">
                    <col number="7" width="26px">
                    <col number="8" width="12px">
                    <col number="9" width="20px">
                    <col number="10" width="16%">
                    <col number="11" width="300px">
                    <thead>
                    <tr>
                        <th>项目</th>
                        <th>赛事</th>
                        <th>时间</th>
                        <th colspan="7">对阵</th>
                        <th>直播频道</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($matches as $time=>$match_array)
                        @foreach($match_array as $match)
                            @component('pc.cell.home_match_cell',['match'=>$match])
                            @endcomponent
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
            @if(isset($videos) && count($videos) > 0)
            <div class="moreVideo default">
                <div class="title">
                    <p>精彩视频</p>
                </div>
                <div class="labelbox">
                    <button class="on">全部</button>
                    <button>英超</button>
                    <button>英超</button>
                    <button>西甲</button>
                    <button>英超</button>
                    <button>西甲</button>
                    <button>英超</button>
                    <button>西甲</button>
                    <button>英超</button>
                    <button>西甲</button>
                    <button>西甲</button>
                </div>
                <div class="list">
                    <a class="big" href="">
                        <img src="img/bg_download.jpg">
                        <p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p>
                    </a>
                    <a class="big" href="">
                        <img src="img/bg_download.jpg">
                        <p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p>
                    </a>
                    <a class="big" href="">
                        <img src="img/bg_download.jpg">
                        <p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p>
                    </a>
                    <a class="big" href="">
                        <img src="img/bg_download.jpg">
                        <p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p>
                    </a>
                    <a class="big" href="">
                        <img src="img/bg_download.jpg">
                        <p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p>
                    </a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <a class="small" href=""><p>1月8日西甲 塞尔塔vs皇家马德里 录像 集锦</p></a>
                    <div class="clear"></div>
                </div>
            </div>
            @endif
        </div>
    </div>
    <div class="adflag left">
        <button class="close" onclick="this.parentNode.parentNode.removeChild(this.parentNode)"></button>
        <a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL')}}/img/ad_left.gif"></a>
    </div>
    <div class="adflag right">
        <button class="close" onclick="this.parentNode.parentNode.removeChild(this.parentNode)"></button>
        <a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL')}}/img/ad_right.gif"></a>
    </div>
@endsection
@section('js')
<script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/home.js"></script>
<script type="text/javascript">
    window.onload = function () { //需要添加的监控放在这里
        setADClose();
    }
</script>
@endsection