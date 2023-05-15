<?php
//==========================================================
// ■ 定数宣言
//==========================================================
#define("BASE_URL", "https://lalapaluuza-matsudo.com/");
define("BASE_URL", "http://localhost/proud/panamera-luxury-club/");
define("BASE_EMAIL", "lalapalooza.t@gmail.com");

//店舗ID
define("BASE_ID", 4);

//定数
define("SHOP_NAME", "PANAMERA");
define("SHOP_NAME_JP", "パナメーラ");
define("INSTAGRAM", "https://www.instagram.com/lala_palooza__/");

//総合定数
define("BNR_COUNT","10");
define("BASE_CONT_LIST","15");
define("BASE_ADMIN_LIMIT","20");
define("BASE_LIMIT_SP_PAGEING_LIST","12");

define("BASE_ADMIN", BASE_URL."admin/");
define("BASE_FUNCTION", BASE_URL."data/");
define("BASE_INCLUDES", BASE_URL."includes/");
define("BASE_SMARTY", BASE_URL."libs/");
define("BASE_TEMP", BASE_URL."templates/");
define("BASE_TEMP_C", BASE_URL."templates_c/");

//ADMIN
define("BASE_ADMIN_NEWS", BASE_ADMIN."news/");
define("BASE_ADMIN_NEWS_IMAGE", BASE_ADMIN_NEWS."image/");
define("BASE_ADMIN_CAST", BASE_ADMIN."cast/");
define("BASE_ADMIN_CAST_IMAGE", BASE_ADMIN_CAST."image/");
define("BASE_ADMIN_RECRUIT", BASE_ADMIN."recruit/");

//CSS
define("BASE_CSS", BASE_URL."css/");
define("STYLE_CSS", BASE_CSS."style.css");
define("COM_CSS", BASE_CSS."common.css");
define("DESIGN_CSS", BASE_CSS."design.css");
define("ADMIN_CSS", BASE_CSS."admin.css");

//IMAGE
define("BASE_IMAGE", BASE_URL."image/");
define("COM_IMAGE", BASE_IMAGE."common/");

//JS
define("BASE_JS", BASE_URL."js/");

define("BASE_CONCEPT", BASE_URL."concept/");
define("BASE_SYSTEM", BASE_URL."system/");
define("BASE_CAST", BASE_URL."cast/");
define("BASE_NEWS", BASE_URL."newslist/");
define("BASE_NEWSPAGE", BASE_URL."news/page/");
define("BASE_NEWS_DISP", BASE_URL."contents/news/");
define("BASE_ACCESS", BASE_URL."access/");
define("BASE_RECRUIT", BASE_URL."recruit/");
define("BASE_APPLY", BASE_URL."apply/");
define("BASE_REWRITE_PROFILE", BASE_URL."profiles/");

//イメージサーバーパス
define("BASE_SERVER", "/home/proud/www/lalapalooza/");
//define("BASE_SERVER", "F:/xampp/htdocs/lalapalooza/");
define("BASE_SITE_ADMIN", "admin/");
define("BASE_ADMIN_IMAGE_NEWS", BASE_SERVER.BASE_SITE_ADMIN."news/image/");
define("BASE_ADMIN_IMAGE_CAST", BASE_SERVER.BASE_SITE_ADMIN."cast/image/");

