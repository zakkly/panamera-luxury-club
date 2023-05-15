<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();
$post    = $function->request->getPost();

$smarty->assign("CANONICAL", BASE_URL."error403.php");
$smarty->assign("title", "403 Forbidden｜".BASE_TITLE);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION."アクセスが禁止されているか、ホストがアクセス禁止処分を受けている可能性があります。");
$smarty->assign("KEYWORDS", BASE_KEYWORD);

$smarty->display('error403.tpl');
