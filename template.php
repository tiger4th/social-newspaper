<!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="ja"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="ja"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="ja"> <![endif]-->
<!-- Consider adding a manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="ja"> <!--<![endif]-->
<!--[if lt IE 9]><script src="js/css3-mediaqueries.js"></script><![endif]-->
<head>
<meta charset="utf-8">
<title>Social Newspaper - 今の話題のすべてがわかる</title>
<meta name="keywords" content="Twitter,ニュース,話題,まとめ,はてなブックマーク,NAVERまとめ,Togetter,ニコニコ動画">
<meta name="description" content="今twitterで話題になっているツイート、画像、動画、記事のすべてをまとめたソーシャル新聞です。">
<meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes" />

<link rel="stylesheet" media="screen" href="css/superfish.css" /> 
<link rel="stylesheet" href="css/nivo-slider.css" media="all"  /> 
<link rel="stylesheet" href="css/tweet.css" media="all"  />
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="css/add.css">
<link rel="stylesheet" href="css/zocial.css">
<link rel="stylesheet" media="all" href="css/lessframework.css"/>

<link rel="shortcut icon" href="./img/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="icon" href="./img/favicon.ico" type="image/vnd.microsoft.icon" />
<link rel="apple-touch-icon-precomposed" href="./img/apple-touch-icon.png" />

<!-- All JavaScript at the bottom, except this Modernizr build.
   Modernizr enables HTML5 elements & feature detects for optimal performance.
   Create your own custom Modernizr build: www.modernizr.com/download/ -->
<script src="js/modernizr-2.5.3.min.js"></script>
</head>
<body>
<!-- WRAPPER -->
<div class="wrapper cf">
<header class="cf">

<!-- social-bar -->
<div id="social-bar-holder">
<ul id="social-bar" class="cf">
	<li class="twitter"><a href="http://twitter.com/share?text=Social Newspaper&url=http://tiger4th.com/snews/" title="Share on Twitter" target="_blank"></a></li>
	<li class="facebook"><a href="http://www.facebook.com/sharer.php?u=http://tiger4th.com/snews/&amp;t=SocialNewspaper" title="Share on Facebook" target="_blank"></a></li>
	<li class="github"><a href="https://plus.google.com/share?url=http://tiger4th.com/snews/" title="Share on Google+" target="_blank"></a></li>
	<li class="hatena"><a href="http://b.hatena.ne.jp/add?mode=confirm&url=http://tiger4th.com/snews/&title=Social Newspaper" title="Share on Hatena::Bookmark"  target="_blank"></a></li>
	<li class="googleplus"><a class="addthis_button" href="http://www.addthis.com/bookmark.php?v=300&amp;pubid=ra-4e3ab77310f2fc55"><img src="" width="1" height="1" alt="" style="border:0"/></a></li>
</ul>
</div>
<div class="cf"></div>
<!-- ENDS social-bar -->
	
<div id="logo" class="cf">
<a href="http://tiger4th.com/snews/" ><img src="img/logo.png" alt="Social Newspaper" /></a>
<br>
<div class="center">一部更新停止中</div>
</div>

