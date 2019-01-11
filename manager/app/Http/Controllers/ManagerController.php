<?php
/**
 * Created by PhpStorm.
 * User: ricky007
 * Date: 2019/1/8
 * Time: 17:59
 */

namespace App\Http\Controllers;


use App\Models\Account;
use App\Models\Customer;
use App\Models\Group;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index(Request $request, $roleStr) {
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $role = $user->role;
        if ($role <= Account::K_ROLE_MANAGER) {
            return redirect("/$roleStr/groups");
        } else if ($role <= Account::K_ROLE_HEADMAN) {
            return redirect("/$roleStr/members");
        } else {
            return redirect("/$roleStr/customers");
        }
    }

    /**
     * ======================小组==================================
     */
    public function groups(Request $request, $roleStr) {
        return view('manager.groups', ['$roleStr'=>$roleStr, 'groups'=>Group::allGroups()]);
    }

    public function groupCreate(Request $request, $roleStr) {
        $name = $request->input('name');
        if (empty($name)) {
            return back()->with('error', '小组名字不能为空');
        }

        $group = Group::query()->where('name', $name)->where('status', 1)->first();
        if ($group) {
            return back()->with('error', '小组名字已存在');
        } else {
            $group = new Group();
            $group->name = $name;
            if ($group->save()) {
                return back()->with('success', '创建小组成功');
            } else {
                return back()->with('error', '服务器异常，请稍后重试');
            }
        }
    }

    public function groupEdit(Request $request, $roleStr) {
        $name = $request->input('name');
        if (empty($name)) {
            return back()->with('error', '小组名字不能为空');
        }

        $id = $request->input('id');
        $group = Group::query()->where('id', $id)->where('status', 1)->first();
        if ($group) {
            if ($group->name != $name) {
                $group->name = $name;
                if ($group->save()) {
                    return back()->with('success', '创建小组成功');
                } else {
                    return back()->with('error', '服务器异常，请稍后重试');
                }
            }
            return back()->with('success', '名字未更改');
        } else {
            return back()->with('error', '参数错误');
        }
    }

    public function groupDelete(Request $request, $roleStr) {
        $id = $request->input('id');
        $group = Group::query()->where('id', $id)->where('status', 1)->first();
        if ($group) {
            try {
                foreach ($group->members as $member) {
                    $member->status = 0;
                    $member->save();
                }
                $group->status = 0;
                $group->save();
                return back()->with('success', '删除小组成功');
            } catch (\Exception $e) {
                return back()->with('error', '服务器异常，请稍后重试');
            }
        } else {
            return back()->with('error', '参数错误');
        }
    }

    /**
     * ======================成员==================================
     */
    public function members(Request $request, $roleStr) {
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $groupId = $user->group_id;
        if ($user->role <= Account::K_ROLE_MANAGER) {
            $groupId = $request->input('gid', $user->group_id);
        }
        if ($groupId <= 0) {
            return redirect("/");
        }
        $query = Account::query()->where(['status' => 1, 'group_id' => $groupId]);
        if ($request->has('name')) {
            $query->where('name', 'like', '%'.$request->input('name').'%');
        }
        $members = $query->orderBy('created_at', 'desc')->get();
        return view('manager.member.members', ['gid'=>$groupId, 'members'=>$members]);
    }

    public function memberCreate(Request $request, $roleStr) {
        if ($request->isMethod('post')) {
            if (!$request->has('account')) {
                return back()->with('error', '登录账号不能为空');
            } elseif (!$request->has('name')) {
                return back()->with('error', '用户名不能为空');
            } elseif (!$request->has('password')) {
                return back()->with('error', '密码不能为空');
            } elseif (!$request->has('gid')) {
                return back()->with('error', '小组不能为空');
            } else {
                $accountName = $request->input('account');
                $nickName = $request->input('name');
                $password = $request->input('password');
                $gid = $request->input('gid');
                $role = $request->input('role', Account::K_ROLE_MEMBER);

                $user = Account::query()->where(['account'=>$accountName, 'status'=>1])->first();
                if (isset($user)) {
                    return back()->with('error', '该账号已注册');
                } else {
                    $user = Account::generateAccount($gid, $role, $accountName, $nickName, $password);
                    if ($user->save()) {
                        return back()->with('success', "创建账号成功");
                    } else {
                        return back()->with('error', "服务器异常，请稍后重试！");
                    }
                }
            }
        }
        $user = $request->_account;
        if (!isset($user)) {
            return redirect('/login/?target=' . urlencode($request->fullUrl()));
        }
        $groupId = $user->group_id;
        if ($user->role <= Account::K_ROLE_MANAGER) {
            $groupId = $request->input('gid', $user->group_id);
        }
        if ($groupId <= 0) {
            return redirect("/");
        }
        return view('manager.member.create', ['gid'=>$groupId]);
    }

    public function memberEdit(Request $request, $roleStr) {
        $id = $request->input('id');
        $user = Account::query()->where(['id'=>$id, 'status'=>1])->first();
        if (isset($user)) {
            $accountName = $request->input('account', $user->account);
            $nickName = $request->input('name', $user->name);
            $password = $request->input('password', '');
            $gid = $request->input('gid', $user->group_id);
            $role = $request->input('role', $user->role);

            $changed = false;
            if ($user->account != $accountName) {
                $user->account = $accountName;
                $changed = true;
            }
            if ($user->name != $nickName) {
                $user->name = $nickName;
                $changed = true;
            }
            if ($user->group_id != $gid) {
                $user->group_id = $gid;
                $changed = true;
            }
            if ($user->role != $role) {
                $user->role = $role;
                $changed = true;
            }
            if (strlen($password) > 0) {
                $salt = Account::generateSalt();
                $user->salt = $salt;
                $user->password = sha1($password . $salt);
                $changed = true;
            }
            if ($changed) {
                if ($user->save()) {
                    return back()->with('success', "修改账号成功");
                } else {
                    return back()->with('error', "服务器异常，请稍后重试！");
                }
            } else {
                return back()->with('success', '无修改');
            }
        } else {
            return back()->with('error', '参数错误');
        }
    }

    public function memberDelete(Request $request, $roleStr) {
        $id = $request->input('id');
        $user = Account::query()->where('id', $id)->where('status', 1)->first();
        if ($user) {
            try {
                foreach ($user->customers as $customer) {
                    $customer->status = 0;
                    $customer->save();
                }
                $user->status = 0;
                $user->save();
                return back()->with('success', '删除成员成功');
            } catch (\Exception $e) {
                return back()->with('error', '服务器异常，请稍后重试');
            }
        } else {
            return back()->with('error', '参数错误');
        }
    }

    /**
     * ======================用户==================================
     */
    public function customers(Request $request, $roleStr) {
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
        $query = Customer::query()->where(['status' => 1, 'mid'=>$mid]);
        if ($request->has('account')) {
            $query->where('account', 'like', '%'.$request->input('account').'%');
        }
        $customers = $query->orderBy('created_at', 'desc')->get();

        return view('manager.customer.customers', ['mid'=>$mid, 'customers'=>$customers]);
    }

    public function customerCreate(Request $request, $roleStr) {
        if ($request->isMethod('post')) {
            if (!$request->has('register')) {
                return back()->with('error', '客户注册时间不能为空');
            } elseif (!$request->has('account')) {
                return back()->with('error', '客户注册账号不能为空');
            } elseif (!$request->has('mid')) {
                return back()->with('error', '管理员错误');
            } else {
                $registerTime = $request->input('register'); //注册时间
                $account = trim($request->input('account')); //注册账号
                $firstBlood = $request->input('first', 0); //首存金
                $wechat = $request->input('wechat'); //微信账号
                $mid = $request->input('mid'); //管理员id

                $customer = Customer::query()->where(['account'=>$account, 'status'=>1])->first();
                if (isset($customer)) {
                    return back()->with('error', '该客户已存在');
                } else {
                    $customer = new Customer();
                    $customer->registed_at = date_create($registerTime);
                    $customer->mid = $mid;
                    $customer->account = $account;
                    $customer->first_money = $firstBlood;
                    if ($wechat) {
                        $customer->wechat = $wechat;
                    }
                    if ($customer->save()) {
                        return back()->with('success', "创建账号成功");
                    } else {
                        return back()->with('error', "服务器异常，请稍后重试！");
                    }
                }
            }
        }
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
        return view('manager.customer.create', ['mid'=>$mid]);
    }

    public function customerEdit(Request $request, $roleStr) {
        if (!$request->has('account') || !$request->has('id')) {
            return back()->with('error', '参数错误');
        }
        $account = trim($request->input('account', "")); //注册账号
        $id = $request->input('id'); //注册账号
        $customer = Customer::query()->where(['id'=>$id, 'status'=>1])->first();
        if (isset($customer)) {
            $accountCust = Customer::query()->where(['account'=>$account, 'status'=>1])->first();
            if (isset($accountCust) && $accountCust->id != $id) {
                return back()->with('error', "该客户账号已存在");
            }
            $registerTime = $request->input('register', ''); //注册时间
            $firstBlood = $request->input('first', $customer->first_money); //首存金
            $wechat = $request->input('wechat', $customer->wechat); //微信账号
            $mid = $request->input('mid', $customer->mid); //管理员id

            $changed = false;
            if (strlen($registerTime) > 0) {
                $customer->registed_at = date_create($registerTime);
                $changed = true;
            }
            if ($customer->account != $account) {
                $customer->account = $account;
                $changed = true;
            }
            if ($customer->first_money != $firstBlood) {
                $customer->first_money = $firstBlood;
                $changed = true;
            }
            if ($customer->wechat != $wechat) {
                $customer->wechat = $wechat;
                $changed = true;
            }
            if ($customer->mid != $mid) {
                $customer->mid = $mid;
                $changed = true;
            }
            if ($changed) {
                if ($customer->save()) {
                    return back()->with('success', "修改客户信息成功");
                } else {
                    return back()->with('error', "服务器异常，请稍后重试！");
                }
            } else {
                return back()->with('error', '未修改');
            }
        } else {
            return back()->with('error', '参数错误');
        }
    }

    public function customerDelete(Request $request, $roleStr) {
        $id = $request->input('id');
        $customer = Customer::query()->where('id', $id)->where('status', 1)->first();
        if ($customer) {
            $customer->status = 0;
            if ($customer->save()) {
                return back()->with('success', '删除客户成功');
            } else {
                return back()->with('error', '服务器异常，请稍后重试');
            }
        } else {
            return back()->with('error', '参数错误');
        }
    }
}