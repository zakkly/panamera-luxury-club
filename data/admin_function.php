<?php

require_once dirname(__FILE__) . '/sql_function.php';

class Admin_Function extends All_Sql {
	
	/*
	 * ログインしているかのチェックを行う。 セッションも開始する。
	 * ログインしていなければログインページに飛ばす。
	 */
	function loginCheck() {
		
		if (empty($_SESSION['admin_flg'])) {
			unset($_SESSION['admin_flg']);
			unset($_SESSION['shop_id']);
			header("Location: " . BASE_ADMIN . "login.php");
			exit;
		} else {
			$adminData = $this->getAllDtb("admin","WHERE login_id = '".$_SESSION['admin_flg']."' AND id = 4");
			if(!empty($adminData)) {
				return $_SESSION['shop_id'];
			} else {
				unset($_SESSION['admin_flg']);
				unset($_SESSION['shop_id']);
				header("Location: " . BASE_ADMIN . "login.php");
				exit;
			}
		}
	}

	 /*
	 * DB名で頭に[mtb_]とあるものを取得します。
	 * $table = mtb_を省いたテーブル名を参照 $where = WHERE文を追加できます。 $order = ORDER文を追加できます。
	 */
	public function getAllMtb($table, $where = null, $order = null) {

		$sql = "SELECT * FROM mtb_" . $table . " " . $where . " " . $order;
		$val = $this->FetchAll($sql);

		return $val;
	}

	/*
	 * DB名で頭に[dtb_]とあるものを取得します。
	 * $table = mtb_を省いたテーブル名を参照 $where = WHERE文を追加できます。 $order = ORDER文を追加できます。
	 */
	public function getAllDtb($table, $where = null, $order = null) {

		$sql = "SELECT * FROM dtb_" . $table . " " . $where . " " . $order;
		$val = $this->FetchAll($sql);

		return $val;
	}
	
	/*
	 * 定義した日付を年月日で入手 (Ymdnj)
	 */
	function getDateTime($time) {

		$val = array();
		$val['Y'] = date('Y', strtotime($time));
		$val['m'] = date('m', strtotime($time));
		$val['d'] = date('d', strtotime($time));
		$val['n'] = date('n', strtotime($time));
		$val['j'] = date('j', strtotime($time));
		
		return $val;
	}
	
	/*
	 * 日付を自動で入手 subは戻す関数なので +1dayは一日前 -1dayは一日後となる
	 */
	function getCurrentTime($time = null) {

		$val = array();
		$dt = new DateTime();
		$dt->setTimeZone(new DateTimeZone('Asia/Tokyo'));
		$val['now'] = $dt->format('Y-m-d H:i:s');
		
		$dt2 = new DateTime();
		$dt2->setTimeZone(new DateTimeZone('Asia/Tokyo'));
		$dt2->sub(DateInterval::createFromDateString($time));
		$val['sub'] = $dt2->format('Y-m-d H:i:s');

		return $val;
	}

	/*
	 * ランダム文字列を作成・画像作成に使用
	 */
	public function getRandomvalue() {

		$strinit = "abcdefghkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ012345679";
		$strarray = preg_split("//", $strinit, 0, PREG_SPLIT_NO_EMPTY);
		for ($i = 0, $str = null; $i < 15; $i++) {
			$str .= $strarray[array_rand($strarray, 1)];
		}

		return $str;
	}
	
	/*
	 * 過去一年間の日付を取得
	 */
	function getYearMonth() {
		
		$val  = [];
		$time = $this->getCurrentTime();
		for($i=0; $i<12; $i++) {
			$mdate = strtotime("-".$i." month ".$time['now']."");
			$val[$i]['y'] = date('Y', $mdate);
			$val[$i]['n'] = date('n', $mdate);
			$val[$i]['ym'] = date('Y/m', $mdate);
			$val[$i]['output'] = date('Y/m/01', $mdate);
		}
		
		return $val;
	}

	/*
	 * Newsにて格納フォルダを変更(お知らせ)
	 */
	function getImageUrlNews() {
		
		$url = BASE_ADMIN_IMAGE_NEWS;
		
		return $url;
	}

	/*
	 * shopIDにて格納フォルダを変更(キャスト)
	 */
	function getImageUrlCast() {
		
		$url = BASE_ADMIN_IMAGE_CAST;
		
		return $url;
	}

	/*
	 * ---------------------------------------------------------------
	 *  News-お知らせ-　　一覧取得/基本登録/詳細更新/登録チェック/post変更
	 * ---------------------------------------------------------------
	 */
	
	/*
	 * 一覧取得
	 */
	public function getNews($shopID, $get = null, $limit = null) {
		
		$sql =  "SELECT * FROM dtb_news_category AS dnc LEFT JOIN dtb_news AS dn ON dnc.id = dn.news_cat " .
				"WHERE dn.shop_id = ".$shopID." ORDER BY news_create_date DESC ";
		if(!empty($get['pager'])) {
			$pager= $get['pager'] - 1;
			$page = $pager * BASE_ADMIN_LIMIT;
			$sql .= "LIMIT " . $page . "," . BASE_ADMIN_LIMIT;
		} elseif(!empty($limit)) {
			$sql  .= "LIMIT 0,5";
		}
		$val =  $this->FetchAll($sql);
		
		return $val;
	}
	
