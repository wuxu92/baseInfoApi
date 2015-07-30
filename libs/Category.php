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
}