<?php 

defined('DEBUG') or define('DEBUG', true);
defined('APP_ROOT') or define('APP_ROOT', __DIR__);

require(__DIR__ . '/libs/autoload.php');

$config = require(__DIR__ . '/config/main.php');

// logger
$logger = new libs\Logger();
function logtest() {
    //for ($i=0; $i<100; $i++) {
    //    $logger->info("test");
    //    $logger->error("test2");
    //    $logger->trace("test3");
    //    $logger->warning("test3");
    //}
}

logtest();
$startTime = microtime(true);
$logger->trace("start: " . $startTime);

// get cat and cat
$cat = 'Index';
$act = 'Index';

if (!empty($_GET['cat'])) $cat = html_entity_decode($_GET['cat']);
if (!empty($_GET['act'])) $act = html_entity_decode($_GET['act']);

$catClass = 'cat\\' . ucfirst($cat) . 'Cat';
$actMethod = $act . 'Action';

if ( !class_exists($catClass)) {
    throw new \libs\Exception\ClassNotFoundException("cat [{$catClass}] 类不存在");
}

if ( !method_exists($catClass, $actMethod)) {
    throw new \libs\Exception\InvalidException("请求的接口[{$actMethod}] 不存在");
}

// call function
$cat = new $catClass();

$result = $cat->$actMethod();

var_dump($result);

$logger->trace('end: ' . microtime(true) . ' cost: ' . (microtime(true)-$startTime));



