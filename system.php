<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("CANONICAL", BASE_SYSTEM);
$smarty->assign("title", BASE_TITLE_SYSTEM);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_SYSTEM);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);
$smarty->display('system.tpl');
