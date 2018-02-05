function matchFilter(type) {
    var button = $('#MatchList div.control button#'+type)[0];
    changeButton(button);

    delCookie('filter');
    delCookie('filter_odd');
    delCookie('filter_league');
    delCookie('filter_hide');
    delCookie('filter_show');
    setCookie('filter',type);

    var matches = $('.contentTable')[0].getElementsByTagName('tr');
    for (var j = 2; j < matches.length; j++) {
        if (matches[j].className == "bannerAD") continue;
        if (type == "all") {
            matches[j].className = 'show';
            //matches[j].style.display = '';
        } else {
            var trAttr = matches[j].getAttribute(type);
            if (trAttr == type) {
                matches[j].className = 'show';
                //matches[j].style.display = '';
            } else {
                matches[j].className = 'hide';
                //matches[j].style.display = 'none';
            }
        }
    }
    var hideMatchCount = $('.contentTable tr.hide').length;
    var totalMatchCount = $('.contentTable tr.show').length;
    $('#hideMatchCount').html(hideMatchCount);
    $('#totalMatchCount').html(totalMatchCount);
    setBG();
}

function confirmFilter(type, isReverse) {
    var inputs;
    if (type == 'match') {
        inputs = $("tr td button[name=choose].on");
    } else if (type == 'league'){
        inputs = $("#LeagueFilter").find('ul li button.on');
    } else if (type == 'odd'){
        inputs = $("#OddFilter").find('div.oddlist div.show button.on');
    }
    //console.log(inputs);
    if (inputs == null) return;

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
            setCookie('filter_hide',hideIds);
        }
        else{
            setCookie('filter_show',showIds);
        }
    }
    var matches;
    if (type != 'match' && valueStrs == '') {
        //重置
        matches = $('.contentTable')[0].getElementsByTagName('tr');
        for (var j = 2; j < matches.length; j++) {
            matches[j].className = 'show';
        }
    }
    setCookie('filter_' + type,valueStrs);
    matches = $('.contentTable tr');
    var hideMatchCount = 0;
    for (var j = 0; j < matches.length; j++) {
        var trAttr = '';
        if (type == "odd") {
            trAttr = type + "_" + matches[j].getAttribute('asiaOdd');
            var tempAttr = type + "_" + matches[j].getAttribute('ouOdd');

            if (valueStrs.indexOf('odd_asia') != -1 && valueStrs.indexOf('odd_ou') != -1){
                //大小球 亚盘 交集
                if (valueStrs.indexOf(trAttr) != -1 && valueStrs.indexOf(tempAttr) != -1) {
                    hideMatchCount = matchItemShow(matches[j], !isReverse, hideMatchCount);
                } else {
                    hideMatchCount = matchItemShow(matches[j], isReverse, hideMatchCount);
                }
            }
            else{
                //独立
                if (valueStrs.indexOf(trAttr) != -1 || valueStrs.indexOf(tempAttr) != -1) {
                    hideMatchCount = matchItemShow(matches[j], !isReverse, hideMatchCount);
                } else {
                    hideMatchCount = matchItemShow(matches[j], isReverse, hideMatchCount);
                }
            }
        } else {
            trAttr = type + "_" + matches[j].getAttribute(type) + ',';
            if (valueStrs.indexOf(trAttr) == -1) {
                hideMatchCount = matchItemShow(matches[j], isReverse, hideMatchCount);
            } else {
                hideMatchCount = matchItemShow(matches[j], !isReverse, hideMatchCount);
            }
        }
    }
    hideMatchCount = $('.contentTable tr.hide').length;
    var totalMatchCount = $('.contentTable tr.show').length;
    $('#hideMatchCount').html(hideMatchCount);
    $('#totalMatchCount').html(totalMatchCount);
    //CloseFilter();
    if (type == 'league' || type == 'odd') {
        $('#LeagueFilter button.close').trigger('click');
    }
    setBG();
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
    var btns = $('button[name='+name+']');

    btns.each(function () {
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

function setMatchCount() {
    var total = $("table.contentTable tbody tr");
    var hideTr = $("table.contentTable tbody tr.hide");
    $("#totalMatchCount").html(total.length - hideTr.length);
    $("#hideMatchCount").html(hideTr.length);
}

function leagueFilter(leagueClass) {
    var tabButtons = $("#LeagueFilter").find('.tab');
    var selectTab;
    switch (leagueClass) {
        case 'first':
            selectTab = 0;
            break;
        case 'five':
            selectTab = 1;
            break;
        default:
            selectTab = 2;
            break;
    }
    for (var i = 0; i < tabButtons.length; i++) {
        if (i == selectTab) {
            tabButtons[i].className = 'tab on';
        } else {
            tabButtons[i].className = 'tab';
        }
    }

    var itemButtons = $("#LeagueFilter").find('.item');
    for (var i = 0; i < itemButtons.length; i++) {
        if (leagueClass == 'all') {
            itemButtons[i].className = 'item on';
        } else {
            var leagueAttr = itemButtons[i].getAttribute('league');
            if (leagueAttr.indexOf(leagueClass) == -1) {
                itemButtons[i].className = 'item';
            } else {
                itemButtons[i].className = 'item on';
            }
        }
    }
}

function refresh() {
    $.ajax({
        "url": "/football/change/live.json?time=" + (new Date().getTime()),
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
                var timeItem = $('#time_' + ID);
                var scoreItem = $('#score_' + ID);
                var halfScoreItem = $('#half_score_' + ID);
                var chScoreItem = $('#ch_score_' + ID);
                var liveItem = $('#live_' + ID);
                if (timeItem) {
                    timeItem.html(dataItem.time);
                }
                if (scoreItem) {
                    var lastScore = scoreItem.html();
                    var currentScore = dataItem.score;
                    convertGoal(ID, dataItem, lastScore, currentScore);
                    scoreItem.html(currentScore);
                }
                if (chScoreItem) {
                    chScoreItem.html(dataItem.ch_score);
                }
                if (halfScoreItem) {
                    halfScoreItem.html(dataItem.half_score);
                }
                if (liveItem && liveItem.length > 0){
                    if(liveItem[0].src == "/img/icon_home_live.png") {
                        liveItem[0].src = "/img/icon_home_video_live.gif";
                    }
                    if (timeItem == '已结束'){
                        liveItem[0].src = "/img/icon_home_live.png";
                    }
                }
            }
        },
        "error": function () {}
    });
}

