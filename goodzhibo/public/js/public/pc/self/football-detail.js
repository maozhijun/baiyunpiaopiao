function eventHtml(type, time, prev_time, value, isHost) {
    var css = (time - prev_time == 1) ? 'margin-left: 1px' : '';
    var html = '<div class="item" style="left: ' + (time * 130 / 15) + 'px;' + css + '">' + (isHost ? time + "'" : '');
    html += '<div><img src="' + getEventImg(type) + '"><p><span>' + getEventCn(type, value) + '</span></p></div>';
    html += (!isHost ? time + "'" : '') + '</div>';
    return html;
}

function getEventCn(type, value) {
    var eventCn = "";
    switch (type) {
        case "1":
            eventCn = value + "（进球）";
            break;
        case "2":
            eventCn = value + "（红牌）";
            break;
        case "3":
            eventCn = value + "（黄牌）";
            break;
        case "7":
            eventCn = value + "（点球）";
            break;
        case "8":
            eventCn = value + "（乌龙球）";
            break;
        case "9":
            eventCn = value + "（两黄一红）";
            break;
        case "11":
            var players = value.split("^");
            if (players.length == 2) {
                eventCn = players[0] + "（换上）" + players[1] + "（换下）";
            }
            break;
    }
    return eventCn;
}

function getEventKindCss(type) {
    var kindCss = "";
    switch (type) {
        case "1":
        case "7":
        case "8":
            kindCss = "goal";
            break;
        case "2":
        case "9":
            kindCss = "red";
            break;
        case "3":
            kindCss = "yellow";
            break;
        case "11":
            kindCss = "exchange";
            break;
    }
    return kindCss;
}

function getEventImg(type) {
    var img = "";
    switch (type) {
        case "1":
        case "7":
        case "8":
            img = "/img/pc/image_goal.png";
            break;
        case "2":
        case "9":
            img = "/img/pc/image_red.png";
            break;
        case "3":
            img = "/img/pc/image_yellow.png";
            break;
        case "11":
            img = "/img/pc/image_exchange.png";
            break;
    }
    return img;
}

function eventConvert(json) {
    var lastTime = parseInt($(".timeline").attr("lastTime"));
    var events = json.event;
    var h_temp_time = 0;
    var a_temp_time = 0;
    $.each(events, function (index, eventStr) {
        var event_data = eventStr.split(",");
        var isHost = event_data[0];//是否主队
        var type = event_data[1];//类型
        var time = parseInt(event_data[2]);//事件时间
        if (time > lastTime) {
            if (isHost == "1") {//主队
                var hEventHtml = eventHtml(type, time, h_temp_time, event_data[3], true);
                if (time - h_temp_time == 0) {
                    $(".host_event .item:last div:last").after(hEventHtml);
                } else {
                    $(".host_event").append(hEventHtml);
                }
                h_temp_time = time;
            } else {//客队
                var aEventHtml = eventHtml(type, time, a_temp_time, event_data[3], false);
                if (time - a_temp_time == 0) {
                    $(".away_event .item:last div:last").after(aEventHtml);
                } else {
                    $(".away_event").append(aEventHtml);
                }
                a_temp_time = time;
            }
        }
        if (index == events.length - 1) {
            $(".timeline").attr("lastTime", time);
        }
    });
}

function hasLiveNew(id) {
    //直播刷新
    var url = getCdnUrl('/football/has_live/' + id + '.json') + '?time=' + (new Date()).getTime();
    $.ajax({
        "url": url,
        "dataType": "json",
        "success": function (json) {
            var no_live = true;
            if (json['pc_live'] && json['pc_live'] == 1) {
                no_live = false;
            }
            if ($('div.video').length > 0) {
                $('div.video')[0].style.display = no_live ? 'none' : '';
            }
            if ($('div.analysis').length > 0) {
                $('div.analysis')[0].style.display = no_live ? '' : 'none';
            }
            if ($('#Info div.sameOdd').length > 0) {
                if (no_live) {
                    $('#Info div.sameOdd').show();
                } else {
                    $('#Info div.sameOdd').hide();
                }
            }
        },
        "error": function () {

        }
    });
}