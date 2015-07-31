<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/31
 * Time: 15:20
 */

namespace libs\Exception;


class ErrorCode {
    const INVALID_PARAM = 10300;

    static $errorMsg = array(
        self::INVALID_PARAM => '参数不符合接口要求',
    );
}