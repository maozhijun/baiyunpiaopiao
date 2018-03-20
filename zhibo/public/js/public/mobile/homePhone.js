
var UserChoose = {}

function SetFilter () {
    //设置事件
    function ShowFilter () { //显示
        $('#Filter').css("display","flex");
    }

    function CloseFilter () { //隐藏
        $('#Filter').css("display","none");
    }

    function ChangeTab (ID) { //切换tab
        $('#Filter ul').css('display','none');
        $('#' + ID).css('display','block');
        UserChoose.league_type = ID.replace('League_','');
        if ($('#' + ID + ' input').length != 0) {
            $('#League_Choose_All').attr('checked',true);
            for (var i = 0; i < $('#' + ID + ' input').length; i++) {
                if (!$('#' + ID + ' input:eq(' + i + ')').is(':checked')) {
                    $('#League_Choose_All').attr('checked',false);
                    break;
                }
            }
        }else{
            $('#League_Choose_All').attr('checked',false);
        }
    }

    function ChangeLeague (ID) { //点击赛事
        $('#League_Choose_All').attr('checked',true);
        for (var i = 0; i < $('#' + ID + ' input').length; i++) {
            if (!$('#' + ID + ' input:eq(' + i + ')').is(':checked')) {
                $('#League_Choose_All').attr('checked',false);
                break;
            }
        }
    }

    function AllLeague () { //全选
        var Input = $('#' + $('#Filter input[name=league_type]:checked')[0].id.replace('Type_','') + ' input[name=league]');
        if ($('#League_Choose_All').is(':checked')) {
            //Input.attr('checked',true);
            $.each(Input, function (index, obj) {
                obj.checked = true;
            });
        }else{
            //Input.attr('checked',false);
            $.each(Input, function (index, obj) {
                obj.checked = false;
            });
        }
    }

    function ResetLeague () { //重置
        var Input = $('#' + $('#Filter input[name=league_type]:checked')[0].id.replace('Type_','') + ' input[name=league]');
        for (var i = 0; i < Input.length; i++) {
            $('#League_Choose_All').attr('checked',true);
            if (UserChoose['League_' + UserChoose.league_type].indexOf(Input[i].id.replace($('#Filter input[name=league_type]:checked')[0].id.replace('Type_','') + '_','')) != -1) {
                Input[i].checked = true;
            }else{
                Input[i].checked = false;
                $('#League_Choose_All').attr('checked',false);
            }
        }

    }


    //初始化
    function iniUserChoose (){
        if ($('#DateChoose')) {
            var NowTime = new Date($('#DateChoose').val());
        }else{
            var NowTime = new Date();
        }
        var Local = localStorage.getItem('immediate_' + NowTime.getFullYear() + '_' + NowTime.getMonth() + 1 + '_' + NowTime.getDate())
        if (Local) { //如果有记录
            UserChoose = JSON.parse(Local);
            $('#Filter input#League_Type_' + UserChoose.league_type).attr('checked',true);

            var Key = Object.keys(UserChoose);
            for (var i = 0; i < Key.length; i++) {
                if (UserChoose[Key[i]].constructor == Array) {
                    for (var j = 0; j < UserChoose[Key[i]].length; j++) {
                        $('#' + Key[i] + '_' + UserChoose[Key[i]][j]).attr('checked',true);
                    }
                }
            }
        }else{ //无记录
            SetUserChoose()
        }
    }

    //保存选择
    function SetUserChoose (){
        if ($('#DateChoose')) {
            var NowTime = new Date($('#DateChoose').val());
        }else{
            var NowTime = new Date();
        }
        UserChoose.league_type = $('#Filter input[name=league_type]:checked')[0].id.replace('League_Type_','');
        for (var i = 0; i < $('#Filter ul').length; i++) {
            var Arr = [];
            for (var j = 0; j < $('#Filter ul:eq(' + i + ') input:checked').length; j++) {
                Arr = Arr.concat($('#Filter ul:eq(' + i + ') input:checked')[j].id.replace($('#Filter ul')[i].id + '_',''));
            }
            UserChoose[$('#Filter ul')[i].id] = Arr;
        }
        localStorage.setItem('immediate_' + NowTime.getFullYear() + '_' + NowTime.getMonth() + 1 + '_' + NowTime.getDate(),JSON.stringify(UserChoose))
    }

    //绑定触发
    $('#Navigation button.filter').click(function(){
        ShowFilter ()
    })
    $('#Filter button.close').click(function(){
        CloseFilter ()
    })
    $('#Filter input[name=league_type]').click(function(){
        ChangeTab (this.id.replace('Type_',''))
    })
    $('#Filter .league input[name=league]').change(function(){
        ChangeLeague($(this).parents('ul')[0].id)
    })
    $('#League_Choose_All').change(function(){
        AllLeague();
    })
    $('#Reset').click(function(){
        ResetLeague();
    })
    $('#btn_confirm').click(function () {
        var inputs = $('#' + $('#Filter input[name=league_type]:checked')[0].id.replace('Type_','') + ' input[name=league]');
        $("#List a.li").hide();
        $.each(inputs, function (index, obj) {
            if (obj.checked) {
                var lid = obj.value;
                $("#List a.li[lid=\"" + lid + "\"]").show();
            }
        });
        SetUserChoose();
        CloseFilter ();
    });

    //初始化
    iniUserChoose()
}

function SetAtt () {
    var saveMatch;
    var Type = ($('#Navigation .tabBox a.on').attr('class').indexOf('football') != -1)?'Football_':'Basketball_';

    function ChangeSaveMatch (obj) { //每个按钮
        var ID = obj.id.replace('Att_','');
        if (obj.checked) {
            saveMatch = saveMatch.concat(ID);
            localStorage.setItem(Type + 'saveMatch',JSON.stringify(saveMatch));
        }else{
            saveMatch.splice(saveMatch.indexOf(ID),1);
            localStorage.setItem(Type + 'saveMatch',JSON.stringify(saveMatch));

            if ($('#Navigation .tab a.on').hasClass("att")) {
                $(obj).parents('a.li').remove();
            }
        }
    }

    function CheckAtt () { //初始化
        saveMatch = localStorage.getItem(Type + 'saveMatch');
        if (saveMatch) {
            saveMatch = JSON.parse(saveMatch);
            if ($('#Navigation .tab a.on').hasClass("att")) {
                $.ajax({
                    'url': '/matches/data/matchesByIds?ids=' + saveMatch.join(',') + '&sport=' + Type,
                    success: function (result) {
                        $('ul#List').html(result);

                        $('input[name=att]').change(function(){
                            ChangeSaveMatch(this)
                        })
                    }
                });
            }else{
                for (var i = 0; i < $('input[name=att]').length; i++) {
                    if (saveMatch.indexOf($('input[name=att]')[i].id.replace('Att_','')) != -1) {
                        $('input[name=att]')[i].checked = true;
                    }
                }
                $('input[name=att]').change(function(){
                    ChangeSaveMatch(this)
                })
            }
        }else{
            saveMatch = [];
            $('input[name=att]').change(function(){
                ChangeSaveMatch(this)
            })
        }
    }
    CheckAtt ()
}























