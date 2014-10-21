<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'naver';

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

if ($category == 'hot') {
	$page_max = 3;
	$url  = PATH.'naver_hot.xml';
	$file = file_get_contents($url);
	$feed = simplexml_load_string($file);
	
	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		$title       = $feed->channel->item[$i]->title;
		$description = $feed->channel->item[$i]->description;
		
		$text[$category][$i]['title']       = mb_convert_kana($title, "A", "UTF-8");
		$text[$category][$i]['description'] = mb_convert_kana($description, "A", "UTF-8");
		$text[$category][$i]['link']        = $feed->channel->item[$i]->link;
		$text[$category][$i]['title_link']  = $feed->channel->item[$i]->link;
		$text[$category][$i]['comment']     = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->channel->item[$i]->link);
		$text[$category][$i]['pocket']      = 'https://getpocket.com/save?url='.rawurlencode($feed->channel->item[$i]->link).'&title='.rawurlencode($text[$category][$i]['title']);

		$view = (int)$feed->channel->item[$i]->matome_view;
		$fav  = (int)$feed->channel->item[$i]->favorite;
		$text[$category][$i]['user'] = number_format($view).' view'.'&nbsp;&nbsp;&nbsp;'.number_format($fav).' fav';

		if (strlen($view)>=7) {
			$view = floor($view/1000000);
			$view .= 'M';
		} else {
			$view = number_format($view);
		}
		$text[$category][$i]['day']  = $view;
		$text[$category][$i]['time'] = 'view';
	}
} else {
	$page_max = 3;
	$url  = PATH.'naver_twitter.json';
	$file = file_get_contents($url);
	$feed = json_decode($file);
	
	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		$text[$category][$i]['title']      = $feed->response->list[$i]->title;
		$text[$category][$i]['title']      = str_replace(' - NAVER まとめ', '', $text[$category][$i]['title']);
		$text[$category][$i]['embed']      = $feed->response->list[$i]->trackback_permalink;
		$text[$category][$i]['link']       = $feed->response->list[$i]->url;
		$text[$category][$i]['title_link'] = $feed->response->list[$i]->url;
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->url);
		$text[$category][$i]['pocket']     = 'https://getpocket.com/save?url='.rawurlencode($feed->response->list[$i]->url).'&title='.rawurlencode($text[$category][$i]['title']);
		$text[$category][$i]['user']       = number_format($feed->response->list[$i]->trackback_total).' tweets';

		$tb = $feed->response->list[$i]->trackback_total;
		if (strlen($tb)>=7) {
			$tb = floor($tb/1000000);
			$tb .= 'M';
		} else {
			$tb = number_format($tb);
		}	
		$text[$category][$i]['day']  = $tb; 
		$text[$category][$i]['time'] = 'tweets';
	}
}

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>