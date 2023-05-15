	<footer class="FooterWrap bgDamask">
		<div class="inner">
			<h5 class="shopName"><img src="{$smarty.const.BASE_IMAGE}logo.png" alt="{$smarty.const.BASE_ALT}" title="" /></h5>
			<ul class="sns-nav Com">
				<li><a href="https://www.instagram.com/lala_palooza__/"><i class="fab fa-instagram"></i></a></li>
			</ul>
			<nav class="footer-nav">
				<ul>
{foreach from=$Nav key=k item=v}
					<li><a class="quicksan" href="{$smarty.const.BASE_URL}{$k}/">{$v["name"]}<span>{$v["span"]}</span></a></li>
{/foreach}
				</ul>
			</nav>
			<div class="bnrbox">
				<ul>
					<li><a href="https://nightstyle.jp/shop/lalapalooza/"><img src="{$smarty.const.BASE_IMAGE}nightstyle_bnr.jpg" alt="{$smarty.const.BASE_ALT}【ナイトスタイル】掲載ページ" title="" width="219" height="40" /></a></li>
				</ul>
			</div>
			<address>Copyright &copy; {$smarty.const.SHOP_NAME} All Rights Reserved.</address>
		</div>
	</footer>
</div>
<link rel="stylesheet" type="text/css" href="{$smarty.const.BASE_CSS}photoswipe.css">
<link rel="stylesheet" type="text/css" href="{$smarty.const.BASE_CSS}default-skin.css">
<link type="text/css" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/ui-darkness/jquery-ui.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/css/drawer.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" ></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js" ></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="{$smarty.const.BASE_JS}photoswipe.min.js"></script>
<script src="{$smarty.const.BASE_JS}photoswipe-ui-default.min.js"></script>
<script src="{$smarty.const.BASE_JS}photoswipe-setting.js"></script>
<script src="{$smarty.const.BASE_JS}common.js" type="text/javascript"></script>
<script>
	$(function(){
		$(document).on('click','.swipeTarget',function(){
			$('.swipeTarget img').each(function(){
				if($(this).height()<65){
					changeSwipe = $(this).parent().attr("data-swipe");
					$('.swipe'+changeSwipe).attr('data-size','1200x800');
				}
			});
			var swipeNo = $(this).attr("data-swipe");
			$('.swipe'+swipeNo).trigger("click");
			return false;
		});
	});
</script>
{literal}
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-135433404-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-135433404-1');
</script>
{/literal}
</body>
</html>
