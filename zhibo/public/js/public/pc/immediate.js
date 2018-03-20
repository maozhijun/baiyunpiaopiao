
var CloseGoal = undefined;

function setTableCheck () {
    var Btn = $('.contentTable:first button[name=choose]');

    function ChangeChoose (obj) {
        if (obj.className == 'on') {
            obj.className = '';
        }else{
            obj.className = 'on';
        }
    }

    for (var i = 0; i < Btn.length; i++) {
        Btn[i].onclick = function (){
            ChangeChoose(this);
        }
    }
}

function setFilter () {
    var OddControler = $('.control:first .odd')[0];
    var OddFilter = $('#OddFilter')[0];

    var LeagueControler = $('.control:first .league')[0];
    var LeagueFilter = $('#LeagueFilter')[0];

    var VideoControler = $('.control:first .multiScreen')[0];
    var VideoFilter = $('#VideoFilter')[0];

    function ShowFilter (type) {
        if (type == 'odd') {
            if (OddFilter.style.display == 'none') {
                OddControler.className = 'show odd on';
                LeagueControler.className = 'show league';

                OddFilter.style.display = 'block';
                LeagueFilter.style.display = 'none';

                if (VideoControler) {
                    VideoControler.className = 'multiScreen';
                    VideoFilter.style.display = 'none';
                }
            }else{
                CloseFilter ();
            }
        }else if (type == 'league') {
            if (LeagueFilter.style.display == 'none') {
                OddControler.className = 'show odd';
                LeagueControler.className = 'show league on';

                OddFilter.style.display = 'none';
                LeagueFilter.style.display = 'block';

                if (VideoControler) {
                    VideoControler.className = 'multiScreen';
                    VideoFilter.style.display = 'none';
                }
            }else{
                CloseFilter ();
            }
        }else if (type == 'video') {
            if (VideoFilter.style.display == 'none') {
                OddControler.className = 'show odd';
                LeagueControler.className = 'show league';
                VideoControler.className = 'multiScreen on';

                OddFilter.style.display = 'none';
                LeagueFilter.style.display = 'none';
                VideoFilter.style.display = 'block';
            }else{
                CloseFilter ();
            }
        }
    }

    function CloseFilter () {
        OddControler.className = 'show odd';
        LeagueControler.className = 'show league';

        OddFilter.style.display = 'none';
        LeagueFilter.style.display = 'none';

        if (VideoControler) {
            VideoControler.className = 'multiScreen';
            VideoFilter.style.display = 'none';
        }
    }

    function ChangeOddType (type) {
        if (type == 'asia') {
            $('#OddFilter button.asia')[0].className = 'asia on';
            $('#OddFilter div.asia')[0].style.display = 'block';
            $('#OddFilter div.asia').removeClass('hide').addClass('show');

            $('#OddFilter button.goal')[0].className = 'goal';
            $('#OddFilter div.goal')[0].style.display = 'none';
            $('#OddFilter div.goal').removeClass('show').addClass('hide');
        }else{
            $('#OddFilter button.asia')[0].className = 'asia';
            $('#OddFilter div.asia')[0].style.display = 'none';
            $('#OddFilter div.asia').removeClass('show').addClass('hide');

            $('#OddFilter button.goal')[0].className = 'goal on';
            $('#OddFilter div.goal')[0].style.display = 'block';
            $('#OddFilter div.goal').removeClass('hide').addClass('show');
        }
    }

    function ChooseBtn (obj) {
        if (obj.className.indexOf('on') == -1) {
            obj.className = 'item on';
        }else{
            obj.className = 'item';
        }
    }

    function ChooseVideo (obj) {
        if (obj.className.indexOf('on') != -1) {
            obj.className = '';
        }else{
            Videos = $('#VideoFilter button.on');
            if (Videos.length < 4) {
                $(obj).attr('class','on')
            }
        }
    }

    OddControler.onclick = function () {
        ShowFilter('odd');
    }
    LeagueControler.onclick = function () {
        ShowFilter('league'); 
    }
    if (VideoControler) {
        VideoControler.onclick = function () {
          ShowFilter('video');  
        }
    }


    $('#OddFilter button.asia').click(function(){
        ChangeOddType('asia');
    })
    $('#OddFilter button.goal').click(function(){
        ChangeOddType('goal');
    })

    $('#OddFilter button.close').click(function(){
        CloseFilter()
    })
    $('#LeagueFilter button.close').click(function(){
        CloseFilter()
    })
    $('#VideoFilter button.close').click(function(){
        CloseFilter()
    })

    $('div.pop[id$="Filter"] .item').click(function(){
        ChooseBtn(this);
    })
    $('div.pop[id$="Filter"] .all').click(function(){
        $(this).parents('.pop').find('.item').addClass('on');
    })
    $('div.pop[id$="Filter"] .opposite').click(function(){
        $(this).parents('.pop').find('.item').trigger('click');
    })
    $('#VideoFilter button[name="choose"]').click(function(){
        ChooseVideo (this)
    })

}

function CloseFilter () {
    $('.filter')[0].style.display = 'none';
    $('.filter')[1].style.display = 'none';
    $('.control .odd')[0].className = 'show odd';
    $('.control .league')[0].className = 'show league';
}

