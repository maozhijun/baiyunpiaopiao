//读取cookies
function getCookie(name)
{
    var arr,reg=new RegExp("(^| )"+name+"=([^;]*)(;|$)");

    if(arr=document.cookie.match(reg))

        return unescape(arr[2]);
    else
        return null;
}
//删除cookies
function delCookie(name)
{
    var exp = new Date();
    exp.setTime(exp.getTime() - 1);
    var cval=getCookie(name);
    if(cval!=null)
        document.cookie= name + "="+cval+";expires="+exp.toGMTString();
}
function setCookie(name,value)
{
    var exp = new Date();
    exp.setTime(exp.getTime() + 2*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString();
}
//最终用盘口版本
function getHandicapCn(handicap, defaultString, type, sport, isHome)
{
    // console.log(handicap);
    handicap = parseFloat(handicap);
    if (sport == 1) {
        if (type == 1) {
            return panKouText(handicap, !isHome);
        } else if (type == 2) {//大小球
            if (handicap * 100 % 100 == 0) {
                return handicap.toFixed(0);
            }
            handicap = handicap.toFixed(2);
            handicap = parseFloat(handicap);
            if (handicap * 100 % 50 == 0) {//尾数为0.5的直接返回
                return handicap;
            }
            var tempHandicap = handicap.toFixed(0);//四舍五入
            var intHandicap = parseInt(handicap);//取整
            if (tempHandicap == intHandicap) {//比较 四舍五入 与 取整大小，尾数为 0.25 则为相同
                return intHandicap + '/' + intHandicap + '.5';
            } else {//否则尾数为0.75
                return intHandicap + '.5/' + (intHandicap + 1);
            }
        } else if (type == 3) {//竞彩
            if (handicap > 0) {
                return "+" + handicap;
            } else if (handicap == 0) {
                return "不让球";
            } else {
                return handicap;
            }
        }
    } else if (sport == 2) {
        if (type == 1) {
            //篮球
            return BasketpanKouText(handicap, !isHome);
        } else if (type == 2) {//大小球
            return ((handicap * 100 % 100 == 0) ? handicap.toFixed(0) : handicap.toFixed(2));
        } else if (type == 3) {//竞彩
            if (handicap > 0) {
                return "+" + handicap;
            } else if (handicap == 0) {
                return "不让分";
            } else {
                return handicap;
            }
        } else if (type == 4) {
            return ((handicap * 100 % 100 == 0) ? handicap.toFixed(0) : handicap.toFixed(2));
        }
    }
    return defaultString;
}
/**
 * 盘口中文转换
 * @param middle 盘口
 * @param isAway 是否客队
 * @returns {*}
 */
function panKouText (middle, isAway) {
    if (isAway){
        var prefix = middle < 0 ? "让" : "受让";
    }else{
        var prefix = middle < 0 ? "受让" : "让";
    }

    if (middle == 0)
        prefix = '';

    var text = '';
    middle = Math.abs(middle);
    switch (middle) {
        case 7: text = "七球"; break;
        case 6.75: text = "六半/七球"; break;
        case 6.5: text = "六球半"; break;
        case 6.25: text = "六球/六半"; break;
        case 6: text = "六球"; break;
        case 5.75: text = "五半/六球"; break;
        case 5.5: text = "五球半"; break;
        case 5.25: text = "五球/五半"; break;
        case 5: text = "五球"; break;
        case 4.75: text = "四半/五球"; break;
        case 4.5: text = "四球半"; break;
        case 4.25: text = "四球/四半"; break;
        case 4: text = "四球"; break;
        case 3.75: text = "三半/四球"; break;
        case 3.5: text = "三球半"; break;
        case 3.25: text = "三球/三半"; break;
        case 3: text = "三球"; break;
        case 2.75: text = "两半/三球"; break;
        case 2.5: text = "两球半"; break;
        case 2.25: text = "两球/两半"; break;
        case 2: text = "两球"; break;
        case 1.75: text = "球半/两球"; break;
        case 1.5: text = "球半"; break;
        case 1.25: text = "一球/球半"; break;
        case 1: text = "一球"; break;
        case 0.75: text = "半/一"; break;
        case 0.5: text = "半球"; break;
        case 0.25: text = "平手/半球"; break;
        case 0: text = "平手"; break;
    }
    if (text.length > 0) {
        return prefix + text;
    }
    return text;
}