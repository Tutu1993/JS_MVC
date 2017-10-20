<?php
// 定义常量
define('MVC', realpath('./'));
define('APP', MVC.'/app');
define('CORE', MVC.'/core');
define('MODULE', '\App');
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
include CORE.'/extra/function.php';
include CORE.'/Core.php';

// 自动装载文件
spl_autoload_register('\Core\Core::load');

// 调用加载方法
\Core\Core::run();
