<?php

// 定义常量
define('JS_MVC', realpath('./'));
define('APP', JS_MVC.'/app');
define('SCARF', JS_MVC.'/scarf');
define('MODULE', '\app');
define('PHP', '.php');
define('DEBUG', true);

// 引用 composer 插件
include "vendor/autoload.php";

// 设定是否 DEBUG
if (DEBUG) {
    $whoops = new \Whoops\Run;
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
    $whoops->register();
    ini_set('display_errors', 'On');
} else {
    ini_set('display_errors', 'Off');
}

// 引用常用方法函数及核心文件
include SCARF.'/extra/function.php';
include SCARF.'/core.php';

// 自动装载文件
spl_autoload_register('\scarf\core::load');

// 调用加载方法
\scarf\core::run();
