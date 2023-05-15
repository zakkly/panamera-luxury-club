<?php

// リクエスト変数抽象クラス
abstract class RequestVariables
{
    protected $_values;

    // コンストラクタ
    public function __construct() 
    {
        $this->setValues();
    }

    // パラメータ値設定
    abstract protected function setValues();

    // 指定キーのパラメータを取得
    public function get($key = null)
    {
        $ret = null;
        if (null == $key) {
            $ret = $this->_values;
        } else {
            if (true == $this->has($key)) {
                $ret = $this->_values[$key];
            }
        }
        return $ret;
    }

    // 指定のキーが存在するか確認
    public function has($key)
    {
        if (false == array_key_exists($key, $this->_values)) {
            return false;
        }
        return true;
    }
}

// POST変数クラス
class Post extends RequestVariables
{
    protected function setValues()
    {
        foreach ($_POST as $key => $value) {
            $this->_values[$key] = $value;
        }
    }
}

// GET変数クラス
class QueryString extends RequestVariables
{
    protected function setValues()
    {
        foreach ($_GET as $key => $value) {
            $this->_values[$key] = $value;
        }
    }
}