<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';
require dirname( __FILE__ ) . '/data/pager_function.php';

$smarty  = new Smarty;
$function= new Front_Function();

$get     = $function->request->getQuery();
$get['pager']= !empty($get['pager']) ? $get['pager'] : 1;

$newsAll = $function->getFrontNews(BASE_ID);
$news    = $function->getFrontNews(BASE_ID, $get);
$pager   = new Pager_Function(BASE_NEWSPAGE , $get['pager'] , count($newsAll), BASE_LIMIT_SP_PAGEING_LIST);

$smarty->assign("CANONICAL", BASE_NEWS);
$smarty->assign("title", BASE_TITLE_NEWS);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_NEWS);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);

$smarty->assign("newsAll", isset($newsAll) ? count($newsAll) : "0");
$smarty->assign("news", isset($news) ? $news : null);
$smarty->assign("pager", isset($pager) ? $pager : null);
$smarty->display('newslist.tpl');
