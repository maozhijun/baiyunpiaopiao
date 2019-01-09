<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2019/1/9
 * Time: 17:21
 */

namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelExportController extends Controller
{
    /**
     *
     * Excel导出全部客户
     */
    public function exportAll(Request $request, $roleStr)
    {
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $role = $user->role;
        if ($role > Account::K_ROLE_MANAGER) return back();

        ini_set('memory_limit','500M');
        set_time_limit(0);//设置超时限制为0分钟

        $this->export('全部客户');
        return back();
    }

    /**
     *
     * Excel导出小组的客户
     */
    public function exportGroup(Request $request, $roleStr)
    {
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $groupId = $user->group_id;
        if ($user->role <= Account::K_ROLE_MANAGER) {
            $groupId = $request->input('gid', $user->group_id);
        }
        if ($groupId <= 0) {
            return back();
        }

        ini_set('memory_limit','500M');
        set_time_limit(0);//设置超时限制为0分钟

        $group = Group::query()->find($groupId);
        if (isset($group)) {
            $this->export($group->name."的客户", $groupId);
        }
        return back();
    }

    /**
     *
     * Excel导出管理员的客户
     */
    public function exportMember(Request $request, $roleStr)
    {
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $mid = $user->id;
        if ($user->role <= Account::K_ROLE_MANAGER) {
            $mid = $request->input('mid', $user->id);
        } else if ($user->role <= Account::K_ROLE_HEADMAN) {
            $mid = $request->input('mid', $user->id);
            $member = Account::query()->where(['group_id'=>$user->group_id, 'id'=>$mid, 'status'=>1])->first();
            if (!isset($member)) {
                $mid = $user->id;
            }
        }

        ini_set('memory_limit','500M');
        set_time_limit(0);//设置超时限制为0分钟

        $member = Account::query()->find($mid);
        if ($member) {
            $this->export($member->name."的客户", 0, $mid);
        }
        return back();
    }

    private function export($name, $gid = 0, $mid = 0) {
        $query = Customer::query()
            ->join('accounts', function ($json){
                $json->on('accounts.id', 'customers.mid')
                    ->where('accounts.status', 1);
            })->join('groups', function ($json){
                $json->on('accounts.group_id', 'groups.id')
                    ->where('groups.status', 1);
            })
            ->where('customers.status', 1);

        if ($gid > 0) {
            $query->select('accounts.name', 'customers.account','customers.wechat','customers.first_money', 'customers.registed_at')
                ->where('accounts.group_id', $gid);
            $headArray = [array('管理员', '账号','微信','首存金', '注册时间')];
        } else if ($mid > 0) {
            $query->select('customers.account','customers.wechat','customers.first_money', 'customers.registed_at')
                ->where('customers.mid', $mid);
            $headArray = [array('账号','微信','首存金', '注册时间')];
        } else {
            $query->select('groups.name as group_name', 'accounts.name', 'customers.account','customers.wechat','customers.first_money', 'customers.registed_at');
            $headArray = [array('小组', '管理员', '账号','微信','首存金', '注册时间')];
        }
        $cellData = $query->orderBy('groups.created_at')->orderBy('accounts.created_at')->get()->toArray();

        $sheetDatas = array_chunk($cellData, 1000);
        Excel::create($name,function($excel) use ($sheetDatas, $headArray){
            foreach ($sheetDatas as $index=>$sheetData) {
                $tempData = array_merge($headArray, $sheetData);
                $excel->sheet('sheet'.$index, function ($sheet) use ($tempData) {
                    $sheet->rows($tempData);
                });
            }
        })->export('xls');
    }
}