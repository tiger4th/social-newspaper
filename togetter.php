<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'togetter';

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
	$page_max = 1;
	$url  = PATH.'togetter.xml';
	// $url  = PATH.'togetter_full.xml';
	$xml  = file_get_contents($url);
	$xml  = str_replace('content:encoded', 'content', $xml);
	$feed = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA);

	for ($i = 0; $i < 10; $i++) {
		$title = $feed->channel->item[$i]->title;
		$text[$category][$i]['title']      = mb_convert_kana($title, "A", "UTF-8");
		$text[$category][$i]['link']       = $feed->channel->item[$i]->link;
		$text[$category][$i]['title_link'] = $feed->channel->item[$i]->link;
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->channel->item[$i]->link);
		$text[$category][$i]['pocket']     = 'https://getpocket.com/save?url='.rawurlencode($feed->channel->item[$i]->link).'&title='.rawurlencode($text[$category][$i]['title']);

		$description = $feed->channel->item[$i]->description;

		$view = explode('view:', $description);
		$view = explode('	', $view[1]);
		$view =	$view[0];

		$fav = explode('fav:', $description);
		$fav = explode(' ', $fav[1]);
		$fav = $fav[0];

		$text[$category][$i]['user'] = number_format($view).' view'.'&nbsp;&nbsp;&nbsp;'.number_format($fav).' fav';

		if (strlen($view)>=7) {
			$view = floor($view/1000000);
			$view .= 'M';
		} else {
			$view = number_format($view);
		}
		$text[$category][$i]['day'] = $view;
		$text[$category][$i]['time'] = 'view';
		
		// まるごとRSSの分
		// $content = $feed->channel->item[$i]->content;
		
		// 説明文
		// $content_desc = explode("<div class=\"info_description rad5 balloon_body\">", $content);
		// $content_desc = explode("<span style=\"float:right;\">", $content_desc[1]);
		// $content_desc = $content_desc[0];
		// $content_desc = str_replace('<br>',   '', $content_desc);
		// $content_desc = str_replace('<br/>',  '', $content_desc);
		// $content_desc = str_replace('<br />', '', $content_desc);
		// $text[$category][$i]['description'] = $content_desc;

		// 1つめのツイート
		// $pattern = '/(http:\/\/twitter.com\/)(\w+)(\/status\/)(\d+)/s';
		// preg_match($pattern, $content, $content_embed);
		// unset($content_embed[0]);
		// $text[$category][$i]['embed'] = implode($content_embed);
	}
} else {
	$page_max = 3;
	$url  = PATH.'togetter_twitter.json';
	$file = file_get_contents($url);
	$feed = json_decode($file);

	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		$text[$category][$i]['title']      = $feed->response->list[$i]->title;
		$text[$category][$i]['embed']      = $feed->response->list[$i]->trackback_permalink;
		$text[$category][$i]['link']       = $feed->response->list[$i]->url;
		$text[$category][$i]['title_link'] = $feed->response->list[$i]->url;
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->url);
		$text[$category][$i]['pocket']     = 'https://getpocket.com/save?url='.rawurlencode($feed->response->list[$i]->url).'&title='.rawurlencode($feed->response->list[$i]->title);

		$tb = $feed->response->list[$i]->trackback_total;
		if (strlen($tb)>=7) {
			$tb = floor($tb/1000000);
			$tb .= 'M';
		} else {
			$tb = number_format($tb);
		}
		$text[$category][$i]['day']  = $tb; 
		$text[$category][$i]['time'] = 'tweets';
		$text[$category][$i]['user'] = number_format($feed->response->list[$i]->trackback_total).' tweets';
	}
}

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>