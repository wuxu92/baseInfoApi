<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2015/7/30
 * Time: 11:16
 */

namespace libs;


class ExceptionHandler {

    public function exceptionHandler() {
        http_send_status(500);

    }

    public function errorHandler() {

    }

    public function register() {
    }

    public function unregister() {
        restore_error_handler();
        restore_exception_handler();
    }
}