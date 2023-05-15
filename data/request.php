<?php

require_once dirname(__FILE__) . '/request_variables.php';

class Request
{
    // POSTパラメータ
    private $_post;
    // GETパラメータ
    private $_query;
    
    // コンストラクタ@
    public function __construct()
    {
        $this->_post = new Post();
        $this->_query = new QueryString();
    }

    // POST変数取得
    public function getPost($key = null)
    {
        if (null == $key) {
            return $this->_post->get();
        }
        if (false == $this->_post->has($key)) {
            return null;
        }
        return $this->_post->get($key);
    }

    // GET変数取得
    public function getQuery($key = null)
    {
        if (null == $key) {
            return $this->_query->get();
        }
        if (false == $this->_query->has($key)) {
            return null;
        }
        return $this->_query->get($key);
    }
}