<?php

require_once dirname(__FILE__) . '/admin_function.php';

class Mail_Function extends Admin_Function {
	
	/* 
	 * MD5でランダムパスのセキュリティ強化
	 */
	function randomPass($length = 8) {
		return substr(base_convert(md5(uniqid()), 16, 36), 0, $length);
	}

	/* 
	 * 求人応募メールを送信
	 */
	public function applyMailToCreate($post) {
		
		mb_language("ja");
		mb_internal_encoding("UTF-8");
		$to   = !empty($post['your_email']) ? "".BASE_EMAIL.",".$post['your_email']."" : "".BASE_EMAIL."" ;
		$title="【応募ありがとうございます】";
		$from = "From: " . mb_encode_mimeheader (mb_convert_encoding("LaLaPalooza(ララパルーザ)","ISO-2022-JP","AUTO")) . "<" .BASE_EMAIL. ">";
		$body = <<<EOM

--------------------------------------------------

この度は、お問い合わせ頂き誠にありがとうございます。
あなたの人生にとって、ほんの一瞬の出来事かもしれませんが、
当店一同、このご縁を大切に、そして貴女とお会いできる日を楽しみにしております。
担当者からご連絡を差し上げますので、今しばらくお待ち下さい。

宜しくお願い致します。

お名前　　　　: {$post['your_name']}
生年月日　　　: {$post['your_year']}年　{$post['your_month']}月
メールアドレス: {$post['your_email']}
携帯番号　　　: {$post['your_tel']}
体入希望日　　: {$post['date']}

質問内容：

{$post['your_comment']}

†-------------------------------------†

LaLaPalooza(ララパルーザ)

千葉県松戸市本町20-1 新角ビル4F-A

†-------------------------------------†

--------------------------------------------------
EOM;

		$rc = mb_send_mail($to,$title,$body,$from);
		
		return $rc;
	}
}