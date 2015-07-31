<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/7/30
 * Time: 11:39
 */

namespace libs;

/**
 * Class ZP 各个组件的入口，实现各个静态方法
 * @package libs
 */
class ZP {

    /**
     * @var ZP
     */
    private static  $ins;

    /**
     * @var Logger
     */
    public static $logger;

    /**
     * @var DBConnector
     */
    public $db;

    public static function setLogger() {
        self::$logger = new Logger();
        //var_dump(self::$logger);
    }

    public function setDb($config=null) {
        $this->db = new DBConnector($config);
    }

    public static function init() {
        $i = self::app();
        //var_dump($i);exit;
    }

    public static function app() {
        if (ZP::$ins instanceof ZP) return ZP::$ins;
        else {
            ZP::$ins = new ZP();
            ZP::$ins->setDb();
            ZP::$ins->setLogger();
            return ZP::$ins;
        }
    }

    public static function error($msg, $cate=null) {
        self::$logger->log($msg, Logger::LEVEL_ERROR, $cate);
    }

    public static function info($msg, $cate=null) {
        self::$logger->log($msg, Logger::LEVEL_INFO, $cate);
    }

    public static function trace($msg, $cate=null) {
        if (defined(DEBUG) && DEBUG) {
            self::$logger->log($msg, Logger::LEVEL_TRACE, $cate);
        }
    }

    public static function warning($msg, $cate=null) {
        self::$logger->log($msg, Logger::LEVEL_WARNING, $cate);
    }

    public static function profile($msg, $cate=null) {
        if (defined(DEBUG) && DEBUG) {
            self::$logger->log($msg, Logger::LEVEL_PROFILE, $cate);
        }
    }

}