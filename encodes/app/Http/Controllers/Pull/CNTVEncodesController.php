<?php

namespace App\Http\Controllers\Pull;

use App\Http\Controllers\Controller as BaseController;
use App\Models\EncodeTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CNTVEncodesController extends BaseController
{
    private $channels = [];

    public function __construct()
    {
        parent::__construct();
        $this->middleware('filter')->except([]);
        if (env('APP_NAME') == 'good') {
        } elseif (env('APP_NAME') == 'aikq') {
            $this->channels[] = '云端直播0##vod_3183361';
            $this->channels[] = '云端直播1##vod_3183362';
            $this->channels[] = '云端直播2##vod_3183363';
            $this->channels[] = '云端直播3##vod_3183364';
            $this->channels[] = '云端直播4##vod_3183365';
            $this->channels[] = '云端直播5##vod_3183366';
            $this->channels[] = '云端直播6##vod_3183367';
            $this->channels[] = '云端直播7##vod_3183368';
            $this->channels[] = '云端直播8##vod_3183369';
            $this->channels[] = '云端直播9##vod_3183370';
        }
    }

    public function index(Request $request)
    {
        $lives = [
            ['name' => 'CCTV5', 'channel' => 'cctv5', 'desc' => 'CNTV'],
            ['name' => 'CCTV5+', 'channel' => 'cctv5plus', 'desc' => 'CNTV'],
            ['name' => '北京体育', 'channel' => 'btv6', 'desc' => 'CNTV'],
            ['name' => '五星体育', 'channel' => 'wa5', 'desc' => 'WA5'],
            ['name' => '风云足球', 'channel' => 'fyzq', 'desc' => '91'],
            ['name' => '劲爆体育', 'channel' => 'jbty', 'desc' => '91'],
            ['name' => '广东体育', 'channel' => 'gdty', 'desc' => '91'],
            ['name' => '广州竞赛', 'channel' => 'gzjs', 'desc' => '91'],
            ['name' => '深圳体育', 'channel' => 'szty', 'desc' => '91'],
            ['name' => '新视觉', 'channel' => 'xsj', 'desc' => '91'],
        ];
        $ets = EncodeTask::query()->where('from', 'SS')->where('status', 1)->get();
        return view('manager.pull.cntv', ['lives' => $lives, 'ets' => $ets, 'channels' => $this->channels]);
    }

    public function getLiveUrl(Request $request, $id)
    {
        switch ($id) {
            case 'cctv5':
            case 'cctv5plus':
            case 'btv6': {
                $lines = $this->getScript($id);
                if (!empty($lines)) {
                    return response($lines);
                }
                break;
            }
            case 'wa5': {
                $lines = ['http://hls.mv.wa5.com/live/gssports1_900/playlist.m3u8'];
                if (!empty($lines)) {
                    return response(join('<br><br>', $lines));
                }
                break;
            }
            case 'fyzq':
            case 'jbty':
            case 'gdty':
            case 'gzjs':
            case 'szty':
            case 'xsj': {
                $lines = $this->get91Script($id);
                if (!empty($lines)) {
                    return response(join('<br><br>', $lines));
                }
                break;
            }

        }
        return response('信号还在路上，等会再来看看！');
    }

    private function getScript($channelID)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://js.player.cntv.cn/creator/hdsLive_standard2.js');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $response = str_replace("\x00", '', $response);
        $lines = explode("\n", $response);
        $keyString = '';
        $html5Aauth = '';
        foreach ($lines as $line) {
            if (str_contains($line, 'html5Aauth=')) {
                $html5Aauth = $line;
            }
            if (str_contains($line, 'function setHtml5AliNewUrl')) {
                $line = str_replace("ChannelID", '"' . $channelID . '"', $line);
//                $line = str_replace("ChannelID", '"cctv5plus"', $line);
                $line = str_replace(";", ";\n", $line);
                $line = str_replace("{", "{\n", $line);
                $line = str_replace("}", "}\n", $line);
                $keyString = $line;
            }
        }

        if (!empty($keyString)) {
            $scripts = [];
            $scripts[] = '<script>!function(a){"use strict";function b(a,b){var c=(65535&a)+(65535&b),d=(a>>16)+(b>>16)+(c>>16);return d<<16|65535&c}function c(a,b){return a<<b|a>>>32-b}function d(a,d,e,f,g,h){return b(c(b(b(d,a),b(f,h)),g),e)}function e(a,b,c,e,f,g,h){return d(b&c|~b&e,a,b,f,g,h)}function f(a,b,c,e,f,g,h){return d(b&e|c&~e,a,b,f,g,h)}function g(a,b,c,e,f,g,h){return d(b^c^e,a,b,f,g,h)}function h(a,b,c,e,f,g,h){return d(c^(b|~e),a,b,f,g,h)}function i(a,c){a[c>>5]|=128<<c%32,a[(c+64>>>9<<4)+14]=c;var d,i,j,k,l,m=1732584193,n=-271733879,o=-1732584194,p=271733878;for(d=0;d<a.length;d+=16)i=m,j=n,k=o,l=p,m=e(m,n,o,p,a[d],7,-680876936),p=e(p,m,n,o,a[d+1],12,-389564586),o=e(o,p,m,n,a[d+2],17,606105819),n=e(n,o,p,m,a[d+3],22,-1044525330),m=e(m,n,o,p,a[d+4],7,-176418897),p=e(p,m,n,o,a[d+5],12,1200080426),o=e(o,p,m,n,a[d+6],17,-1473231341),n=e(n,o,p,m,a[d+7],22,-45705983),m=e(m,n,o,p,a[d+8],7,1770035416),p=e(p,m,n,o,a[d+9],12,-1958414417),o=e(o,p,m,n,a[d+10],17,-42063),n=e(n,o,p,m,a[d+11],22,-1990404162),m=e(m,n,o,p,a[d+12],7,1804603682),p=e(p,m,n,o,a[d+13],12,-40341101),o=e(o,p,m,n,a[d+14],17,-1502002290),n=e(n,o,p,m,a[d+15],22,1236535329),m=f(m,n,o,p,a[d+1],5,-165796510),p=f(p,m,n,o,a[d+6],9,-1069501632),o=f(o,p,m,n,a[d+11],14,643717713),n=f(n,o,p,m,a[d],20,-373897302),m=f(m,n,o,p,a[d+5],5,-701558691),p=f(p,m,n,o,a[d+10],9,38016083),o=f(o,p,m,n,a[d+15],14,-660478335),n=f(n,o,p,m,a[d+4],20,-405537848),m=f(m,n,o,p,a[d+9],5,568446438),p=f(p,m,n,o,a[d+14],9,-1019803690),o=f(o,p,m,n,a[d+3],14,-187363961),n=f(n,o,p,m,a[d+8],20,1163531501),m=f(m,n,o,p,a[d+13],5,-1444681467),p=f(p,m,n,o,a[d+2],9,-51403784),o=f(o,p,m,n,a[d+7],14,1735328473),n=f(n,o,p,m,a[d+12],20,-1926607734),m=g(m,n,o,p,a[d+5],4,-378558),p=g(p,m,n,o,a[d+8],11,-2022574463),o=g(o,p,m,n,a[d+11],16,1839030562),n=g(n,o,p,m,a[d+14],23,-35309556),m=g(m,n,o,p,a[d+1],4,-1530992060),p=g(p,m,n,o,a[d+4],11,1272893353),o=g(o,p,m,n,a[d+7],16,-155497632),n=g(n,o,p,m,a[d+10],23,-1094730640),m=g(m,n,o,p,a[d+13],4,681279174),p=g(p,m,n,o,a[d],11,-358537222),o=g(o,p,m,n,a[d+3],16,-722521979),n=g(n,o,p,m,a[d+6],23,76029189),m=g(m,n,o,p,a[d+9],4,-640364487),p=g(p,m,n,o,a[d+12],11,-421815835),o=g(o,p,m,n,a[d+15],16,530742520),n=g(n,o,p,m,a[d+2],23,-995338651),m=h(m,n,o,p,a[d],6,-198630844),p=h(p,m,n,o,a[d+7],10,1126891415),o=h(o,p,m,n,a[d+14],15,-1416354905),n=h(n,o,p,m,a[d+5],21,-57434055),m=h(m,n,o,p,a[d+12],6,1700485571),p=h(p,m,n,o,a[d+3],10,-1894986606),o=h(o,p,m,n,a[d+10],15,-1051523),n=h(n,o,p,m,a[d+1],21,-2054922799),m=h(m,n,o,p,a[d+8],6,1873313359),p=h(p,m,n,o,a[d+15],10,-30611744),o=h(o,p,m,n,a[d+6],15,-1560198380),n=h(n,o,p,m,a[d+13],21,1309151649),m=h(m,n,o,p,a[d+4],6,-145523070),p=h(p,m,n,o,a[d+11],10,-1120210379),o=h(o,p,m,n,a[d+2],15,718787259),n=h(n,o,p,m,a[d+9],21,-343485551),m=b(m,i),n=b(n,j),o=b(o,k),p=b(p,l);return[m,n,o,p]}function j(a){var b,c="";for(b=0;b<32*a.length;b+=8)c+=String.fromCharCode(a[b>>5]>>>b%32&255);return c}function k(a){var b,c=[];for(c[(a.length>>2)-1]=void 0,b=0;b<c.length;b+=1)c[b]=0;for(b=0;b<8*a.length;b+=8)c[b>>5]|=(255&a.charCodeAt(b/8))<<b%32;return c}function l(a){return j(i(k(a),8*a.length))}function m(a,b){var c,d,e=k(a),f=[],g=[];for(f[15]=g[15]=void 0,e.length>16&&(e=i(e,8*a.length)),c=0;16>c;c+=1)f[c]=909522486^e[c],g[c]=1549556828^e[c];return d=i(f.concat(k(b)),512+8*b.length),j(i(g.concat(d),640))}function n(a){var b,c,d="0123456789abcdef",e="";for(c=0;c<a.length;c+=1)b=a.charCodeAt(c),e+=d.charAt(b>>>4&15)+d.charAt(15&b);return e}function o(a){return unescape(encodeURIComponent(a))}function p(a){return l(o(a))}function q(a){return n(p(a))}function r(a,b){return m(o(a),o(b))}function s(a,b){return n(r(a,b))}function t(a,b,c){return b?c?r(b,a):s(b,a):c?p(a):q(a)}"function"==typeof define&&define.amd?define(function(){return t}):a.setH5Str=t}(this);';
            $scripts[] = $html5Aauth;
            $lines = explode("\n", $keyString);
            foreach ($lines as $line) {
                if (str_contains($line, 'var ') || str_contains($line, 'html5Aauth+=') || str_contains($line, 'hls_vod_url=')) {
                    $scripts[] = $line;
                }
            }
            $scripts[] = 'document.write(hls_vod_url)';
            $scripts[] = '</script>';
            $script = join("\n", $scripts);
            return $script;
        }
    }

    private function get91Script($channelID)
    {
        $channels = [
            'fyzq' => ['kds1://hncscs@@ip=1&id=fyzq', 'kds1://hncscs@@ip=3&id=fyzq'],
            'jbty' => ["kds1://bst1@@id=jbtyhd", 'kds1://gdyx@@id=jbtyhd'],
            'gdty' => ['kds1://gdyx@@id=gdty', 'kds1://gdtv@@id=gdty', 'kds1://gdyx@@id=gdtyhd'],
            'gzjs' => ['http://lss2.gztv.com/streaming/gzbn_sport/index.m3u8', 'kds1://gdyx@@id=gdgzjs'],
            'szty' => ["kds1://gdsztv@@id=gdszty", 'kds1://cutv1@@id=gdszty'],
            'xsj' => ["kds1://bst1@@id=xsjhd", 'kds1://gdyx@@id=xsjhd', 'kds1://scyx@@id=xsjhd'],
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://m.91kds.net/auth1.php');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
        $json = json_decode($response, true);
        if (isset($json) && isset($json['livekey'])) {
            $key = $json['livekey'];
            $urls = [];
            foreach ($channels[$channelID] as $url) {
                if (starts_with($url, 'kds1://') || starts_with($url, 'kds2://')) {
                    $url = str_replace('kds1://', "http://v.91kds.com/b9/", $url);
                    $url = str_replace('kds2://', "http://v.91kds.com/c9/", $url);
                    $url = str_replace("@@", ".m3u8?", $url);
                    $url = "$url&$key";
                    $url = $this->getUrlRedirect($url);
                    $urls[] = $url;
                } else {
                    $urls[] = $url;
                }
            }
            return $urls;
        } else {
            return false;
        }
    }

    private function getUrlRedirect($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (iPhone; CPU iPhone OS 11_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Version/11.0 Mobile/15A372 Safari/604.1");
//        curl_setopt($ch, CURLOPT_COOKIESESSION, true);
        curl_setopt($ch, CURLOPT_HEADER, true);
        $response = curl_exec($ch);
        if ($error = curl_error($ch)) {
            die($error);
        }
        curl_close($ch);
//        dump($url);
//        dump($response);
        preg_match_all('/^Location:(.*)$/mi', $response, $matches);
        if (isset($matches[1][0])) {
            $location = trim($matches[1][0]);
        } else {
            $location = null;
        }
//        dump($location);
        return $location;
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
