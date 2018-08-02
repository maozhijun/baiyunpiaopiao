<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;

class CrontabController extends BaseController
{
    public function checkFFMPEG(Request $request)
    {
        $ets = EncodeTask::query()->where('status', '>=', 1)->get();
        foreach ($ets as $et) {
            $pid = exec('pgrep -f "' . explode('?', $et->rtmp)[0] . '"');
            echo $pid;
            if (empty($pid) || $et->pid != $pid) {
                $et->status = -1;
                $et->stop_at = date_create();
                $et->save();
            }
        }
    }

}
