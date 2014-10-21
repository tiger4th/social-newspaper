<!-- Google Analytics -->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20423739-4']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<!-- twitter埋め込み -->
<script src="//platform.twitter.com/widgets.js" charset="utf-8"></script>

<!-- facebook -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ja_JP/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<!-- /facebook -->

<!-- twitter -->
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<!-- Google +1 -->
<script type="text/javascript">
  window.___gcfg = {lang: 'ja'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>

<!-- mixi -->
<script type="text/javascript">(function(d) {var s = d.createElement('script'); s.type = 'text/javascript'; s.async = true;s.src = '//static.mixi.jp/js/plugins.js#lang=ja';d.getElementsByTagName('head')[0].appendChild(s);})(document);</script>

<!-- addthis -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e3ab77310f2fc55"></script>


<!-- JavaScript at the bottom for fast page loading -->
<!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.7.1.min.js"><\/script>')</script>

<!-- scripts concatenated and minified via build script -->
<script src="js/custom.js"></script>

<!-- superfish -->
<script src="js/superfish-1.4.8/js/hoverIntent.js"></script>
<script src="js/superfish-1.4.8/js/superfish.js"></script>
<script src="js/superfish-1.4.8/js/supersubs.js"></script>
<!-- ENDS superfish -->

<script src="js/tweet/jquery.tweet.js" ></script>
<!-- <script src="js/jquery.isotope.min.js"></script> -->
<script src="js/jquery.nivo.slider.js" ></script>
<!-- <script src="js/css3-mediaqueries.js"></script> -->
<script src="js/tabs.js"></script>
<script src="js/poshytip-1.1/src/jquery.poshytip.min.js"></script>
<!-- end scripts -->


<!-- amazon -->
<script type="text/javascript" charset="UTF-8" src="http://www.google.com/jsapi"></script>
<script type="text/javascript">
//<![CDATA[

google.setOnLoadCallback( function(){

  // RSSフィードのURL 複数登録するとランダムにどれか１つが表示される
  var arrUrlAmaFeed = [];
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/books/ref=zg_bs_books_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/dvd/ref=zg_bs_dvd_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/videogames/ref=zg_bs_videogames_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/music/ref=zg_bs_music_rsslink');
  //arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/hobby/ref=zg_bs_hobby_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/hobby/2189356051/ref=zg_bs_2189356051_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/hobby/2189366051/ref=zg_bs_2189366051_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/books/466280/ref=zg_bs_466280_rsslink');
  arrUrlAmaFeed.push('http://www.amazon.co.jp/gp/rss/bestsellers/dvd/562020/ref=zg_bs_562020_rsslink');

  var numEntriesShow   = 10;     // 表示する数 最高：10
  var bolRandom        = true;   // true：ランダムにする ／ false：ランキング順
  var bolTextLink      = false;  // true：テキストのリンクをつける ／ false：つけない
  var strElmId         = 'jimuguri_ama_rss';  // 表示させたい場所のタグの id
  var numImgHeight     = 170;    // 画像の高さ (px) 最高：500 ※単位は記述不可
  var numImgWidth      = 170;    // 画像の幅 (px) 最高：500 ※単位は記述不可
  var numDispWidth     = 200;    // 表示させる横幅 (px) ※単位は記述不可
  var numDispHeight    = 170;    // 表示させる高さ (px) ※単位は記述不可
  var cssOffsetWidth   = 'auto'; // 横方向の位置調整    ※ % や px で指定・マイナス値も可能
  var cssOffsetHeight  = '0';    // 縦方向の位置調整    ※ % や px で指定・マイナス値も可能
  var strAmaTrackingId = 'tiger4th-22';  // 自身の AmazonトラッキングID


  // RSSフィードを取得
  var objFeed = new google.feeds.Feed( arrUrlAmaFeed[ Math.floor(Math.random()*arrUrlAmaFeed.length) ] + '&tag=' + strAmaTrackingId );
  objFeed.setNumEntries( 10 );
  objFeed.load( function(objResult) {
    var $elmTarget = $( '#' + strElmId );
    if (objResult.error) {  // RSSフィードを取得できなかった場合
      $elmTarget.html( '<small>' + objResult.error['code'] + '：' + objResult.error['message'] + '<\/small>' );
      return false;
    }

    var strBuf = '';
    var strTmp = '';
    var objEntries = objResult.feed.entries;
    //console.log(objEntries);

    // 取得したRSSフィードを調整・加工
    if (bolRandom) {
      objEntries.shuffle();
    }
    $(objEntries).each(
      function(i) {
        if (i == numEntriesShow) {
          return false;
        }
        this.title = this.title.substring( this.title.indexOf(':')+2, this.title.length );
        strTmp = this.content;
        strTmp = strTmp.substring( strTmp.indexOf('<a'), strTmp.indexOf('\/a>')+3 );
        strTmp = strTmp.replace( /<a/, '<a target="_blank" ' );
        strTmp = strTmp.replace( /<img/, '<img title="' + this.title + '" ' );
        strTmp = strTmp.replace( /_SL160_/, '_SY500_' );
        if ( strTmp.indexOf('no-img') == -1 && strTmp.indexOf('comingsoon') == -1 ) {
          strTmp = strTmp.replace( /<img/, '<img style="margin:' + cssOffsetHeight + ' auto 0 ' + cssOffsetWidth + ';" width="' + numImgWidth + '"' );
        }
        else {
          strTmp = strTmp.replace( /src=\".+\"/, 'src="http://ec1.images-amazon.com/images/G/09/nav2/dp/no-image-no-ciu.gif" width="' + numImgWidth + '"' );
        }
        if (bolTextLink) {
          strTmp = strTmp.replace( /<\/a>/, '<br \/><small>' + this.title + '<\/small><\/a>' );
        }
        strBuf += '<div class="jimuguri_ama_rss_item" style="margin:0; padding:0; vertical-align:top; width:' + numDispWidth + 'px; overflow:hidden; float:left;">' + strTmp + '<\/div>';
      }
    );

    // 表示
    $elmTarget.html( strBuf + '<br style="clear:both;" \/>' );
  });

});

google.load('feeds', '1');

google.load('jquery', '1');

Array.prototype.shuffle = function() {
  var i = this.length;
  while(i){
    var j = Math.floor(Math.random()*i);
    var t = this[--i];
    this[i] = this[j];
    this[j] = t;
  }
  return this;
}

//]]>
</script><script src="http://www.google.com/uds/?file=feeds&v=1" type="text/javascript"></script>
<link href="http://www.google.com/uds/api/feeds/1.0/77f89919ef841f93359ce886504e4e3f/default+ja.css" type="text/css" rel="stylesheet">
<script src="http://www.google.com/uds/api/feeds/1.0/77f89919ef841f93359ce886504e4e3f/default+ja.I.js" type="text/javascript"></script>


<!-- scroll to top -->
<script>
$(document).ready(function(){

	// hide #back-top first
	$("#back-top").hide();
	
	// fade in #back-top
	$(function () {
		$(window).scroll(function () {
			if ($(this).scrollTop() > 100) {
				$('#back-top').fadeIn();
			} else {
				$('#back-top').fadeOut();
			}
		});

		// scroll body to 0px on click
		$('#back-top a').click(function () {
			$('body,html').animate({
				scrollTop: 0
			}, 'slow');
			return false;
		});
	});

});
</script>


<!-- サイト内リンクJS置換 -->
<script>
$(function(){
  if (navigator.userAgent.indexOf('iPhone') > 0 || navigator.userAgent.indexOf('iPad') > 0 || navigator.userAgent.indexOf('iPod') > 0 || navigator.userAgent.indexOf('Android') > 0) {
    //ページ内のaタグ群を取得。aTagsに配列として代入。
    var aTags = $('a'); 
    //全てのaタグについて処理
	aTags.each(function(){
		var target = $(this).attr('target');
		
		//内部リンクのみ書き換え
		if(target != '_blank'){
			//aタグのhref属性からリンク先url取得
			var url = $(this).attr('href');
			//念のため、href属性は削除
			$(this).removeAttr('href');
        	//クリックイベントをバインド
			$(this).click(function(){
				location.href = url;
			});
		}
    });
  }
});
</script>


<?php if($site=="niconico"){ ?>
<!-- 外部再生禁止動画対応 -->
<script type="text/javascript">
window.onload=function remove(){
  var elements = document.getElementsByClassName("movie");
  for(var i=0;i<elements.length;i++){
    if(elements[i].innerHTML==''){
      elements[i].className='';
    }
    if(elements[i].innerHTML!='' && elements[i].innerHTML.length<1000){
      var url = elements[i].firstChild.src;
      url = url.replace("ext", "www"); 
      url = url.replace("thumb_watch", "watch");
      url = url.split("?"); 
      elements[i].href=url[0];
//      elements[i].href=elements[i].firstChild.src;
      elements[i].innerHTML='';
//      elements[i].target='_blank';
    }
//    if(elements[i].innerHTML.length<1000)elements[i].href=elements[i].firstChild.src;elements[i].firstChild.target='_blank';
  }
}
</script>
<?php } ?>