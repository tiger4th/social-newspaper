<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'twitter';

if (isset($_GET['category'])) {
	$category = $_GET['category'];
} else {
	$category = 'tweet';
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$page_max = 3;

$url  = PATH.'twitter_'.$category.'.json';
$json = file_get_contents($url);
$feed = json_decode($json);

for ($i = ($page-1)*10; $i < $page*10; $i++) {
	if ($feed->response->list[$i]->target->mytype=='image') {
		$text[$category][$i]['thumb_link'] = getThumbnailHtml($feed->response->list[$i]->target->url);
		$text[$category][$i]['thumb_data'] = number_format($feed->response->list[$i]->target->trackback_total).' tweets';
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->target->url);
	} elseif ($feed->response->list[$i]->target->mytype == 'video') {
		if (!strstr($feed->response->list[$i]->target->url, 'youtube')) {
			continue;
		}
		$text[$category][$i]['thumb_link'] = str_replace('watch?v=', 'embed/', $feed->response->list[$i]->target->url);
		$text[$category][$i]['thumb_data'] = number_format($feed->response->list[$i]->target->trackback_total).' tweets';
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->target->url);
	} else {
		$tb = $feed->response->list[$i]->target->trackback_total;
		if (strlen($tb)>=7) {
			$tb = floor($tb/1000000);
			$tb .= 'M';
		} else {
			$tb = number_format($tb);
		}
		$text[$category][$i]['day']     = $tb; 
		$text[$category][$i]['time']    = 'tweets';
		$text[$category][$i]['user']    = number_format($feed->response->list[$i]->target->trackback_total).' tweets';
		$text[$category][$i]['comment'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->target->url);
	}

	$text[$category][$i]['title']  = $feed->response->list[$i]->target->title;
	$text[$category][$i]['link']   = $feed->response->list[$i]->target->url;
	$text[$category][$i]['embed']  = $feed->response->list[$i]->target->url;
	$text[$category][$i]['pocket'] = 'https://getpocket.com/save?url='.rawurlencode($feed->response->list[$i]->target->url);
	if ($feed->response->list[$i]->target->mytype=='video') {
		$text[$category][$i]['pocket'] .= '&title='.rawurlencode($feed->response->list[$i]->target->title);
	}
}

// 画像URLからサムネイルURLを生成
function getThumbnailHtml($status_text) {
    $html = $status_text;
    $patterns = array(
        // twitpic
        array('/http:\/\/twitpic[.]com\/(\w+)/', 'http://twitpic.com/show/thumb/$1'),
 
        // yFrog
        array('/http:\/\/yfrog[.]com\/(\w+)/', 'http://yfrog.com/$1.th.jpg'),
 
        // 携帯百景
        array('/http:\/\/movapic[.]com\/pic\/(\w+)/', 'http://image.movapic.com/pic/s_$1.jpeg'),
 
        // はてなフォトライフ
        array('/http:\/\/f[.]hatena[.]ne[.]jp\/(([\w\-])[\w\-]+)\/((\d{8})\d+)/', 'http://img.f.hatena.ne.jp/images/fotolife/$2/$1/$4/$3_120.jpg'),
 
        // img.ly
        array('/http:\/\/img[.]ly\/(\w+)/', 'http://img.ly/show/thumb/$1'),
 
        // Twitgoo
        array('/http:\/\/twitgoo[.]com\/(\w+)/', 'http://twitgoo.com/$1/img'),
 
        // imgur
        array('/http:\/\/imgur[.]com\/(\w+)/', 'http://i.imgur.com/$1l.jpg'),
 
        // Lockerz
        array('/http:\/\/pics[.]lockerz[.]com\/s\/\d+/', 'http://api.plixi.com/api/tpapi.svc/imagefromurl?size=medium&url=$0'),
 
        // Ow.ly
        array('/http:\/\/ow[.]ly\/i\/(\w+)/', 'http://static.ow.ly/photos/thumb/$1.jpg'),
 
        // Instagram
        //array('/http:\/\/instagram[.]com\/p\/([\w\-]+)\//', 'http://instagram.com/p/$1/media/?size=l'),
 
        // フォト蔵
        array('/http:\/\/photozou[.]jp\/photo\/show\/\d+\/([\d]+)/', 'http://photozou.jp/p/img/$1'),
 
        // ついっぷる フォト
        array('/http:\/\/p[.]twipple[.]jp\/([\w]+)/', 'http://p.twipple.jp/show/large/$1'),
    );
 
    foreach ($patterns as $pattern) {
        if (preg_match($pattern[0], $status_text, $matches)) {
            $url = $matches[0];
            $html = preg_replace($pattern[0], $pattern[1], $url);
            break;
        }
    }
 
    return $html;
}

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>