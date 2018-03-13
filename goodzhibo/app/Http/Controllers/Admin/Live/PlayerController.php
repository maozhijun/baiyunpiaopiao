<?php
/**
 * Created by PhpStorm.
 * User: 11247
 * Date: 2018/3/12
 * Time: 18:44
 */

namespace App\Http\Controllers\Admin\Live;


use App\Http\Controllers\PC\Live\LiveController;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{

    const kAdImageTypeL = 'l', kAdImageTypeD = 'd', kAdImageTypeZ = 'z', kAdImageTypeW = 'w';//播放器广告类型，1：前置广告，2：暂停广告，3：缓冲广告， 4：倒计时广告
    const kAdImageTypeCn = [self::kAdImageTypeL=>'前置广告', self::kAdImageTypeD=>'暂停广告', self::kAdImageTypeZ=>'缓冲广告',
                                self::kAdImageTypeW=>'倒计时广告'];
    /**
     * 播放器活动列表
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function actives(Request $request) {
        $active = $this->getDDActiveArray();
        return view('admin.live.active.actives', ['active'=>$active]);
    }


    /**
     * 设置活动内容
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveActive(Request $request) {
        $txt = $request->input('txt', '');
        $active = $this->getDDActiveArray();
        if ($request->hasFile('code')) {
            $file = $request->file('code');
            $patch = $this->putImage('active', $file);
            $active['code'] = $patch;
        }
        if (!empty($txt)) {
            $pattern = '[\n+\r*|\r+\n*]';
            $txt = preg_replace($pattern, "\n", $txt);
        }
        $active['txt'] = $txt;
        Storage::disk('public')->put('/static/m/dd_image/active.json', json_encode($active));
        return back()->with('success', '设置活动成功');
    }

    /**
     * 删除播放器活动
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteActive(Request $request) {
        $this->delStorageFiles('/public/static/m/dd_image/active');
        $active = $this->getDDActiveArray();
        $active['txt'] = '';
        $active['code'] = '';
        Storage::disk('public')->put('/static/m/dd_image/active.json', json_encode($active));
        return back()->with('success', '删除活动成功');
    }

    /**
     * 获取活动静态文件内容
     * @return array|mixed
     */
    protected function getDDActiveArray() {
        $active = [];
        try {
            $json = Storage::get('/public/static/m/dd_image/active.json');
            $active = json_decode($json, true);
        } catch (\Exception $exception) {
            //文件不存在
        }
        $active = is_null($active) ? [] : $active;
        return $active;
    }

    //====================================================================================//

    /**
     * 播放器广告图片
     * 前置、后置、缓冲、倒计时
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function ddImages(Request $request) {
        $images = $this->getDDImageArray();//操作静态文件
        $typeCns = self::kAdImageTypeCn;
        return view('admin.live.adImage.images', ['typeCns'=>$typeCns, 'images'=>$images]);
    }

    /**
     * 保存广告图片
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveDDImage(Request $request) {
        $type = $request->input('type');
        if (!isset(self::kAdImageTypeCn[$type])) {
            return back()->with('error', '选择广告类型错误');
        }
//        if (!isset(self::kAdImageTypeCn[$id])) {
//            return back()->with('error', '参数错误');
//        }
        $images = $this->getDDImageArray();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $patch = $this->putImage($type, $file);
            $images[$type] = $patch;
        }
        Storage::disk('public')->put('/static/m/dd_image/images.json', json_encode($images));
        return back()->with('success', '保存成功');
    }

    /**
     * 删除广告类型
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delDDImage(Request $request) {
        $type = $request->input('type');
        if (!isset(self::kAdImageTypeCn[$type])) {
            return back()->with('error', '选择广告类型错误');
        }
        $images = $this->getDDImageArray();
        if (!empty($images[$type])) {
            $this->delStorageFiles('/public/static/m/dd_image/' . $type);
            $images[$type] = '';
            Storage::disk('public')->put('/static/m/dd_image/images.json', json_encode($images));
        }
        return back()->with('success', '删除成功');
    }

    /**
     * 生成随机高清验证码
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setValidCode(Request $request) {
        $code_array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K', 'L', 'M', 'N', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
        $r_code_array = array_random($code_array, 4);
        $code = implode('', $r_code_array);
        $images = $this->getDDImageArray();
        $images['code'] = $code;
        Redis::set(LiveController::LIVE_HD_CODE_KEY, $code);
        Storage::disk('public')->put('/static/m/dd_image/images.json', json_encode($images));
        return back()->with('success', '设置高清验证码成功');
    }

    /**
     * 设置广告时间
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function setDDTime(Request $request) {
        $time = $request->input('time', 5);//广告时间
        if (!is_numeric($time) || $time < 0) {
            return back()->with('error', '时间错误');
        }
        $images = $this->getDDImageArray();
        $images['dd_time'] = $time;
        Storage::disk('public')->put('/static/m/dd_image/images.json', json_encode($images));
        return back()->with('success', '设置广告时间成功');
    }

    /**
     * 获取广告图片的静态文件
     * @return array|mixed
     */
    protected function getDDImageArray() {
        $images = [];
        try {
            $json = Storage::get('/public/static/m/dd_image/images.json');
            $images = json_decode($json, true);
        } catch (\Exception $exception) {
            //文件不存在
        }
        $images = is_null($images) ? [] : $images;
        return $images;
    }

    /**
     * 上传文件
     * @param $type
     * @param UploadedFile $file
     * @return string
     */
    protected function putImage($type, UploadedFile $file) {
        $filePatch = '/m/dd_image/' . $type;
        //删除原来的文件
        $this->delStorageFiles('/public/static' . $filePatch);
        //上传图片
        $extension = $file->guessClientExtension();
        $fileName = str_random() . '.' . $extension;
        $file->storeAs('/static' . $filePatch, $fileName, 'public');
        return $filePatch . '/' . $fileName;
    }

    /**
     * 获取文件夹下的第一个文件
     * @param $patch
     * @return mixed|string
     */
    protected function getStorageFirstFile($patch) {
        $files = Storage::files($patch);
        if (is_array($files) && count($files) > 0) {
            return $files[0];
        }
        return '';
    }

    /**
     * 删除文件夹下面的所有文件
     * @param $patch
     */
    protected function delStorageFiles($patch) {
        $files = Storage::files($patch);
        if (is_array($files)) {
            foreach ($files as $file) {
                Storage::delete($file);
            }
        }
    }

}