	/*
	 * 基本登録
	 */
	public function createNews($post) {
		
		$url     = $this->getImageUrlNews();
		$thumbnail = $this->createCheckImage($_FILES['news_thumbnail'], null, $url);
		
		$col   = "shop_id,news_title,news_cat,news_thumbnail,editor,news_create_date";
		$table = "dtb_news";
		$data  = "".$post['shop_id'].",'".$post['news_title']."','".$post['news_cat']."','".$thumbnail['name']."','".$post['editor']."',now()";
		$this->insertIns($col, $table, $data);
		
		return true;
	}
	
	/*
	 * 詳細更新
	 */
	public function changeNews($post) {
		
		$url = $this->getImageUrlNews();
		if(!empty($post['post_edit_id'])) {
			$thumbnail = $this->createCheckImage($_FILES['news_thumbnail'], null, $url);
			$thumbnailIns = !empty($thumbnail['name']) ? $thumbnail['name'] : $post['upd_news_thumbnail'];
			$thumbnailIns = empty($post['del_thum_flg'])  ? $thumbnailIns : null;
			
			$table = "dtb_news";
			$data  = "news_title='".$post['news_title']."',news_cat='".$post['news_cat']."',news_thumbnail='".$thumbnailIns."',editor='".$post['editor']."'";
			$where = "WHERE id = ".$post['post_edit_id'];
			$this->updateUps($table, $data, $where);
		}
		
		return true;
	}
	
	/*
	 * POST属性に変更
	 */
	public function changeNewsPost($newsID) {
		
		$postData = [];
		$postData['post_edit_id'] = $newsID;
		$news    = $this->getAllDtb("news", "WHERE id = ".$newsID."");
		foreach ((array) $news[0] as $key => $value) {
			$postData[$key] = $value;
		}

		return $postData;
	}
	
	/*
	 * 削除
	 */
	public function deleteNews($delID) {
		
		$this->deleteDels("dtb_news","WHERE id = ".$delID."");
		
	}
	
	/*
	 * エラーチェック
	 */
	public function NewsErrorCheck($post) {
		
		$error = array();
		if (empty($post['news_title']))   { $error[] = "イベントタイトルを入力してください。"; }
		//if (empty($post['editor'])) { $error[] = "イベント本文を入力してください。"; }
		
		return $error;
	}
	
	/*
	 * カテゴリー登録
	 */
	public function createNewsCategory($post) {
		
		$col   = "shop_id,news_category_name,news_category_color,news_category_create_date";
		$table = "dtb_news_category";
		$data  = "" . $post['shop_id'] . ",'" . $post['news_category_name'] . "','" . $post['news_category_color'] . "',now()";
		$this->insertIns($col, $table, $data);
		
		return true;
	}

	/*
	 * カテゴリー更新
	 */
	public function changeNewsCategory($post) {
		
		$table = "dtb_news_category";
		for($i=0; $i<count($post['newsCategoryID']); $i++) {
			if(empty($post['news_category_delete'][$i])) {
				$data = "news_category_name='" . $post['news_category_name'][$i] . "',news_category_color='" . $post['news_category_color'][$i] . "'";
				$where= "WHERE id = " . $post['newsCategoryID'][$i];
				$this->updateUps($table, $data, $where);
			} else {
				$this->deleteDels($table, "WHERE id = ".$post['news_category_delete'][$i]."");
			}
		}
		
		return true;
	}
	/*
	 * カテゴリー登録チェック
	 */
	public function checkNewsCategory($post) {
		
		$error = array();
		if (empty($post['news_category_name'])) { $error[] = "カテゴリー名を入力してください。"; }
		if (empty($post['news_category_color'])) { $error[] = "カラーを設定してください。"; }
		return $error;
	}
	
	/*
	 * カテゴリー更新チェック
	 */
	public function checkLoopNewsCategory($post) {

		$error = array();
		for($i=0; $i<count($post['newsCategoryID']); $i++) {
			if (empty($post['news_category_name'][$i]))  { $error[] = "ID".$post['newsCategoryID'][$i].": リンクカテゴリー名を入力してください。"; }
		}
		
		return $error;
	}
	
	/*
	 * カテゴリー一覧取得
	 */
	public function getNewsCategory($shopID) {
		
		$sql =  "SELECT * FROM dtb_news_category " .
				"WHERE shop_id = ".$shopID." ORDER BY news_category_create_date DESC ";

		$val =  $this->FetchAll($sql);
		
		return $val;
	}
	
	/* ------------------------------  お知らせここまで  ----------------------------------------*/

	/*
	 * ---------------------------------------------------------------
	 * 
	 *  キャスト　新規登録/変更/削除/一覧
	 *	　　　　在籍変更/POST属性変更/画像作成/デフォルト画像作成
	 *	　　　　既存画像チェック/既存画像チェックPOST/モデルエラーチェック
	 * 
	 * ---------------------------------------------------------------
	 */

