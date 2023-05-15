<?php

require dirname( __FILE__ ) . '/../../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../../includes/public_require.php';
require dirname( __FILE__ ) . '/../../data/admin_function.php';
require dirname( __FILE__ ) . '/../../data/pager_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../../templates_c';
$shopID  = $function->loginCheck();
$get         = $function->request->getQuery();
$get['pager']= !empty($get['pager']) ? $get['pager'] : 1;

$applyAll = $function->getApplyContact(null, null, null, $shopID);
$apply    = $function->getApplyContact(null, null, $get, $shopID);
$pager      = new Pager_Function(BASE_ADMIN_RECRUIT.'index.php?pager=', $get['pager'], count($applyAll), BASE_ADMIN_LIMIT);

$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "求人応募一覧｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "求人応募一覧｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "求人応募一覧｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("applyAll", isset($applyAll) ? count($applyAll) : "0");
$smarty->assign("apply", isset($apply) ? $apply : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("pager", isset($pager) ? $pager : null);
$smarty->display('admin/recruit/index.tpl');