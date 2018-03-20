function matchFilter(type) {
    var button = $('div.control button#'+type)[0];
    changeButton(button);

    delCookie('basket_filter');
    delCookie('basket_filter_league');
    delCookie('basket_filter_hide');
    delCookie('basket_filter_show');
    setCookie('basket_filter',type);

    var matches = $('#MatchList table');
    for (var j = 0; j < matches.length; j++) {
        if (type == "all") {
            matches[j].className = 'show';
        } else {
            var trAttr = matches[j].getAttribute(type);
            if (trAttr == type) {
                matches[j].className = 'show';
            } else {
                matches[j].className = 'hide';
            }
        }
    }
    var hideMatchCount = $('#MatchList table.hide').length;
    var totalMatchCount = $('#MatchList table.show').length;
    $('#hideMatchCount').html(hideMatchCount);
    $('#totalMatchCount').html(totalMatchCount);
}

function confirmFilter(type, isReverse) {
    var inputs;
    if (type == 'match') {
        inputs = $("thead tr th button[name=choose].on");
    } else if (type == 'league'){
        inputs = $("#LeagueFilter").find('ul li button.on');
    }
    if (inputs == null || inputs.length == 0) return;

    var valueStrs = '';
    var hideIds = getCookie('filter_hide');
    var showIds = getCookie('filter_show');
    //记录保留 删除
    if ('match' == type){
        //删除
        if (isReverse){
            hideIds = '';
        }
        else{
            showIds = '';
        }
    }
    for (var i = 0; i < inputs.length; i++) {
        valueStrs += type + "_" + inputs[i].getAttribute('value') + ",";
        //记录保留 删除
        if ('match' == type){
            //删除
            if (isReverse){
                hideIds += type + "_" + inputs[i].getAttribute('value') + ",";
            }
            else{
                showIds += type + "_" + inputs[i].getAttribute('value') + ",";
            }
        }
    }
    //记录保留 删除
    if ('match' == type){
        //删除
        if (isReverse){
            setCookie('basket_filter_hide',hideIds);
        }
        else{
            setCookie('basket_filter_show',showIds);
        }
    }
    var matches;
    if (type != 'match' && valueStrs == '') {
        //重置
        matches = $('#MatchList table');
        for (var j = 0; j < matches.length; j++) {
            matches[j].className = 'show';
        }
    }
    setCookie('basket_filter_' + type,valueStrs);
    matches = $('#MatchList table');
    var hideMatchCount = 0;
    for (var j = 0; j < matches.length; j++) {
        var trAttr = '';

        trAttr = type + "_" + matches[j].getAttribute(type) + ',';
        if (valueStrs.indexOf(trAttr) == -1) {
            hideMatchCount = matchItemShow(matches[j], isReverse, hideMatchCount);
        } else {
            hideMatchCount = matchItemShow(matches[j], !isReverse, hideMatchCount);
        }
    }
    if (isReverse) {//删除后将 选中取消。
        inputs.each(function (index, obj) {
            $(obj).removeClass('on');
        });
    }
    hideMatchCount = $('#MatchList table.hide').length;
    var totalMatchCount = $('#MatchList table.show').length;
    $('#hideMatchCount').html(hideMatchCount);
    $('#totalMatchCount').html(totalMatchCount);
    //CloseFilter();
    if (type == 'league') {
        $("#LeagueFilter button.close").trigger('click');
    }
}

function matchItemShow(matchItem, isShow, hideMatchCount) {
    if (isShow) {
        matchItem.className = 'show';
    } else {
        matchItem.className = 'hide';
        hideMatchCount++;
    }
    return hideMatchCount;
}

function changeButton(Obj) {
    var name = Obj.getAttribute('name');
    $('button[name='+name+']').each(function () {
        if (this == Obj) {
            if (this.className.indexOf('on') == -1) {
                if (this.className.length > 0) {
                    this.className += " on";
                } else {
                    this.className = "on";
                }
            }
        } else {
            var className = this.className.replace('on', '');
            className = className.replace(' ', '');
            if (className.length > 0) {
                this.className = className;
            } else {
                this.className = "";
            }
        }
    });
}



