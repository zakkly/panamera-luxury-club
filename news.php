<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();

$get         = $function->request->getQuery();

if(empty($get['id'])) {
	header("Location: newslist.php");
	exit;
}

$news = $function->getAllDtb("news","WHERE id = ".$get['id']."");
$newsPN = $function->getFrontNewsPrevNext(BASE_ID, $get['id']);

$smarty->assign("CANONICAL", BASE_NEWS_DISP.$news[0]['id']);
$smarty->assign("title", $news[0]['news_title']."｜".BASE_TITLE_TEMP);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_TEMP."からのお知らせ。".$news[0]['news_title']);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);

$smarty->assign("news", isset($news) ? $news : null);
$smarty->assign("newsPN", isset($newsPN) ? $newsPN : null);
$smarty->display('news.tpl');
