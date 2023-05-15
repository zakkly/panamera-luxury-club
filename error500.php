<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();
$post    = $function->request->getPost();

$smarty->assign("CANONICAL", BASE_URL."error500.php");
$smarty->assign("title", "500 Server Error｜".BASE_TITLE);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION."システムエラーが発生しています。お手数ですが、しばらく時間を置いてから、再度お試しください。");
$smarty->assign("KEYWORDS", BASE_KEYWORD);

$smarty->display('error500.tpl');