function refresh() {
    function addOtItem(LastObj, Obj, NewObj, Text) {
        if (Obj && Obj.length > 0) {
            Obj[0].innerHTML = Text;
        } else {
            if (LastObj && NewObj) {
                NewObj.innerHTML = Text;
                LastObj.parentNode.insertBefore(NewObj, LastObj); // 在这个元素后面增加上去
            }
        }
    }
    var reUrl = getCdnUrl("/basketball/change/live.json");
    $.ajax({
        "url": reUrl + "?time=" + (new Date().getTime()),
        "dataType": "json",
        "success": function (json) {
            var ups = $('span.up');
            for (var i = 0 ; i < ups.length; i++){
                var up = ups[i];
                up.setAttribute('class','');
            }
            var downs = $('span.down');
            for (var i = 0 ; i < downs.length; i++){
                var down = downs[i]
                down.setAttribute('class','');
            }

            for (var ID in json) {
                var dataItem = json[ID];
                var status = parseInt(dataItem.status);
                var timeItem = $('#time_' + ID);
                if (timeItem) {
                    if (status > 0) {
                        timeItem.html('<span class="blue">' + dataItem.time + '</span>');

                        if ($('#h_full_' + ID + ' b span p').length > 0) {
                            var oldScore = $('#h_full_' + ID + ' b span p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                        }
                        if (oldScore == dataItem.hscore)
                            $('#h_full_' + ID).html('<b><span class="blue"><p>' + dataItem.hscore + '</p></span></b>');
                        else{
                            $('#h_full_' + ID).html('<b><span class="blue"><p>' + dataItem.hscore + '</p></span></b>');
                            var p = $('#h_full_' + ID + ' b span p')[0];
                            GoalTR(p);
                        }

                        if ($('#a_full_' + ID + ' b span p').length > 0) {
                            var oldScore = $('#a_full_' + ID + ' b span p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                        }
                        if (oldScore == dataItem.ascore)
                            $('#a_full_' + ID).html('<b><span class="blue"><p>' + dataItem.ascore + '</p></span></b>');
                        else{
                            $('#a_full_' + ID).html('<b><span class="blue"><p>' + dataItem.ascore + '</p></span></b>');
                            var p = $('#a_full_' + ID + ' b span p')[0];
                            GoalTR(p);
                        }
                    } else {
                        timeItem.html(dataItem.time);
                        $('#h_full_' + ID).html('<b><p>' + dataItem.hscore + '</p></b>');
                        $('#a_full_' + ID).html('<b><p>' + dataItem.ascore + '</p></b>');
                    }
                }
                var hscores = dataItem.hscores;
                $.each(hscores, function (key, value) {
                    var score = $('#h_score' + (key + 1) + '_' + ID);
                    if (score && score.length > 0) {
                        if ($('#h_score' + (key + 1) + '_' + ID + ' p').length > 0) {
                            var oldScore = $('#h_score' + (key + 1) + '_' + ID + ' p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                        }
                        if (oldScore == value)
                            score.html('<p>'+value+'</p>');
                        else{
                            score.html('<p>'+value+'</p>');
                            var p = $('#h_score' + (key + 1) + '_' + ID + ' p')[0];
                            GoalTR(p);
                        }
                    }
                });
                var ascores = dataItem.ascores;
                $.each(ascores, function (key, value) {
                    var score = $('#a_score' + (key + 1) + '_' + ID);
                    if (score && score.length > 0) {
                        if ($('#a_score' + (key + 1) + '_' + ID + ' p').length > 0) {
                            var oldScore = $('#a_score' + (key + 1) + '_' + ID + ' p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                        }
                        if (oldScore == value)
                            score.html('<p>'+value+'</p>');
                        else{
                            score.html('<p>'+value+'</p>');
                            var p = $('#a_score' + (key + 1) + '_' + ID + ' p')[0];
                            GoalTR(p);
                        }
                    }
                });

                $('#h_half_' + ID).html(dataItem.h_half);
                $('#a_half_' + ID).html(dataItem.a_half);
                $('#half_diff_' + ID).html(dataItem.half_diff);
                $('#full_diff_' + ID).html(dataItem.full_diff);
                $('#half_total_' + ID).html(dataItem.half_total);
                $('#full_total_' + ID).html(dataItem.full_total);

                var h_ots = dataItem.h_ots;
                if (h_ots && h_ots.length > 0) {
                    $.each(h_ots, function (key, value) {
                        var index = key + 1;
                        var thObj = document.createElement('th');
                        thObj.className = 'period';
                        thObj.setAttribute('name', 'ot_'+index);
                        addOtItem($('#half_'+ ID)[0], $('#m_table_'+ ID +' .period[name=ot_'+index+']'), thObj, index+"'OT");

                        var tdObj = document.createElement('td');
                        tdObj.setAttribute('id', 'h_ot'+ index + '_' + ID);

                        var score = $('#h_ot'+ index + '_' + ID);

                        if ($('#h_ot'+ index + '_' + ID + ' p').length > 0) {
                            var oldScore = $('#h_ot'+ index + '_' + ID + ' p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                            addOtItem($('#h_half_'+ ID)[0], score, tdObj, "<p>"+value+"</p>");
                        }

                        if (oldScore == value)
                            score.html('<p>'+value+'</p>');
                        else{
                            score.html('<p>'+value+'</p>');
                            var p = $('#h_ot'+ index + '_' + ID + ' p')[0];
                            GoalTR(p);
                        }
                    });
                }
                var a_ots = dataItem.a_ots;
                if (a_ots && a_ots.length > 0) {
                    $.each(a_ots, function (key, value) {
                        var index = key + 1;
                        var tdObj = document.createElement('td');
                        tdObj.setAttribute('id', 'a_ot'+ index + '_' + ID);

                        var score = $('#a_ot'+ index + '_' + ID);

                        if ($('#a_ot'+ index + '_' + ID + ' p').length > 0) {
                            var oldScore = $('#a_ot'+ index + '_' + ID + ' p')[0].innerHTML;
                        } else {
                            var oldScore = 0;
                            addOtItem($('#a_half_'+ ID)[0], score, tdObj, "<p>"+value+"</p>");
                        }

                        if (oldScore == value)
                            score.html('<p>'+value+'</p>');
                        else{
                            score.html('<p>'+value+'</p>');
                            var p = $('#a_ot'+ index + '_' + ID + ' p')[0];
                            GoalTR(p);
                        }
                    });
                }

                var liveItem = $('#live_' + ID);
                if (liveItem && liveItem.length > 0){
                    if(liveItem[0].src == "/img/pc/icon_home_live.png") {
                        liveItem[0].src = "/img/pc/icon_home_video_live.gif";
                    }
                    if (status == -1){
                        liveItem[0].src = "/img/pc/icon_home_live.png";
                    }
                }
            }
        },
        "error": function () {

        }
    });
}

function GoalTR (obj) { //进球效果，哪队进球对应TD触发此事件
    obj.className = 'red';
    setTimeout(
        function () {
            obj.className = '';
        },5000);
}

function refreshRoll() {
    var rollUrl = getCdnUrl("/basketball/odd/roll.json") + "?rd=" + (new Date()).getTime();
    $.ajax({
        "url": rollUrl,
        "dataType": "json",
        "success": function (json) {
            for (var ID in json) {
                var dataItem = json[ID];
                var asia = dataItem['all']['1'];
                var goal = dataItem['all']['2'];
                var asiaP = $('#m_table_' + ID + ' td.asia')[0];
                var goalP = $('#m_table_' + ID + ' td.goal')[0];
                var timeItem = $('#time_' + ID)[0];
                if (timeItem && (timeItem.innerHTML == '' || timeItem.innerHTML == '已结束' || timeItem.innerHTML == '推迟')){

                }
                else {
                    if (asia) {
                        changeSpanOddNew(ID, asia, true);
                    }
                    if (goal) {
                        changeSpanOddNew(ID, goal, false);
                    }
                }
            }
        },
        "error": function () {

        }
    });
}

function changeSpanOddNew(id, odd, isAsia) {
    var up = odd['up'];
    var middle = odd['middle'];
    var down = odd['down'];

    var cName = isAsia ? 'asia' : 'goal';
    var ht = $('#m_table_' + id + ' tr:eq(1) td.' + cName);
    var at = $('#m_table_' + id + ' tr:eq(2) td.' + cName);
    if (ht.length > 0) {
        var hostHtml = '', tmpMiddle, tmpUp;
        if (ht.find('span').length > 0) {
            tmpMiddle = parseFloat(ht.find('span').attr('data'));
        }
        if (ht.find('p').length > 0) {
            tmpUp = parseFloat(ht.find('p').attr('data'));
        }

        if (isAsia) {
            if (middle && middle >= 0) {
                if (/\d+(.\d+)?/.test(tmpMiddle)) {
                    if (middle > tmpMiddle) {
                        hostHtml += '<span data="' + middle + '">' + middle + '↑</span>';
                    } else if (middle == tmpMiddle) {
                        hostHtml += '<span data="' + middle + '">' + middle + '</span>';
                    } else {
                        hostHtml += '<span data="' + middle + '">' + middle + '↓</span>';
                    }
                } else {
                    hostHtml += '<span data="' + middle + '">' + middle + '</span>';
                }
            }
            if (up) {
                if (/\d+(.\d+)?/.test(tmpUp)) {
                    if (up > tmpUp) {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '↑</p>';
                    } else if (up == tmpUp) {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '</p>';
                    } else {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '↓</p>';
                    }
                } else {
                    hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '</p>';
                }
            }
        } else {
            if (middle && middle >= 0) {
                if (/\d+(.\d+)?/.test(tmpMiddle)) {
                    if (middle > tmpMiddle) {
                        hostHtml += '<span data="' + middle + '">大 ' + middle + '↑</span>';
                    } else if (middle == tmpMiddle) {
                        hostHtml += '<span data="' + middle + '">大 ' + middle + '</span>';
                    } else {
                        hostHtml += '<span data="' + middle + '">大 ' + middle + '↓</span>';
                    }
                } else {
                    hostHtml += '<span data="' + middle + '">大 ' + middle + '</span>';
                }
            }
            if (up) {
                if (/\d+(.\d+)?/.test(tmpUp)) {
                    if (up > tmpUp) {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '↑</p>';
                    } else if (up == tmpUp) {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '</p>';
                    } else {
                        hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '↓</p>';
                    }
                } else {
                    hostHtml += '<p style="margin: 0;" data="' + up + '">' + up + '</p>';
                }
            }
        }
        ht.html(hostHtml);
    }

    if (at.length > 0) {
        var awayHtml = '', tmpMiddle, tmpDown;
        if (at.find('span').length > 0) {
            tmpMiddle = parseFloat(at.find('span').attr('data'));
        }
        if (at.find('p').length > 0) {
            tmpDown = parseFloat(at.find('p').attr('data'));
        }
        if (isAsia) {
            if (middle && middle < 0) {
                if (/\d+(.\d+)?/.test(tmpMiddle)) {
                    if (middle > tmpMiddle) {
                        awayHtml += '<span data="' + middle + '">' + (-1 * middle) + '↓</span>';
                    } else if (middle == tmpMiddle) {
                        awayHtml += '<span data="' + middle + '">' + (-1 * middle) + '</span>';
                    } else {
                        awayHtml += '<span data="' + middle + '">' + (-1 * middle) + '↑</span>';
                    }
                } else {
                    awayHtml += '<span data="' + middle + '">' + (-1 * middle) + '</span>';
                }
            }
            if (down) {
                if (/\d+(.\d+)?/.test(tmpDown)) {
                    if (down > tmpDown) {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '↑</p>';
                    } else if (up == tmpUp) {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '</p>';
                    } else {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '↓</p>';
                    }
                } else {
                    awayHtml += '<p data="' + down + '">' + down + '</p>';
                }
            }
        } else {
            if (middle && middle >= 0) {
                if (/\d+(.\d+)?/.test(tmpMiddle)) {
                    if (middle > tmpMiddle) {
                        awayHtml += '<span data="' + middle + '">小 ' + middle + '↑</span>';
                    } else if (middle == tmpMiddle) {
                        awayHtml += '<span data="' + middle + '">小 ' + middle + '</span>';
                    } else {
                        awayHtml += '<span data="' + middle + '">小 ' + middle + '↓</span>';
                    }
                } else {
                    awayHtml += '<span data="' + middle + '">小 ' + middle + '</span>';
                }
            }
            if (down) {
                if (/\d+(.\d+)?/.test(tmpDown)) {
                    if (down > tmpDown) {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '↑</p>';
                    } else if (down == tmpDown) {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '</p>';
                    } else {
                        awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '↓</p>';
                    }
                } else {
                    awayHtml += '<p style="margin: 0;" data="' + down + '">' + down + '</p>';
                }
            }
        }
        at.html(awayHtml);
    }
}