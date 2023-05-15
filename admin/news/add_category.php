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

if(!empty($post['submit_add'])) {
	$error = $function->checkNewsCategory($post);
	if(empty($error)) {
		$flg = $function->createNewsCategory($post);
		$msg = ($flg) ? "※新規カテゴリーを登録しました。" : "※予期せぬエラーが発生しました"; 
	}
}

if(!empty($post['changeNewsCategory'])) {
	$error2 = $function->checkLoopNewsCategory($post);
	if(empty($error2)) {
		$flg = $function->changeNewsCategory($post);
		$msg2 = ($flg) ? "※リンクカテゴリーを更新しました。" : "※予期せぬエラーが発生しました"; 
	}
	$post = [];
}

$category = $function->getNewsCategory(BASE_ID_LALAPALOOZA);
$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "カテゴリー登録・編集 ｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "カテゴリー登録・編集｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "カテゴリー登録・編集｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("category", isset($category) ? $category : null);
$smarty->assign("post", isset($post) ? $post : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("error", isset($error) ? $error : null);
$smarty->assign("error2", isset($error2) ? $error2 : null);
$smarty->assign("msg", isset($msg) ? $msg : null);
$smarty->assign("msg2", isset($msg2) ? $msg2 : null);
$smarty->display('admin/news/add_category.tpl');