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
$category= $function->getAllDtb("news_category","WHERE shop_id = ".$shopID."");
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$post['post_edit_id'] = !empty($post['post_edit_id']) ? $post['post_edit_id'] : null;
$post['post_edit_id'] = !empty($post['news_submit'])  ? key($post['news_submit']) : $post['post_edit_id'];
$post['submit_delete']  = !empty($post['submit_delete'])  ? key($post['submit_delete']) : null;

if(!empty($post['return'])) {
	header("Location: index.php");
	exit;
} elseif(!empty($post['submit_delete'])) {
	$function->deleteNews($post['submit_delete']);
	header("Location: index.php");
	exit;
}

if (!empty($post['submit_add'])) {
	$error = $function->NewsErrorCheck($post);
	if (empty($error)) {
		$function->createNews($post);
		header('Location: index.php');
		exit;
	}
} elseif (!empty($post['submit_change'])) {
	$error = $function->NewsErrorCheck($post);
	if (empty($error)) {
		$function->changeNews($post);
		header('Location: index.php');
		exit;
	} else {
		$post = $function->changeNewsPost($post['post_edit_id']);
	}
} elseif (!empty($post['post_edit_id'])) {
	$post = $function->changeNewsPost($post['post_edit_id']);
}

$smarty->assign("title", "お知らせ新規登録・編集 ｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "お知らせ新規登録・編集｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "お知らせ新規登録・編集｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("news", isset($post) ? $post : null);
$smarty->assign("category", isset($category) ? $category : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("post_edit_id", isset($post['post_edit_id']) ? $post['post_edit_id'] : null);
$smarty->assign("error", isset($error) ? $error : null);
$smarty->assign("msg", isset($msg) ? $msg : null);
$smarty->display('admin/news/add_edit.tpl');