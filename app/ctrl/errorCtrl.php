<?php
namespace app\ctrl;

use scarf\core;

class errorCtrl extends core
{
    public function __construct()
    {
        if (!isset(parent::$action)) {
            $this->index();
        }
    }

    public function index()
    {
        $this->display('error.html');
    }
}