function AllFilter (type) {
    var Filter = $('.control:first .' + type)[1];

    for (var i = 0; i < Filter.getElementsByTagName('ul').length; i++) {
        if (Filter.getElementsByTagName('ul')[i].style.display != 'none') {
            var InputTarget = Filter.getElementsByTagName('ul')[i].getElementsByTagName('input');
            for (var j = 0; j < InputTarget.length; j++) {
                InputTarget[j].checked = true;
            }
        }
    }
}

function OppositeFilter (type) {
    var Filter = $('.control:first .' + type)[1];

    for (var i = 0; i < Filter.getElementsByTagName('ul').length; i++) {
        if (Filter.getElementsByTagName('ul')[i].style.display != 'none') {
            var InputTarget = Filter.getElementsByTagName('ul')[i].getElementsByTagName('input');
            for (var j = 0; j < InputTarget.length; j++) {
                if (InputTarget[j].checked) {
                    InputTarget[j].checked = false;
                }else{
                    InputTarget[j].checked = true;
                }
            }
        }
    }
}

function GoalTR (obj) { //进球效果，哪队进球对应TD触发此事件
    obj.className = 'goal';
    setTimeout(function () {
        obj.className = '';
    },5000);
}

function Goal () { //这地方还涉及到填充内容，建平自己处理
    document.getElementById('Goal').className = 'show default';
    var CanPlay = false;
    if (document.getElementById('GoalAudio').canPlayType('audio/mp3') != '' || document.getElementById('GoalAudio').canPlayType('audio/wav') != '') {
        CanPlay = true;
    }
    if (document.getElementById('Sound').className == 'on' && CanPlay) {
        PlayAudio();
    }
    if (CloseGoal) {
        window.clearTimeout(CloseGoal);
    }
    CloseGoal = setTimeout("document.getElementById('Goal').className='default';CloseGoal=undefined;",10000);
}

function PlayAudio () {
    document.getElementById("GoalAudio").play();
}

function SoundControl () {
    var SoundBtn = document.getElementById('Sound');

    if (SoundBtn.className == 'on') {
        SoundBtn.className = '';
    }else{
        SoundBtn.className = 'on';
    }
}

function getMousePos(obj,event) {
    var Height = window.screen.availHeight;
    var e = event || window.event || arguments.callee.caller.arguments[0];
    var scrollY = document.documentElement.scrollTop || document.body.scrollTop;
    var y = e.clientY;

    if (y > Height / 2) {
        $(obj).find('.even')[0].className = 'even top';
    }else{
        $(obj).find('.even')[0].className = 'even';
    }
}

function setBG () {
    function setTR (obj) {
        var TR = obj.parentNode;
        if (obj == TR.getElementsByTagName('td')[4] || obj == TR.getElementsByTagName('td')[5] || obj == TR.getElementsByTagName('td')[6]) {
            TR.className = 'matchHover';
        }
    }

    function cleanTR (obj) {
        var TR = obj.parentNode;
        if (TR.className == 'matchHover') {
            TR.className = '';
        }
    }

    function setTB (obj) {
        var TR = obj.parentNode;
        var Num = false;
        if (obj.tagName == 'TD') {
            for (var i = 0; i < TR.getElementsByTagName('td').length; i++) {
                if (obj == TR.getElementsByTagName('td')[i]) {
                    Num = i + 1;
                    break;
                }
            }
        }else if (obj.tagName == 'TH') {
            for (var i = 0; i < TR.getElementsByTagName('th').length; i++) {
                if (obj == TR.getElementsByTagName('th')[i]) {
                    if (i <= 4) {
                        Num = i + 1;
                    }else{
                        Num = i + 3;
                    }
                    break;
                }
            }
        }

        if (Num) {
            $('.contentTable').attr('class','contentTable bg_' + Num);
        }
    }

    function cleanTB () {
        $('.contentTable').attr('class','contentTable');
    }

    $('.contentTable td').mouseover(function(){
        if ($(this).parents('tr')[0].className != 'bannerAD') {
            setTR(this);
            setTB(this);
        }
    })
    $('.contentTable td').mouseout(function(){
        if ($(this).parents('tr')[0].className != 'bannerAD') {
            cleanTR(this);
        }
    })
    $('.contentTable').mouseout(function(){
        cleanTB();
    })
}

function setplaceholder () {
    if($('[type="date"]').prop('type') != 'date') {
        //     console.log("The 'date' input type is not supported, so using JQueryUI datepicker instead.");
        $('[type="date"]').datepicker({format:"yyyy-mm-dd",
            language: "zh-CN"});
        }
    if(!placeholderSupport()){   // 判断浏览器是否支持 placeholder
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
    }).blur(function() {
        var input = $(this);
            if (input.val() == '' || input.val() == input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();
    };
};

function placeholderSupport() {
    return 'placeholder' in document.createElement('input');
}

// window.onscroll = function () {
//     setTableHead();
//     setBackTop();
// }
$(window).resize(function() {
    setTableHead();
    $('#TableHead').width($('#Show').width());
});

function setTableHead () {
    var TableHead = document.getElementById('TableHead');
    // var Different = (document.documentElement.scrollTop || document.body.scrollTop) - (TableHead.parentNode.offsetTop + document.getElementById('Content').offsetTop)
    if ((document.documentElement.scrollTop || document.body.scrollTop) - Math.abs(TableHead.parentNode.offsetTop + document.getElementById('Content').offsetTop) - 28 > 0) {
        TableHead.style.display = 'table-header-group';
    }else{
        TableHead.style.display = 'none';
    }
}

