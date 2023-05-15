<?php

require_once dirname(__FILE__) . '/request_variables.php';

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