function convertGoal(ID, dataItem, lastScore, currentScore) {
    var mTr = document.getElementById('m_tr_' + ID);
    if (mTr == null){
        return;
    }
    var time_format = mTr.getAttribute('date');
    var isShow = mTr.className.indexOf('hide') == -1;
    var cScores = currentScore.split(' - ');
    var isGoal = false, isHome = false;
    if (dataItem.time == '已结束') {
        var tbody = $('.contentTable')[0].getElementsByTagName('tbody')[0];
        var matchTr = document.getElementById('m_tr_' + ID);
        tbody.appendChild(matchTr);
        var liveItem = $('#live_' + ID);
        if (liveItem && liveItem.length > 0){
            liveItem[0].src = "/img/pc/icon_home_live.png";
        }
        var timeItem = $('#time_' + ID);
        timeItem[0].setAttribute('class','');
    } else if (isShow && cScores.length == 2) {
        var tScores = lastScore.split(' - ');
        if (tScores.length == 2) {
            if (parseInt(cScores[0]) > parseInt(tScores[0])) {
                isGoal = true; isHome = true;
            } else if (parseInt(cScores[1]) > parseInt(tScores[1])) {
                isGoal = true; isHome = false;
            }
        } else {
            if (parseInt(cScores[0]) > 0) {
                isGoal = true; isHome = true;
            } else if (parseInt(cScores[1]) > 0) {
                isGoal = true; isHome = false;
            }
        }
    }
    if (isGoal) {
        var goalAlertTBody = document.getElementById('Goal').getElementsByTagName('tbody')[0];
        var time = dataItem.time;
        var hname = dataItem.hname;
        var aname = dataItem.aname;
        var lname = dataItem.lname;
        var trItemHtml = '';
        if(isHome) {
            GoalTR(document.getElementById('h_team_' + ID));
            trItemHtml = "<tr id='goal_'" + "ID><td>"+lname+"</td><td>"+time+'</td><td class="goal">'+hname+'</td><td><b class="goal">'+cScores[0]+"</b> - <b>"+cScores[1]+"</b></td><td>"+aname+"</td></tr>";
        } else {
            GoalTR(document.getElementById('a_team_' + ID));
            trItemHtml = "<tr id='goal_'" + "ID><td>"+lname+"</td><td>"+time+'</td><td>'+hname+'</td><td><b>'+cScores[0]+'</b> - <b class="goal">'+cScores[1]+'</b></td><td class="goal">'+aname+"</td></tr>";
        }
        goalAlertTBody.innerHTML = trItemHtml;
        refreshMatchEvent(ID, time_format);
        Goal();
    }
}

