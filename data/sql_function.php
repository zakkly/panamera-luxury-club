<?php

require_once dirname(__FILE__) . '/../includes/public_require.php';
require_once dirname(__FILE__) . '/request.php';

class All_Sql {
	
	/* 
	 * コンストラクタなので自動で発動します。
	 * ページ内での取り方は$this->mysql&$this->requestです。
	 */
	public function __construct() {
		$this->mysql   = new MySQL;
		$this->request = new Request();
	}
	
	/* 
	 * 結果データ取得しループで整形
	 */
	public function FetchAll($sql) {
		
		$val = array();
		$i=0;
		if (!$rs = $this->mysql->query($sql)) {
			printf("Errormessage: %s\n", $this->mysql->errors());
		}
		while($arr = $rs->fetch_array(MYSQLI_ASSOC)) {
			foreach($arr as $key => $res) {
				$val[$i][$key] = $res;
			}
			$i++;
		}
		
		return $val;
	}
	
	/* 
	 * INSERTメソッド
	 */
	public function insertIns($col, $table, $data) {
		
		$sql = "INSERT INTO ".$table." (".$col.") VALUES(".$data.")";
		
		return $this->actionAct($sql);
		
	}
	
	/* 
	 * UPDATEメソッド
	 */
	public function updateUps($table, $data, $where) {
		
		$sql = "UPDATE ".$table." SET ".$data." ".$where;
		
		return $this->actionAct($sql);
		
	}
	
	/* 
	 * DELETEメソッド
	 */
	public function deleteDels($table, $where = null) {
		
		$sql = "DELETE FROM ".$table." ".$where;
		
		return $this->actionAct($sql);
	}
	
	/* 
	 * insert直後のidを入手
	 */
	public function lastInsertId($table) {
		
		$sql = "SELECT LAST_INSERT_ID() FROM ".$table."";
	
		return $this->FetchAll($sql);
	}
	
	/* 
	 * テキストのエスケープ処理
	 */
	public function realEscapeStr($value) {
	
		return $this->mysql->escapeStr($value);
	
	}
	
	/* 
	 * SQL判定をリターン
	 */
	public function actionAct($sql) {
		
		if (!$this->mysql->query($sql)) {
			printf("Errormessage: %s\n", $this->mysql->errors());
			return false;
		} else {
			return true;
		}
		
	}
	
}