define("BASE_KEYWORD", "松戸,キャバクラ,接待,団体,夜,遊び,お酒");
define("BASE_ALT", "松戸キャバクラ ".SHOP_NAME."-".SHOP_NAME_JP."-");
define("BASE_TITLE", "【公式】松戸キャバクラ ".SHOP_NAME."-".SHOP_NAME_JP."-");
define("BASE_TITLE_TEMP", "松戸キャバクラ ".SHOP_NAME."-".SHOP_NAME_JP."-");
define("BASE_TITLE_CONCEPT", "コンセプト｜".BASE_TITLE_TEMP);
define("BASE_TITLE_SYSTEM", "料金システム｜".BASE_TITLE_TEMP);
define("BASE_TITLE_CAST", "キャスト一覧｜".BASE_TITLE_TEMP);
define("BASE_TITLE_NEWS", "お知らせ ｜".BASE_TITLE_TEMP);
define("BASE_TITLE_ACCESS", "アクセス｜".BASE_TITLE_TEMP);
define("BASE_TITLE_RECRUIT", "求人情報｜".BASE_TITLE_TEMP);
define("BASE_TITLE_APPLY", "ご応募｜".BASE_TITLE_TEMP);
define("BASE_DESCRIPTION", "松戸エリア最高級のキャバクラ、".SHOP_NAME."-".SHOP_NAME_JP."-の店舗ページはこちら。六本木・銀座・西麻布などの都内一等地のお店負けない高級キャバクラとして人気のお店。3フロア完備のVIPルームがエレガントなひと時を演出。毎月開催されるイベントも要チェック。フロアレディも随時募集しております。");
define("BASE_DESCRIPTION_TEMP", "松戸エリア最高級のキャバクラ、".SHOP_NAME."-".SHOP_NAME_JP."-");
define("BASE_DESCRIPTION_CONCEPT", "松戸エリア最高級のキャバクラと言えば、".SHOP_NAME."-".SHOP_NAME_JP."-。六本木・銀座・西麻布…都内の一等地に負けない、ハイクラスな店舗を松戸で再現。最高級のキャストやサービス、3フロア完備のVIPルームはここでしか味わえない上質な一時を演出。松戸へ足を運んだ際は、ぜひ一度いらして下さい。");
define("BASE_DESCRIPTION_SYSTEM", BASE_DESCRIPTION_TEMP."の料金システムはこちら。3フロア完備のVIPルームは、六本木・銀座・西麻布などの都内一等地に負けないハイクラスな内装。【1set 60分】￥3,000～ご利用頂けます。目安予算は￥5,100～￥8,000。");
define("BASE_DESCRIPTION_CAST", BASE_DESCRIPTION_TEMP."のキャスト一覧はこちら。かわいい・カッコいい・綺麗…どんな形容詞も超越した、粒ぞろいのキャスト達があなたとの出会いを待っています。六本木・銀座・西麻布といった都内一等地に負けない、一流キャストばかりです。");
define("BASE_DESCRIPTION_NEWS", BASE_DESCRIPTION_TEMP."のお知らせ一覧はこちら。毎月刺激的な一夜を過ごして頂けるよう、素敵なイベントを開催しております。六本木・銀座・西麻布…都内の一等地に負けない、エレガントなひと時をご提供。ぜひチェックしてみて下さい。");
define("BASE_DESCRIPTION_ACCESS", BASE_DESCRIPTION_TEMP."へのアクセス方法はこちら。松戸駅西口から徒歩1分と通いやすい場所にあります。松戸×高級キャバクラ、という意外性から新しい価値観を提供します。松戸エリアにお越しの際は、ぜひ一度いらして下さい。従業員一同お待ちしております。");
define("BASE_DESCRIPTION_RECRUIT", BASE_DESCRIPTION_TEMP."の求人情報はこちら。六本木・銀座・西麻布といった、都内一等地に負けない上質なキャバクラ。高時給＆高待遇はもちろん、一人ひとりに合った働き方をご提案。経験豊富なスタッフがあなたをサポートします。");
define("BASE_DESCRIPTION_APPLY", BASE_DESCRIPTION_TEMP."ではキャスト、社員、ドライバー、ヘアメイクを大募集！！ご応募の方はこちらから！！フォームにご記入いただき、確認画面へボタンを押してください。 ");




define("_NAV_",[
  "concept" => [
    "name" => "Concept",
    "span" => SHOP_NAME_JP."とは",
  ],
  "system" => [
    "name" => "Price",
    "span" => "料金システム",
  ],
  "cast" => [
    "name" => "Cast List",
    "span" => "キャストリスト",
  ],
  "newslist" => [
    "name" => "News",
    "span" => "お知らせ",
  ],
  "access" => [
    "name" => "Access",
    "span" => "アクセス",
  ],
  "recruit" => [
    "name" => "Recruit",
    "span" => "求人情報",
  ],
]);