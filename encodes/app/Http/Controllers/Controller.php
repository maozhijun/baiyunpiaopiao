<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * 生成转码推流命令
     * @param string $input_uri 源地址
     * @param string $rtmp_url 推流地址
     * @param string $watermark 水印文案
     * @param int $fontsize 水印字体
     * @param string $location 水印位置
     * @param bool $has_logo 是否有logo
     * @param string $referer 源Referer
     * @param string $header1 源Http Header 1
     * @param string $header2 源Http Header 2
     * @param string $header3 源Http Header 3
     * @return string 返回转码推流命令
     */
    protected function generateFfmpegCmd($input_uri = '',
                                         $rtmp_url = '',
                                         $watermark = '',
                                         $fontsize = 20,
                                         $location = 'top',
                                         $has_logo = '1',
                                         $referer = '',
                                         $header1 = '',
                                         $header2 = '',
                                         $header3 = '')
    {
        if (empty($input_uri) || empty($rtmp_url)) {
            return '';
        }
        $execs = ['nohup /usr/bin/ffmpeg -re'];
        if (starts_with($input_uri, 'http')) {
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
        $execs[] = '-c:v h264_cuvid -i "' . $input_uri . '"';
        $execs[] = '-vcodec h264_nvenc -acodec aac';

        if (!empty($watermark)) {
            $logo_code = '';
            if (!empty($has_logo)) {
                $logo_code = 'drawbox=color=black:x=iw-188:y=23:width=170:height=30:t=fill,';
            }
            if ($location == 'top') {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=0:color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=' . ($fontsize / 2) . '"';
            } elseif ($location = 'bottom') {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=(ih-' . ($fontsize * 2) . '):color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=(h-' . ($fontsize + $fontsize / 2) . ')"';
            } else {
                $vf = '-vf "scale=800:480,format=pix_fmts=yuv420p,' . $logo_code . 'drawbox=y=0:color=black@0.4:width=iw:height=' . ($fontsize * 2) . ':t=fill,drawtext=font=\'WenQuanYi Zen Hei\':text=\'' . $watermark . '\':fontcolor=white:fontsize=' . $fontsize . ':x=(w-tw)/2:y=' . ($fontsize / 2) . '"';
            }
            $execs[] = $vf;
        }

        $execs[] = '-b:v:0 1200k -pixel_format yuv420p -s 800x480 -f flv "' . $rtmp_url . '"';

        $date = date('YmdHis');
        $execs[] = ">> /tmp/ffmpeg-$date.log &";
        $exec = join($execs, ' ');
        return $exec;
    }
}
