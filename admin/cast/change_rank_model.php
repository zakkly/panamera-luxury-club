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
$post    = (empty($get)) ? $function->request->getPost() : $get;

if(!empty($post)) { $getChange = !empty($post['submit_change']) ? key($post['submit_change']) : null;}
if (!empty($getChange)) {
	$flg = $function->changeCast($getChange);
	if($flg) {header('Location: ./index.php');}
}
$cast = $function->getAdminCast($shopID);
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "キャスト並び替え｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "キャスト並び替え｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "キャスト並び替え｜LaLaPalooza管理画面");

$smarty->assign("cast", isset($cast) ? $cast : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->display('admin/cast/change_rank_model.tpl');