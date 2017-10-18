<?php
namespace scarf\lib;

class conf
{
    public static $conf = array();

    public static function get($file, $name = '')
    {
        if (!isset(self::$conf[$file])) {
            $path = APP.'/config/'.$file.PHP;

            if (is_file($path)) {
                self::$conf[$file]  = include $path;

                if ($name !== '') {
                    if (!isset(self::$conf[$file][$name])) {
                        throw new \Exception('Can not find the config: '.$name);
                    }
                }
            } else {
                throw new \Exception('Can not find the conf-file: '.$file);
            }
        }

        if ($name === '') {
            return self::$conf[$file];
        } else {
            return self::$conf[$file][$name];
        }
    }
}