<!-- nav -->
<nav class="cf">
<ul id="nav" class="sf-menu">
	<li<?php if($site=='topics'){ ?> class="current-menu-item"<?php } ?>>
		<a href="index.php"><span>Topics</span></a>
		<ul>
			<li><a href="index.php?category=news">ニュース</a></li>
			<li><a href="index.php?category=blog">ブログ</a></li>
			<li><a href="index.php?category=2ch">2ちゃんねる</a></li>
			<li><a href="index.php?category=keyword">注目のキーワード</a></li>
			<li><a href="index.php?category=trend">急上昇ワード</a></li>
		</ul>
	</li>
	<li<?php if($site=='twitter'){ ?> class="current-menu-item"<?php } ?>>
		<a href="twitter.php"><span>twitter</span></a>
		<ul>
			<li><a href="twitter.php?category=tweet">話題のツイート</a></li>
			<li><a href="twitter.php?category=image">話題の画像</a></li>
			<li><a href="twitter.php?category=video">話題の動画</a></li>
		</ul>
	</li>
	<li<?php if($site=='hatena'){ ?> class="current-menu-item"<?php } ?>>
		<a href="hatena.php"><span>Hatena</span></a>
		<ul>
			<li><a href="hatena.php?category=new">新着エントリー</a></li>
			<li><a href="hatena.php?category=hot">人気エントリー</a></li>
		</ul>
	</li>
	<li<?php if($site=='naver'){ ?> class="current-menu-item"<?php } ?>>
		<a href="naver.php"><span>NAVER</span></a>
		<ul>
			<li><a href="naver.php?category=twitter">twitterで話題</a></li>
			<li><a href="naver.php?category=hot">注目まとめ</a></li>
		</ul>
	</li>
	<li<?php if($site=='togetter'){ ?> class="current-menu-item"<?php } ?>>
		<a href="togetter.php"><span>togetter</span></a>
		<ul>
			<li><a href="togetter.php?category=twitter">twitterで話題</a></li>
			<li><a href="togetter.php?category=hot">注目のまとめ</a></li>
		</ul>
	</li>
	<li<?php if($site=='niconico'){ ?> class="current-menu-item"<?php } ?>>
		<a href="niconico.php"><span>niconico</span></a>
		<ul>
			<li><a href="niconico.php?category=twitter">twitterで話題</a></li>
			<li><a href="niconico.php?category=all">総合ランキング</a></li>
		</ul>
	</li>
	<li<?php if($site=='others'){ ?> class="current-menu-item"<?php } ?>>
		<a href="others.php"><span>Others</span></a>
		<ul>		
			<li><a href="others.php?category=amazon">Amazon</a></li>
			<li><a href="others.php?category=wikipedia">Wikipedia</a></li>
			<li><a href="others.php?category=chiebukuro">知恵袋</a></li>
			<li><a href="others.php?category=cookpad">クックパッド</a></li>
			<li><a href="others.php?category=bokete">bokete</a></li>
			<li><a href="others.php?category=ustream">Ustream</a></li>
		</ul>
	</li>
</ul>
<div id="combo-holder"></div>
</nav>
<!-- ends nav -->
</header>

