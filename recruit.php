<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty  = new Smarty;
$function= new Front_Function();

$recruit = $function->getAllDtb("recruit","WHERE shop_id = ".BASE_ID."");
$treatment  = $function->getRecruitTreatment(BASE_ID);

$smarty->assign("CANONICAL", BASE_RECRUIT);
$smarty->assign("title", BASE_TITLE_RECRUIT);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_RECRUIT);
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);

$smarty->assign("recruit", isset($recruit) ? $recruit : null);
$smarty->assign("treatment", isset($treatment) ? $treatment : null);
$smarty->display('recruit.tpl');
