<?php
namespace App\Ctrl;

use Core\Core;

class indexCtrl extends Core
{
    public function __construct()
    {
        if (!isset(parent::$action)) {
            $this->index();
        }
    }

    public function index()
    {
        // $data = array(
        // 	'title' => 'apple'
        // );
        // $this->assign($data);
        $this->display('index.html');
    }
}
