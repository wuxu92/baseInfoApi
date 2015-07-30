<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/30
 * Time: 11:24
 */

namespace model;

/**
 * Class RenderObject 用于返回给api调用的类
 * @package model
 */
class RenderObject {

    public $status;
    public $msg;
    public $data;

    public function __construct($status=0, $msg='', $data=array()) {
        $this->status =$status;
        $this->msg = $msg;
        $this->data = $data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    /**
     * 需要data字段是数组类型才可以追加数据，否则不做处理
     * @param $data
     * @return $this
     */
    public function append($data)
    {
        if (is_array($this->data)) {
            $this->data[] = $data;
        }
        return $this;
    }

    /**
     * @param bool $exit 是否输出内容后退出程序
     * @param int $exitCode
     */
    public function json($exit = true, $exitCode=0) {
        echo json_encode(array(
            'status' => $this->status,
            'msg'    => $this->msg,
            'data'   => $this->data
        ));

        if (true === $exit) {
            exit($exitCode);
        }
    }

}