<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';

$smarty = new Smarty;

$smarty->assign("CANONICAL", BASE_CONCEPT);
$smarty->assign("title", BASE_TITLE_CONCEPT);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_CONCEPT);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);
$smarty->display('concept.tpl');