<?php if($site=='niconico'){ ?>
<!-- MAIN -->
<div role="main" id="main" class="cf">

<!-- categories -->
<ul class="nav-categories cf">
	<li<?php if($category=='' || $category=='twitter'){ ?> class="current"<?php } ?>><a href="?category=twitter">twitterで話題</a></li>
	<li<?php if($category=='all'){ ?> class="current"<?php } ?>><a href="?category=all">総合ランキング</a></li>
</ul>
<!-- ENDS categories -->	

<!-- featured -->
<ul class="work-list cf">
<?php foreach ($text[$category] as $key => $value) { ?>
	<li>
		<a class="thumb movie"><script type="text/javascript" src="<?php echo $value['thumb_link']; ?>"></script></a>
		<div class="small"><?php echo $value['title']; ?></div>
		<div class="categories"><?php echo $value['thumb_data']; ?></div>
		<div class="excerpt"></div>
		<div class="center">
			<?php if(isset($value["comment"])){ ?><a href="<?php echo $value['comment']; ?>" class="zocial yahoo small" target="_blank">Realtime</a><?php } ?>
			<?php if(isset($value["pocket"])){ ?><a href="<?php echo $value["pocket"]; ?>" class="zocial pocket small" target="_blank">Read Later</a><?php } ?>
		</div>
	</li>
<?php } ?>
</ul>
<!-- ENDS featured -->

<!-- page-navigation -->
<div class="page-navigation cf">
	<?php if(isset($page) && $page>1){ ?><div class="nav-next"><a href="?category=<?php echo $category; ?>&page=<?php echo $page-1; ?>">Prev</a></div><?php } ?>
	<?php for($i=1; $i<=$page_max; $i++){ ?>
	<div class="nav-page<?php if($i==$page){ ?> current<?php } ?>"><a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php } ?>
	<?php if(!isset($page) || $page<$page_max){ ?><div class="nav-previous"><a href="?category=<?php echo $category; ?>&page=<?php echo $page+1; ?>">Next</a></div><?php } ?>
</div>
<!--ENDS page-navigation -->
<br><br><br>

</div>
<!-- ENDS MAIN -->

<?php }elseif($category=='video'){ ?>
<!-- MAIN -->
<div role="main" id="main" class="cf">

<!-- categories -->
<ul class="nav-categories cf">
	<li<?php if($category=='' || $category=='tweet'){ ?> class="current"<?php } ?>><a href="?category=tweet">話題のツイート</a></li>
	<li<?php if($category=='image'){ ?> class="current"<?php } ?>><a href="?category=image">話題の画像</a></li>
	<li<?php if($category=='video'){ ?> class="current"<?php } ?>><a href="?category=video">話題の動画</a></li>
</ul>
<!-- ENDS categories -->

<!-- featured -->
<ul class="work-list cf">
<?php foreach ($text[$category] as $value) { ?>
	<li>
		<a class="thumb movie"><iframe width="450" src="<?php echo $value['thumb_link']; ?>" frameborder="0" allowfullscreen></iframe></a>
		<div class="small"><?php echo $value['title']; ?></div>
		<div class="categories"><?php echo $value['thumb_data']; ?></div>
		<div class="excerpt"></div>
		<div class="center">
		<?php if(isset($value["comment"])){ ?><a href="<?php echo $value['comment']; ?>" class="zocial yahoo small " target="_blank">Realtime</a><?php } ?>
		<?php if(isset($value["pocket"])){ ?><a href="<?php echo $value["pocket"]; ?>" class="zocial pocket small" target="_blank">Read Later</a><?php } ?>
		</div>
	</li>
<?php } ?>
</ul>
<!-- ENDS featured -->

<!-- page-navigation -->
<div class="page-navigation cf">
	<?php if(isset($page) && $page>1){ ?><div class="nav-next"><a href="?category=<?php echo $category; ?>&page=<?php echo $page-1; ?>">Prev</a></div><?php } ?>
	<?php for($i=1; $i<=$page_max; $i++){ ?>
	<div class="nav-page<?php if($i==$page){ ?> current<?php } ?>"><a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php } ?>
	<?php if(!isset($page) || $page<$page_max){ ?><div class="nav-previous"><a href="?category=<?php echo $category; ?>&page=<?php echo $page+1; ?>">Next</a></div><?php } ?>
</div>
<!--ENDS page-navigation -->
<br><br><br>

</div>
<!-- ENDS MAIN -->

<?php }elseif($category=='image'){ ?>
<!-- MAIN -->
<div role="main" id="main" class="cf">

<!-- categories -->
<ul class="nav-categories cf">
	<li<?php if($category=='' || $category=='tweet'){ ?> class="current"<?php } ?>><a href="?category=tweet">話題のツイート</a></li>
	<li<?php if($category=='image'){ ?> class="current"<?php } ?>><a href="?category=image">話題の画像</a></li>
	<li<?php if($category=='video'){ ?> class="current"<?php } ?>><a href="?category=video">話題の動画</a></li>
</ul>
<!-- ENDS categories -->

<!-- featured -->
<ul class="work-list cf">
<?php foreach ($text[$category] as $value) { ?>
	<li>
		<a href="<?php echo $value['link']; ?>" class="thumb center" target="_blank"><img src="<?php echo $value['thumb_link']; ?>"></a>
		<div class="small"><?php echo $value['title']; ?></div>
		<div class="categories"><?php echo $value['thumb_data']; ?></div>
		<div class="excerpt"></div>
		<div class="center">
		<?php if(isset($value["comment"])){ ?><a href="<?php echo $value['comment']; ?>" class="zocial yahoo small " target="_blank">Realtime</a><?php } ?>
		<?php if(isset($value["pocket"])){ ?><a href="<?php echo $value["pocket"]; ?>" class="zocial pocket small" target="_blank">Read Later</a><?php } ?>
		</div>
	</li>
<?php } ?>
</ul>
<!-- ENDS featured -->

<!-- page-navigation -->
<div class="page-navigation cf">
	<?php if(isset($page) && $page>1){ ?><div class="nav-next"><a href="?category=<?php echo $category; ?>&page=<?php echo $page-1; ?>">Prev</a></div><?php } ?>
	<?php for($i=1; $i<=$page_max; $i++){ ?>
	<div class="nav-page<?php if($i==$page){ ?> current<?php } ?>"><a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php } ?>
	<?php if(!isset($page) || $page<$page_max){ ?><div class="nav-previous"><a href="?category=<?php echo $category; ?>&page=<?php echo $page+1; ?>">Next</a></div><?php } ?>
</div>
<!--ENDS page-navigation -->
<br><br><br>

</div>
<!-- ENDS MAIN -->

<?php }elseif($category=='bokete'){ ?>
<!-- MAIN -->
<div role="main" id="main" class="cf">

<!-- categories -->
<ul class="nav-categories cf">	
	<li<?php if($category=='amazon' || $category==''){ ?> class="current"<?php } ?>><a href="?category=amazon">Amazon</a></li>
	<li<?php if($category=='wikipedia'){ ?> class="current"<?php } ?>><a href="?category=wikipedia">Wikipedia</a></li>
	<li<?php if($category=='chiebukuro'){ ?> class="current"<?php } ?>><a href="?category=chiebukuro">知恵袋</a></li>
	<li<?php if($category=='cookpad'){ ?> class="current"<?php } ?>><a href="?category=cookpad">クックパッド</a></li>
	<li<?php if($category=='bokete'){ ?> class="current"<?php } ?>><a href="?category=bokete">bokete</a></li>
	<li<?php if($category=='ustream'){ ?> class="current"<?php } ?>><a href="?category=ustream">Ustream</a></li>
</ul>	
<!-- ENDS categories -->

<!-- featured -->
<ul class="work-list cf">
<?php foreach ($text[$category] as $value) { ?>
	<li>
		<a href="<?php echo $value['link_org']; ?>" class="thumb" target="_blank"><img src="<?php echo $value['link']; ?>"></a>
		<div class="categories"><?php echo $value['thumb_data']; ?></div>
		<div class="excerpt"></div>
		<div class="center">
		<?php if(isset($value["comment"])){ ?><a href="<?php echo $value['comment']; ?>" class="zocial yahoo small " target="_blank">Realtime</a><?php } ?>
		<?php if(isset($value["pocket"])){ ?><a href="<?php echo $value["pocket"]; ?>" class="zocial pocket small" target="_blank">Read Later</a><?php } ?>
		</div>
	</li>		
<?php } ?>
</ul>
<!-- ENDS featured -->

<!-- page-navigation -->
<div class="page-navigation cf">
	<?php if(isset($page) && $page>1){ ?><div class="nav-next"><a href="?category=<?php echo $category; ?>&page=<?php echo $page-1; ?>">Prev</a></div><?php } ?>
	<?php for($i=1; $i<=$page_max; $i++){ ?>
	<div class="nav-page<?php if($i==$page){ ?> current<?php } ?>"><a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php } ?>
	<?php if(!isset($page) || $page<$page_max){ ?><div class="nav-previous"><a href="?category=<?php echo $category; ?>&page=<?php echo $page+1; ?>">Next</a></div><?php } ?>
</div>
<!--ENDS page-navigation -->
<br><br><br>

</div>
<!-- ENDS MAIN -->

<?php }else{ ?>
<!-- MAIN -->
<div role="main" id="main" class="cf">

<!-- categories -->
<ul class="nav-categories cf">
	<?php if($site=='topics'){ ?>
	<li<?php if($category=='news' || $category==''){ ?> class="current"<?php } ?>><a href="?category=news">ニュース</a></li>
	<li<?php if($category=='blog'){ ?> class="current"<?php } ?>><a href="?category=blog">ブログ</a></li>
	<li<?php if($category=='2ch'){ ?> class="current"<?php } ?>><a href="?category=2ch">2ちゃんねる</a></li>
	<li<?php if($category=='keyword'){ ?> class="current"<?php } ?>><a href="?category=keyword">注目のキーワード</a></li>
	<li<?php if($category=='trend'){ ?> class="current"<?php } ?>><a href="?category=trend">急上昇ワード</a></li>

	<?php }elseif($site=='twitter'){ ?>
	<li<?php if($category=='' || $category=='tweet'){ ?> class="current"<?php } ?>><a href="?category=tweet">話題のツイート</a></li>
	<li<?php if($category=='image'){ ?> class="current"<?php } ?>><a href="?category=image">話題の画像</a></li>
	<li<?php if($category=='video'){ ?> class="current"<?php } ?>><a href="?category=video">話題の動画</a></li>

	<?php }elseif($site=='hatena'){ ?>
	<li<?php if($category=='new' || $category==''){ ?> class="current"<?php } ?>><a href="?category=new">新着エントリー</a></li>
	<li<?php if($category=='hot'){ ?> class="current"<?php } ?>><a href="?category=hot">人気エントリー</a></li>

	<?php }elseif($site=='naver'){ ?>
	<li<?php if($category=='twitter' || $category==''){ ?> class="current"<?php } ?>><a href="?category=twitter">twitterで話題</a></li>
	<li<?php if($category=='hot'){ ?> class="current"<?php } ?>><a href="?category=hot">注目まとめ</a></li>

	<?php }elseif($site=='togetter'){ ?>
	<li<?php if($category=='twitter' || $category==''){ ?> class="current"<?php } ?>><a href="?category=twitter">twitterで話題</a></li>
	<li<?php if($category=='hot'){ ?> class="current"<?php } ?>><a href="?category=hot">注目のまとめ</a></li>

	<?php }elseif($site=='others'){ ?>
	<li<?php if($category=='amazon' || $category==''){ ?> class="current"<?php } ?>><a href="?category=amazon">Amazon</a></li>
	<li<?php if($category=='wikipedia'){ ?> class="current"<?php } ?>><a href="?category=wikipedia">Wikipedia</a></li>
	<li<?php if($category=='chiebukuro'){ ?> class="current"<?php } ?>><a href="?category=chiebukuro">知恵袋</a></li>
	<li<?php if($category=='cookpad'){ ?> class="current"<?php } ?>><a href="?category=cookpad">クックパッド</a></li>
	<li<?php if($category=='bokete'){ ?> class="current"<?php } ?>><a href="?category=bokete">bokete</a></li>
	<li<?php if($category=='ustream'){ ?> class="current"<?php } ?>><a href="?category=ustream">Ustream</a></li>
	<?php } ?>
</ul>
<!-- ENDS categories -->

<!-- posts list -->
<div id="posts-list" class="cf">
<?php if($category=='keyword'){ ?>Yahoo!リアルタイム検索 注目のキーワード<br><br><?php } ?>
<?php if($category=='trend'){ ?>Yahoo!検索 急上昇ワード<br><br><?php } ?>

<?php foreach ($text[$category] as $key => $value) { ?>
<article class="cf">
<div class="entry-left-data">
	<?php if($category=='keyword' || $category=='trend'){ ?>
	<div class="entry-date"><span class="r x-large"><?php echo $value["rank"]; ?></span></div>
	<?php }else{ ?>
	<div class="entry-date"><span class="m"><?php echo $value["day"]; ?></span><span class="d"><?php echo $value["time"]; ?></span></div>
	<?php } ?>
</div>

<div class="entry-right-data">
	<?php if($category!='tweet' && $category!='amazon'){ ?>
	<a href="<?php echo $value["title_link"]; ?>" class="post-heading" target="_blank"><?php echo $value["title"]; ?></a>
	<div class="meta">
		<?php if(isset($value["user"])){ ?><span class="user mobile"><?php echo $value["user"]; ?></span><?php } ?>
	</div>
	<?php } ?>
	<div class="excerpt">
		<?php if(isset($value["description"])){ ?><?php echo $value["description"]; ?><?php } ?>
		<?php if(isset($value["embed"])){ ?><blockquote class="twitter-tweet" lang="ja"><p> </p><a href="<?php echo $value["embed"]; ?>" target="_blank"></a></blockquote><?php } ?>
	</div>
	<?php if(isset($value["link"])){ ?><a href="<?php echo $value["link"]; ?>" class="zocial primary small" target="_blank">Read More</a><?php } ?>
	<?php if(isset($value["comment_b"])){ ?><a href="<?php echo $value["comment_b"]; ?>" class="zocial hatena small" target="_blank">View Bookmarks</a><?php } ?>
	<?php if(isset($value["comment"])){ ?><a href="<?php echo $value["comment"]; ?>" class="zocial yahoo small" target="_blank">Realtime</a><?php } ?>
	<?php if(isset($value["web"])){ ?><a href="<?php echo $value["web"]; ?>" class="zocial google small" target="_blank">Search</a><?php } ?>
	<?php if(isset($value["wikipedia"])){ ?><a href="<?php echo $value["wikipedia"]; ?>" class="zocial wikipedia small" target="_blank">Wikipedia</a><?php } ?>
	<?php if(isset($value["amazon"])){ ?><a href="<?php echo $value["amazon"]; ?>" class="zocial amazon small" target="_blank">Amazon</a><?php } ?>
	<?php if(isset($value["youtube"])){ ?><a href="<?php echo $value["youtube"]; ?>" class="zocial youtube small" target="_blank">Youtube</a><?php } ?>
	<?php if(isset($value["pocket"])){ ?><a href="<?php echo $value["pocket"]; ?>" class="zocial pocket small" target="_blank">Read Later</a><?php } ?>
</div>
</article>
<?php } ?>

<?php if($page_max>1){ ?>
<!-- page-navigation -->
<div class="page-navigation cf">
	<?php if(isset($page) && $page>1){ ?><div class="nav-next"><a href="?category=<?php echo $category; ?>&page=<?php echo $page-1; ?>">Prev</a></div><?php } ?>
	<?php for($i=1; $i<=$page_max; $i++){ ?>
	<div class="nav-page<?php if($i==$page){ ?> current<?php } ?>"><a href="?category=<?php echo $category; ?>&page=<?php echo $i; ?>"><?php echo $i; ?></a></div>
	<?php } ?>
	<?php if(!isset($page) || $page<$page_max){ ?><div class="nav-previous"><a href="?category=<?php echo $category; ?>&page=<?php echo $page+1; ?>">Next</a></div><?php } ?>
</div>
<!--ENDS page-navigation -->
<?php } ?>

</div>
<!-- ENDS posts list -->

<!-- sidebar -->
<aside id="sidebar" class="center">
<ul>
	<li>
		<div class="sidebar-top"></div>
		<div class="sidebar-content">
    		<h4 class="heading">Sponsors</h4>
    		<div id="jimuguri_ama_rss" style="width:200px;"></div>
		</div>
		<div class="sidebar-bottom"></div>
	</li>
	<br>
	<li>
		<div class="sidebar-content">
    		<!-- admax -->
			<script type="text/javascript" src="http://adm.shinobi.jp/s/c94939dbe4c9c632a230e73b9ee4dff6"></script>
			<!-- admax -->
		</div>
		<div class="sidebar-bottom"></div>
	</li>
</ul>
</aside>
<!-- ENDS sidebar -->

</div>
<!-- ENDS MAIN -->
<?php } ?>

