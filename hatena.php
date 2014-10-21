<?php
ini_set('display_errors', 0);

$site = 'hatena';

if(isset($_GET['category'])){
	$category = $_GET['category'];
} else {
	$category = 'new';
}

if ($category == 'new') {
	define("PATH", "../../cron/hatebu_ex/");
} else {
	define("PATH", "../../cron/hatebu/");
}

if(isset($_GET['page'])){
	$page = $_GET['page'];
} else {
	$page = 1;
}

$page_max = 3;

$url  = PATH.'hotentry.xml';
$xml  = file_get_contents($url);
$xml  = str_replace('dc:date', 'date', $xml);
$xml  = str_replace('hatena:bookmarkcount', 'count', $xml);
$feed = simplexml_load_string($xml);

for ($i = ($page-1)*10; $i < $page*10; $i++) {
	$title       = $feed->item[$i]->title;
	$description = $feed->item[$i]->description;
	
	$text[$category][$i]['title']       = mb_convert_kana($title, "A", "UTF-8");
	$text[$category][$i]['description'] = mb_convert_kana($description, "A", "UTF-8");
	$text[$category][$i]['link']        = $feed->item[$i]->link;
	$text[$category][$i]['title_link']  = $feed->item[$i]->link;
	$text[$category][$i]['comment']     = 'http://realtime.search.yahoo.co.jp/search?p='.rawurlencode($feed->item[$i]->link);
	$text[$category][$i]['comment_b']   = 'http://b.hatena.ne.jp/entry/'.str_replace('http://', '', $feed->item[$i]->link);
	$text[$category][$i]['pocket']      = 'https://getpocket.com/save?url='.rawurlencode($feed->item[$i]->link).'&title='.rawurlencode($text[$category][$i]['title']);

	$day = substr($feed->item[$i]->date, 5, 11);
	$day = ltrim(str_replace('-', '/', $day), '0');
	$day = str_replace('T', ' ', $day);

	$text[$category][$i]['day']  = number_format((int)$feed->item[$i]->count);
	$text[$category][$i]['time'] = 'users';
	//$text[$category][$i]['user'] = number_format((int)$feed->item[$i]->count).' users'.'&nbsp;&nbsp;&nbsp;'.$day;
	$text[$category][$i]['user'] = number_format((int)$feed->item[$i]->count).' users';
}

$contents = "";
ob_start();
include('./template.php');
$contents = ob_get_contents();
ob_end_clean();
echo $contents;
?>