	/*
	 * 新規登録
	 */
	public function castCreateInsert($shopID, $postData) {

		$casttable = array("dtb_cast", "dtb_cast_photo");
		for ($i = 0; $i < count($casttable); $i++) {
			$array = [];
			$col   = $this->FetchAll("SHOW COLUMNS FROM " . $casttable[$i] . "");
			foreach ($col as $val) {
				$array[] = $val['Field'];
			}
			$coltable[] = implode(",", $array);
		}

		if(empty($postData['cast_hidden_flg'])) { $postData['cast_hidden_flg'] = 0; }
		if(empty($postData['cast_blood_type_id'])) { $postData['cast_blood_type_id'] = 0; }
		$url     = $this->getImageUrlCast();
		$thumbnail = $this->createCheckImage($_FILES['cast_thumbnail'], null, $url);
		$datatable[] =  "null,".$postData['shop_id'].",".$postData['cast_hidden_flg'].",'".$postData['cast_name_rome']."','".$postData['cast_name']."','".$postData['cast_name_kana']."',".
						"'".$postData['cast_tall']."',".$postData['cast_constellation_id'].",'".$postData['cast_birthplace']."',".$postData['cast_blood_type_id'].",".
						"'".$postData['cast_hobby']."','".$postData['cast_favorite']."','".$thumbnail['name']."',now()";
		$this->insertIns($coltable[0], $casttable[0], $datatable[0]);
		$insId = $this->lastInsertId($casttable[0]);
		$lastId= $insId[0]['LAST_INSERT_ID()'];

		if(!empty($postData['cast_zaiseki_rank'])) {
			$postData['cast_zaiseki_rank'] = preg_match("/^[0-9]+$/",$postData['cast_zaiseki_rank']) ? $postData['cast_zaiseki_rank'] : 0;
			$this->insertIns("id,cast_id,cast_zaiseki_rank", "dtb_cast_zaiseki_rank", "null,".$lastId.",".$postData['cast_zaiseki_rank']."");
		} else {
			$this->insertIns("id,cast_id,cast_zaiseki_rank", "dtb_cast_zaiseki_rank", "null,".$lastId.",".$lastId."");
		}

		$cast_image = $this->castCreateImage($shopID);
		$cast_img   = $this->castCreateImageDefine($cast_image);

		$datatable[] =  "null,".$lastId.",'".$cast_img[0]['name']."','".$cast_img[1]['name']."','".$cast_img[2]['name']."','".$cast_img[3]['name']."',".
						"'".$cast_img[4]['name']."','".$cast_img[5]['name']."','".$cast_img[6]['name']."','".$cast_img[7]['name']."','".$cast_img[8]['name']."',now()";
		$this->castInsertForeach($casttable, $coltable, $datatable);

		return $lastId;
	}
	
	private function castInsertForeach($casttable, $coltable, $datatable) {
		
		for ($i = 1; $i < count($casttable); $i++) {
			$this->insertIns($coltable[$i], $casttable[$i], $datatable[$i]);
		}
		
	}

	/*
	 * 更新
	 */
	public function castCreateUpdate($shopID, $postData) {
		
		if(empty($postData['cast_hidden_flg'])) { $postData['cast_hidden_flg'] = 0; }
		if(empty($postData['cast_blood_type_id'])) { $postData['cast_blood_type_id'] = 0; }
		$url = $this->getImageUrlCast();
		$thumbnail = $this->createCheckImage($_FILES['cast_thumbnail'], null, $url);
		$thumbnailIns = !empty($thumbnail['name']) ? $thumbnail['name'] : $postData['upd_cast_thumbnail'];
		$thumbnailIns = empty($postData['del_thum_flg'])  ? $thumbnailIns : null;
		$cast_table = "dtb_cast";
		$data = "cast_hidden_flg=".$postData['cast_hidden_flg'].",cast_name_rome='".$postData['cast_name_rome']."',cast_name='".$postData['cast_name']."',".
				"cast_name_kana='".$postData['cast_name_kana']."',cast_tall='".$postData['cast_tall']."',cast_constellation_id=".$postData['cast_constellation_id'].",".
				"cast_birthplace='".$postData['cast_birthplace']."',cast_blood_type_id=".$postData['cast_blood_type_id'].",cast_hobby='".$postData['cast_hobby']."',".
				"cast_favorite='".$postData['cast_favorite']."',cast_thumbnail='".$thumbnailIns."',cast_create_date=now()";
		$where= "WHERE id = " . $postData['change_cast_id'];
		$this->updateUps($cast_table, $data, $where);
		
		$where= "WHERE cast_id = " . $postData['change_cast_id'];
		
		if(!empty($postData['cast_zaiseki_rank'])) {
			$postData['cast_zaiseki_rank'] = preg_match("/^[0-9]+$/",$postData['cast_zaiseki_rank']) ? $postData['cast_zaiseki_rank'] : 0;
			$data = "cast_zaiseki_rank='".$postData['cast_zaiseki_rank']."'";
            $this->updateUps("dtb_cast_zaiseki_rank", $data, $where);
		}

		$cast_imgs = $this->castCreateImage($shopID);
		$cast_img  = $this->castChangePostImage($cast_imgs,$postData);
		$cast_photo_table = "dtb_cast_photo";
		$data = "cast_img1='".$cast_img[0]['name']."',cast_img2='".$cast_img[1]['name']."',cast_img3='".$cast_img[2]['name']."',cast_img4='".$cast_img[3]['name']."',".
				"cast_img5='".$cast_img[4]['name']."',cast_img6='".$cast_img[5]['name']."',cast_img7='".$cast_img[6]['name']."',cast_img8='".$cast_img[7]['name']."',cast_img9='".$cast_img[8]['name']."'";
		$this->updateUps($cast_photo_table, $data, $where);

		return $postData['change_cast_id'];
	}

