<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/8
 * Time: 16:37
 */

namespace App\Http\Controllers\Admin\Community;


use App\Http\Controllers\Admin\UploadTrait;
use App\Models\Community\Community;
use App\Models\Community\CommunityExt;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommunityController extends Controller
{
    use UploadTrait;
    /**
     * 社区列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function communities(Request $request) {
        $name = $request->input('name');
        $pageSize = $request->input('page_size');
        $status = $request->input('status', Community::kStatusValid);

        $pageSize = is_numeric($pageSize) ? max($pageSize, 20) : 20;
        $status = in_array($status, [Community::kStatusValid, Community::kStatusDelete]) ? $status : Community::kStatusValid;

        $query = Community::query()->where('status', $status);
        if (!empty($name)) {
            $query->where('name', 'like', '%' . $name . '%');
        }
        $query->selectRaw('*, ifNull(od, 999) as n_od');
        $query->orderBy('n_od');
        $page = $query->paginate($pageSize);
        return view('admin.community.comm.list', ['communities'=>$page]);
    }

    /**
     * 创建/修改社区
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveCommunity(Request $request) {
        $id = $request->input('id');//主键
        $name = $request->input('name');//名称
        //$icon = $request->input('icon');//图片
        $intro = $request->input('intro');//简介
        $od = $request->input('od');//排序

        //判断参数 开始
        if (empty($name) || empty($intro) || (isset($od) && !is_numeric($od)) ) {
            return back()->with('error', '参数错误');
        }
        //判断参数 结束

        if (is_numeric($id)) {
            $community = Community::query()->find($id);
        }

        $isUpdate = isset($community);
        $hasFile = $request->hasFile('icon');
        if (!$isUpdate && !$hasFile) {
            return back()->with('error', '请先上传图片');
        }

        if (!$isUpdate) {
            $community = new Community();
        }

        try {
            if ($hasFile) {
                $file = $request->file('icon');
                $upload = $this->saveUploadedFile($file, 'cover');
                $icon = $upload->getUrl();
                $community->icon = $icon;
            }
            $community->name = $name;
            $community->intro = $intro;
            $community->od = $od;
            $community->save();

            $ext = CommunityExt::query()->find($community->id);
            if (!isset($ext)) {
                $ext = new CommunityExt();
                $ext->id = $community->id;
                $ext->topic_count = 0;
                $ext->focus_count = 0;
                $ext->save();
            }
            Community::staticCommunities();//静态化 社区信息
        } catch (\Exception $exception) {
            dump($exception);
            return back()->with('error', '保存社区失败');
        }

        return back()->with('success', '保存社区成功');
    }

    /**
     * 删除社区
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function changeCommunity(Request $request) {
        $id = $request->input('id');
        $type = $request->input('type');

        $community = Community::query()->find($id);
        if (isset($community)) {
            $community->status = $type == 1 ? Community::kStatusDelete : Community::kStatusValid;
            $community->save();
            Community::staticCommunities();//静态化 社区信息
        }
        return back()->with('success', '操作成功');
    }

}