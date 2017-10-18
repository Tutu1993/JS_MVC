<?php
namespace app\ctrl;

use scarf\core;

class indexCtrl extends core
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
        p($_GET);
    }
}