<footer>
<!-- widgets -->
<ul class="widget-cols cf">
	<li>
		<a href="https://twitter.com/share" class="twitter-share-button" data-url="http://tiger4th.com/snews/" data-text="Social Newspaper" data-lang="ja">ツイート</a>
		<div class="fb-like" data-href="http://tiger4th.com/snews/" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
	</li>
	<li>
		<div class="g-plusone" data-size="medium" data-href="http://tiger4th.com/snews/"></div>
		<a href="http://b.hatena.ne.jp/entry/http://tiger4th.com/snews/" class="hatena-bookmark-button" data-hatena-bookmark-title="Social Newspaper" data-hatena-bookmark-layout="standard" title="このエントリーをはてなブックマークに追加"><img src="http://b.st-hatena.com/images/entry-button/button-only.gif" alt="このエントリーをはてなブックマークに追加" width="20" height="20" style="border: none;" /></a><script type="text/javascript" src="http://b.st-hatena.com/js/bookmark_button.js" charset="utf-8" async="async"></script>
	</li>
	<li>
		<div data-plugins-type="mixi-favorite" data-service-key="5c9bf80cd58d2d10fb48027c468a16df05647630" data-size="medium" data-href="http://tiger4th.com/snews/" data-show-faces="false" data-show-count="true" data-show-comment="true" data-width="100"></div>
		<iframe src="http://share.gree.jp/share?url=http%3A%2F%2Ftiger4th.com%2Fsnews%2F&type=0&height=20" scrolling="no" frameborder="0" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:100px; height:20px;" allowTransparency="true"></iframe>
	</li>
	<li>
		<div class="addthis_toolbox addthis_default_style "><a class="addthis_counter addthis_pill_style"></a></div>
		<script type="text/javascript">if ((navigator.userAgent.indexOf('iPhone') > 0 && navigator.userAgent.indexOf('iPad') == -1) || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {document.write('<a href="http://line.naver.jp/R/msg/text/?<?php echo rawurlencode('Social Newspaper http://tiger4th.com/snews/') ?>"><img src="./img/linebutton_86x20.png" width="88" height="20" alt="LINEで送る" /></a>');}</script>
	</li>
</ul>
<!-- ENDS widgets -->

<!-- bottom -->
<div id="bottom">
	<div id="content">Copyright &copy; <?php echo date("Y"); ?> <a href="http://tiger4th.com/">tiger4th.com</a> All Rights Reserved.</div>
</div>
<!-- ENDS bottom -->
</footer>

<p id="back-top"><a href="javascript:void(0);"><span></span></a></p>
</div>
<!-- ENDS WRAPPER -->

<?php require "./js.inc"; ?>
</body>
</html>