var CKHead = '/js/public/pc/ckplayer/';
var maxTimeOut = 0;

var ad_time = 0;
var ad_l = '/img/pc/demo.jpg', ad_d = '/img/pc/demo.jpg', ad_z = '/img/pc/demo.jpg', ad_w = '/img/pc/demo.jpg';
var WXCodeRun = false;
var firstShowCode = false;
var active_text = '', active_code = '/img/pc/code.jpg';
var active_text_tmp = '', active_code_tmp = '';
var valid_code = '8888';
var show_ad = false;
$.ajax({
    "url": "/m/dd_image/images.json?time=" + (new Date()).getTime(),
    "success": function (json) {
        if (json) {
            if (json.l) ad_l = json.l;
            if (json.d) ad_d = json.d;
            if (json.z) ad_z = json.z;
            if (json.w) ad_w = json.w;
            if (json.code) valid_code = json.code;
            if (json.dd_time) ad_time = json.dd_time;
        }
        var code = getCookie('LIVE_HD_CODE_KEY');
        if (code == valid_code) {
            ad_time = 0;//已输入验证码，不出广告
        }
    }
});

//获取链点参数
function GetQueryString(str,href) {
    var Href;
    if (href != undefined && href != '') {
        Href = href;
    }else{
        Href = location.href;
    }
    var rs = new RegExp("([\?&])(" + str + ")=([^&#]*)(&|$|#)", "gi").exec(Href);
    if (rs) {
        return decodeURI(rs[3]);
    } else {
        return '';
    }
}

function LoadVideo () {
	var CID = GetQueryString('cid');
	if (CID && CID != '') {
		PlayVideoShare(CID);
	}
}

function LoadCK (Link){ //m3u8
	if ((Link.indexOf('http://') == 0 || Link.indexOf('https://') == 0) && IsPC()) {
		Link = encodeURIComponent(Link)
	}
	var flashvars={
		s:4,
		f:CKHead + 'm3u8.swf',
		a:Link,
		lv:1,
		c:0,
		p:1,
        l: ad_l,
        d: ad_d,
        z: ad_z,
        t: maxTimeOut > 0 ? 0 : ad_time,
		loaded:'loadHandler'
	}
    if (flashvars.t == 0) {
        flashvars.l = "";
        flashvars.d = "";
        flashvars.z = "";
    }
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
	var video=[''+Link+'->video/mp4'];
	CKobject.embed( CKHead + 'ckplayer.swf','MyFrame','ckplayer_a1','100%','100%',false,flashvars,video,params);
}

function LoadFlv (Link){ //flv
	if (Link.indexOf('http://') == 0 || Link.indexOf('https://') == 0) {
		Link = encodeURIComponent(Link);
	}
	var flashvars={
		f:''+Link+'',
		lv:1,
		c:0,
		p:1,
        l: ad_l,
        d: ad_d,
        z: ad_z,
        t: maxTimeOut > 0 ? 0 : ad_time,
		loaded:'loadHandler'
	}
    if (flashvars.t == 0) {
        flashvars.l = "";
        flashvars.d = "";
        flashvars.z = "";
    }
	var video=[''+Link+'->video/mp4','http://www.ckplayer.com/webm/0.webm->video/webm','http://www.ckplayer.com/webm/0.ogv->video/ogg']; 
	CKobject.embed( CKHead + 'ckplayer.swf','MyFrame','ckplayer_a1','100%','100%',false,flashvars,video)
}

function LoadRtmp (Link){ //rtmp
    var flashvars = {
        f:Link,
        lv:1,
        c:0,
        p:1,
        l: ad_l,
        d: ad_d,
        z: ad_z,
        t: maxTimeOut > 0 ? 0 : ad_time,
		loaded:'loadHandler'
	};
    if (flashvars.t == 0) {
        flashvars.l = "";
        flashvars.d = "";
        flashvars.z = "";
    }
	var params = {
		allowFullScreen: true,
		allowScriptAccess: "always",
		bgcolor: "#000000"
	};
	var attrs = {
		name: "ckplayer"
	};
	var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
    var video=[''+Link+'->video/mp4'];
    CKobject.embed( CKHead + 'ckplayer.swf?url=','MyFrame','ckplayer_a1','100%','100%',false,flashvars,video,params);
}

