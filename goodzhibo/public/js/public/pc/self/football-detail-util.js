//计算胜平负
function getMatchResult(hscore, ascore, isHomeTeam) {
    var result = -1;
    if (hscore != null && ascore != null &&
        hscore >= 0 && ascore >= 0) {
        var count = hscore - ascore;
        if (isHomeTeam) {
            if (count < 0) {
                result = 0; //负
            } else if (count == 0) {
                result = 1; //平
            } else {
                result = 3; //胜
            }
        } else {
            if (count < 0) {
                result = 3; //胜
            } else if (count == 0) {
                result = 1; //平
            } else {
                result = 0; //负
            }
        }
    }
    return result;
}
//计算赢走输
function getMatchAsiaOddResult(hscore, ascore, middle, isHomeTeam) {
    var result = -1;
    if (middle != null && hscore != null && ascore != null &&
        hscore >= 0 && ascore >= 0) {
        var count = hscore - middle - ascore;
        if (isHomeTeam) {
            if (count < 0) {
                result = 0; //输
            } else if (count == 0) {
                result = 1; //走
            } else {
                result = 3; //赢
            }
        } else {
            if (count < 0) {
                result = 3; //赢
            } else if (count == 0) {
                result = 1; //走
            } else {
                result = 0; //输
            }
        }
    }
    return result;
}
function getMatchSizeOddResult(hscore, ascore, middle) {
    var result = -1;
    if (hscore == null || ascore == null || middle == null)
        return result;
    if (hscore >= 0 && ascore >= 0) {
        var count = hscore + ascore - middle;
        if (count < 0) {
            result = 0; //小
        } else if (count == 0) {
            result = 1; //走
        } else {
            result = 3; //大
        }
    }
    return result;
}