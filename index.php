<?php

use libs\ZP;

defined('DEBUG') or define('DEBUG', true);
defined('APP_ROOT') or define('APP_ROOT', __DIR__);

require(__DIR__ . '/libs/autoload.php');

$config = require(__DIR__ . '/config/main.php');


// register exception handler
$exHandler = new \libs\ExceptionHandler();
$exHandler->register();


// logger
//$logger = new libs\Logger();
function logtest() {
    //for ($i=0; $i<100; $i++) {
    //    $logger->info("test");
    //    $logger->error("test2");
    //    $logger->trace("test3");
    //    $logger->warning("test3");
    //}
}

logtest();
global $startTime;
$startTime = microtime(true);

ZP::init();
ZP::trace("start: " . $startTime);

// get cat and cat
$cat = 'Index';
$act = 'index';

// change cat and act param to r
if (!empty($_GET['r'])) {
    $r = html_entity_decode($_GET['r']);
    if (false === strpos($r, '/')) {
        $cat = $r;
    } else {
        $r = explode('/', $r);
        $cat = $r[0];
        $act = $r[1];
    }
}
//if (!empty($_GET['cat'])) $cat = html_entity_decode($_GET['cat']);
//if (!empty($_GET['act'])) $act = html_entity_decode($_GET['act']);

$catClass = "cat\\" . ucfirst($cat) . 'Cat';
$actMethod = $act . 'Action';

//echo class_exists($catClass) . ' - ' . $catClass; exit;

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

ZP::trace('end: ' . microtime(true) . ' cost: ' . (microtime(true)-$startTime));



