<?php
require dirname( __FILE__ ) . '/../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../includes/public_require.php';
require dirname( __FILE__ ) . '/../data/admin_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../templates_c';
$shopID  = $function->loginCheck();
$post    = $function->request->getPost();
$get     = $function->request->getQuery();

$news        = $function->getNews($shopID, $get, 1);
$contact    = $function->getApplyContact(null, 1, $get, $shopID);
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "LaLaPalooza管理画面");
$smarty->assign("news", isset($news) ? $news : null);
$smarty->assign("contact", isset($contact) ? $contact : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->display('admin/index.tpl');
