<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();

$castlist   = $function->getFrontCast(BASE_ID);

$smarty->assign("CANONICAL", BASE_CAST);
$smarty->assign("title", BASE_TITLE_CAST);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_CAST);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);

$smarty->assign("castlist", isset($castlist) ? $castlist : null);
$smarty->display('cast.tpl');
