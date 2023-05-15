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
$post['post_edit_id'] = !empty($post['post_edit_id']) ? $post['post_edit_id'] : null;
$treatment  = $function->getRecruitTreatment($shopID, $post);

if(!empty($post['return'])) {
	header("Location: index.php");
	exit;
}

if (!empty($post['post_edit_id'])) {
	$post = $function->changeRecruitPost($post['post_edit_id']);
} elseif (!empty($post['submit_add'])) {
	$error = $function->RecruitErrorCheck($post);
	if (empty($error)) {
		$function->createRecruit($shopID, $post);
		header('Location: index.php');
		exit;
	}
} elseif (!empty($post['submit_change'])) {
	$error = $function->RecruitErrorCheck($post);
	if (empty($error)) {
		$function->changeRecruit($shopID, $post);
		header('Location: index.php');
		exit;
	} else {
		//$post = $function->changeRecruitPost($post['post_edit_id']);
	}
}

$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "求人情報 登録・編集 ｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "求人情報 登録・編集｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "求人情報 登録・編集｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("treatment", isset($treatment) ? $treatment : null);
$smarty->assign("recruit", isset($post) ? $post : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("post_edit_id", isset($post['post_edit_id']) ? $post['post_edit_id'] : null);
$smarty->assign("error", isset($error) ? $error : null);
$smarty->assign("msg", isset($msg) ? $msg : null);
$smarty->display('admin/recruit/recruit_info.tpl');