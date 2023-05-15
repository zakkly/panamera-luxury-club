<?php

require dirname( __FILE__ ) . '/../../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../../includes/public_require.php';
require dirname( __FILE__ ) . '/../../data/admin_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../../templates_c';
//$function->loginRootCheck();
$shopID  = $function->loginCheck();
$get     = $function->request->getQuery();
$post    = (empty($get)) ? $function->request->getPost() : $get;
$blood   = $function->getAllMtb("blood_type");
$const   = $function->getAllMtb("constellation");
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$post['post_edit_id'] = !empty($post['post_edit_id']) ? $post['post_edit_id'] : null;
$post['post_edit_id'] = !empty($post['cast_submit'])  ? key($post['cast_submit']) : $post['post_edit_id'];
$post['submit_delete']  = !empty($post['submit_delete'])  ? key($post['submit_delete']) : null;

if(!empty($post['return'])) {
	header("Location: index.php");
	exit;
} elseif(!empty($post['submit_delete'])) {
	$function->deleteCast($post['submit_delete']);
	header("Location: index.php");
	exit;
}
if (!empty($post['submit_add'])) {
	$error = $function->castErrorCheck($post, null, $shopID);
	if (empty($error)) {
		$lastID = $function->castCreateInsert($shopID, $post);
		header('Location: add_edit.php?post_edit_id='.$lastID.'');
		exit;
	}
} elseif (!empty($post['submit_change'])) {
	$error = $function->castErrorCheck($post, "1", $shopID);
	if (empty($error)) {
		$lastID = $function->castCreateUpdate($shopID, $post);
		header('Location: index.php');
		exit;
	}
	$post = $function->castChangeImage($post);
} elseif (!empty($post['post_edit_id'])) {
	$post = $function->changeCastPost($post['post_edit_id']);
}

$smarty->assign("title", "キャスト新規登録・編集 ｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "キャスト新規登録・編集｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "キャスト新規登録・編集｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("blood_type", isset($blood) ? $blood : null);
$smarty->assign("constellation", isset($const) ? $const : null);
$smarty->assign("cast", isset($post) ? $post : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("post_edit_id", isset($post['post_edit_id']) ? $post['post_edit_id'] : null);
$smarty->assign("error", isset($error) ? $error : null);
$smarty->assign("msg", isset($msg) ? $msg : null);
$smarty->display('admin/cast/add_edit.tpl');