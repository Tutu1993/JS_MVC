<?php
namespace App\Ctrl;

use Core\Core;

class errorCtrl extends Core
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
