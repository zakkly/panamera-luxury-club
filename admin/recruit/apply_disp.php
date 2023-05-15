<?php

require dirname( __FILE__ ) . '/../../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../../includes/public_require.php';
require dirname( __FILE__ ) . '/../../data/admin_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../../templates_c';
$shopID  = $function->loginCheck();
$post    = $function->request->getPost();
$post['apply_id']  = !empty($post['submit_confirm']) ? key($post['submit_confirm']) : null;
$post['apply_del'] = !empty($post['submit_del']) ? key($post['submit_del']) : null;

if(!empty($post['apply_del'])) {
	$flg = $function->deleteApply($post['apply_del']);
	if($flg) { header('Location: '.BASE_ADMIN_RECRUIT.''); }
	exit;
} else {
	$apply = $function->getApplyContact($post['apply_id'], null, null, $shopID);
}
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "求人応募内容確認｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "求人応募内容確認｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "求人応募内容確認｜LaLaPalooza管理画面");

$smarty->assign("apply", isset($apply) ? $apply : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->display('admin/recruit/apply_disp.tpl');