function LoadIframe (Link) { //iframe
	var Frame = document.createElement('iframe');
	Frame.setAttribute('allowfullscreen','true');
	Frame.setAttribute('scrolling','no');
	Frame.setAttribute('frameborder','0');
	Frame.width = '100%';
	Frame.height = '100%';
	Frame.src = Link;
	document.getElementById('MyFrame').appendChild(Frame)
}

function LoadPPTV (Link) { //PPTV
	document.getElementById('MyFrame').innerHTML = '<embed src="' + Link + '" quality="high" width="100%" height="100%" bgcolor="#000000" align="middle" allowScriptAccess="always" allownetworking="all" allowfullscreen="true" type="application/x-shockwave-flash" wmode="direct" />';
}

function LoadSports365 (ID) { //Sport365
	document.getElementById('MyFrame').innerHTML = '<object id="BridgeMovie" width="100%" height="100%" type="application/x-shockwave-flash" data="http://sportstream365.com/getZone/VideoPlayerSportstream.swf?tag=1">' +
		'<param name="menu" value="true">' + 
		'<param name="wmode" value="window">' +
		'<param name="allowFullScreen" value="true">' +
		'<param name="AllowScriptAccess" value="always">' +
		'<param name="flashvars" value="ZonePlayGameId=' + ID + '&amp;scaleMode=scaleAll&amp;userID=0&amp;videoID=' + ID + '&amp;matchName=1&amp;startImmediately=true&amp;gameId=' + ID + '&amp;lng=ru&amp;sport=0&amp;ref=36">' +
		'</object>';
}

function LoadTV (Link) { //斗鱼、企鹅、虎牙
	document.getElementById('MyFrame').innerHTML = '<embed width="100%" height="100%" allownetworking="all" allowscriptaccess="always" src="' + Link + '" quality="high" bgcolor="#000" wmode="window" allowfullscreen="true" allowFullScreenInteractive="true" type="application/x-shockwave-flash">';
}

function ShareWarm (Text) {
	var P = document.createElement('p');
	P.id = 'ShareWarm';
	P.innerHTML = Text;
	document.body.appendChild(P)
}

function ckmarqueeadv(){return '免费看球用黑土体育：<a href="http://www.goodzhibo.com" target="_blank">goodzhibo.com</a> 进千人球迷群领红包 加微信<span>fs188fs</span>'}

function CloseLoading () {
	document.getElementById('MyFrame').innerHTML = '';
}


//监听相关
function loadHandler(){
	if(CKobject.getObjectById('ckplayer_a1').getType()){
        console.log('播放器已加载，调用的是HTML5播放模块');
        // CKobject.getObjectById('ckplayer_a1').addListener('play',playHandler);
        // CKobject.getObjectById('ckplayer_a1').addListener('buffer',bufferHandler);
        CKobject.getObjectById('ckplayer_a1').addListener('error',errorHandler);
    }
    else{
        console.log('播放器已加载，调用的是Flash播放模块');
        // CKobject.getObjectById('ckplayer_a1').addListener('play','playHandler');
        // CKobject.getObjectById('ckplayer_a1').addListener('buffer','bufferHandler');
        CKobject.getObjectById('ckplayer_a1').addListener('error','errorHandler');
        CKobject.getObjectById('ckplayer_a1').addListener('play','playHandler');
    }
}

function playHandler (){
    //PC时添加心跳请求
    if (!isMobileWithJS() && !WXCodeRun) {
        console.log(WXCodeRun);
        checkActive();
        WXCodeRun = setInterval(function(){//每5秒请求一次服务器查看有没有更新 活动信息
            checkActive();
        }, 1 * 60 * 1000);
    }
}

function bufferHandler (num) {
	if (num > 100 || num < 0) {
		console.log(num)
		var CID = GetQueryString('cid');
		PlayVideoShare(CID);
	}
}

function errorHandler () {
	if (maxTimeOut > 10) {
		return;
	}
	maxTimeOut++;
	console.log('error，重新请求链接');
	var CID = GetQueryString('cid');
	PlayVideoShare(CID);
}



