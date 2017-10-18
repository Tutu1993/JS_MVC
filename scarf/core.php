<?php
namespace scarf;

use scarf\lib\route;

class core
{
    public static $classMap = array();
	public static $ctrlClass;
	public static $action;
    public $assignData;

	// 加载路由类，并调用控制类
    public static function run()
    {
        $route = new route();
        $ctrlClass = $route->ctrl;
        $action = $route->action;
		self::$ctrlClass = $ctrlClass;
		self::$action = $action;
		p(self::$action);
        $ctrlFile =  APP.'/ctrl/'.$ctrlClass.'Ctrl'.PHP;
        $ctrlModule = MODULE.'\\ctrl\\'.$ctrlClass.'Ctrl';

        if (is_file($ctrlFile)) {
            include $ctrlFile;
            $ctrl = new $ctrlModule;

			if(isset($action)){
				if (is_callable(array($ctrl, $action))) {
	                $ctrl->$action();
	            } else {
	                // Header("Location:http://localhost/error/error_404");
	                throw new \Exception('Can not find the action: '.$action);
	            }
			}
        } else {
            // Header("Location:http://localhost/error/error_404");
            throw new \Exception('Can not find the ctrl: '.$ctrlClass);
        }
    }

	// include 未加载的文件
    public static function load($class)
    {
        $class = str_replace('\\', '/', $class);

        if (!isset(self::$classMap[$class])) {
            $file =  JS_MVC.'/'.$class.PHP;

            if (is_file($file)) {
                include $file;
                self::$classMap[$class] = '/'.$class.PHP;
            } else {
                throw new \Exception('Can not find the class: '.$class);
            }
        }
    }

	// 将 data 分配到 assignData 中
    public function assign($data)
    {
        foreach ($data as $key => $value) {
            $this->assignData[$key] = $value;
        }
    }

	// 调用 Twig 插件展示页面
    public function display($file)
    {
        if (is_file(APP.'/view/'.$file)) {
            $loader = new \Twig_Loader_Filesystem(APP.'/view');
            $twig = new \Twig_Environment($loader, array());
            $template = $twig->load($file);
            $template->display(isset($this->assignData) ? $this->assignData : array());
        } else {
            throw new \Exception('Can not find the HTML: '.$file);
        }
    }
}
