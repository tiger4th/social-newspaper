<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'topics';

if (isset($_GET['category'])) {
	$category = $_GET['category'];
} else {
	$category = 'news';
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

if ($category == 'trend') {
	$page_max = 1;
	$url  = PATH.'trend.xml';
	$file = file_get_contents($url);
	$feed = simplexml_load_string($file);

	for ($i = 0; $i < 30; $i++) {
		$text[$category][$i]['title']      = $feed->channel->item[$i]->title;
		$text[$category][$i]['description'] = mb_convert_kana($feed->channel->item[$i]->description, "A", "UTF-8");
		$text[$category][$i]['title_link'] = 'https://www.google.co.jp/search?q='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['web']        = 'https://www.google.co.jp/search?q='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['youtube']    = 'http://www.youtube.com/results?search_query='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['wikipedia']  = 'http://ja.wikipedia.org/w/index.php?search='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['amazon']     = 'http://www.amazon.co.jp/s/?tag=tiger4th-22&field-keywords='.rawurlencode($feed->channel->item[$i]->title);
		$text[$category][$i]['rank']       = $i+1;
	}
} elseif ($category == 'keyword') {
	$page_max = 1;
	$url  = PATH.$category.'.json';
	$json = file_get_contents($url);
	$feed = json_decode($json);

	for ($i = 0; $i < 20; $i++) {
		$text[$category][$i]['title']      = $feed[$i];
		$text[$category][$i]['title_link'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed[$i]);
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed[$i]);
		$text[$category][$i]['web']        = 'https://www.google.co.jp/search?q='.rawurlencode($feed[$i]);
		$text[$category][$i]['news']       = 'https://www.google.co.jp/search?tbm=nws&q='.rawurlencode($feed[$i]);
		$text[$category][$i]['youtube']    = 'http://www.youtube.com/results?search_query='.rawurlencode($feed[$i]);
		$text[$category][$i]['wikipedia']  = 'http://ja.wikipedia.org/w/index.php?search='.rawurlencode($feed[$i]);
		$text[$category][$i]['amazon']     = 'http://www.amazon.co.jp/s/?tag=tiger4th-22&field-keywords='.rawurlencode($feed[$i]);
		$text[$category][$i]['rank']       = $i+1;
	}
} else {
	$page_max = 3;
	$url  = PATH.$category.'.json';
	$json = file_get_contents($url);
	$feed = json_decode($json);

	for ($i = ($page-1)*10; $i < $page*10; $i++) {
		$text[$category][$i]['title']      = $feed->response->list[$i]->title;
		$text[$category][$i]['embed']      = $feed->response->list[$i]->trackback_permalink;
		$text[$category][$i]['title']      = str_replace(' - Yahoo!ニュース', '', $text[$category][$i]['title']);
		$text[$category][$i]['title']      = str_replace(' - Y!ニュース', '', $text[$category][$i]['title']);
		$text[$category][$i]['title_link'] = $feed->response->list[$i]->url;
		$text[$category][$i]['link']       = $feed->response->list[$i]->url;
		$text[$category][$i]['comment']    = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->response->list[$i]->url);
		$text[$category][$i]['pocket']     = 'https://getpocket.com/save?url='.rawurlencode($feed->response->list[$i]->url).'&title='.rawurlencode($text[$category][$i]['title']);

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