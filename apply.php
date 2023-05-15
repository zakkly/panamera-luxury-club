<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';
require dirname( __FILE__ ) . '/data/mail_function.php';

$smarty = new Smarty;
$function= new Front_Function();
$mailFunc= new Mail_Function();
$post         = $function->request->getPost();

if(!empty($post['contact_add'])) {
	$error = $function->ApplyErrorCheck($post);
	if(empty($error)) {
		$function->ApplyContactInsert(BASE_ID_ELVISION, $post);
		$mailFunc->applyMailToCreate($post);
		$msg = "※応募内容を送信しました。担当者からの返答をお待ちください。";
		unset($post);
	}
}

$smarty->assign("CANONICAL", BASE_APPLY);
$smarty->assign("title", BASE_TITLE_APPLY);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_APPLY);
$smarty->assign("KEYWORDS", BASE_KEYWORD);

$smarty->assign("error", isset($error) ? $error : null);
$smarty->assign("msg", isset($msg) ? $msg : null);
$smarty->display('apply.tpl');