function refreshMatchEvent(ID, date) {
    var url = "/football/event/" + date + "/" + ID + ".json";
    $.ajax({
        "url": url,
        "data": "",
        "dataType": "html",
        "success": function (html) {
            var event = $("#event_" + ID);
            if (event.length > 0) {
                event.find('ul').html(html);
            }
        },
        "error": function () {}
    });
}

var ct;
function loadEvent(mid, date) {
    var url = "/football/event/" + date + "/" + mid + ".json";
    $.ajax({
        "url": url,
        "data": {},
        "dataType": "html",
        "success": function (html) {
            $('#event_' + mid).find('ul').html(html);
            window.clearInterval(ct);
        },
        "error": function () {
            window.clearInterval(ct);
        }
    });
}

function refreshRoll() {
    $.ajax({
        "url": "/football/odd/roll.json",
        "dataType": "json",
        "success": function (json) {
            for (var ID in json) {
                var dataItem = json[ID];
                var asia = dataItem['all']['1'];
                var goal = dataItem['all']['2'];
                var asiaP = $('tr#m_tr_' + ID + ' p.asia')[0];
                var goalP = $('tr#m_tr_' + ID + ' p.goal')[0];
                var timeItem = $('#time_' + ID)[0];
                if (timeItem && (timeItem.innerHTML == '' || timeItem.innerHTML == '已结束' || timeItem.innerHTML == '推迟')){

                }
                else {
                    if (asia) {
                        var value = asia['up'];
                        var span = $(asiaP).find('span')[0];
                        changeSpanOdd(span, value,true,false);
                        var value = asia['middle'];
                        var span = $(asiaP).find('span')[1];
                        changeSpanOdd(span, value,true,true);
                        var value = asia['down'];
                        var span = $(asiaP).find('span')[2];
                        changeSpanOdd(span, value,true,false);
                    }
                    if (goal) {
                        var value = goal['up'];
                        var span = $(goalP).find('span')[0];
                        changeSpanOdd(span, value,false,false);
                        var value = goal['middle'];
                        var span = $(goalP).find('span')[1];
                        changeSpanOdd(span, value,false,true);
                        var value = goal['down'];
                        var span = $(goalP).find('span')[2];
                        changeSpanOdd(span, value,false,false);
                    }
                }
            }
        },
        "error": function () {

        }
    });
}

function changeSpanOdd(span,odd,isAsia,isMiddle) {
    if (span == null)
        return;
    if (odd) {
        var isUp = false;
        var isDown = false;
        if (odd > span.getAttribute('value')) {
            span.setAttribute('class', 'up');
            isUp = true;
        }
        else if (odd < span.getAttribute('value')) {
            span.setAttribute('class', 'down');
            isDown = true;
        }
        else{
            span.setAttribute('class', '');
        }
        var text = odd;
        if (isMiddle) {
            //亚盘
            if (isAsia) {
                text = getHandicapCn(odd, '',1,1,true);
            }
            //大小球
            else {
                text = getHandicapCn(odd, '',2,1,true)+'球';
            }
        }
        else{
            if (isUp){
                text = text + ' ↑';
            }
            else if(isDown){
                text = text + ' ↓';
            }
        }
        $(span).html(text);
        span.setAttribute('value', odd);
    }
}

function Goal () {
    document.getElementById('Goal').className = 'show default';

    var CanPlay = false;
    if (document.getElementById('GoalAudio').canPlayType('audio/mp3') != '' || document.getElementById('GoalAudio').canPlayType('audio/wav') != '') {
        CanPlay = true;
    }

    if (document.getElementById('Sound').checked && CanPlay) {
        PlayAudio();
    }
    if (CloseGoal) {
        window.clearTimeout(CloseGoal);
    }
    CloseGoal = setTimeout("document.getElementById('Goal').className='default';CloseGoal=undefined;",3000);
}
function PlayAudio () {
    document.getElementById("GoalAudio").play();
}