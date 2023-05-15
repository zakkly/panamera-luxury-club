<?php
require dirname( __FILE__ ) . '/../includes/public_require.php';

if(!empty($_SESSION["admin_flg"])) {
	unset($_SESSION["admin_flg"]);
	unset($_SESSION['shop_id']);
	header("Location: ".BASE_ADMIN."login.php");
} else {
	header("Location: ".BASE_URL."");
}

exit;
