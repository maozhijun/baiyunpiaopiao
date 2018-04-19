<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{

    protected $sizes = [
        'md' => ['name' => '540p', 'w' => 900, 'h' => 540, 'factor' => 1.125],
        'sd' => ['name' => '480p', 'w' => 800, 'h' => 480, 'factor' => 1],
        'hd' => ['name' => '720p', 'w' => 1200, 'h' => 720, 'factor' => 1.5],
        'hhd' => ['name' => '1080p', 'w' => 1800, 'h' => 1080, 'factor' => 2.25],
    ];

    protected $logo_position = [
        'right' => [
            'name' => '右上',
            'x' => 620,
            'y' => 20,
            'w' => 170,
            'h' => 30
        ],
        'left' => [
            'name' => '左上',
            'x' => 20,
            'y' => 20,
            'w' => 170,
            'h' => 30
        ]
    ];

    protected $fontsize = 18;

    public function __construct()
    {
        if (env('APP_NAME') == 'good') {
            View::share('watermark', '足球专家微信：bet6879，篮球专家微信：bet8679a');
            View::share('logo_text', '加微信：bet6879');
        } elseif (env('APP_NAME') == 'aikq') {
            View::share('watermark', '加微信【kanqiu616】进群聊球，美女福利+大神免费推单，每天轻松收米！');
            View::share('logo_text', '加微信：kanqiu616');
        } elseif (env('APP_NAME') == 'leqiuba') {
            View::share('watermark', '看球 聊球 微信群，进群加微信：zhibo556 红包福利天天有！');
            View::share('logo_text', '加微信：zhibo556');
        } else {
            View::share('watermark', '');
            View::share('logo_text', '');
        }
        View::share('fontsize', $this->fontsize);
        View::share('sizes', $this->sizes);
        View::share('logo_position', $this->logo_position);
    }

    /**
     * 生成转码推流命令
     * @param string $input_uri 源地址
     * @param string $rtmp_url 推流地址
     * @param string $watermark 水印文案
     * @param int $fontsize 水印字体
     * @param string $location 水印位置
     * @param bool|string $has_logo 是否有logo
     * @param string $size 分辨率
     * @param string $referer 源Referer
     * @param string $header1 源Http Header 1
     * @param string $header2 源Http Header 2
     * @param string $header3 源Http Header 3
     * @param string $logo_position
     * @param string $logo_text
     * @return string 返回转码推流命令
     */
    protected function generateFfmpegCmd($input_uri = '',
                                         $rtmp_url = '',
                                         $watermark = '',
                                         $fontsize = 18,
                                         $location = 'top',
                                         $has_logo = '1',
                                         $size = 'md',
                                         $referer = '',
                                         $header1 = '',
                                         $header2 = '',
                                         $header3 = '',
                                         $logo_position = 'right',
                                         $logo_text = '')
    {
        if (empty($input_uri) || empty($rtmp_url)) {
            return '';
        }
        $size = $this->sizes[$size];
        if (empty($size)) {
            $size = $this->sizes['md'];
        }
        $fontsize *= $size['factor'];
        $lp = $this->logo_position[$logo_position];
        $lp = [
            'x' => $lp['x'] * $size['factor'],
            'y' => $lp['y'] * $size['factor'],
            'w' => $lp['w'] * $size['factor'],
            'h' => $lp['h'] * $size['factor']
        ];
        $execs = ['nohup /usr/bin/ffmpeg'];
        if (starts_with($input_uri, 'http')) {
            if (starts_with($input_uri, 'http://live.5club.cctv.cn')) {
                $execs[] = '-user_agent "cctv_app_phone_cctv5"';
                $execs[] = '-headers "UID:4044A747-5BF0-4465-A894-99E2FEBAC4C1"';
            } elseif (starts_with($input_uri, 'http://gmcllc.de')) {
                $execs[] = '-user_agent "BLUEIOS"';
                $execs[] = '-headers "Range: bytes=0-"';
                $execs[] = '-headers "Icy-MetaData: 1"';
            } else {
                $execs[] = '-user_agent "Mozilla / 5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit / 537.36 (KHTML, like Gecko) Chrome / 63.0.3239.84 Safari / 537.36"';
                if (!empty($referer)) {
                    $execs[] = '-headers "Referer:' . $referer . '"';
                }
                if (!empty($header1)) {
                    $execs[] = '-headers "' . $header1 . '"';
                }
                if (!empty($header2)) {
                    $execs[] = '-headers "' . $header2 . '"';
                }
                if (!empty($header3)) {
                    $execs[] = '-headers "' . $header3 . '"';
                }
            }
        }
        $execs[] = '-c:v h264_cuvid -i "' . $input_uri . '"';
        $execs[] = '-vcodec h264_nvenc -acodec aac';

        if (!empty($watermark)) {
            $logo_code = '';
            if (!empty($has_logo)) {
//                $logo_code = 'drawbox=color=black:x=iw-(180*' . $size['factor'] . '):y=(20*' . $size['factor'] . '):width=(170*' . $size['factor'] . '):height=(30*' . $size['factor'] . '):t=fill,';
                $logo_code = 'drawbox=color=black:x=' . $lp['x'] . ':y=' . $lp['y'] . ':width=' . $lp['w'] . ':height=' . $lp['h'] . ':t=fill,';
                if (!empty($logo_text)) {
//                $logo_code .= 'drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $logo_text . '\':fontcolor=0xf7f14e:fontsize=' . $fontsize . ':x=(w-(180*' . $size['factor'] . ')+(170*' . $size['factor'] . '-tw)/2):y=(20*' . $size['factor'] . ')+(((30*' . $size['factor'] . ')-' . $fontsize . ')/2),';
                    $logo_code .= 'drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $logo_text . '\':fontcolor=0xf7f14e:fontsize=' . $fontsize . ':x=(' . $lp['x'] . '+(' . $lp['w'] . '-tw)/2):y=(' . $lp['y'] . '+(' . $lp['h'] . '-' . $fontsize . ')/2),';
                }
            }
            if ($location == 'top') {
                $vf = '-vf "scale=' . $size['w'] . ':' . $size['h'] . ',format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=0:color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=' . ($fontsize / 2) . '"';
            } elseif ($location = 'bottom') {
                $vf = '-vf "scale=' . $size['w'] . ':' . $size['h'] . ',format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=(ih-' . ($fontsize * 2) . '):color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=(h-' . ($fontsize + $fontsize / 2) . ')"';
            } else {
                $vf = '-vf "scale=' . $size['w'] . ':' . $size['h'] . ',format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=0:color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=' . ($fontsize / 2) . '"';
            }
            $execs[] = $vf;
        }

        $execs[] = '-b:v:0 ' . (1200 * $size['factor']) . 'k -pixel_format yuv420p -s ' . $size['w'] . 'x' . $size['h'] . ' -f flv "' . $rtmp_url . '"';

        $date = date('YmdHis');
        $execs[] = ">> /tmp/ffmpeg-$date.log &";
        $exec = join($execs, ' ');
        return $exec;
    }
}
