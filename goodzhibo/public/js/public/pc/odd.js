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

    $('#Odd table td').mouseover(function(){
        setTB(this);
    })
    $('#Odd table td').mouseout(function(){
        cleanTB(this);
    })

}