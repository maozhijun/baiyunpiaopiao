<?php
/**
 * Created by PhpStorm.
 * User: maozhijun
 * Date: 2018/7/9
 * Time: 18:01
 */

namespace App\Http\Controllers;


trait ChushouStream
{
    private function curl($param)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $param['url']);
        if ($param['method'] == 'post') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $param['param']);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //跳过证书检查
        curl_setopt($ch, CURLOPT_ENCODING, 'br, gzip, deflate');
        curl_setopt($ch, CURLOPT_COOKIE, $param['cookie']);
        curl_setopt($ch, CURLOPT_USERAGENT, $param['ua']);
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        return $response;
    }

    private function getChushouStream($param)
    {
        $response = $this->curl($param);
//        dump($response);
        $json = json_decode($response, true);
//        dump($json);
        if (isset($json) && isset($json['data']) && isset($json['data']['pushUrl'])) {
            return $json['data']['pushUrl'];
        } else {
            return null;
        }
    }

    private function choushouOnline($param)
    {
        $response = $this->curl($param);
    }

    private function getChushouPlay($param)
    {
        $response = $this->curl($param);
//        dump($response);
        preg_match('#(playUrl=")(.*?)(";)#', $response, $matches);
        return $matches[2];
    }

    private function getChushouFlvPlay($param)
    {
        $response = $this->curl($param);
//        dump($response);
        $json = json_decode($response, true);
        if (isset($json) && isset($json['data'])) {
            $urls = $json['data'];
            $flv = '';
            foreach ($urls as $url) {
//                dump($url['protocol'] . ':' . $url['shdPlayUrl']);
                if ($url['protocol'] == 2) {
                    $flv = $url['shdPlayUrl'];
                }
            }
            return $flv;
        } else {
            return null;
        }
    }

    private function choushouOffline($param)
    {
        $response = $this->curl($param);
    }
}