	/*
	 * 削除
	 */
	public function deleteCast($delID) {

		$this->deleteDels("dtb_cast","WHERE id = ".$delID."");
		$this->deleteDels("dtb_cast_photo","WHERE cast_id = ".$delID."");

	}

	/*
	 * キャスト一覧取得
	 */
	public function getAdminCast($shopID, $order = null) {

		$sql =  "SELECT dc.id AS dcid, dc.*, dcp.*, dczr.cast_zaiseki_rank FROM dtb_cast AS dc LEFT JOIN dtb_cast_photo AS dcp ON dc.id = dcp.cast_id ".
				"LEFT JOIN dtb_cast_zaiseki_rank AS dczr ON dc.id = dczr.cast_id ".
				"WHERE dc.shop_id = ".$shopID." ";
		$sql  .= "ORDER BY dczr.cast_zaiseki_rank";
		$cast = $this->FetchAll($sql);
		
		return $cast;
	}

	/*
	 * キャスト並び替え
	 */
	public function changeCast($tableName) {
		
		$table  = "dtb_cast_zaiseki_rank";
		$resultName = "result_" . $tableName;
		$result = explode(',', filter_input(INPUT_POST, $resultName));
		$post   = $this->request->getPost();
		if (!empty($result)) {
			$i  = 1;
			$id = "rank_" . $tableName . "_id";
			foreach ((array) $result as $val) {
				if (!empty($post[$id][$val])) {
					$where = "WHERE cast_id = ".$post[$id][$val]."";
					$rank  = $this->getAllDtb("cast_zaiseki_rank", $where);
					if($rank[0]['cast_zaiseki_rank'] != $i) {
						$data = "cast_zaiseki_rank=" . $i . "";
						$this->updateUps($table, $data, $where);
					}
				}
				$i++;
			}
		}
	}
	
	/*
	 * POST属性に変更
	 */
	public function changeCastPost($cast_id) {
		
		$postData= [];
		$postData['post_edit_id'] = $cast_id;
		$cast[] = $this->getAllDtb("cast", "WHERE id = " . $cast_id . "");
		$cast[] = $this->getAllDtb("cast_photo", "WHERE cast_id = " . $cast_id . "");
		$cast[] = $this->getAllDtb("cast_zaiseki_rank", "WHERE cast_id = " . $cast_id . "");

		foreach ((array) $cast as $val) {
			foreach ((array) $val[0] as $key => $value) {
				$postData[$key] = $value;
			}
		}

		return $postData;
	}
	/*
	 * 画像作成
	 */
	private function castCreateImage($shopID) {
		
		$url = $this->getImageUrlCast($shopID);
		$cast_img    = [];
		$cast_img[0] = $this->createCheckImage($_FILES['cast_img1'], null, $url);
		$cast_img[1] = $this->createCheckImage($_FILES['cast_img2'], null, $url);
		$cast_img[2] = $this->createCheckImage($_FILES['cast_img3'], null, $url);
		$cast_img[3] = $this->createCheckImage($_FILES['cast_img4'], null, $url);
		$cast_img[4] = $this->createCheckImage($_FILES['cast_img5'], null, $url);
		$cast_img[5] = $this->createCheckImage($_FILES['cast_img6'], null, $url);
		$cast_img[6] = $this->createCheckImage($_FILES['cast_img7'], null, $url);
		$cast_img[7] = $this->createCheckImage($_FILES['cast_img8'], null, $url);
		$cast_img[8] = $this->createCheckImage($_FILES['cast_img9'], null, $url);
		
		return $cast_img;
	}
	
	/*
	 * デフォルト画像設定
	 */
	private function castCreateImageDefine($img = null) {
		
		$cast_img = [];
		$cast_img[0]['name'] = empty($img[0]['name']) ? "default.jpg": $img[0]['name'];
		$cast_img[1]['name'] = empty($img[1]['name']) ? "default.jpg": $img[1]['name'];
		$cast_img[2]['name'] = empty($img[2]['name']) ? "default.jpg": $img[2]['name'];
		$cast_img[3]['name'] = empty($img[3]['name']) ? "default.jpg": $img[3]['name'];
		$cast_img[4]['name'] = empty($img[4]['name']) ? "default.jpg": $img[4]['name'];
		$cast_img[5]['name'] = empty($img[5]['name']) ? "default.jpg": $img[5]['name'];
		$cast_img[6]['name'] = empty($img[6]['name']) ? "default.jpg": $img[6]['name'];
		$cast_img[7]['name'] = empty($img[7]['name']) ? "default.jpg": $img[7]['name'];
		$cast_img[8]['name'] = empty($img[8]['name']) ? "default.jpg": $img[8]['name'];
		
		return $cast_img;
	}
	
