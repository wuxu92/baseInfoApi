<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/30
 * Time: 10:17
 */

namespace libs;


use model\RenderObject;

class Category {

    /**
     * @var RenderObject
     */
    public $retObj;

    public function __construct() {
        $this->retObj = new RenderObject();
    }

    public function postParam($idx, $default=null)
    {
        if (empty($_POST[$idx])) return $default;
        return $_POST[$idx];
    }

    public function getParam($idx, $default = null)
    {
        if (empty($_GET[$idx])) {
            return $default;
        }
        return $_GET[$idx];
    }

    public function json() {
        $this->retObj->json(true, 0);
    }

    public function error($code, $exit = false)
    {
        $this->retObj->error($code, $exit);
    }
}