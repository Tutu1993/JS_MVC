<?php
namespace scarf\lib;

class route
{
    public $ctrl;
    public $action;

    public function __construct()
    {
        if (isset($_SERVER['REQUEST_URI']) && $_SERVER['REQUEST_URI'] != '/') {
            $path = $_SERVER['REQUEST_URI'];
            $array = explode('/', trim($path, '/'));

            if (isset($array[0])) {
                $this->ctrl = $array[0];
            }

            if (isset($array[1])) {
                $this->action =$array[1];
            }

            $count = count($array);
            $i = 2;
            while ($i < $count) {
                $_GET[$array[$i]] = $array[$i + 1];
                $i += 2;
            }
        } else {
            $this->ctrl = conf::get('route', 'ctrl');
            $this->action = conf::get('route', 'action');
        }
    }
}
