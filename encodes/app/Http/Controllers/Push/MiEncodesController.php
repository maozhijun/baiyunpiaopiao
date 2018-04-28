<?php

namespace App\Http\Controllers\Push;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MiEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {

        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '小米直播1##cid201804241141222057579';
            $this->channels[] = '小米直播2##cid201804241142222057579';
            $this->channels[] = '小米直播3##cid201804241143222057579';
            $this->channels[] = '小米直播4##cid201804241144222057579';
            $this->channels[] = '小米直播5##cid201804241145222057579';
            $this->channels[] = '小米直播6##cid201804241146222057579';
            $this->channels[] = '小米直播7##cid201804241147222057579';
            $this->channels[] = '小米直播8##cid201804241148222057579';
        } elseif (env('APP_NAME') == 'aikq1') {
            $this->channels[] = '小米直播1##cid201804241141222057599';
            $this->channels[] = '小米直播2##cid201804241142222057599';
            $this->channels[] = '小米直播3##cid201804241143222057599';
            $this->channels[] = '小米直播4##cid201804241144222057599';
            $this->channels[] = '小米直播5##cid201804241145222057599';
            $this->channels[] = '小米直播6##cid201804241146222057599';
            $this->channels[] = '小米直播7##cid201804241147222057599';
            $this->channels[] = '小米直播8##cid201804241148222057599';
        } elseif (env('APP_NAME') == 'leqiuba') {
            $this->channels[] = '小米直播1##cid201803241141222057579';
            $this->channels[] = '小米直播2##cid201803241142222057579';
            $this->channels[] = '小米直播3##cid201803241143222057579';
            $this->channels[] = '小米直播4##cid201803241144222057579';
            $this->channels[] = '小米直播5##cid201803241145222057579';
            $this->channels[] = '小米直播6##cid201803241146222057579';
            $this->channels[] = '小米直播7##cid201803241147222057579';
            $this->channels[] = '小米直播8##cid201803241148222057579';
        }
    }

    public function index(Request $request)
    {
        $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Mi')->where('status', '>=', 1)->get();
        return view('manager.push.mi', ['ets' => $ets, 'channels' => $this->channels]);
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

            $channel = $request->input('channel');
            $ets = EncodeTask::query()->where('from', env('APP_NAME'))->where('to', 'Mi')->where('status', '>=', 1)->inRandomOrder()->get();
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

            list($roomName, $roomId) = explode('##', $channel);
            $rtmp_url = 'rtmp://r1.zb.mi.com/live/' . $roomId;//获取rtmp地址
            $live_flv_url = 'http://v2.zb.mi.com/live/' . explode('?', $roomId)[0] . '.flv';//flv地址
            $live_m3u8_url = 'http://hls.zb.mi.com/live/' . explode('?', $roomId)[0] . '/playlist.m3u8';//m3u8地址

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
            if (!empty($pid)) {
                $et = new EncodeTask();
                $et->name = $name;
                $et->channel = $channel;
                $et->input = $input;
                $et->rtmp = $rtmp_url;
                $et->out = $live_flv_url . "\n" . $live_m3u8_url;
                $et->from = env('APP_NAME');
                $et->to = 'Mi';
                $et->status = 1;
                $et->save();
            }
        }
        return back();
    }

    public function stop(Request $request, $id)
    {
        $et = EncodeTask::query()->find($id);
        if (isset($et)) {
            $pid = exec('pgrep -f "' . explode('?', $et->rtmp)[0] . '"');
            if (!empty($pid)) {
                exec('kill -9 ' . $pid, $output_array, $return_var);
                if ($return_var == 0) {
                    $et->status = 0;
                    $et->stop_at = date_create();
                    $et->save();
                }
            } else {
                $et->status = 0;
                $et->stop_at = date_create();
                $et->save();
            }
        }
        return back();
    }

    public function test()
    {
        $timestamp = time() + 10800;
        $random = random_int(100, 999);
        $key = 'ipmcyes37ul0';
        $base_url = 'http://hls2.cntv.myalicdn.com';
//        $base_flv_url = 'http://flv2.cntv.myalicdn.com';
//        $base_rtmp_url = 'rtmp://rtmp2.cntv.myalicdn.com';

        $host = 'hls2.cntv.myalicdn.com';
        $rtmp_path = '/cntvlive/cctv5plusmd';
        $astring = "$rtmp_path-$timestamp-$random-0-$key";
        $auth_key = "$timestamp-$random-0-" . md5($astring);
        $output_rtmp = "rtmp://video-center.alivecdn.com$rtmp_path?vhost=$host&auth_key=" . $auth_key;

        $m3u8_path = '/cntvlive/cctv5plusmd.m3u8';
        $astring = "$m3u8_path-$timestamp-$random-0-$key";
        $auth_key = "$timestamp-$random-0-" . md5($astring);
        $output_m3u8 = "$base_url$m3u8_path?auth_key=" . $auth_key;

        $flv_path = '/cntvlive/cctv5plusmd.flv';
        $astring = "$flv_path-$timestamp-$random-0-$key";
        $auth_key = "$timestamp-$random-0-" . md5($astring);
        $output_flv = "$base_url$flv_path?auth_key=" . $auth_key;

//        $rtmp_path = '/cntvlive/cctv5plusmd';
//        $astring = "$rtmp_path-$timestamp-$random-0-$key";
//        $auth_key = "$timestamp-$random-0-" . md5($astring);
//        $output_rtmp = "$base_url$rtmp_path?auth_key=" . $auth_key;
        echo $output_rtmp . '<br>' . $output_m3u8 . '<br>' . $output_flv;


//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'http://js.player.cntv.cn/creator/hdsLive_standard2.js');
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
//        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
//        $response = curl_exec($ch);
//        if ($error = curl_error($ch)) {
//            die($error);
//        }
//        curl_close($ch);
//        $response = str_replace("\x00", '', $response);
//        $lines = explode("\n", $response);
//        $keyString = '';
//        $html5Aauth = '';
//        foreach ($lines as $line) {
//            if (str_contains($line, 'html5Aauth =')) {
//                $html5Aauth = $line;
//            }
//            if (str_contains($line, 'function setHtml5AliNewUrl')) {
//                $line = str_replace("ChannelID", '"cctv5"', $line);
////                $line = str_replace("ChannelID", '"cctv5plus"', $line);
//                $line = str_replace(";", ";\n", $line);
//                $line = str_replace("{", "{\n", $line);
//                $line = str_replace("}", "}\n", $line);
//                $keyString = $line;
//            }
//        }
//
//        if (!empty($keyString)) {
//            $scripts = [];
//            $scripts[] = '<script>!function(a){"use strict";function b(a,b){var c=(65535&a)+(65535&b),d=(a>>16)+(b>>16)+(c>>16);return d<<16|65535&c}function c(a,b){return a<<b|a>>>32-b}function d(a,d,e,f,g,h){return b(c(b(b(d,a),b(f,h)),g),e)}function e(a,b,c,e,f,g,h){return d(b&c|~b&e,a,b,f,g,h)}function f(a,b,c,e,f,g,h){return d(b&e|c&~e,a,b,f,g,h)}function g(a,b,c,e,f,g,h){return d(b^c^e,a,b,f,g,h)}function h(a,b,c,e,f,g,h){return d(c^(b|~e),a,b,f,g,h)}function i(a,c){a[c>>5]|=128<<c%32,a[(c+64>>>9<<4)+14]=c;var d,i,j,k,l,m=1732584193,n=-271733879,o=-1732584194,p=271733878;for(d=0;d<a.length;d+=16)i=m,j=n,k=o,l=p,m=e(m,n,o,p,a[d],7,-680876936),p=e(p,m,n,o,a[d+1],12,-389564586),o=e(o,p,m,n,a[d+2],17,606105819),n=e(n,o,p,m,a[d+3],22,-1044525330),m=e(m,n,o,p,a[d+4],7,-176418897),p=e(p,m,n,o,a[d+5],12,1200080426),o=e(o,p,m,n,a[d+6],17,-1473231341),n=e(n,o,p,m,a[d+7],22,-45705983),m=e(m,n,o,p,a[d+8],7,1770035416),p=e(p,m,n,o,a[d+9],12,-1958414417),o=e(o,p,m,n,a[d+10],17,-42063),n=e(n,o,p,m,a[d+11],22,-1990404162),m=e(m,n,o,p,a[d+12],7,1804603682),p=e(p,m,n,o,a[d+13],12,-40341101),o=e(o,p,m,n,a[d+14],17,-1502002290),n=e(n,o,p,m,a[d+15],22,1236535329),m=f(m,n,o,p,a[d+1],5,-165796510),p=f(p,m,n,o,a[d+6],9,-1069501632),o=f(o,p,m,n,a[d+11],14,643717713),n=f(n,o,p,m,a[d],20,-373897302),m=f(m,n,o,p,a[d+5],5,-701558691),p=f(p,m,n,o,a[d+10],9,38016083),o=f(o,p,m,n,a[d+15],14,-660478335),n=f(n,o,p,m,a[d+4],20,-405537848),m=f(m,n,o,p,a[d+9],5,568446438),p=f(p,m,n,o,a[d+14],9,-1019803690),o=f(o,p,m,n,a[d+3],14,-187363961),n=f(n,o,p,m,a[d+8],20,1163531501),m=f(m,n,o,p,a[d+13],5,-1444681467),p=f(p,m,n,o,a[d+2],9,-51403784),o=f(o,p,m,n,a[d+7],14,1735328473),n=f(n,o,p,m,a[d+12],20,-1926607734),m=g(m,n,o,p,a[d+5],4,-378558),p=g(p,m,n,o,a[d+8],11,-2022574463),o=g(o,p,m,n,a[d+11],16,1839030562),n=g(n,o,p,m,a[d+14],23,-35309556),m=g(m,n,o,p,a[d+1],4,-1530992060),p=g(p,m,n,o,a[d+4],11,1272893353),o=g(o,p,m,n,a[d+7],16,-155497632),n=g(n,o,p,m,a[d+10],23,-1094730640),m=g(m,n,o,p,a[d+13],4,681279174),p=g(p,m,n,o,a[d],11,-358537222),o=g(o,p,m,n,a[d+3],16,-722521979),n=g(n,o,p,m,a[d+6],23,76029189),m=g(m,n,o,p,a[d+9],4,-640364487),p=g(p,m,n,o,a[d+12],11,-421815835),o=g(o,p,m,n,a[d+15],16,530742520),n=g(n,o,p,m,a[d+2],23,-995338651),m=h(m,n,o,p,a[d],6,-198630844),p=h(p,m,n,o,a[d+7],10,1126891415),o=h(o,p,m,n,a[d+14],15,-1416354905),n=h(n,o,p,m,a[d+5],21,-57434055),m=h(m,n,o,p,a[d+12],6,1700485571),p=h(p,m,n,o,a[d+3],10,-1894986606),o=h(o,p,m,n,a[d+10],15,-1051523),n=h(n,o,p,m,a[d+1],21,-2054922799),m=h(m,n,o,p,a[d+8],6,1873313359),p=h(p,m,n,o,a[d+15],10,-30611744),o=h(o,p,m,n,a[d+6],15,-1560198380),n=h(n,o,p,m,a[d+13],21,1309151649),m=h(m,n,o,p,a[d+4],6,-145523070),p=h(p,m,n,o,a[d+11],10,-1120210379),o=h(o,p,m,n,a[d+2],15,718787259),n=h(n,o,p,m,a[d+9],21,-343485551),m=b(m,i),n=b(n,j),o=b(o,k),p=b(p,l);return[m,n,o,p]}function j(a){var b,c="";for(b=0;b<32*a.length;b+=8)c+=String.fromCharCode(a[b>>5]>>>b%32&255);return c}function k(a){var b,c=[];for(c[(a.length>>2)-1]=void 0,b=0;b<c.length;b+=1)c[b]=0;for(b=0;b<8*a.length;b+=8)c[b>>5]|=(255&a.charCodeAt(b/8))<<b%32;return c}function l(a){return j(i(k(a),8*a.length))}function m(a,b){var c,d,e=k(a),f=[],g=[];for(f[15]=g[15]=void 0,e.length>16&&(e=i(e,8*a.length)),c=0;16>c;c+=1)f[c]=909522486^e[c],g[c]=1549556828^e[c];return d=i(f.concat(k(b)),512+8*b.length),j(i(g.concat(d),640))}function n(a){var b,c,d="0123456789abcdef",e="";for(c=0;c<a.length;c+=1)b=a.charCodeAt(c),e+=d.charAt(b>>>4&15)+d.charAt(15&b);return e}function o(a){return unescape(encodeURIComponent(a))}function p(a){return l(o(a))}function q(a){return n(p(a))}function r(a,b){return m(o(a),o(b))}function s(a,b){return n(r(a,b))}function t(a,b,c){return b?c?r(b,a):s(b,a):c?p(a):q(a)}"function"==typeof define&&define.amd?define(function(){return t}):a.setH5Str=t}(this);';
//            $scripts[] = $html5Aauth;
//            $lines = explode("\n", $keyString);
//            foreach ($lines as $line) {
//                if (str_contains($line, 'var ')|| str_contains($line, 'html5Aauth+=')|| str_contains($line, 'hls_vod_url=')) {
//                    $scripts[] = $line;
//                }
//            }
//            $scripts[] = 'document.write(hls_vod_url)';
//            $scripts[] = '</script>';
//            $script = join("\n",$scripts);
//            echo $script;
//        }

        return '';
    }
}
