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
</head>
<body>
	<div id="Wrapper" class="bgDamask">
		<div class="adminWrap">
			<div class="login">
				<h1 class="h1_admin_title"><img src="{$smarty.const.BASE_IMAGE}admin_logo.png"></h1>
				<div class="login-box">
					<span style="color:red;">{$errorMsg}</span>
					<form method="post" action="" id="login" class="log_form">
						<p class="log_text"><span>ユーザ名</span><input type="text" name="userid" id="userid"></p>
						<p class="log_text"><span>パスワード</span><input type="password" name="passwd" id="passwd"></p>
						<p class="log_btn"><input type="submit" value="ログイン"  class="submitstyle"  name="Submit" /></p>
					</form>
				</div>
			</div>
		</div>
		<footer class="FooterWrap bgDamask">
			<div class="inner">
				<h5 class="shopName quicksan"><img src="{$smarty.const.BASE_IMAGE}admin_logo.png"></h5>
				<address>Copyright &copy; LaLaPalooza All Rights Reserved.</address>
			</div>
		</footer>
	</div>
</body>
</html>
