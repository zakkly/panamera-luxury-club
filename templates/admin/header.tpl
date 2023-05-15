<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,user-scalable=no,maximum-scale=1" />
<meta name="Description" content="{$DESCRIPTION}">
<meta name="Keywords" content="{$KEYWORDS}">
<title>{$title}</title>
<link rel="stylesheet" type="text/css" href="{$smarty.const.STYLE_CSS}?ver={$smarty.now|date_format:"%Y%m%d%H%M%S"}">
<link rel="stylesheet" type="text/css" href="{$smarty.const.COM_CSS}?ver={$smarty.now|date_format:"%Y%m%d%H%M%S"}">
<link rel="stylesheet" type="text/css" href="{$smarty.const.ADMIN_CSS}?ver={$smarty.now|date_format:"%Y%m%d%H%M%S"}">
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/css/drawer.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js" ></script>
<script src="https://code.jquery.com/ui/1.10.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.2.1/js/drawer.min.js" ></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javascript" src="{$smarty.const.BASE_ADMIN_NEWS}ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="{$smarty.const.BASE_ADMIN_NEWS}ckfinder/ckfinder.js"></script>
<script src="{$smarty.const.BASE_JS}common.js" type="text/javascript"></script>
<script type="text/javascript">
{literal}
$(function() {
	$(".sortable_cast").sortable();
	$(".sortable_cast").disableSelection();
	$("#submit_cast").click(function() {
		var result = $(".sortable_cast").sortable("toArray");
		$("#result_cast").val(result);
		$("form").submit();
	});
});
$("#trash").droppable({
  hoverClass: "ui-state-hover",
  drop: function( event, ui ){
	if($.browser.msie){
	  var temp = ui.draggable.empty();
	  setTimeout(function(){temp.remove()},100);
	}
	else{
	  ui.draggable.remove();
	}
  }
});
$(document).ready(function(){
  $("#sortable_cast").sortable();
  $("#trash_cast").droppable({
	hoverClass: "ui-state-hover",
	drop: function( event, ui ){
	  ui.draggable.remove();
	}
  });
});
{/literal}
</script>
</head>
<body class="drawer drawer--right admin">
<div id="Wrapper" class="bgDamask">
	<header class="global-header">
		<div class="inner Com">
			<h1 class="header_logo">
				<a href="{$smarty.const.BASE_URL}">
					<img src="{$smarty.const.BASE_IMAGE}header_logo.png" alt="{$smarty.const.BASE_ALT}" title="">
				</a>
			</h1>
			<div class="nav-toggle drawer-toggle drawer-hamburger"><span class="drawer-hamburger-icon"></span><span class="sp-nav">MENU</span></div>
			<nav class="global-nav drawer-nav">
				<ul class="header-nav admin-nav">
					<li><a class="quicksan" href="{$smarty.const.BASE_ADMIN}">Top<span>管理画面トップ</span></a></li>
					<li class="menu__single">
						<a class="quicksan" href="{$smarty.const.BASE_ADMIN_NEWS}">News<span>お知らせ管理</span></a>
						<ul class="menu__second-level">
							<li><a class="quicksan" href="{$smarty.const.BASE_ADMIN_NEWS}add_edit.php">新規登録</a></li>
							<li><a class="quicksan" href="{$smarty.const.BASE_ADMIN_NEWS}add_category.php">カテゴリー</a></li>
						</ul>
					</li>
					<li class="menu__single">
						<a class="quicksan" href="{$smarty.const.BASE_ADMIN_CAST}">Cast<span>キャスト管理</span></a>
						<ul class="menu__second-level">
							<li><a class="quicksan" href="{$smarty.const.BASE_ADMIN_CAST}add_edit.php">新規登録</a></li>
							<li><a class="quicksan" href="{$smarty.const.BASE_ADMIN_CAST}change_rank_model.php">女の子並び替え</a></li>
						</ul>
					</li>
					<li class="menu__single">
						<a class="quicksan" href="{$smarty.const.BASE_ADMIN_RECRUIT}">Recruit<span>求人応募</span></a>
						<ul class="menu__second-level">
							<li>
							{if !empty($rinfo)}
								<a href="{$smarty.const.BASE_ADMIN_RECRUIT}recruit_info.php?post_edit_id={$rinfo[0].id}">求人情報</a>
							{else}
								<a href="{$smarty.const.BASE_ADMIN_RECRUIT}recruit_info.php">求人情報</a>
							{/if}
							</li>
						</ul>
					</li>
				</ul>
			</nav>
		</div>
	</header>
