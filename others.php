<?php
ini_set('display_errors', 0);
define("PATH", "../../cron/snews/");

$site = 'others';

if (isset($_GET['category'])) {
	$category = $_GET['category'];
} else {
	$category = 'amazon';
}

if (isset($_GET['page'])) {
	$page = $_GET['page'];
} else {
	$page = 1;
}

$page_max = 3;

$url  = PATH.$category.'.json';
$json = file_get_contents($url);
$feed = json_decode($json);

for ($i = ($page-1)*10; $i < $page*10; $i++) {
	$title = strip_tags($feed->response->list[$i]->title);

	if($category=='amazon'){
		/*
		$title = str_replace('Amazon.co.jp： ', '', $title);
		$title = str_replace('Amazon.co.jp: ', '', $title);
		$title = str_replace('詳細サーチ - ', '', $title);
		$title = explode(':', $title);
		$title = $title[0];

		if (strpos($title, mb_convert_encoding("家電から食品まで", "UTF-8", "auto"))) {
			$title = 'Amazon.co.jp';
		}
		*/
	
		// アソシエイトID置換
		$aid = 'tiger4th-22';
		$pattern = '/([^\/=]+-22)/';
		$url_raw = urldecode($feed->response->list[$i]->url);
		if (preg_match($pattern, $url_raw)) {
			$text[$category][$i]['link'] = preg_replace($pattern, $aid , $url_raw);
		} else {
			if (strpos($url_raw, '?') !== false) {
				$text[$category][$i]['link'] = $feed->response->list[$i]->url.'&tag='.$aid;
			} else {
				$text[$category][$i]['link'] = $feed->response->list[$i]->url.'?tag='.$aid;
			}
		}
	} else {
		$text[$category][$i]['link'] = $feed->response->list[$i]->url;
		if ($category=='cookpad') {
			$title = explode(' [クックパッド] ', $title);
			$title = explode(' by ', $title[0]);
			$title = $title[0];
		} elseif($category == 'ustream') {
		} elseif($category == 'chiebukuro') {
			$title = str_replace(' - Y!知恵袋', '', $title);
		} elseif($category == 'wikipedia') {
			$title = str_replace(' - Wikipedia', '', $title);
		} elseif($category == 'bokete') {
			if (strpos($text[$category][$i]['link'], '/boke/') !== false) {
				$text[$category][$i]['link_org'] = $text[$category][$i]['link'];
				$text[$category][$i]['link'] = str_replace('bokete.jp', 'ss.bokete.jp', $text[$category][$i]['link']);
				$text[$category][$i]['link'] = str_replace('/boke/', '/', $text[$category][$i]['link']);
				$text[$category][$i]['link'] .= '.jpg';
			} else {
				$text[$category][$i]['link_org'] = str_replace('ss.bokete.jp', 'bokete.jp/boke', $text[$category][$i]['link']);
				$text[$category][$i]['link_org'] = str_replace('.jpg', '', $text[$category][$i]['link_org']);
			}
			$text[$category][$i]['thumb_data'] = number_format($feed->response->list[$i]->trackback_total).' tweets';
		}
	}

	$title = str_replace(' -', ' ', $title);
	$text[$category][$i]['title']      = $title;
	$text[$category][$i]['embed']      = $feed->response->list[$i]->trackback_permalink;
	$text[$category][$i]['title_link'] = $text[$category][$i]['link'];
	$text[$category][$i]['pocket']     = 'https://getpocket.com/save?url='.rawurlencode($text[$category][$i]['title_link']).'&title='.rawurlencode($title);

	if ($category == 'amazon' || $category == 'wikipedia' || $category == 'ustream') {
		$text[$category][$i]['comment'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($title);
	} else {
		$url = explode('?', $feed->response->list[$i]->url);
		$text[$category][$i]['comment'] = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($url[0]);
	}

	if ($category == 'cookpad' || $category == 'wikipedia' || $category == 'ustream') {
		$text[$category][$i]['amazon'] = 'http://www.amazon.co.jp/s/?tag=tiger4th-22&field-keywords='.rawurlencode($title);
	}
	
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

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>