	/*
	 * 既存画像チェック
	 */
	public function castChangeImage($post) {
		
		$post['cast_img1'] = !empty($_FILES['cast_img1']['name']) ? $_FILES['cast_img1']['name'] : $post['upd_cast_img1'];
		$post['cast_img2'] = !empty($_FILES['cast_img2']['name']) ? $_FILES['cast_img2']['name'] : $post['upd_cast_img2'];
		$post['cast_img3'] = !empty($_FILES['cast_img3']['name']) ? $_FILES['cast_img3']['name'] : $post['upd_cast_img3'];
		$post['cast_img4'] = !empty($_FILES['cast_img4']['name']) ? $_FILES['cast_img4']['name'] : $post['upd_cast_img4'];
		$post['cast_img5'] = !empty($_FILES['cast_img5']['name']) ? $_FILES['cast_img5']['name'] : $post['upd_cast_img5'];
		$post['cast_img6'] = !empty($_FILES['cast_img6']['name']) ? $_FILES['cast_img6']['name'] : $post['upd_cast_img6'];
		$post['cast_img7'] = !empty($_FILES['cast_img7']['name']) ? $_FILES['cast_img7']['name'] : $post['upd_cast_img7'];
		$post['cast_img8'] = !empty($_FILES['cast_img8']['name']) ? $_FILES['cast_img8']['name'] : $post['upd_cast_img8'];
		$post['cast_img9'] = !empty($_FILES['cast_img9']['name']) ? $_FILES['cast_img9']['name'] : $post['upd_cast_img9'];
		
		return $post;
	}
	
	/*
	 * 既存画像チェックPOST
	 */
	public function castChangePostImage($cast_img,$postData) {

		$cast_img[0]['name'] = !empty($cast_img[0]['name']) ? $cast_img[0]['name'] : $postData['upd_cast_img1'];
		$cast_img[1]['name'] = !empty($cast_img[1]['name']) ? $cast_img[1]['name'] : $postData['upd_cast_img2'];
		$cast_img[2]['name'] = !empty($cast_img[2]['name']) ? $cast_img[2]['name'] : $postData['upd_cast_img3'];
		$cast_img[3]['name'] = !empty($cast_img[3]['name']) ? $cast_img[3]['name'] : $postData['upd_cast_img4'];
		$cast_img[4]['name'] = !empty($cast_img[4]['name']) ? $cast_img[4]['name'] : $postData['upd_cast_img5'];
		$cast_img[5]['name'] = !empty($cast_img[5]['name']) ? $cast_img[5]['name'] : $postData['upd_cast_img6'];
		$cast_img[6]['name'] = !empty($cast_img[6]['name']) ? $cast_img[6]['name'] : $postData['upd_cast_img7'];
		$cast_img[7]['name'] = !empty($cast_img[7]['name']) ? $cast_img[7]['name'] : $postData['upd_cast_img8'];
		$cast_img[8]['name'] = !empty($cast_img[8]['name']) ? $cast_img[8]['name'] : $postData['upd_cast_img9'];
		
		//$cast_img[0]['name'] = empty($postData['img_del_pc1_flg']) ? $cast_img[0]['name'] : null;
		$cast_img[1]['name'] = empty($postData['img_del_pc2_flg']) ? $cast_img[1]['name'] : "default.jpg";
		$cast_img[2]['name'] = empty($postData['img_del_pc3_flg']) ? $cast_img[2]['name'] : "default.jpg";
		$cast_img[3]['name'] = empty($postData['img_del_pc4_flg']) ? $cast_img[3]['name'] : "default.jpg";
		$cast_img[4]['name'] = empty($postData['img_del_pc5_flg']) ? $cast_img[4]['name'] : "default.jpg";
		$cast_img[5]['name'] = empty($postData['img_del_mb1_flg']) ? $cast_img[5]['name'] : "default.jpg";
		$cast_img[6]['name'] = empty($postData['img_del_mb2_flg']) ? $cast_img[6]['name'] : "default.jpg";
		$cast_img[7]['name'] = empty($postData['img_del_mb3_flg']) ? $cast_img[7]['name'] : "default.jpg";
		$cast_img[8]['name'] = empty($postData['img_del_mb4_flg']) ? $cast_img[8]['name'] : "default.jpg";

		return $cast_img;
	}
	
	/*
	 * モデルエラーチェック
	 */
	public function castErrorCheck($value, $up = null, $shopID = null) {

		$error = array();
		if (empty($value['cast_name']))      { $error[] = "お名前を入力してください"; }
		if (empty($value['cast_name_rome'])) {
			$error[] = "ローマ字(URL)を入力してください";
		} else {
			if(!empty($up)) {
				$cast = $this->getAllDtb("cast","WHERE shop_id = ".$shopID." AND id != ".$value['change_cast_id']." AND cast_name_rome = '".$value['cast_name_rome']."'");
			} else {
				$cast = $this->getAllDtb("cast","WHERE shop_id = ".$shopID." AND cast_name_rome = '".$value['cast_name_rome']."'");
			}
			if (!empty($cast)) { $error[] = "ローマ字(URL)が重複しています"; }
		}

		return $error;
	}

	/* ------------------------------  キャストここまで  ----------------------------------------*/
	
	/*
	 * ---------------------------------------------------------------
	 *  求人　求人情報登録/変更・応募・エラーチェック
	 * ---------------------------------------------------------------
	 */
	
