<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'niconico';

if (isset($_GET['category'])) {
	$category = $_GET['category'];
} else {
	$category = 'twitter';
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$page_max = 3;

if ($category == 'all') {
	$url  = PATH.'nico_'.$category.'.xml';
	$xml  = file_get_contents($url);
	$feed = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA );
	
	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		$title = $feed->channel->item[$i]->title;
		$text[$category][$i]['title'] = mb_convert_kana($title, "A", "UTF-8");
		$text[$category][$i]['link']  = $feed->channel->item[$i]->link;
		
		// 埋め込み用に置換
		$search  = array("www", "watch");
		$replace = array("ext", "thumb_watch");
		$text[$category][$i]['thumb_link'] = str_replace($search, $replace, $feed->channel->item[$i]->link).'?w=450&h=250';
		
		$title = explode('位：', $feed->channel->item[$i]->title);
		$text[$category][$i]['pocket']  = 'https://getpocket.com/save?url='.rawurlencode($feed->channel->item[$i]->link).'&title='.rawurlencode($title[1]);
		$text[$category][$i]['comment'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->channel->item[$i]->link);
	
		$description = $feed->channel->item[$i]->description;
	
		$view = explode("<strong class=\"nico-info-total-view\">", $description);
		$view = explode("</strong>", $view[1]);
		$text[$category][$i]['view'] = $view[0];
	
		$res = explode("<strong class=\"nico-info-total-res\">", $description);
		$res = explode("</strong>", $res[1]);
		$text[$category][$i]['res'] = $res[0];
	
		$mylist = explode("<strong class=\"nico-info-total-mylist\">", $description);
		$mylist = explode("</strong>", $mylist[1]);
		$text[$category][$i]['mylist'] = $mylist[0];
		
		$text[$category][$i]['thumb_data'] = '再生：'.$view[0].'　コメント：'.$res[0].'　マイリスト：'.$mylist[0];
	}
} else {
	$url  = PATH.'nico_twitter.json';
	$file = file_get_contents($url);
	$feed = json_decode($file);

	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		if (!strstr($feed->response->list[$i]->url, 'www.nicovideo.jp')) {
			continue;
		}
		
		$text[$category][$i]['title']   = $feed->response->list[$i]->title;
		$text[$category][$i]['embed']   = $feed->response->list[$i]->trackback_permalink;
		$text[$category][$i]['link']    = $feed->response->list[$i]->url;
		$text[$category][$i]['comment'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->url);
		$text[$category][$i]['pocket']  = 'https://getpocket.com/save?url='.rawurlencode($feed->response->list[$i]->url).'&title='.rawurlencode($feed->response->list[$i]->title);

		// 埋め込み用に置換
		$search  = array("www", "watch");
		$replace = array("ext", "thumb_watch");
		$text[$category][$i]['thumb_link'] = str_replace($search, $replace, $feed->response->list[$i]->url).'?w=450&h=250';
		$text[$category][$i]['thumb_data'] = number_format($feed->response->list[$i]->trackback_total).' tweets';
	}
}

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>