//获取是S还是非S
function GetHttp () {
	if (location.href.indexOf('https://') != -1) {
		return 'https://';
	}else{
		return 'http://';
	}
}
function LoadClappr (Link) { //clappr
    $.getScript("https://cdn.jsdelivr.net/npm/clappr@latest/dist/clappr.min.js",function(){  //加载test.js,成功后，并执行回调函数
        $.getScript("https://cdn.jsdelivr.net/clappr.level-selector/latest/level-selector.min.js",function(){
            var data = {
                source: Link,
                replace: true,
                keyUrl: 'http://m3u8.navixstream.com/navixstream.key'
            };
            player = new Clappr.Player({
                source: data.source,
                mimeType: 'application/x-mpegURL',
                autoPlay: false,
                height: '100%',
                width: '100%',
                watermark: '/watermark.png',
                position: 'top-right',
                mediacontrol: {seekbar: '#FF0000', buttons: '#FF0000'},
                parentId: '#MyFrame'
            });
        });
    });
}

//获取播放地址
function PlayVideoShare (CID){
    var url = GetHttp() + host + '/match/live/url/channel/' + CID + '.json';
    if (window.isMobile) {
        var url = GetHttp() + host + '/match/live/url/channel/mobile/' + CID + '.json';
    }
	$.ajax({
		url: url,
		type:'GET',
		dataType:'json',
		success:function(data){
			if (data.code == 0){
				CloseLoading();
				var match = data.match;
				var show_live = match.show_live;
				if(!show_live){
					return;
				}else if(show_live){
					if (data.type == 1) { //如果是365，直接播放，不使用链接
						var ID = data.id;
						LoadSports365(ID)
					} else if (data.type == 2) {
                        var Link = getLink(data);
						if (data.playurl) {
                            LoadIframe(Link);
						} else {
                            CheckPlayerType(Link,0);
						}
					} else{ //其他，获取播放地址和播放方式
						var Link = getLink(data);
						var PlayType = data.player;
						if (PlayType == 11) { //iframe
							LoadIframe(Link)
						}else if (PlayType == 12) { //ckplayer
							CheckPlayerType(Link,1);
						}else if (PlayType == 13) { //m3u8
							LoadCK (Link)
						}else if (PlayType == 14) { //flv
							LoadFlv (Link)
						}else if (PlayType == 15) { //rtmp
							LoadRtmp (Link)
						}else if (PlayType == 17) { //clappr
                            LoadClappr (Link);
                        } else if(PlayType == 100){//腾讯体育专用
                            $.ajax({
                                url: Link,
                                dataType: "jsonp",
                                success: function (data) {
                                    if(data.playurl) {
                                        Link = data.playurl;
                                        if (isMobileWithJS()) {
                                            Link = Link.replace('.flv', '.m3u8');
                                            LoadCK(Link);
                                        }
                                        else {
                                            if (Link.indexOf('.flv') != -1) {
                                                LoadFlv(Link);
                                            }
                                            else{
                                                LoadCK(Link);
                                            }
                                        }
                                    }
                                    else{
                                        document.getElementById('MyFrame').innerHTML = '<p class="loading">暂无直播信号</p>';
                                    }
                                }
                            });
                        } else {
							CheckPlayerType(Link,0);
						}
					}
                }
            }else{
                document.getElementById('MyFrame').innerHTML = '<p class="loading">暂无直播信号</p>';
            }
		}
	})
}

//获取播放链接
function getLink (data) {
	if (data.type == 2 && data.js) {
        eval(data.js);
        return play_url;
	}else{
		return data.playurl;
	}
}

//按链接选择播放方式
function CheckPlayerType (Link,CK) {
	if (Link.indexOf('.flv') != -1) {
    	LoadFlv (Link);
	}else if (Link.indexOf('rtmp://') == 0) {
    	LoadRtmp (Link);
	}else if (Link.indexOf('.m3u8') != -1) {
		LoadCK (Link);
	}else if (Link.indexOf('player.pptv.com') != -1) {
		LoadPPTV(Link)
	}else if (Link.indexOf('staticlive.douyucdn.cn') != -1 || Link.indexOf('upstatic.qiecdn.com') != -1 || Link.indexOf('liveshare.huya.com') != -1) {
		LoadTV(Link)
	}else if (CK == 0) {
		LoadIframe(Link);
	}else{
		document.getElementById('MyFrame').innerHTML = '<p class="loading">暂无直播信号</p>';
	}
}

