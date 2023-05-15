<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();
$post    = $function->request->getPost();

$news= $function->getFrontNews(BASE_ID, null, 1, null);
$castlist   = $function->getFrontCast(BASE_ID);

$smarty->assign("CANONICAL", BASE_URL);
$smarty->assign("title", BASE_TITLE);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION);
$smarty->assign("KEYWORDS", BASE_KEYWORD);

$smarty->assign("news", isset($news) ? $news : null);
$smarty->assign("castlist", isset($castlist) ? $castlist : null);
$smarty->assign('Nav',_NAV_);
$smarty->display('index.tpl');
