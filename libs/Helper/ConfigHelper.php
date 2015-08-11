<?php
/**
 * Created by PhpStorm.
 * User: wuxu@zplay.com
 * Date: 2015/8/10
 * Time: 10:15
 */

namespace libs\Helper;

/**
 * 用来读取配置文件的辅助类
 * Class ConfigHelper
 * @package libs\Helper
 */
class ConfigHelper {

    public static $instance;

    public $configPath;

    public function __construct() {
        $this->configPath = APP_ROOT . '/config/main.php';
    }

}