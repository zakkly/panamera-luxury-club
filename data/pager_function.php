<?php

require_once dirname(__FILE__) . '/front_function.php';

class Pager_Function extends Front_Function {
 
    private $base_uri = null; //ベースとなるURL
    private $page = null; //現在のページ番号
    private $per_page = null; //1ページに表示する件数
    private $max_row = null; //全データ件数
    private $max_page = null; //最大ページ数
    private $offset = null; //オフセット
 
    /*
     * 引数（全て必須）
     * $base_uri ベースとなるURL
     * $page ページ番号(数値)
     * $max_row 全データ件数(数値)
     * $per_page 1ページに表示する件数(数値)
     */
 
    function __construct($base_uri, $page, $max_row, $per_page, $category = null) {
        $this->base_uri = $base_uri;
        $this->max_row  = $max_row;
        $this->per_page = $per_page;
        $this->category = $category;
		$this->max_page = ($max_row == 0) ? 1 : ceil($max_row / $per_page); //最大ページ数を求める
        $this->page     = ($page <= 0 or $this->max_page < $page ) ? 1 : $page; //$page の値が正しくない場合は1を与える
        $this->offset   = ($this->page - 1) * $this->per_page; //オフセットを求める
        $this->str_count= (($this->page-1)*$per_page)+1;
        $this->end_count= $this->str_count+$per_page-1;
		if($this->end_count > $max_row) { $this->end_count = $max_row; }
    }
 
    //DBなどからデータを取得する場合のオフセット値を返す
    function getOffset() {
        return $this->offset;
    }
 
    //全データを配列として持っている場合に配列を渡す事で1ページ分の配列を返す
    function getPageData($data) {
        return array_slice($data, $this->offset, $this->per_page);
    }
 
    //現在のページ番号を返す
    function getPage() {
        return $this->page;
    }
 
    //最大ページ数を返す
    function getMaxPage() {
        return $this->max_page;
    }
 
    function getStrCount() {
    	return $this->str_count;
    }
 
    function getEndCount() {
    	return $this->end_count;
    }
 
    //前のページが存在する場合に前のページのリンクを返す
    function getPreviousNavi() {
        return (1 < $this->page) ? sprintf('<li><a href="%s%d%s">≪</a></li>', $this->base_uri, $this->page - 1, $this->category) : '';
    }
 
    //次のページが存在する場合に次のページのリンクを返す
    function getNextNavi() {
        return ($this->page < $this->max_page) ? sprintf('<li><a href="%s%d%s">≫</a></li>', $this->base_uri, $this->page + 1, $this->category) : '';
    }
 
    //ナビゲーションリンクを返す
    function getPageNavi() {
        $navi_link = '';
        for ($i = 1; $i <= $this->max_page; $i++) {
            if ($i != $this->page) {
                $navi_link .= sprintf('<li><a href="%s%d%s">%d</a><span>|</span></li>', $this->base_uri, $i, $this->category, $i);
            } else {
                $navi_link .= sprintf('<li class="%s%d%s" id="active">%d<span>|</span></li>', $this->base_uri, $i, $this->category, $i);
            }
        }
        return $navi_link;
    }
    
    //前のページが存在する場合に前のページのリンクを返す
    function getSpPreviousNavi() {
        return (1 < $this->page) ? sprintf('<li class="previous"><a href="%s%d%s">前の%d件</a></li>', $this->base_uri, $this->page - 1, $this->category, BASE_LIMIT_SP_PAGEING_LIST) : '<li class="previous">前の'.BASE_LIMIT_SP_PAGEING_LIST.'件</li>';
    }
 
    //次のページが存在する場合に次のページのリンクを返す
    function getSpNextNavi() {
        return ($this->page < $this->max_page) ? sprintf('<li class="next"><a href="%s%d%s">次の%d件</a></li>', $this->base_uri, $this->page + 1, $this->category, BASE_LIMIT_SP_PAGEING_LIST) : '<li class="next">次の'.BASE_LIMIT_SP_PAGEING_LIST.'件</li>';
    }
    
    //ナビゲーションリンクを返すadmin
    function getPageNavi2() {
        $navi_link = '';
		if($this->max_page <= 10) {
			for ($i = 1; $i <= $this->max_page; $i++) {
				if ($i != $this->page) {
                    $navi_link .= sprintf('<li><a href="%s%d%s">%d</a><span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                } else {
                    $navi_link .= sprintf('<li class="%s%d%s" id="active">%d<span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                }
			}
		} elseif($this->max_page-10 < $this->page) {
			for ($i = $this->max_page-10; $i <= $this->max_page; $i++) {
				if ($i != $this->page) {
                    $navi_link .= sprintf('<li><a href="%s%d%s">%d</a><span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                } else {
                    $navi_link .= sprintf('<li class="%s%d%s" id="active">%d<span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                }
			}
		} elseif($this->page-4 > 0) {
			for ($i = $this->page-4; $i <= $this->page+5; $i++) {
				if ($i != $this->page) {
                    $navi_link .= sprintf('<li><a href="%s%d%s">%d</a><span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                } else {
                    $navi_link .= sprintf('<li class="%s%d%s" id="active">%d<span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                }
			}
		} else {
			for ($i = 1; $i <= 10; $i++) {
				if ($i != $this->page) {
                    $navi_link .= sprintf('<li><a href="%s%d%s">%d</a><span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                } else {
                    $navi_link .= sprintf('<li class="%s%d%s" id="active">%d<span>|</span></li>', $this->base_uri, $i, $this->category, $i);
                }
			}
		}
		
        return $navi_link;
    }
    
}