<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class CustomEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $randomEnd = str_random(2);
            $randomEnd = strtolower($randomEnd);
            $randomIntEnd = random_int(1, 9);

//            $rens[] = 'renren##201804241141222057111';
//            $rens[] = 'renren##201804241141222057222';
//            $rens[] = 'renren##201804241141222057333';
//            $rens[] = 'renren##201804241141222057444';
//            $this->channels['人人-金山'] = $rens;

//            $bohes[] = 'bohe-ws##34b99596dbe84c3295d33b7f7f481a5b';
//            $bohes[] = 'bohe-ws##6bce78d83b61453881b09f0a3e89a409';
//            $bohes[] = 'bohe-ws##d796b0966ec742248e3950eff78d5955';
//            $bohes[] = 'bohe-ws##5a75b2c34a964ed5bbbd5399be5ccd7a';
//            $this->channels['薄荷-网易'] = $bohes;

//            $shangyuers[] = "shangyuer-ws##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."a";
//            $shangyuers[] = "shangyuer-ws##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."b";
//            $shangyuers[] = "shangyuer-ws##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."c";
//            $shangyuers[] = "shangyuer-ws##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."d";
//            $this->channels['上鱼-网宿'] = $shangyuers;

//            $shangyuers[] = "shangyuer-pili##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."a";
//            $shangyuers[] = "shangyuer-pili##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."b";
//            $shangyuers[] = "shangyuer-pili##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."c";
//            $shangyuers[] = "shangyuer-pili##2f34f11a-548d-4ba7-b1aa-2b7b3a2bf$randomEnd"."d";
//            $this->channels['上鱼-七牛'] = $shangyuers;

            $dfms[] = 'wole-dl##3ad02f57e85eb9cf5975eb7008d'.$randomEnd.'a';
            $dfms[] = 'wole-dl##3ad02f57e85eb9cf5975eb7008d'.$randomEnd.'b';
            $dfms[] = 'wole-dl##3ad02f57e85eb9cf5975eb7008d'.$randomEnd.'c';
            $dfms[] = 'wole-dl##3ad02f57e85eb9cf5975eb7008d'.$randomEnd.'d';
            $this->channels['我乐-帝联'] = $dfms;

//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'a';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'b';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'c';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'d';
//            $this->channels['我乐-网宿'] = $wfms;

//            $memes[] = 'meme-ali##40290811';
//            $memes[] = 'meme-ali##40290822';
//            $memes[] = 'meme-ali##40290833';
//            $memes[] = 'meme-ali##40290844';
//            $this->channels['么么-阿里'] = $memes;

//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184f8aa';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184f8bb';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184f8cc';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184f8dd';
//            $this->channels['云图-阿里'] = $nagezanalis;

//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184f7aa';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184f7bb';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184f7cc';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184f7dd';
//            $this->channels['云图-网宿'] = $nagezanwss;

            $maobos[] = 'maobo-ali##3002233'.$randomIntEnd.'1';
            $maobos[] = 'maobo-ali##3002233'.$randomIntEnd.'2';
            $maobos[] = 'maobo-ali##3002233'.$randomIntEnd.'3';
            $maobos[] = 'maobo-ali##3002233'.$randomIntEnd.'4';
            $this->channels['猫播-阿里'] = $maobos;

//            $huoxings[] = 'huoxing-ks##29589011';
//            $huoxings[] = 'huoxing-ks##29589022';
//            $huoxings[] = 'huoxing-ks##29589033';
//            $huoxings[] = 'huoxing-ks##29589044';
//            $this->channels['火星-金山'] = $huoxings;

            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'a';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'b';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'c';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'d';
            $this->channels['艾米-网速'] = $imis;

//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432113_111';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432113_222';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432113_333';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432113_444';
//            $this->channels['看东方-网宿'] = $kdfs;

