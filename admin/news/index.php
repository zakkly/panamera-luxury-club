<?php

require dirname( __FILE__ ) . '/../../libs/Smarty.class.php';
require dirname( __FILE__ ) . '/../../includes/public_require.php';
require dirname( __FILE__ ) . '/../../data/admin_function.php';
require dirname( __FILE__ ) . '/../../data/pager_function.php';

$function= new Admin_Function();
$smarty  = new Smarty;
$smarty->template_dir = dirname( __FILE__ ).'/../../templates';
$smarty->compile_dir  = dirname( __FILE__ ).'/../../templates_c';
$shopID  = $function->loginCheck();
$get     = $function->request->getQuery();
$get['pager']= !empty($get['pager']) ? $get['pager'] : 1;

$newsAll = $function->getNews($shopID, null, null);
$news    = $function->getNews($shopID, $get, null);
$pager   = new Pager_Function(BASE_ADMIN_NEWS.'index.php?pager=', $get['pager'], count($newsAll), BASE_ADMIN_LIMIT);

$rinfo = $function->getAllDtb("recruit","WHERE shop_id = ".$shopID."");

$smarty->assign("title", "お知らせ一覧｜LaLaPalooza管理画面");
$smarty->assign("DESCRIPTION", "お知らせ一覧｜LaLaPalooza管理画面");
$smarty->assign("KEYWORDS", "お知らせ一覧｜LaLaPalooza管理画面");

$smarty->assign("shopID", isset($shopID) ? $shopID : null);
$smarty->assign("newsAll", isset($newsAll) ? count($newsAll) : "0");
$smarty->assign("news", isset($news) ? $news : null);
$smarty->assign("rinfo", isset($rinfo) ? $rinfo : null);
$smarty->assign("pager", isset($pager) ? $pager : null);
$smarty->display('admin/news/index.tpl');