<?php

require dirname( __FILE__ ) . '/../../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../../includes/public_require.php';
require dirname( __FILE__ ) . '/../../data/admin_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../../templates_c';
$shopID  = $function->loginCheck();
$get     = $function->request->getQuery();

if(!empty($post)) { $getChange = !empty($post['submit_change']) ? key($post['submit_change']) : null;}
if(!empty($post['submit_cast'])) { $flg = $function->modelCreateLoopUpdate($post); }

$cast = $function->getAdminCast($shopID);
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "キャスト一覧｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "キャスト一覧｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "キャスト一覧｜LaLaPalooza管理画面");

$smarty->assign("cast", isset($cast) ? $cast : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->display('admin/cast/index.tpl');