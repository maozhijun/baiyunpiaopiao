<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/2/9
 * Time: 19:12
 */

namespace App\Http\Controllers\Mobile\Detail;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DetailController extends Controller
{

    /**
     * 球队终端 球队 单元的html 内容
     * @param Request $request
     * @param $date
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function teamCell(Request $request, $date, $id) {

        return view('mobile.football_detail_cell');
    }



    //====================================================================================//

    public function teamData(Request $request) {


    }

}