//            $memes[] = 'meme-uc##402908'.$randomIntEnd.'1';
//            $memes[] = 'meme-uc##402908'.$randomIntEnd.'2';
//            $memes[] = 'meme-uc##402908'.$randomIntEnd.'3';
//            $memes[] = 'meme-uc##402908'.$randomIntEnd.'4';
//            $this->channels['么么-UC'] = $memes;

            $stagers[] = 'stager-ws##73978'.$randomIntEnd.'1';
            $stagers[] = 'stager-ws##73978'.$randomIntEnd.'2';
            $stagers[] = 'stager-ws##73978'.$randomIntEnd.'3';
            $stagers[] = 'stager-ws##73978'.$randomIntEnd.'4';
            $this->channels['小鬼子-网宿'] = $stagers;

//            $xiu8s[] = 'xiu8-ws##9103291';
//            $xiu8s[] = 'xiu8-ws##9103292';
//            $xiu8s[] = 'xiu8-ws##9103293';
//            $xiu8s[] = 'xiu8-ws##9103294';
//            $this->channels['秀吧-网宿'] = $xiu8s;

            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'1';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'2';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'3';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'4';
            $this->channels['秀吧-金山'] = $xiu8kss;

            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'1';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'2';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'3';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'4';
            $this->channels['什么鬼-帝联'] = $ewqoks;

//            $sb126s[] = 'sb126-ws##735f725292624dfd98d117664bb02'.$randomEnd.'1';
//            $sb126s[] = 'sb126-ws##3c53b37b83f042c6a96656a11dd49'.$randomEnd.'2';
//            $sb126s[] = 'sb126-ws##e1956de55d1e44c4bd2552216b11e'.$randomEnd.'3';
//            $sb126s[] = 'sb126-ws##bebf1bdf215e493cb4877832aa2c2'.$randomEnd.'4';
//            $this->channels['随便-网易'] = $sb126s;

//            $lesparks[] = "lala-uc##77fgeiii5sbcf0w4p6mbpehg9rzsm".$randomEnd."a";
//            $lesparks[] = "lala-uc##77fgeiii5sbcf0w4p6mbpehg9rzsm".$randomEnd."b";
//            $lesparks[] = "lala-uc##77fgeiii5sbcf0w4p6mbpehg9rzsm".$randomEnd."c";
//            $lesparks[] = "lala-uc##77fgeiii5sbcf0w4p6mbpehg9rzsm".$randomEnd."d";
//            $this->channels['拉拉-UC'] = $lesparks;

