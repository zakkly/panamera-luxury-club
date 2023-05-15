<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();
$post    = $function->request->getPost();

$smarty->assign("CANONICAL", BASE_URL."error404.php");
$smarty->assign("title", "404 Not Found｜".BASE_TITLE);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION."大変申し訳ございません・・・・お探しのページは見つかりませんでした。");
$smarty->assign("KEYWORDS", BASE_KEYWORD);

$smarty->display('error404.tpl');
