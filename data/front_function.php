<?php

require_once dirname(__FILE__) . '/admin_function.php';

class Front_Function extends Admin_Function {

	/*
	 * ---------------------------------------------------------------
	 *  お知らせ　一覧・ページング
	 * ---------------------------------------------------------------
	 */
	
	public function getFrontNews($shopID, $get = null, $topFlg = null, $spFlg = null) {
		
		$sql =  "SELECT * FROM dtb_news_category AS dnc LEFT JOIN dtb_news AS dn ON dnc.id = dn.news_cat " .
				"WHERE dn.shop_id = ".$shopID." ORDER BY news_create_date DESC ";
		if(!empty($get['pager'])) {
			$pager = $get['pager']-1;
			$page  = $pager*BASE_LIMIT_SP_PAGEING_LIST;
			$sql  .= "LIMIT ".$page.",".BASE_LIMIT_SP_PAGEING_LIST;
		} elseif(!empty($topFlg)) {
			$sql  .= "LIMIT 0,5";
		}
		 elseif(!empty($spFlg)) {
			$sql  .= "LIMIT 0,1";
		}
		$val =  $this->FetchAll($sql);
		
		return $val;
	}
	
	function getFrontNewsPrevNext($shopID, $news = null) {
		$value    = [];
		$newsAll = $this->getFrontNews($shopID);
		for ($i=0; $i<count($newsAll); $i++) {
			if($newsAll[$i]['id'] == $news) {
				$prev = $i-1;
				$next = $i+1;
				$value['prev'] = !empty($newsAll[$prev]['id']) ? $newsAll[$prev]['id'] : null ;
				$value['next'] = !empty($newsAll[$next]['id']) ? $newsAll[$next]['id'] : null ;
				break;
			}
		}
		
		return $value;
	}

	/* ------------------------------  お知らせここまで  ----------------------------------------*/
	
	/*
	 * ---------------------------------------------------------------
	 *  キャスト　一覧・ページング
	 * ---------------------------------------------------------------
	 */
	
	public function getFrontCast($shopID, $get = null, $castID = null, $listCast = null) {
		
		$col =  "dc.*, dcp.*, mbt.name AS bName, mc.name AS cName, dczr.*";
		$sql =  "SELECT ".$col." FROM dtb_cast AS dc LEFT JOIN dtb_cast_photo AS dcp ON dcp.cast_id = dc.id " .
				"LEFT JOIN mtb_blood_type AS mbt ON dc.cast_blood_type_id = mbt.id " .
				"LEFT JOIN mtb_constellation AS mc ON dc.cast_constellation_id = mc.id " .
				"LEFT JOIN dtb_cast_zaiseki_rank AS dczr ON dczr.cast_id = dc.id " .
				"WHERE dc.shop_id = ".$shopID." ";
		if (!empty($castID)) {
			$sql .= "AND dc.cast_hidden_flg = 0 AND dc.id = ".$castID."";
		} else {
			$sql .= "AND dc.cast_hidden_flg = 0 ORDER BY dczr.cast_zaiseki_rank";
		}
		
		if (!empty($get['pager'])  && !empty($listCast)) {
			$pager= $get['pager'] - 1;
			$page = $pager * BASE_LIMIT_SP_PAGEING_LIST;
			$sql .= " LIMIT " . $page . "," . BASE_LIMIT_SP_PAGEING_LIST;
		}
		
		$val = $this->FetchAll($sql);

		return $val;
	}
	
	/* ------------------------------  キャストここまで  ----------------------------------------*/

	/*
	 * ---------------------------------------------------------------
	 *  求人応募　新規・エラーチェック
	 * ---------------------------------------------------------------
	 */
	 
	 public function ApplyContactInsert($shopID, $post) {
		
		$post['trial_month'] = date("n",strtotime($post['date']));
		$post['trial_day']   = date("j",strtotime($post['date']));
		
		$table = "dtb_apply";
		$col   = $this->FetchAll("SHOW COLUMNS FROM ".$table."");
		foreach ($col as $val) { $array[] = $val['Field']; }
		$coltable = implode(",", $array);
		$search = array("'",";");
		foreach ($post AS $key => $val) { $post[$key] = str_replace($search, '', $val); }
		$data  = "null," . $shopID . ",'" . $post['your_name'] . "','" . $post['your_year'] . "','" . $post['your_month'] . "',".
				 "'" . $post['your_email'] . "','" . $post['your_tel'] . "'," . $post['trial_month'] . "," . $post['trial_day'] . ",'" . $post['your_comment'] . "',now()";
		$this->insertIns($coltable, $table, $data);
		
		return true;
		
	}
	
	public function ApplyErrorCheck($value) {

		$error = array();
		if (empty($value['your_name'])) { $error[] = "お名前を入力してください"; }
		if (empty($value['your_year']) && empty($value['your_month'])) {
			$error[] = "生年月日を入力してください";
		}
		if (!preg_match('/^[\w\-\.]+\@[\w\-\.]+\.([a-z]+)$/', $value['your_email'])) { $error[] = "メールアドレスが入力されていないか誤りがあります"; }
		if (!preg_match('/^0\d{1,4}[-(]?\d{1,4}[-)]?\d{3,4}$/', $value['your_tel'])) { $error[] = "携帯番号が入力されていないか誤りがあります"; }
		if (empty($value['date'])) {
			$error[] = "体入希望日を入力してください";
		}
		
		return $error;
	}
	 
	/* ------------------------------  キャストここまで  ----------------------------------------*/
	
}