//            $whyal[] = 'why-al##whyef'.$randomIntEnd.'1';
//            $whyal[] = 'why-al##whyef'.$randomIntEnd.'2';
//            $whyal[] = 'why-al##whyef'.$randomIntEnd.'3';
//            $whyal[] = 'why-al##whyef'.$randomIntEnd.'4';
//            $this->channels['文化云-阿里'] = $whyal;
//
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'1';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'2';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'3';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'4';
//            $this->channels['cjy-阿里'] = $cjyal;
//
//            $yicai[] = 'yicai-al##stream8231'.$randomIntEnd.'1';
//            $yicai[] = 'yicai-al##stream8231'.$randomIntEnd.'2';
//            $yicai[] = 'yicai-al##stream8231'.$randomIntEnd.'3';
//            $yicai[] = 'yicai-al##stream8231'.$randomIntEnd.'4';

            $ofweek[] = 'week-jomo##ddwi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'a';
            $ofweek[] = 'week-jomo##ddwi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'b';
            $ofweek[] = 'week-jomo##ddwi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'c';
            $ofweek[] = 'week-jomo##ddwi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'d';
            $this->channels['ofweek-jomo'] = $ofweek;

            $sobey[] = 'sobey-pili##9704643001'.$randomIntEnd.'1';
            $sobey[] = 'sobey-pili##9704643001'.$randomIntEnd.'2';
            $sobey[] = 'sobey-pili##9704643001'.$randomIntEnd.'3';
            $sobey[] = 'sobey-pili##9704643001'.$randomIntEnd.'4';
            $this->channels['sobey-pili'] = $sobey;
        } elseif (env('APP_NAME') == 'aikq1') {
            $randomEnd = str_random(2);
            $randomEnd = strtolower($randomEnd);
            $randomIntEnd = random_int(1, 9);

            $stagers[] = 'stager-ws##73977'.$randomIntEnd.'1';
            $stagers[] = 'stager-ws##73977'.$randomIntEnd.'2';
            $stagers[] = 'stager-ws##73977'.$randomIntEnd.'3';
            $stagers[] = 'stager-ws##73977'.$randomIntEnd.'4';
            $this->channels['小鬼子-网宿'] = $stagers;

//            $xiu8s[] = 'xiu8-ws##9103281';
//            $xiu8s[] = 'xiu8-ws##9103282';
//            $xiu8s[] = 'xiu8-ws##9103283';
//            $xiu8s[] = 'xiu8-ws##9103284';
//            $this->channels['秀吧-网宿'] = $xiu8s;

            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'1';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'2';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'3';
            $xiu8kss[] = 'xiu8-ks##92032'.$randomIntEnd.'4';
            $this->channels['秀吧-金山'] = $xiu8kss;

//            $memes[] = 'meme-uc##402907'.$randomIntEnd.'1';
//            $memes[] = 'meme-uc##402907'.$randomIntEnd.'2';
//            $memes[] = 'meme-uc##402907'.$randomIntEnd.'3';
//            $memes[] = 'meme-uc##402907'.$randomIntEnd.'4';
//            $this->channels['么么-UC'] = $memes;

            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'5';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'6';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'7';
            $ewqoks[] = 'ewqok-dl##245062'.$randomIntEnd.'8';
            $this->channels['什么鬼-帝联'] = $ewqoks;

//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184d7aa';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184d7bb';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184d7cc';
//            $nagezanalis[] = 'yuntu-ali##9bfd6634-9ea6-4081-95e1-2ccee184d7dd';
//            $this->channels['云图-阿里'] = $nagezanalis;

//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184c7aa';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184c7bb';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184c7cc';
//            $nagezanwss[] = 'yuntu-ws##9bfd6634-9ea6-4081-95e1-2ccee184c7dd';
//            $this->channels['云图-网宿'] = $nagezanwss;

            $maobos[] = 'maobo-ali##3002133'.$randomIntEnd.'1';
            $maobos[] = 'maobo-ali##3002133'.$randomIntEnd.'2';
            $maobos[] = 'maobo-ali##3002133'.$randomIntEnd.'3';
            $maobos[] = 'maobo-ali##3002133'.$randomIntEnd.'4';
            $this->channels['猫播-阿里'] = $maobos;

//            $huoxings[] = 'huoxing-ks##29589111';
//            $huoxings[] = 'huoxing-ks##29589222';
//            $huoxings[] = 'huoxing-ks##29589333';
//            $huoxings[] = 'huoxing-ks##29589444';
//            $this->channels['火星-金山'] = $huoxings;

            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'a';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'b';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'c';
            $imis[] = 'imi-ws##33568497-1-08ca05825e12d522c74285dcb2b08'.$randomEnd.'d';
            $this->channels['艾米-网速'] = $imis;

//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432112_111';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432112_222';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432112_333';
//            $kdfs[] = 'kdf-ws##wCOXzowoOsmGe_11125_1486629432112_444';
//            $this->channels['看东方-网宿'] = $kdfs;

//            $rens[] = 'renren##201804241141222056111';
//            $rens[] = 'renren##201804241141222056222';
//            $rens[] = 'renren##201804241141222056333';
//            $rens[] = 'renren##201804241141222056444';
//            $this->channels['人人-金山'] = $rens;

//            $bohes[] = 'bohe-ws##735f725292624dfd98d117664bb02460';
//            $bohes[] = 'bohe-ws##3c53b37b83f042c6a96656a11dd496cf';
//            $bohes[] = 'bohe-ws##e1956de55d1e44c4bd2552216b11edc0';
//            $bohes[] = 'bohe-ws##bebf1bdf215e493cb4877832aa2c2c64';
//            $this->channels['薄荷-网易'] = $bohes;

//            $shangyuers[] = 'shangyuer-ws##81a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'5';
//            $shangyuers[] = 'shangyuer-ws##81a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'6';
//            $shangyuers[] = 'shangyuer-ws##81a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'7';
//            $shangyuers[] = 'shangyuer-ws##81a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'8';
//            $this->channels['上鱼-网宿'] = $shangyuers;

//            $shangyuers[] = 'shangyuer-pili##21a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'5';
//            $shangyuers[] = 'shangyuer-pili##21a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'6';
//            $shangyuers[] = 'shangyuer-pili##21a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'7';
//            $shangyuers[] = 'shangyuer-pili##21a9238b-e69e-4a7a-9ec8-1e0846bca'.$randomEnd.'8';
//            $this->channels['上鱼-七牛'] = $shangyuers;

            $dfms[] = 'wole-dl##7ad02f57e85eb9cf5975eb7008d'.$randomEnd.'a';
            $dfms[] = 'wole-dl##7ad02f57e85eb9cf5975eb7008d'.$randomEnd.'b';
            $dfms[] = 'wole-dl##7ad02f57e85eb9cf5975eb7008d'.$randomEnd.'c';
            $dfms[] = 'wole-dl##7ad02f57e85eb9cf5975eb7008d'.$randomEnd.'d';
            $this->channels['我乐-帝联'] = $dfms;

//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'a';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'b';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'c';
//            $wfms[] = 'wole-ws##5ad02f57e85eb9cf5975eb7008d'.$randomEnd.'d';
//            $this->channels['我乐-网宿'] = $wfms;

//            $memes[] = 'meme-ali##40290611';
//            $memes[] = 'meme-ali##40290622';
//            $memes[] = 'meme-ali##40290633';
//            $memes[] = 'meme-ali##40290644';
//            $this->channels['么么-阿里'] = $memes;

//            $sb126s[] = 'sb126-ws##735f725292624dfd98d117664bb02'.$randomEnd.'1';
//            $sb126s[] = 'sb126-ws##3c53b37b83f042c6a96656a11dd49'.$randomEnd.'2';
//            $sb126s[] = 'sb126-ws##e1956de55d1e44c4bd2552216b11e'.$randomEnd.'3';
//            $sb126s[] = 'sb126-ws##bebf1bdf215e493cb4877832aa2c2'.$randomEnd.'4';
//            $this->channels['随便-网易'] = $sb126s;

//            $lesparks[] = "lala-uc##67fgeiii5sbcf0w4p6mbpehg9rzsm'.$randomEnd.'a";
//            $lesparks[] = "lala-uc##67fgeiii5sbcf0w4p6mbpehg9rzsm'.$randomEnd.'b";
//            $lesparks[] = "lala-uc##67fgeiii5sbcf0w4p6mbpehg9rzsm'.$randomEnd.'c";
//            $lesparks[] = "lala-uc##67fgeiii5sbcf0w4p6mbpehg9rzsm'.$randomEnd.'d";
//            $this->channels['拉拉-UC'] = $lesparks;

//            $whyal[] = 'why-al##whycd'.$randomIntEnd.'1';
//            $whyal[] = 'why-al##whycd'.$randomIntEnd.'2';
//            $whyal[] = 'why-al##whycd'.$randomIntEnd.'3';
//            $whyal[] = 'why-al##whycd'.$randomIntEnd.'4';
//            $this->channels['文化云-阿里'] = $whyal;
//
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'5';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'6';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'7';
//            $cjyal[] = 'cjy-al##jy-live'.$randomIntEnd.'8';
//            $this->channels['cjy-阿里'] = $cjyal;
//
//            $yicai[] = 'yicai-al##stream8230'.$randomIntEnd.'1';
//            $yicai[] = 'yicai-al##stream8230'.$randomIntEnd.'2';
//            $yicai[] = 'yicai-al##stream8230'.$randomIntEnd.'3';
//            $yicai[] = 'yicai-al##stream8230'.$randomIntEnd.'4';
//            $this->channels['yicai-阿里'] = $yicai;

            $ofweek[] = 'week-jomo##dewi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'a';
            $ofweek[] = 'week-jomo##dewi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'b';
            $ofweek[] = 'week-jomo##dewi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'c';
            $ofweek[] = 'week-jomo##dewi2j3uhqtox1tgbxm34yv7nljpp'.$randomEnd.'d';
            $this->channels['ofweek-jomo'] = $ofweek;

            $sobey[] = 'sobey-pili##8504643001'.$randomIntEnd.'1';
            $sobey[] = 'sobey-pili##8504643001'.$randomIntEnd.'2';
            $sobey[] = 'sobey-pili##8504643001'.$randomIntEnd.'3';
            $sobey[] = 'sobey-pili##8504643001'.$randomIntEnd.'4';
            $this->channels['sobey-pili'] = $sobey;
        } elseif (env('APP_NAME') == 'leqiuba') {

        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Custom')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->get();
        return view('manager.push.custom', ['ets' => $ets, 'channels' => $this->channels]);
    }

    public function created(Request $request)
    {
        if ($request->isMethod('post')
            && $request->has('input')
            && $request->has('channel')
            && $request->has('name')
        ) {
            $name = str_replace(' ', '-', $request->input('name'));
            $input = $request->input('input');

//            $channel = $request->input('channel');
            $channel = $request->input('channel');
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Custom')->where('created_at', '>', date_create('-24 hour'))->whereIn('status', [1, 2, -1])->inRandomOrder()->get();
            if ($ets->contains('channel', $channel)) {
                foreach ($this->channels as $ch) {
                    if (!$ets->contains('channel', $ch)) {
                        $channel = $ch;
                    }
                }
            }
            if (empty($channel)) {
                return back()->with(['error' => '没有可用的直播间咯']);
            }
            list($type, $roomId) = explode('##', $channel);
            $rtmp_url = '';
            $live_rtmp_url = '';
            $live_m3u8_url = '';
            switch ($type) {
                case 'renren': {
                    $rtmp_url = 'rtmp://ksy-uplive.renren.com/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://ksy-hls.renren.com/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://ksy-hls.renren.com/live/' . $roomId . '/index.m3u8';//播放m3u8地址
                    break;
                }
                case 'wole-dl': {
                    $rtmp_url = 'rtmp://dfms.xiuimg.com/vshow/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://dplay.xiuimg.com/vshow/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://dhls.xiuimg.com/vshow/' . $roomId . '/index.m3u8';//播放m3u8地址
                    break;
                }
                case 'wole-ws': {
                    $rtmp_url = 'rtmp://wfms.xiuimg.com/vshow/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://wplay.xiuimg.com/vshow/' . $roomId . '.flv';//播放rtmp地址
//                    $live_m3u8_url = 'http://whls.xiuimg.com/vshow/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'meme-ali': {
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/memeyule/' . $roomId . '?vhost=aliyun.memeyule.com';//获取rtmp地址
                    $live_rtmp_url = 'http://aliyun.memeyule.com/memeyule/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://aliyun.memeyule.com/memeyule/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'yuntu-ali': {
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/nagezan/' . $roomId . '?vhost=aliyun.nagezan.net';//获取rtmp地址
                    $live_rtmp_url = 'http://aliyun.nagezan.net/nagezan/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://aliyun.nagezan.net/nagezan/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'yuntu-ws': {
                    $rtmp_url = 'rtmp://push.live.nagezan.net/vod/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://pull.live.nagezan.net/vod/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pull-hls.live.nagezan.net/vod/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'maobo-ali': {
//                    $rtmp_url = 'rtmp://push.maobotv.com/maozhua/' . $roomId;//获取rtmp地址
//                    $live_rtmp_url = 'http://flv.maobotv.com/maozhua/' . $roomId . '.flv';//播放rtmp地址
//                    $live_m3u8_url = 'http://hls.maobotv.com/maozhua/' . $roomId . '/index.m3u8';//播放m3u8地址
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/live/'.$roomId.'?vhost=flv.maobotv.com';//获取rtmp地址
                    $live_rtmp_url = '';//播放rtmp地址
                    $live_m3u8_url = 'http://flv.maobotv.com/live/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'huoxing-ks': {
                    $rtmp_url = 'rtmp://kspush01.live.changbalive.com/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://hdlkspull01.live.changbalive.com/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://hkspull01.live.changbalive.com/live/' . $roomId . '/index.m3u8';//播放m3u8地址
                    break;
                }
                case 'imi-ws': {
                    $rtmp_url = 'rtmp://wsmu.imifun.com/s2/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = '';//播放rtmp地址
                    $live_m3u8_url = 'http://wsmd.imifun.com/s2/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'kdf-ws': {
                    $rtmp_url = 'rtmp://kdf.wslive.cibnlive.com/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://kdf.wsflv.cibnlive.com/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://kdf.wshls.cibnlive.com/live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'bohe-ws': {
                    $rtmp_url = 'rtmp://pbohetec2.live.126.net/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://flvbohetec2.live.126.net/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pullhlsbohetec2.live.126.net/live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'shangyuer-ws': {
                    $rtmp_url = 'rtmp://push.live.shangyuer.com/vod/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://pull.live.shangyuer.com/vod/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pull-hls.live.shangyuer.com/vod/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'shangyuer-pili': {
                    $rtmp_url = 'rtmp://pili-publish.shangyuer.com/vodd/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://pili-live-hdl.shangyuer.com/vodd/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pili-live-hls.shangyuer.com/vodd/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'xiu8-ws': {
                    $rtmp_url = 'rtmp://upvoid.xiu8.com/liverepeater/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://void.xiu8.com/liverepeater/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://void.xiu8.com/liverepeater/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'xiu8-ks': {
                    $rtmp_url = 'rtmp://uplive.xiu8.com/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'rtmp://rtmplive.xiu8.com/live/' . $roomId;//播放rtmp地址
                    $live_m3u8_url = 'http://hlslive.xiu8.com/live/' . $roomId . '/index.m3u8';//播放m3u8地址
                    break;
                }
                case 'stager-ws': {
                    $rtmp_url = 'rtmp://push.stager.jp.8686c.com/stager/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://pull.stager.jp.8686c.com/stager/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pull.stager.jp.8686c.com/stager/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'meme-uc': {
                    $rtmp_url = 'rtmp://publish.demo.zego.im/livedemo/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'rtmp://rtmp.demo.zego.im/livedemo/' . $roomId;//播放rtmp地址
                    $live_m3u8_url = 'http://hls.demo.zego.im/livedemo/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'ewqok-dl': {
                    $rtmp_url = 'rtmp://push.ewqok.cn/888/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'rtmp://live.ewqok.cn/888/' . $roomId;//播放rtmp地址
                    $live_m3u8_url = 'http://hls.live.ewqok.cn/888/' . $roomId . '/index.m3u8';//播放m3u8地址
                    break;
                }
                case 'sb126-ws': {
                    $rtmp_url = 'rtmp://pbcf4cbdf.live.126.net/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://flvbcf4cbdf.live.126.net/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pullhlsbcf4cbdf.live.126.net/live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'lala-uc': {
                    $rtmp_url = 'rtmp://push.lespark.cn/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://hls.lespark.cn/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pull.lespark.cn/live/' . $roomId . '/playlist.m3u8';//播放m3u8地址
                    break;
                }
                case 'why-al': {
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/wenhuayun/' . $roomId . '?vhost=live.wenhuayun.cn';//获取rtmp地址
                    $live_rtmp_url = 'http://live.wenhuayun.cn/wenhuayun/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://live.wenhuayun.cn/wenhuayun/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'cjy-al': {
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/live/' . $roomId . '?vhost=cjy.pier39.cn';//获取rtmp地址
                    $live_rtmp_url = 'http://cjy.pier39.cn/live/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://cjy.pier39.cn/live/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'yicai-al': {
                    $rtmp_url = 'rtmp://video-center.alivecdn.com/beijing/' . $roomId . '?vhost=t1.livecdn.yicai.com';//获取rtmp地址
                    $live_rtmp_url = 'http://t1.livecdn.yicai.com/beijing/' . $roomId . '.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://t1.livecdn.yicai.com/beijing/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'week-jomo': {
                    $rtmp_url = 'rtmp://push.ofweek.com/live/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://play.ofweek.com/live/' . $roomId.'.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://play.ofweek.com/live/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
                case 'sobey-pili': {
                    $rtmp_url = 'rtmp://pili-publish.livechangs.sobeycache.com/livechangs/' . $roomId;//获取rtmp地址
                    $live_rtmp_url = 'http://pili-live-hdl.livechangs.sobeycache.com/livechangs/' . $roomId.'.flv';//播放rtmp地址
                    $live_m3u8_url = 'http://pili-live-hls.livechangs.sobeycache.com/livechangs/' . $roomId . '.m3u8';//播放m3u8地址
                    break;
                }
            }

            if (!empty($rtmp_url)) {
                $fontsize = $request->input('fontsize', 18);
                $watermark = $request->input('watermark', '');
                $location = $request->input('location', 'top');
                $has_logo = $request->input('logo');
                $logo_position = $request->input('logo_position', '');
                $logo_text = $request->input('logo_text', '');
                $referer = $request->input('referer', '');
                $header1 = $request->input('header1', '');
                $header2 = $request->input('header2', '');
                $header3 = $request->input('header3', '');
                $size = $request->input('size', 'md');
                $exec = $this->generateFfmpegCmd($input, $rtmp_url, $watermark, $fontsize, $location, $has_logo, $size, $referer, $header1, $header2, $header3, $logo_position, $logo_text);
                Log::info($exec);
                shell_exec($exec);
                $pid = exec('pgrep -f "' . explode('?', $rtmp_url)[0] . '"');
                if (!empty($pid) && is_numeric($pid) && $pid > 0) {
                    $et = new EncodeTask();
                    $et->name = $name;
                    $et->channel = $channel;
                    $et->input = $input;
                    $et->rtmp = $rtmp_url;
                    $et->exec = $exec;
                    $et->pid = $pid;
                    $et->out = $live_rtmp_url . "\n" . $live_m3u8_url;
                    $et->from = env('APP_NAME');
                    $et->to = 'Custom';
                    $et->status = 1;
                    $et->save();
                }
            }

        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $this->stopPush($id);
        return back();
    }

    public function repeat(Request $request, $id)
    {
        $this->repeatPush($id);
        return back();
    }


    public function test()
    {
//        list($roomName, $roomId, $token) = explode('##', '老铁扣波666##10061563##3c4068b47d194772');
//        $rtmp_json = $this->getRtmp($token);
//        $fms_val = $rtmp_json['fms_val'];
//        $rtmp_id = array_first(array_keys($rtmp_json['list']));
//        $rtmp_url = array_first(array_values($rtmp_json['list']));
//        if ($this->startLive($token, $fms_val, $rtmp_id)) {//开播成功
//            $flvUrl = $this->getFlv($roomId);
//            $m3u8Url = $this->getM3u8($roomId);
//            dump($rtmp_url);
//            dump($flvUrl);
//            dump($m3u8Url);
//        }
    }
}