//判断手机还是PC
function IsPC() {
	var userAgentInfo = navigator.userAgent;
	var Agents = ["Android", "iPhone","SymbianOS", "Windows Phone","iPad", "iPod"];
	var flag = true;
	for (var v = 0; v < Agents.length; v++) {
		if (userAgentInfo.indexOf(Agents[v]) > 0) {
			flag = false;
			break;
		}
	}
	return flag;
}

//倒计时
function countDown() {
    var div = $("p.noframe");
    if (div.length > 0) {
        var is = div.find('i');
        var seconds = $("#second");
        if (seconds.length == 0) {
            return;
        }
        var second = parseInt($("#second").html());
        second = second - 1;
        if (second < 0) {
            second = 59;
            countDownMinute();
        }
        //倒计时 五分钟 内刷新页面
        var minute = parseInt($('#minute').html());
        if ($("#hour").length == 0 && (isNaN(minute) || (minute * 60 + second) <= (5 * 60)) ) {
            location.reload();
        }
        $("#second").html(second);
    }
}

function countDownMinute() {
        var minutes = $("#minute");
        var hours = $("#hour");
        if (minutes.length == 0) {
            return;
        }
        var minute = parseInt(minutes.html());
        minute = minute - 1;
        if (hours.length == 1) {
            if (minute < 0) {
                minute = 59;
                countDownHour();
            }
            minutes.html(minute);
        } else {
            if (minute < 1) {
                minutes.remove();
                var divHtml = $("#p.noframe").html();
                divHtml = divHtml.replace('分钟', '');
                $("#p.noframe").html(divHtml);
            } else {
                minutes.html(minute);
            }
        }
    }

function countDownHour() {
    var hours = $("#hour");
    if (hours.length == 0) {
        return;
    }
    var hour = parseInt($("#hour").html());
    hour--;
    if (hour == 0) {
        hours.remove();
        var divHtml = $("p.noframe").html();
        divHtml = divHtml.replace('小时', '');
        $("p.noframe").html(divHtml);
    } else {
        hours.html(hour);
    }
}

function isMobileWithJS() {
    var u = navigator.userAgent;
    var isAndroid = u.indexOf('Android') > -1; //android终端或者uc浏览器
    var isiPhone = u.indexOf('iPhone') > -1; //是否为iPhone或者QQ HD浏览器
    var isiPad = u.indexOf('iPad') > -1; //是否iPad
    return (isAndroid || isiPhone || isiPad) ? '1' : '';
}

function activeValid() {
    var code;
    if (!isMobileWithJS()) {
        code = $("#CloseADCode input[name=CloseAD]").val();
    }
    if (code && $.trim(code).length > 0) {
        valid_code = code;
        $.ajax({
            "url": "/live/valid/code?time=" + (new Date()).getTime(),
            "type": "post",
            "data": {"code": code},
            "success": function (json) {
                if (json) {
                    if (json.code == 200) {
                        $('#CloseADCode').remove();
                        CKobject.getObjectById('ckplayer_a1').textBoxClose('AttWX');
                        var param = getParam();
                        if (param.type && param.type == 9) {
                            maxTimeOut++;
                            playerLink();
                        }
                    } else {
                        alert(json.msg);
                    }
                }
            },
            "error": function () {
                alert("验证失败");
            }
        });
    } else {
        alert('请输入验证码');
    }
}