	/*
	 * 求人情報登録
	 */
	public function createRecruit($shopID, $post) {
		$col   = "shop_id,recruit_comment,cast_description,cast_capacity,cast_time,cast_holiday,cast_salary,cast_treatment,cast_method,staff_description,staff_capacity,staff_time,staff_holiday,staff_salary,staff_treatment,staff_method,driver_description,driver_capacity,driver_time,driver_holiday,driver_salary,driver_treatment,driver_method,makeup_description,makeup_capacity,makeup_time,makeup_holiday,makeup_salary,makeup_treatment,makeup_method,recruit_create_date";
		$table = "dtb_recruit";
		$data  = "".$shopID.",'".$post['recruit_comment']."','".$post['cast_description']."','".$post['cast_capacity']."','".$post['cast_time']."','".$post['cast_holiday']."',".
				 "'".$post['cast_salary']."','".$post['cast_treatment']."','".$post['cast_method']."','".$post['staff_description']."','".$post['staff_capacity']."','".$post['staff_time']."',".
				 "'".$post['staff_holiday']."','".$post['staff_salary']."','".$post['staff_treatment']."','".$post['staff_method']."','".$post['driver_description']."','".$post['driver_capacity']."',".
				 "'".$post['driver_time']."','".$post['driver_holiday']."','".$post['driver_salary']."','".$post['driver_treatment']."','".$post['driver_method']."','".$post['makeup_description']."',".
				 "'".$post['makeup_capacity']."','".$post['makeup_time']."','".$post['makeup_holiday']."','".$post['makeup_salary']."','".$post['makeup_treatment']."','".$post['makeup_method']."',now()";
		$this->insertIns($col, $table, $data);
		
		$treatment_table = "dtb_recruit_treatment";
		if(!empty($post['treatment_id'])) {
			foreach ($post['treatment_id'] as  $val) {
				$datatable =  "null," . $post['shop_id'] . "," . $val . ",now()";
				$this->insertIns("id,shop_id,treatment_id,treatment_create_date", $treatment_table, $datatable);
			}
		}
		
		return true;
	}

	/*
	 * 求人情報変更
	 */
	public function changeRecruit($shopID, $post) {
		
		$recruit_table = "dtb_recruit";
		$data = "recruit_comment='".$post['recruit_comment']."',cast_description='".$post['cast_description']."',cast_capacity='".$post['cast_capacity']."',cast_time='".$post['cast_time']."',cast_holiday='".$post['cast_holiday']."',".
				"cast_salary='".$post['cast_salary']."',cast_treatment='".$post['cast_treatment']."',cast_method='".$post['cast_method']."',staff_description='".$post['staff_description']."',".
				"staff_capacity='".$post['staff_capacity']."',staff_time='".$post['staff_time']."',staff_holiday='".$post['staff_holiday']."',staff_salary='".$post['staff_salary']."',staff_treatment='".$post['staff_treatment']."',".
				"staff_method='".$post['staff_method']."',driver_description='".$post['driver_description']."',driver_capacity='".$post['driver_capacity']."',driver_time='".$post['driver_time']."',driver_holiday='".$post['driver_holiday']."',".
				"driver_salary='".$post['driver_salary']."',driver_treatment='".$post['driver_treatment']."',driver_method='".$post['driver_method']."',makeup_description='".$post['makeup_description']."',makeup_capacity='".$post['makeup_capacity']."',".
				"makeup_time='".$post['makeup_time']."',makeup_holiday='".$post['makeup_holiday']."',makeup_salary='".$post['makeup_salary']."',makeup_treatment='".$post['makeup_treatment']."',makeup_method='".$post['makeup_method']."',recruit_create_date=now()";
		$where= "WHERE id = " . $post['post_recruit_id'];
		$this->updateUps($recruit_table, $data, $where);

		$where= "WHERE shop_id = " . $post['shop_id'];

		return $post['post_recruit_id'];
	}
	
	/*
	 * POST属性に変更
	 */
	public function changeRecruitPost($recruit_id) {
		
		$postData = [];
		$postData['post_edit_id'] = $recruit_id;
		$recruit    = $this->getAllDtb("recruit", "WHERE id = ".$recruit_id."");
		foreach ((array) $recruit[0] as $key => $value) {
			$postData[$key] = $value;
		}

		return $postData;
	}
	
	/*
	 * 待遇取得
	 */
	public function getRecruitTreatment($shopID = null, $post = null) {
		
		$treatArray = [];
		$mTreatment  = [];
		$treatment = $this->getAllMtb("treatment");
		if(!empty($post['treatment_id'])) {
			$mTreatment = $post['treatment_id'];
		} elseif(!empty($shopID)) {
			$mTreatment = $this->getAllDtb("recruit_treatment","WHERE shop_id = ".$shopID."");
		}
		for($i=0; $i<count($treatment); $i++) {
			for($j=0; $j<count($mTreatment); $j++) {
				$val = [];
				if(!empty($post['treatment_id'])) {
					$val = $mTreatment[$j];
				} elseif(!empty($shopID)) {
					$val = $mTreatment[$j]['treatment_id'];
				}
				if($treatment[$i]['id'] == $val) {
					$flg = 1;
					break;
				}
			}
			$treatArray[$i] = $treatment[$i];
			$treatArray[$i]['flg'] = (!empty($flg)) ? 1 : 0;
			$flg = null;
		}
		
		return $treatArray;
	}
	
