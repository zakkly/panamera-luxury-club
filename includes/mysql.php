<?php
//======================================================================
//   ■：MySQL クラス
//======================================================================
class MySQL{
	//---------------------------
	// □：変数の宣言
	//---------------------------
	var $m_Con;
	var $m_Rows = 0;
	
	var $m_HostName = "localhost";
	var $m_UserName = "root";
	var $m_Password = "root";
	var $m_Database = "proud_nightclub";
	/*
	var $m_HostName = "mysql640.db.sakura.ne.jp";
	var $m_UserName = "proud";
	var $m_Password = "xsw23edc";
	var $m_Database = "proud_nightclub";
	*/
	
	
	//---------------------------
	// □：コンストラクタ
	//---------------------------
	function __construct() {
		$this->m_Con = new mysqli($this->m_HostName,$this->m_UserName,$this->m_Password,$this->m_Database);
		if( $this->m_Con->connect_errno ) {
			echo "Failed to connect to MySQL: " . $this->m_Con->connect_error;
			exit;
		}
		$this->m_Con->set_charset("utf8");
	}
	//---------------------------
	// SQLクエリの処理
	//---------------------------
	function query($sql) {
		
		$this->m_Rows = $this->m_Con->query($sql);
		
		return $this->m_Rows;
	}
	//---------------------------
	// テキストのエスケープ処理
	//---------------------------
	function escapeStr($value) {
	
		$this->m_Str = $this->m_Con->real_escape_string($value);
		
		return $this->m_Str;
	}
	//---------------------------
	// 検索結果をfetch
	//---------------------------
	function fetch(){
		return mysql_fetch_array($this->m_Rows);
	}
	//---------------------------
	// 変更された行の数を得る
	//---------------------------
	function affected_rows(){
		return mysql_affected_rows();
	}
	//---------------------------
	// 列数
	//---------------------------
	function cols(){
		return mysql_num_fields($this->m_Rows);
	}
	//---------------------------
	// 行数
	//---------------------------
	function rows(){
		return mysql_num_rows($this->m_Rows);
	}
	//---------------------------
	// 検索結果の開放
	//---------------------------
	function free(){
		mysql_free_result($this->m_Rows);
	}
	//---------------------------
	// MySQLをクローズ
	//---------------------------
	function close(){
		$this->m_Con->close();
	}
	//---------------------------
	// エラーメッセージ
	//---------------------------
	function errors(){
		return $this->errorno().": ".$this->m_Con->error;
	}
	//---------------------------
	// エラーナンバー
	//---------------------------
	function errorno(){
		return mysql_errno();
	}

}
?>
