<?php

require dirname( __FILE__ ) . '/../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../includes/public_require.php';
require dirname( __FILE__ ) . '/../data/admin_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../templates_c';
$post    = $function->request->getPost();

if (empty($post['userid']) && empty($post['passwd'])) {
	$errorMsg = "";
} else {
	$adminData = $function->getAllDtb("admin","WHERE login_id = '".$post['userid']."' AND password = '".md5($post['passwd'])."'");
	if(!empty($adminData)) {
		session_start();
		$_SESSION['admin_flg'] = $adminData[0]['login_id'];
		$_SESSION['shop_id']   = 4;
		header("Location: index.php");
		exit;
	} else {
		$errorMsg = "※ID又はpasswordが違います";
	}
}

$smarty->assign("title", "ログイン｜LaLaPalooza管理画面");
$smarty->assign("errorMsg", isset($errorMsg) ? $errorMsg : null);
$smarty->assign("adminData", isset($adminData) ? $errorMsg : null);
$smarty->display('admin/login.tpl');