	/*
	 * エラーチェック
	 */
	public function RecruitErrorCheck($post) {
		
		$error = array();
		if (empty($post['recruit_comment']))   { $error[] = "コメントを入力してください。"; }
		
		if (empty($post['cast_description']))   { $error[] = "【キャスト】仕事内容を入力してください。"; }
		if (empty($post['cast_capacity']))   { $error[] = "【キャスト】資格を入力してください。"; }
		if (empty($post['cast_time']))   { $error[] = "【キャスト】時間を入力してください。"; }
		if (empty($post['cast_holiday']))   { $error[] = "【キャスト】定休日を入力してください。"; }
		if (empty($post['cast_salary']))   { $error[] = "【キャスト】時給を入力してください。"; }
		if (empty($post['cast_treatment']))   { $error[] = "【キャスト】待遇を入力してください。"; }
		if (empty($post['cast_method']))   { $error[] = "【キャスト】応募方法を入力してください。"; }
		
		if (empty($post['staff_description']))   { $error[] = "【社員】仕事内容を入力してください。"; }
		if (empty($post['staff_capacity']))   { $error[] = "【社員】資格を入力してください。"; }
		if (empty($post['staff_time']))   { $error[] = "【社員】時間を入力してください。"; }
		if (empty($post['staff_holiday']))   { $error[] = "【社員】定休日を入力してください。"; }
		if (empty($post['staff_salary']))   { $error[] = "【社員】時給を入力してください。"; }
		if (empty($post['staff_treatment']))   { $error[] = "【社員】待遇を入力してください。"; }
		if (empty($post['staff_method']))   { $error[] = "【社員】応募方法を入力してください。"; }
		
		if (empty($post['driver_description']))   { $error[] = "【ドライバー】仕事内容を入力してください。"; }
		if (empty($post['driver_capacity']))   { $error[] = "【ドライバー】資格を入力してください。"; }
		if (empty($post['driver_time']))   { $error[] = "【ドライバー】時間を入力してください。"; }
		if (empty($post['driver_holiday']))   { $error[] = "【ドライバー】定休日を入力してください。"; }
		if (empty($post['driver_salary']))   { $error[] = "【ドライバー】時給を入力してください。"; }
		if (empty($post['driver_treatment']))   { $error[] = "【ドライバー】待遇を入力してください。"; }
		if (empty($post['driver_method']))   { $error[] = "【ドライバー】応募方法を入力してください。"; }
		/*
		if (empty($post['makeup_description']))   { $error[] = "【ヘアメイク】仕事内容を入力してください。"; }
		if (empty($post['makeup_capacity']))   { $error[] = "【ヘアメイク】資格を入力してください。"; }
		if (empty($post['makeup_time']))   { $error[] = "【ヘアメイク】時間を入力してください。"; }
		if (empty($post['makeup_holiday']))   { $error[] = "【ヘアメイク】定休日を入力してください。"; }
		if (empty($post['makeup_salary']))   { $error[] = "【ヘアメイク】時給を入力してください。"; }
		if (empty($post['makeup_treatment']))   { $error[] = "【ヘアメイク】待遇を入力してください。"; }
		if (empty($post['makeup_method']))   { $error[] = "【ヘアメイク】応募方法を入力してください。"; }
		*/
		return $error;
	}
	
	/*
	 * ---------------------------------------------------------------
	 *  求人応募
	 * ---------------------------------------------------------------
	 */
	 
	public function getApplyContact($id = null, $flg = null, $get = null, $shopID = null) {

		$sql  = "SELECT * FROM dtb_apply AS da WHERE da.shop_id = ".$shopID." ";
		if(!empty($id)) { $sql .= "AND da.id = ".$id." "; }
		$sql .= "ORDER BY da.apply_create_date DESC ";
		if (!empty($flg)) {
			$sql .= "LIMIT 0," . BASE_ADMIN_LIMIT . "";
		} elseif (!empty($get['pager'])) {
			$pager= $get['pager'] - 1;
			$page = $pager * BASE_ADMIN_LIMIT;
			$sql .= "LIMIT " . $page . "," . BASE_ADMIN_LIMIT;
		}
		$res = $this->FetchAll($sql);

		return $res;
	}
	
	public function deleteApply($id) {
		
		$this->deleteDels("dtb_apply","WHERE id = ".$id."");
		
		return true;
	}

	/*
	 * ---------------------------------------------------------------
	 *  画像登録
	 * ---------------------------------------------------------------
	 */
		
	function createResizeImage($orig_file, $fileName = null, $sizeMode = 1) {
		
		if (!extension_loaded('gd')) { return false; }
		$resize = $this->reMakeSize($sizeMode);
		$result = getimagesize($orig_file);
		if($sizeMode == 2 || $sizeMode == 4) { $this->createResizeImageMb($orig_file, $fileName, $result, $resize); }
		list($orig_width, $orig_height, $image_type) = $result;

		switch ($image_type) {
			case 1: $im = imagecreatefromgif($orig_file);   break;
			case 2: $im = imagecreatefromjpeg($orig_file);  break;
			case 3: $im = imagecreatefrompng($orig_file);   break;
			default:
				return false;
		}
		
		$new_image = imagecreatetruecolor($resize["w"], $resize["h"]);
		
		if (($image_type == 1) || ($image_type==3)) {
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			$transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
			imagefilledrectangle($new_image, 0, 0, $resize["w"], $resize["h"], $transparent);
		}
		
		if (!imagecopyresampled($new_image, $im, 0, 0, 0, 0, $resize["w"], $resize["h"], $orig_width, $orig_height)) {
			imagedestroy($im);
			imagedestroy($new_image);
			return false;
		}
			
		switch ($image_type) {
			case 1: $result = imagegif($new_image, $resize["surl"] . $fileName); break;
			case 2: $result = imagejpeg($new_image, $resize["surl"] . $fileName); break;
			case 3: $result = imagepng($new_image, $resize["surl"] . $fileName); break;
			default: 
				return false;
		}

		if (!$result) {
			imagedestroy($im);
			imagedestroy($new_image);
			return false;
		}

		imagedestroy($im);
		imagedestroy($new_image);
		
	}
	
