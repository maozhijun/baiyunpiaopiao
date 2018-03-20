@extends('pc.layout.base_new')
@section('content')
    <div id="Content">
        <div class="inner">
            <?php
            $ads = array('ad_center_8.gif','ad_center_2.png','ad_center_3.gif','ad_center_4.gif','ad_center_5.gif','ad_center_6.gif','ad_center_7.gif');
            $random_ad_keys=array_rand($ads, 2);
            ?>
            <div class="adbanner inner"><a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL').'/img/'.$ads[$random_ad_keys[0]]}}"><button class="close"></button></a></div>
            <div id="Info">
                <p class="name">{{$match['lname']}}直播：{{$match['hname']}}&nbsp;&nbsp;VS&nbsp;&nbsp;{{$match['aname']}}</p>
                <p class="line">
                <?php $channels = $live['channels']; $channels = is_array($channels) ? $channels : []; ?>
                    @foreach($channels as $index=>$channel)
                        <?php
                        if ($channel['type'] == 3 || $channel['type'] == 1 || $channel['type'] == 2 || $channel['type'] == 7)
                            $preUrl = str_replace("https://","http://",env('APP_URL'));
                        else if($channel['type'] == 99){
                            if ($channel['player'] == 11){
                                $preUrl = str_replace("https://","http://",env('APP_URL'));
                            }
                            else{
                                if (stristr($channel['link'],'player.pptv.com')){
                                    $preUrl = str_replace("https://","http://",env('APP_URL'));
                                }
                                else{
                                    $preUrl = str_replace("http://","https://",env('APP_URL'));
                                }
                            }
                        } else {
                            $preUrl = str_replace("http://","https://",env('APP_URL'));
                        }
                        ?>
                        <button id="{{$channel['channelId']}}" @if($show_live) onclick="ChangeChannel('{{$preUrl.'/live/player.html?cid='.$channel['id']}}', this)" @endif >{{$channel['name']}}</button>
                    @endforeach
                </p>
            </div>
            <div class="iframe" id="Video">
                @if($match['status'] == 0 && !$show_live)
                @elseif($show_live)
                @elseif($match['status'] == -1 && !$show_live)
                    {{--<p class="noframe"><img src="/img/pc/icon_matchOver.png">比赛已结束</p>--}}
            @endif
                <div class="ADWarm_RU" style="display: none;"><p onclick="document.getElementById('Video').removeChild(this.parentNode)">· 我知道了 ·</p></div>
            </div>
            <div class="share" id="Share">
                复制此地址分享：<input type="text" name="share" value="" onclick="Copy()"><span></span>
            </div>
        </div>
        <div class="adbanner inner"><a href="https://126hg.com/?intr=ssszhibo" target="_blank"><img src="{{env('CDN_URL').'/img/dd_hg126.gif'}}"><button class="close"></button></a></div>
        <div class="clear"></div>
    </div>
    <div class="adflag left">
        <a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL')}}/img/ad_left2.gif"></a>
        <img src="/img/pc/qrcode_for_ht_n.jpg"><p>扫码关注，每日抽千元大奖</p>
    </div>
    <div class="adflag right">
        <a href="http://www.hg6879.com/?intr=hhhffff" target="_blank"><img src="{{env('CDN_URL')}}/img/ad_right2.gif"></a>
        <img src="/img/pc/qrcode_for_ht_n.jpg"><p>扫码关注，每日抽千元大奖</p>
    </div>
@endsection
@section('js')
    <script type="text/javascript" src="{{env('CDN_URL')}}/js/public/pc/video.js"></script>
    <script type="text/javascript">
        window.onload = function () { //需要添加的监控放在这里
            setADClose();
            LoadVideo();
        }
    </script>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{env('CDN_URL')}}/css/video.css?rd=20180131">
@endsection