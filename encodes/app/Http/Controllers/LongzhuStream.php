<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/9
 * Time: 18:01
 */

namespace App\Http\Controllers;


trait LongzhuStream
{
    private function startLongZhuLive($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://liveapi.plu.cn/liveapp/startlive?address=%E5%B9%BF%E5%BB%BA%E5%A4%A7%E5%8E%A6&bitrate=1500&device=2&fh=768&fw=432&gameId=119&latitude=23.143591&liveSourceType=1&liveStreamType=12&longitude=113.336060&model=iPhone%206S&packageId=3&title=%E6%83%8A%E5%91%86%EF%BC%8C%E8%BF%99%E4%B8%AA%E4%BA%BA%E5%B1%85%E7%84%B6%E2%8B%AF%E2%8B%AF&version=3.3.2&watchDirections=portrait');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/startlive?address=&bitrate=800&bundleId=com.longzhu.tga&device=2&fh=640&fw=360&gameId=119&latitude=&liveSourceType=1&liveStreamType=10&longitude=&model=iPhone%206S&p1uuid=&packageId=1&title=&version=4.6.5&watchDirections=portrait');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['result']) && $json['result'] == 1) {
            return $json;
        } else {
            return null;
        }
    }

    private function getLongZhuUpStreamUrl($token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://star.api.plu.cn/live/GetUpStreamUrl?device=2&packageId=3&streamType=0&version=3.3.2');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/startlive?address=&bitrate=800&bundleId=com.longzhu.tga&device=2&fh=640&fw=360&gameId=119&latitude=&liveSourceType=1&liveStreamType=10&longitude=&model=iPhone%206S&p1uuid=&packageId=1&title=&version=4.6.5&watchDirections=portrait');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['upStreamLines'])) {
            return $json['upStreamLines'];
        } else {
            return null;
        }
    }

    private function closeLongZhuLive($token)
    {
        $ch = curl_init();
        //http://liveapi.plu.cn/liveapp/endlive?device=2&liveSourceType=1&packageId=3&reason=101&reasonDesp=iOS%3A%3ALongzhu%5B1.0%5D%3A%3AUserClosed&version=3.3.2
        curl_setopt($ch, CURLOPT_URL, 'http://liveapi.plu.cn/liveapp/endlive?device=2&liveSourceType=1&packageId=3&reason=101&reasonDesp=iOS%3A%3ALongzhu%5B1.0%5D%3A%3AUserClosed&version=3.3.2');
//        curl_setopt($ch, CURLOPT_URL, 'https://liveapi.longzhu.com/liveapp/endlive?bundleId=com.longzhu.tga&device=2&liveSourceType=1&p1uuid=&packageId=1&reason=101&reasonDesp=iOS::Qiniu[2.0]::UserClosed&version=4.6.5');
        curl_setopt($ch, CURLOPT_COOKIE, "p1u_id=$token;");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip, deflate');
        curl_setopt($ch, CURLOPT_USERAGENT, "Push/3.3.2 (iPhone; iOS 11.4; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['result']) && $json['result'] == 1) {
            return $json;
        } else {
            return null;
        }
    }

    private function getLongZhuLiveUrl($roomId)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://livestream.longzhu.com/live/GetLivePlayUrl?appId=5001&bundleId=com.longzhu.tga&device=2&p1uuid=&packageId=1&roomId=$roomId&version=4.6.5");
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "longzhu/4.6.5 (iPhone; iOS 11.2.6; Scale/2.00)");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (!empty($json['playLines']) && !empty(array_first($json['playLines'])['urls'])) {
            return array_first($json['playLines'])['urls'];
        } else {
            return null;
        }
    }
}