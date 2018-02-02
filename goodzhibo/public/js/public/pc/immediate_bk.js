
var CloseGoal = undefined;

function setTableCheck () {
    var Btn = $('#MatchList table button[name=choose]');

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

    var LeagueControler = $('.control:first .league')[0];
    var LeagueFilter = $('#LeagueFilter')[0];

    var VideoControler = $('.control:first .multiScreen')[0];
    var VideoFilter = $('#VideoFilter')[0];

    function ShowFilter (type) {
        if (type == 'league') {
            if (LeagueFilter.style.display == 'none') {
                LeagueControler.className = 'show league on';

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
                LeagueControler.className = 'show league';
                VideoControler.className = 'multiScreen on';

                LeagueFilter.style.display = 'none';
                VideoFilter.style.display = 'block';
            }else{
                CloseFilter ();
            }
        }
    }

    function CloseFilter () {
        LeagueControler.className = 'show league';

        LeagueFilter.style.display = 'none';

        if (VideoControler) {
            VideoControler.className = 'multiScreen';
            VideoFilter.style.display = 'none';
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

    LeagueControler.onclick = function () {
        ShowFilter('league'); 
    }
    if (VideoControler) {
        VideoControler.onclick = function () {
          ShowFilter('video');  
        }
    }


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




