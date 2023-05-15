<?php
require dirname( __FILE__ ) . '/includes/public_require.php';
require dirname( __FILE__ ) . '/libs/Smarty.class.php';
require dirname( __FILE__ ) . '/data/front_function.php';

$smarty = new Smarty;
$function= new Front_Function();
$post    = $function->request->getPost();
$get     = $function->request->getQuery();
$get['cast'] = !empty($get['cast']) ? $get['cast'] : null;

if(empty($get['cast'])) {
	header("Location: index.php");
	exit;
} elseif(is_numeric($get['cast']) == false) {
	$castID = $function->getAllDtb("cast","WHERE shop_id = ".BASE_ID." AND cast_name_rome = '".$get['cast']."'");
	$get['cast'] = $castID[0]['id'];
}

$cast    = $function->getFrontCast(BASE_ID, null, $get['cast']);
$castlist   = $function->getFrontCast(BASE_ID);

$smarty->assign("CANONICAL", BASE_REWRITE_PROFILE.$cast[0]['cast_name_rome']."/");
$smarty->assign("title", $cast[0]['cast_name_kana']."-".$cast[0]['cast_name']."-のプロフィール｜".BASE_TITLE_TEMP);
$smarty->assign("DESCRIPTION", BASE_DESCRIPTION_TEMP.$cast[0]['cast_name_kana']."-".$cast[0]['cast_name']."-さんのプロフィールページです。".$cast[0]['cast_name']."-さんの写真や詳しいプロフィール情報はこちらで確認頂けます。");
$smarty->assign("KEYWORDS", BASE_KEYWORD);
$smarty->assign('Nav',_NAV_);

$smarty->assign("cast", isset($cast) ? $cast : null);
$smarty->assign("castlist", isset($castlist) ? $castlist : null);
$smarty->display('profile.tpl');