function checkActive() {
    $.ajax({
        "url": "/m/dd_image/active.json?time=" + (new Date()).getTime(),
        "success": function (json) {
            if (json && (json.txt || json.code) && (json.txt != active_text_tmp || json.code != active_code_tmp) ) {
                if (json.txt) active_text_tmp = json.txt;
                if (json.code) active_code_tmp = json.code;
                showWXCode(active_text_tmp, active_code_tmp);
            } else {
                var cookie_code = getCookie('LIVE_HD_CODE_KEY');
                if (show_ad && !firstShowCode && cookie_code != valid_code){
                    showWXCode(active_text_tmp, active_code_tmp);
                }
            }
            firstShowCode = true;
        },
        "error": function () {
            showWXCode(active_text_tmp, active_code_tmp);
        }
    });
}

//关注微信引导
function showWXCode (Text,Code) { //文字和二维码图片地址，文字可以使用\n换行，最多两行。
    if (Text == '') {
        Text = active_text;
    }
    if (Code == '') {
        Code = active_code;
    }
    CKobject.getObjectById('ckplayer_a1').textBoxClose('AttWX');
    var Status = CKobject.getObjectById('ckplayer_a1').getStatus();
    var Coor = '0,2,-120,-62';
    if (Text.split('\n').length > 1) {
        var len = Text.split('\n').length - 1;
        Coor = '0,2,-120,' + (-62 - len * 20);
    }
    var WXCode = {
        name: 'AttWX', //该文本元件的名称，主要作用是关闭时需要用到
        coor: Coor, //坐标
        text: '{font color="#FFFFFF" face="Microsoft YaHei,微软雅黑" size="12"}' + Text + '{/font}', //文字
        bgColor: '0x000000', //背景颜色
        borderColor: '0x000000', //边框颜色
        radius: 3, //圆角弧度
        alpha:0,//总体透明度
        bgAlpha: 50, //背景透明度
        xWidth: 20, //宽度修正
        xHeight: 5, //高度修正
        pic: [Code,'/img/pc/icon_close_btn_video.png','/img/pc/icon_select_arrow.png'], //附加图片地址数组，可以增加多个图片
        pwh:[[120,120],[20,20],[1,1]],//图片缩放宽高，和上面图片一一对应
        pEvent:[['',''],['javascript','CloseWXCode()'],['close','']],//图片事件数组
        pCoor:  ['0,2,-120,-120','2,0,0,-20','2,2,-30,-30'], //图片坐标数组
        pRadius: [10,0,0] //附加图片的弧度
        // tween:[['x',1,50,0.3],['alpha',1,100,0.3]]//缓动效果
    }
    CKobject.getObjectById('ckplayer_a1').textBoxShow(WXCode);
    CKobject.getObjectById('ckplayer_a1').textBoxTween('AttWX',[['x',1,130,0.4]]);
}

function CloseWXCode () {
    var cookie_code = getCookie('LIVE_HD_CODE_KEY');
    if (cookie_code != valid_code) {//判断是否也已经输入验证码，或者验证码是否正确
        CKobject.getObjectById('ckplayer_a1').quitFullScreen();
        ShowADCode();
    }else{
        CKobject.getObjectById('ckplayer_a1').textBoxClose('AttWX');
    }
}

function ShowADCode () {
    var Code = $('<div id="CloseADCode"><div class="in"><p class="title">获取关闭广告权限</p><button class="close"></button>' +
        '<div class="input"><input type="text" name="CloseAD" placeholder="请输入免广告码"><button onclick="activeValid();">获取权限</button></div>' +
        '<img src="/img/pc/WechatIMG60.jpeg"><p class="text">关注“爱看球”公众号，获取免广告码！</p></div></div>');

    Code.find('button.close').click(function(){
        $('#CloseADCode').remove();
    });

    $('body').append(Code);
}

//修改控制栏文字
function ChangeText (Text) {
    // 关注{font color='#e3f42c'}【i看球】{/font}公众号，看球领现金红包！
    CKobject.getObjectById('ckplayer_a1').changeStyle('pr_live',"{font color='#FFFFFF' face='Microsoft YaHei,微软雅黑' size='14'}" + Text + "{/font}");
}
function getCookie(c_name)
{
    if (document.cookie.length>0)
    {
        c_start=document.cookie.indexOf(c_name + "=")
        if (c_start!=-1)
        {
            c_start=c_start + c_name.length+1
            c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
            return unescape(document.cookie.substring(c_start,c_end))
        }
    }
    return ""
}