	function createResizeImageMb($orig_file, $fileName, $result, $resize) {
		
		list($orig_width, $orig_height, $image_type) = $result;

		switch ($image_type) {
			case 1: $im = imagecreatefromgif($orig_file);   break;
			case 2: $im = imagecreatefromjpeg($orig_file);  break;
			case 3: $im = imagecreatefrompng($orig_file);   break;
			default:
				return false;
		}	
		
		$new_image = imagecreatetruecolor($resize["wmb"], $resize["hmb"]);
		
		if (($image_type == 1) || ($image_type==3)) {
			imagealphablending($new_image, false);
			imagesavealpha($new_image, true);
			$transparent = imagecolorallocatealpha($new_image, 255, 255, 255, 127);
			imagefilledrectangle($new_image, 0, 0, $resize["wmb"], $resize["hmb"], $transparent);
		}
		
		if (!imagecopyresampled($new_image, $im, 0, 0, 0, 0, $resize["wmb"], $resize["hmb"], $orig_width, $orig_height)) {
			imagedestroy($im);
			imagedestroy($new_image);
			return false;
		}
			
		switch ($image_type) {
			case 1: $result = imagegif($new_image, $resize["murl"] . $fileName); break;
			case 2: $result = imagejpeg($new_image, $resize["murl"] . $fileName); break;
			case 3: $result = imagepng($new_image, $resize["murl"] . $fileName); break;
			default: 
				return false;
		}

		if (!$result) {
			imagedestroy($im);
			imagedestroy($new_image);
			return false;
		}

		imagedestroy($im);
		imagedestroy($new_image);
		
	}
	
	/*
	 * 1&3モバイル画像2&4モバイル画像
	 */
	public function reMakeSize($sizeMode = null) {
		
		$resize = [];
		if($sizeMode == 1) {
			$resize["w"]   = "150";
			$resize["h"]   = "92";
			$resize["surl"]= "./spimage/";
		} elseif($sizeMode == 2) {
			$resize["w"]   = "300";
			$resize["h"]   = "203";
			$resize["wmb"] = "236";
			$resize["hmb"] = "160";
			$resize["surl"]= "./spimage/";
			$resize["murl"]= "./mbimage/";
		} elseif($sizeMode == 3) {
			$resize["w"]   = "100";
			$resize["h"]   = "156";
			$resize["surl"]= "./spimage/";
		} elseif($sizeMode == 4) {
			$resize["w"]   = "300";
			$resize["h"]   = "450";
			$resize["wmb"] = "240";
			$resize["hmb"] = "360";
			$resize["surl"]= "./spimage/";
			$resize["murl"]= "./mbimage/";
		}
		
		return $resize;
	}
	
	public function createCheckImage($image = null, $postData = null, $imageUrl = null) {
		
		$error    = [];
		$img_name = $image['name'];
		$img_tmp  = $image['tmp_name'];
		$img_type = $image['type'];
		$img_size = $image['size'];
		
		$image['disp_hpimg'] = (!empty($image['disp_hpimg'])) ? $image['disp_hpimg'] : null;
		$image['name'] = (!empty($image['name'])) ? $image['name'] : null;
		if (!empty($img_name) && is_uploaded_file($img_tmp)) {
			$kaku = $this->imageKakuType($img_type);
			$error = $this->imageErrorSize($img_size, $kaku, $error);
			$image = $this->imageCreate($image, $error, $kaku, $imageUrl);
		} else {
			$image['error'] = null;
		}

		return $image;
	}

	private function imageErrorSize($img_size = null, $kaku = null, $error = []) {

		if ($img_size === 0) { $error[] = "画像が不正です。"; }
		if ($kaku == "")     { $error[] = "画像の種類に誤りがあります。"; }
		
		return $error;
	}

	private function imageKakuType($img_type = null) {
		
		if ($img_type == "image/gif") { $kaku = "gif"; }
		if ($img_type == "image/png" || $img_type == "image/x-png")  { $kaku = "png"; }
		if ($img_type == "image/jpeg" || $img_type == "image/pjpeg") { $kaku = "jpg"; }
		if ($img_type == "video/mpeg") { $kaku = "mpeg"; }
		if ($img_type == "video/mp4")  { $kaku = "mp4"; }
		if ($img_type == "video/webm") { $kaku = "webm"; }
		if ($img_type == "video/ogg")  { $kaku = "ogv"; }
		if ($img_type == "video/x-msvideo")  { $kaku = "avi"; }
		
		return $kaku;
	}

	private function imageCreate($image = null, $error = NULL, $kaku = NULL, $imageUrl = NULL) {
		
		if (empty($error)) {
			$ymdhis = $this->getRandomvalue();
			$hp_img_name = "s-{$ymdhis}.{$kaku}";
			move_uploaded_file($image['tmp_name'], $imageUrl . $hp_img_name);
			$image['disp_hpimg'] = $imageUrl . $hp_img_name;
			$image['name'] = $hp_img_name;
			$image['error'] = null;
		} else {
			$image['error'] = $error;
		}

		return $image;
	}
	
	/* ------------------------------  画像登録ここまで  ----------------------------------------*/
	
}
