
//获取链点参数
function GetQueryString(str,href) {
    var Href;
    if (href != undefined && href != '') {
        Href = href;
    }else{
        Href = location.href;
    };
    var rs = new RegExp("([\?&])(" + str + ")=([^&#]*)(&|$|#)", "gi").exec(Href);
    if (rs) {
        return decodeURI(rs[3]);
    } else {
        return '';
    }
}

//状态遮罩层
function Alert (type,text) { //type:loading\success\error，text为提示内容
    var AlertBox;
    if (document.getElementById('Alert') == undefined) {
        AlertBox = document.createElement('div');
        AlertBox.id = 'Alert';
        AlertBox.setAttribute('status','loading');
        AlertBox.innerHTML = '<div class="loading">-</div><div class="success">-</div><div class="error">-</div>';
        document.body.appendChild(AlertBox);
    }else{
        AlertBox = document.getElementById('Alert');
    };
    AlertBox.setAttribute('status',type);
    AlertBox.getElementsByClassName(type)[0].innerHTML = text;
    if (type != 'loading') {
        // setTimeout('document.body.removeChild(document.getElementById("Alert"))',1500);
    };
}

//判断是否IE8或以下
function IECheck () {
    var userA = navigator.userAgent
    var browser=navigator.appName 
    var b_version=navigator.appVersion 
    var version=b_version.split(";"); 
    var trim_Version=version[1].replace(/[ ]/g,""); 
    if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE6.0"){ 
        return 6;
    }else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE7.0") { 
        return 7;
    }else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE8.0") { 
        return 8;
    }else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE9.0") { 
        return 9;
    }else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE10.0") { 
        return 10;
    }else if(browser=="Microsoft Internet Explorer" && trim_Version=="MSIE11.0") { 
        return 11;
    }else if(userA.indexOf('Edge') != -1){ //edge
        return 'edge';
    }else{ //兼容模式，默认状态
        if (userA.indexOf('Windows NT') != -1 && userA.indexOf('WebKit') == -1) {
            return parseInt(userA.split('Windows NT')[1].split(';')[0])
        }else{
            return false;
        }
    } 
}

function closeLoading () {
    document.body.removeChild(document.getElementById('Alert'));
}

//弹框公用
function ClosePop () {
    $('.pop').css('display','none');
}

