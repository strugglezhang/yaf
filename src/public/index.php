<?php
//这个文件是请求的入口
define("APP_PATH",  dirname(dirname(__FILE__)));
ob_start();
// 初始化应用

$app  = new Yaf_Application(APP_PATH . "/conf/app.ini");
$app->bootstrap()->run();
