<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("CANONICAL", BASE_ACCESS);
$smarty->assign("title", BASE_TITLE_ACCESS);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_ACCESS);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);
$smarty->display('access.tpl');
