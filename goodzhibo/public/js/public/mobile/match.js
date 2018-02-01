

function setDataCanvas () {
    var CanvasBox = document.getElementById('Data').getElementsByTagName('canvas');

    function Circle (Win,Draw,Lose,obj) {
        var All = Win + Draw + Lose;
        if (All != 0) {
            var ctx = obj.getContext("2d");
            ctx.lineWidth = 4;
            ctx.beginPath();
            ctx.arc(70, 70, 80, - 0.5 * Math.PI, (2 * (Win / All) - 0.5) * Math.PI, false);
            ctx.lineTo(70, 70);
            ctx.fillStyle = "#f1333e";
            ctx.fill();
            ctx.strokeStyle = "white";
            ctx.closePath();
            if (Draw != All && Lose != All && Win != All) {
                ctx.stroke();
            };

            // ctx.lineWidth = 4;
            ctx.beginPath();
            ctx.arc(70, 70, 80, Math.PI / 180 * (Win / All) * 360 - 0.5 * Math.PI, (2 * ((Win + Draw) / All) - 0.5) * Math.PI, false);
            ctx.lineTo(70, 70);
            ctx.fillStyle = "#1CC075";
            ctx.fill();
            // ctx.strokeStyle = "white";
            ctx.closePath();
            if (Draw != All && Lose != All && Win != All) {
                ctx.stroke();
            };

            // ctx.lineWidth = 4;
            ctx.beginPath();
            ctx.arc(70, 70, 80, Math.PI / 180 * ((Win + Draw) / All) * 360 - 0.5 * Math.PI, 1.5 * Math.PI, false);
            ctx.lineTo(70, 70);
            ctx.fillStyle = "#999";
            ctx.fill();
            // ctx.strokeStyle = "white";
            ctx.closePath();

            if (Draw != All && Lose != All && Win != All) {
                ctx.stroke();
            };
        }
    }

    for (var i = 0; i < CanvasBox.length; i++) {
        var Win = parseInt(CanvasBox[i].getAttribute('win'));
        var Draw = parseInt(CanvasBox[i].getAttribute('draw'));
        var Lose = parseInt(CanvasBox[i].getAttribute('lose'));
        Circle(Win,Draw,Lose,CanvasBox[i]);
    }
}

function setInfoCanvas () {
    var CanvasBox = document.getElementById('Info').getElementsByTagName('canvas');

    function Circle (Value,Color,obj) {
        if (Value != 0) {
            var ctx = obj.getContext("2d");
            ctx.lineWidth = 4;
            ctx.beginPath();
            ctx.arc(65, 65, 67, - 0.5 * Math.PI, (2 * (Value / 100) - 0.5) * Math.PI, false);
            ctx.lineTo(65, 65);
            ctx.fillStyle = Color;
            ctx.fill();
            ctx.strokeStyle = "white";
            ctx.closePath();
            if (Value != 100) {
                ctx.stroke();
            };
        }
    }

    for (var i = 0; i < CanvasBox.length; i++) {
        var Value = parseInt(CanvasBox[i].getAttribute('value'));
        var Color = CanvasBox[i].getAttribute('color');
        Circle(Value,Color,CanvasBox[i]);
    }
}

function setOnChangeTab () {
    var Btn = $('#Tabbar button');

    var LeftBar = $('.leftBar p');
    var TabContent = $('.tabContent');

    function onChangeTab (obj,ID) {
        for (var i = 0; i < Btn.length; i++) {
            Btn[i].className = '';
        }

        obj.className = 'on';

        for (var i = 0; i < LeftBar.length; i++) {
            if (LeftBar[i].className == ID) {
                LeftBar[i].style.display = 'block';
            }else{
                LeftBar[i].style.display = 'none';
            }
        }

        for (var i = 0; i < TabContent.length; i++) {
            if (TabContent[i].id == ID) {
                TabContent[i].style.display = 'block';
            }else{
                TabContent[i].style.display = 'none';
            }
        }

        setTimeout('ResetView ()',200);
    }

    for (var i = 0; i < Btn.length; i++) {
        Btn[i].onclick = function () {
            onChangeTab (this,this.value);
        }
    }

    $('#Info .sameOdd a').click(function(){
        $('#Tabbar button[value="Characteristic"]').trigger('click');
        location.href = '#Characteristic_SameOdd';
    })
}

function setBG () {
    function setTB (obj) {
        var TR = obj.parentNode;
        var Num = false;
        for (var i = 0; i < TR.getElementsByTagName('td').length; i++) {
            if (obj == TR.getElementsByTagName('td')[i]) {
                Num = i + 1;
                break;
            }
        }

        if (Num) {
            $(obj).parents('table').attr('class','bg_' + Num);
        }
    }

    function cleanTB (obj) {
        $(obj).parents('table').attr('class','');
    }

    $('#Data_League table td').mouseover(function(){
        setTB(this);
    })
    $('#Data_League table td').mouseout(function(){
        cleanTB(this);
    })

    $('#Data_Battle table td').mouseover(function(){
        setTB(this);
    })
    $('#Data_Battle table td').mouseout(function(){
        cleanTB(this);
    })

    $('#Data_History table td').mouseover(function(){
        setTB(this);
    })
    $('#Data_History table td').mouseout(function(){
        cleanTB(this);
    })
    
    $('#Characteristic_SameOdd table td').mouseover(function(){
        setTB(this);
    })
    $('#Characteristic_SameOdd table td').mouseout(function(){
        cleanTB(this);
    })
}

function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (isOpera) {
        return "Opera"
    }; //判断是否Opera浏览器
    if (userAgent.indexOf("Firefox") > -1) {
        return "FF";
    } //判断是否Firefox浏览器
    if (userAgent.indexOf("WebKit") > -1){
        return "WebKit";
    }
    if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {
        return "IE";
    }; //判断是否IE浏览器
}





















